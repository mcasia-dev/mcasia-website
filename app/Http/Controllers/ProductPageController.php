<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\JsonResponse;

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

        $extractImageUrls = static function ($products): array {
            return $products
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
                ->take(3)
                ->all();
        };

        $products = Product::query()
            ->where('is_active', true)
            ->whereHas('categories', fn($query) => $query->whereIn('product_categories.id', $categoryIds))
            ->with(['categories:id,name,slug', 'media'])
            ->orderBy('name')
            ->get();

        $productImages = $extractImageUrls($products);

        return view('products.show', [
            'topCategories' => $topCategories,
            'activeCategory' => $activeCategory,
            'activeSubcategory' => $activeSubcategory,
            'products' => $products,
            'productImages' => $productImages,
        ]);
    }

    public function images(string $categorySlug, ?string $subcategorySlug = null): JsonResponse
    {
        $activeCategory = ProductCategory::query()
            ->whereNull('parent_id')
            ->where('is_active', true)
            ->where('slug', $categorySlug)
            ->with([
                'children' => fn($query) => $query->where('is_active', true)
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

        return response()->json([
            'images' => $images,
        ]);
    }
}
