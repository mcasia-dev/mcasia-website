@php
    use App\Models\ProductCategory;
    use Illuminate\Support\Facades\Schema;

    $products = config('header.products', []);
    $edges = config('header.our_edges', []);

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
    } catch (\Throwable $exception) {
        // Keep header functional if database is not ready.
    }
@endphp

@include('components.header.styles')
@include('components.header.search-modal')
@include('components.header.desktop', [
    'products' => $products,
    'edges' => $edges
    ])
@include('components.header.mobile', [
    'products' => $products,
    'edges' => $edges
    ])
@include('components.header.scripts')
