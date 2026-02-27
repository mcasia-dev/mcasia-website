<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;

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

        $categoryIds = collect([$activeCategory->id]);
        if ($activeSubcategory) {
            $categoryIds->push($activeSubcategory->id);
        } else {
            $categoryIds = $categoryIds
                ->merge($activeCategory->children->pluck('id'))
                ->unique()
                ->values();
        }

        $products = Product::query()
            ->where('is_active', true)
            ->whereHas('categories', fn($query) => $query->whereIn('product_categories.id', $categoryIds))
            ->with(['categories:id,name,slug', 'media'])
            ->orderBy('name')
            ->get();

        $productImages = $products
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

        return view('products.show', [
            'topCategories' => $topCategories,
            'activeCategory' => $activeCategory,
            'activeSubcategory' => $activeSubcategory,
            'products' => $products,
            'productImages' => $productImages,
        ]);
    }
}
