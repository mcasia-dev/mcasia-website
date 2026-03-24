@php
    use App\Models\SalesAvenueCategory;
    use App\Models\PublicPage\OurEdge;
    use App\Models\ProductCategory;
    use Illuminate\Support\Facades\Schema;

    $products = config('header.products', []);
    $salesAvenues = [];

    try {
        if (Schema::hasTable('product_categories')) {
            $categories = ProductCategory::query()
                ->whereNull('parent_id')
                ->where('is_active', true)
                ->with([
                    'children' => fn ($query) => $query
                        ->where('is_active', true)
                        ->orderBy('sort_order')
                        ->orderBy('name'),
                ])
                ->orderBy('sort_order')
                ->orderBy('name')
                ->get();

            if ($categories->isNotEmpty()) {
                $products = $categories
                    ->map(function (ProductCategory $category): array {
                        $children = $category->children
                            ->map(fn (ProductCategory $child): array => [
                                'title' => $child->name,
                                'url' => url('/products/' . $category->slug . '/' . $child->slug),
                            ])
                            ->values()
                            ->all();

                        return [
                            'title' => $category->name,
                            'url' => empty($children)
                                ? url('/products/' . $category->slug)
                                : url('/products/' . $category->slug . '/' . $category->children->first()->slug),
                            'subheader' => $children,
                        ];
                    })
                    ->values()
                    ->all();
            }
        }

        if (Schema::hasTable('our_edges')) {
            $ourEdges = OurEdge::query()
                ->isPublished()
                ->orderBy('sort_order', 'asc')
                ->get();

            if ($ourEdges->isNotEmpty()) {
                $edges = $ourEdges
                    ->map(fn (OurEdge $edge): array => [
                        'title' => $edge->title,
                        'url' => route('our-edge', ['slug' => $edge->slug]),
                    ])
                    ->values()
                    ->all();
            }
        }

        if (Schema::hasTable('sales_avenue_categories')) {
            $categories = SalesAvenueCategory::query()
                ->whereNull('parent_id')
                ->where('is_active', true)
                ->with([
                    'children' => fn ($query) => $query
                        ->where('is_active', true)
                        ->orderBy('sort_order')
                        ->orderBy('name'),
                ])
                ->orderBy('sort_order')
                ->orderBy('name')
                ->get();

            if ($categories->isNotEmpty()) {
                $salesAvenues = $categories
                    ->map(function (SalesAvenueCategory $category): array {
                        $children = $category->children
                            ->map(fn (SalesAvenueCategory $child): array => [
                                'title' => $child->name,
                                'url' => $child->slug,
                            ])
                            ->values()
                            ->all();

                        return [
                            'title' => $category->name,
                            'url' => empty($children) ? $category->slug : null,
                            'subheader' => $children,
                        ];
                    })
                    ->values()
                    ->all();
            }
        }
    } catch (\Throwable $exception) {
        // Keep header functional if database is not ready.
    }

    $navState = [
        'home' => request()->routeIs('home') || request()->path() === '/',
        'ourStory' => request()->routeIs('our-story') || request()->is('our-story'),
        'products' => request()->routeIs('products.show', 'products.images', 'products.images.subcategory', 'show-brands')
            || request()->is('products*')
            || request()->is('brands*'),
        'ourEdge' => request()->routeIs('our-edge') || request()->is('our-edge*'),
        'salesAvenue' => request()->routeIs('sales-avenue')
            || request()->is('sales-avenue*')
            || request()->is('beverage')
            || request()->is('foodservice_solutions')
            || request()->is('retail_product')
            || request()->is('ecommerce'),
        'catalog' => request()->is('product_catalog')
            || request()->is('product_catalog_mobile')
            || request()->is('menu_ideas_with_products')
            || request()->is('menu_ideas_with_products_mobile'),
        'recipes' => request()->routeIs('recipes', 'recipes.show') || request()->is('recipes*'),
        'events' => request()->routeIs('news_event') || request()->is('news_event*'),
        'reachUs' => request()->routeIs('reach-us') || request()->is('reach-us') || request()->is('reach_us'),
        'partnership' => request()->is('partnership'),
    ];

@endphp

@include('components.header.styles')
@include('components.header.search-modal')
@include('components.header.desktop', [
    'products' => $products,
    'edges' => $edges ?? [],
    'salesAvenues' => $salesAvenues,
    'navState' => $navState,
    ])
@include('components.header.mobile', [
    'products' => $products,
    'edges' => $edges ?? [],
    'salesAvenues' => $salesAvenues,
    'navState' => $navState,
    ])
@include('components.header.scripts')
