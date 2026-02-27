<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductPageController extends Controller
{
    public function show(string $categorySlug, ?string $subcategorySlug = null)
    {
        $topCategories = ProductCategory::query()
            ->whereNull('parent_id')
            ->where('is_active', true)
            ->with([
                'children' => fn($query) => $query
                    ->with(['media'])
                    ->where('is_active', true)
                    ->orderBy('sort_order')
                    ->orderBy('name'),
            ])
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        $activeCategory = $topCategories->firstWhere('slug', $categorySlug);

        abort_if(!$activeCategory, 404);

        $activeSubcategory = null;
        if ($subcategorySlug !== null) {
            $activeSubcategory = $activeCategory->children->firstWhere('slug', $subcategorySlug);
            abort_if(!$activeSubcategory, 404);
        }

        $allCategoryIds = collect([$activeCategory->id])
            ->merge($activeCategory->children->pluck('id'))
            ->unique()
            ->values();

        $categoryIds = $activeSubcategory
            ? collect([$activeSubcategory->id])
            : $allCategoryIds;

        $products = Product::query()
            ->where('is_active', true)
            ->whereHas('categories', fn($query) => $query->whereIn('product_categories.id', $categoryIds))
            ->with(['categories:id,name,slug', 'media'])
            ->orderBy('name')
            ->get();

        $allProductImages = $products
            ->map(function (Product $product): ?string {
                $mediaUrl = $product->getFirstMediaUrl('products');
                if (!empty($mediaUrl)) {
                    return $mediaUrl;
                }

                $convertedUrl = $product->getFirstMediaUrl('products', 'products');
                return !empty($convertedUrl) ? $convertedUrl : null;
            })
            ->filter()
            ->values();

        $imagesInitialLimit = 10;
        $currentImages = $allProductImages
            ->take($imagesInitialLimit)
            ->values();

        return view('products.show', [
            'topCategories' => $topCategories,
            'activeCategory' => $activeCategory,
            'activeSubcategory' => $activeSubcategory,
            'products' => $products,
            'productImages' => $currentImages,
            'totalProductImages' => $allProductImages->count(),
            'imagesInitialLimit' => $imagesInitialLimit,
        ]);
    }

    public function images(Request $request, string $categorySlug, ?string $subcategorySlug = null): JsonResponse
    {
        $activeCategory = ProductCategory::query()
            ->whereNull('parent_id')
            ->where('is_active', true)
            ->where('slug', $categorySlug)
            ->with([
                'children' => fn($query) => $query
                    ->where('is_active', true)
                    ->orderBy('sort_order')
                    ->orderBy('name'),
            ])
            ->first();

        abort_if(!$activeCategory, 404);

        $activeSubcategory = null;
        if ($subcategorySlug !== null) {
            $activeSubcategory = $activeCategory->children->firstWhere('slug', $subcategorySlug);
            abort_if(!$activeSubcategory, 404);
        }

        $allCategoryIds = collect([$activeCategory->id])
            ->merge($activeCategory->children->pluck('id'))
            ->unique()
            ->values();

        $categoryIds = $activeSubcategory
            ? collect([$activeSubcategory->id])
            : $allCategoryIds;

        $products = Product::query()
            ->where('is_active', true)
            ->whereHas('categories', fn($query) => $query->whereIn('product_categories.id', $categoryIds))
            ->with(['media'])
            ->orderBy('name')
            ->get();

        $images = $products
            ->map(function (Product $product): ?string {
                $mediaUrl = $product->getFirstMediaUrl('products');
                if (!empty($mediaUrl)) {
                    return $mediaUrl;
                }

                $convertedUrl = $product->getFirstMediaUrl('products', 'products');
                return !empty($convertedUrl) ? $convertedUrl : null;
            })
            ->filter()
            ->values()
            ->all();

        $offset = max(0, (int) $request->query('offset', 0));
        $limit = (int) $request->query('limit', 12);
        $limit = max(1, min($limit, 60));

        $pagedImages = array_slice($images, $offset, $limit);
        $loadedCount = $offset + count($pagedImages);
        $total = count($images);

        return response()->json([
            'images' => $pagedImages,
            'has_more' => $loadedCount < $total,
            'next_offset' => $loadedCount,
            'total' => $total,
        ]);
    }
}