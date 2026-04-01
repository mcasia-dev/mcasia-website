<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductPageController extends Controller
{
    public function show(Request $request, string $categorySlug, ?string $subcategorySlug = null)
    {
        $topCategories = ProductCategory::query()
            ->whereNull('parent_id')
            ->where('is_active', true)
            ->with([
                'seo',
                'children' => fn($query) => $query
                    ->with(['media', 'seo'])
                    ->where('is_active', true)
                    ->orderBy('sort_order')
                    ->orderBy('name'),
                'media',
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

        $imagesPerPage = 15;
        $imagesPageName = 'images_page';
        $currentPage = max(1, (int) $request->query($imagesPageName, 1));
        $totalImages = $allProductImages->count();

        $currentImages = $allProductImages
            ->forPage($currentPage, $imagesPerPage)
            ->values();

        $paginatedImages = new LengthAwarePaginator(
            $currentImages,
            $totalImages,
            $imagesPerPage,
            $currentPage,
            [
                'path' => $request->url(),
                'pageName' => $imagesPageName,
                'query' => $request->query(),
            ]
        );

        return view('products.show', [
            'topCategories' => $topCategories,
            'activeCategory' => $activeCategory,
            'activeSubcategory' => $activeSubcategory,
            'products' => $products,
            'productImages' => $paginatedImages,
        ] + $this->buildSeoViewData(
            $activeSubcategory ?: $activeCategory,
            titleField: 'name',
            descriptionField: null,
            fallbackTitle: (($activeSubcategory?->name ?: $activeCategory->name) ?: 'Products') . ' | ' . config('app.name', 'McAsia Foodtrade Corporation'),
            fallbackDescription: 'Browse McAsia product categories, product images, and selections for retail and foodservice needs.',
            fallbackImage: asset('images/our-products/banner.jpg')
        ));
    }

    public function images(Request $request, string $categorySlug, ?string $subcategorySlug = null): JsonResponse
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

        $total = count($images);
        $page = max(1, (int) $request->query('page', 1));
        $perPage = (int) $request->query('per_page', 12);
        $perPage = max(1, min($perPage, 60));
        $lastPage = max(1, (int) ceil($total / $perPage));
        $page = min($page, $lastPage);

        $offset = ($page - 1) * $perPage;
        $pagedImages = array_slice($images, $offset, $perPage);

        return response()->json([
            'images' => $pagedImages,
            'has_more' => $page < $lastPage,
            'current_page' => $page,
            'per_page' => $perPage,
            'last_page' => $lastPage,
            'next_page' => $page < $lastPage ? $page + 1 : null,
            'total' => $total,
        ]);
    }

    private function buildSeoViewData(
        ?Model $record,
        ?string $titleField = 'title',
        ?string $descriptionField = 'description',
        ?string $fallbackTitle = null,
        ?string $fallbackDescription = null,
        ?string $fallbackImage = null,
    ): array {
        $appName = config('app.name', 'McAsia Foodtrade Corporation');
        $titleValue = $titleField ? data_get($record, $titleField) : null;
        $descriptionValue = $descriptionField ? data_get($record, $descriptionField) : null;

        $normalizedDescription = Str::of(strip_tags((string) $descriptionValue))
            ->replaceMatches('/\s+/', ' ')
            ->trim()
            ->limit(160, '')
            ->value();

        return [
            'seoMeta' => $record?->seo,
            'seoFallbackTitle' => $fallbackTitle ?: ($titleValue ? "{$titleValue} | {$appName}" : $appName),
            'seoFallbackDescription' => $fallbackDescription ?: ($normalizedDescription ?: $appName),
            'seoFallbackImage' => $fallbackImage ?: asset('images/mcasia_logo_minimal.png'),
        ];
    }
}
