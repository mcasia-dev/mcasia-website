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
@endphp

@include('components.header.styles')
@include('components.header.search-modal')
@include('components.header.desktop', [
    'products' => $products,
    'edges' => $edges ?? [],
    'salesAvenues' => $salesAvenues,
    ])
@include('components.header.mobile', [
    'products' => $products,
    'edges' => $edges ?? [],
    'salesAvenues' => $salesAvenues,
    ])
@include('components.header.scripts')
