@extends('layouts.app')

@section('title', 'McAsia - ' . $activeCategory->name)

@push('styles')
    <style>
        :root {
            --catalog-ink: #1f2937;
            --catalog-muted: #6b7280;
            --catalog-accent: #c41212;
            --catalog-accent-dark: #8f1111;
            --catalog-soft: #f3f4f6;
        }

        .product-page-hero {
            position: relative;
            background-image: linear-gradient(
                128deg,
                rgba(15, 23, 42, 0.34),
                rgba(0, 0, 0, 0.22)
            ),
            url("{{ asset('images/our-products/banner.webp') }}");
            background-size: cover;
            background-position: center;
            border-radius: 1.5rem;
            overflow: hidden;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.06);
            min-height: 360px;
            display: flex;
            flex-direction: column;
            align-items: start;
            justify-content: end;
            padding: 20px 0;
        }

        .product-page-hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 88% 18%, rgba(255, 255, 255, 0.24), transparent 40%);
            pointer-events: none;
        }

        .top-category-card {
            min-height: 142px;
            border-radius: 26px 2px;
            border: 2px solid rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(2px);
            transition: transform 160ms ease, box-shadow 200ms ease, background-color 160ms ease;
        }

        .top-category-card:hover {
            transform: translateY(-2px);
        }

        .top-category-icon {
            width: 56px;
            height: 56px;
            padding: 10px;
            border-radius: 9999px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.45rem;
            border: 1px solid rgba(255, 255, 255, 0.25);
        }

        .chip {
            border-radius: 14px 2px;
            border: 1px solid #d1d5db;
            background: #ffffff;
            color: #4b5563;
            transition: all 160ms ease;
        }

        .chip:hover {
            border-color: #a7a7a7;
            background: #f9fafb;
        }

        .chip.is-active {
            background: var(--catalog-accent);
            border-color: var(--catalog-accent-dark);
            color: #ffffff;
            box-shadow: 0 8px 18px rgba(196, 18, 18, 0.25);
        }

        .product-card {
            border-radius: 1rem;
            border: 1px solid #e5e7eb;
            background: #ffffff;
            box-shadow: 0 10px 18px rgba(15, 23, 42, 0.05);
            transition: transform 160ms ease, box-shadow 200ms ease;
        }

        .product-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 18px 28px rgba(15, 23, 42, 0.11);
        }

        .canned-showcase {
            display: grid;
            grid-template-columns: minmax(2, 1fr);
            gap: 1.5rem;
            align-items: center;
        }

        @media (min-width: 1024px) {
            .canned-showcase {
                grid-template-columns: 1.7fr 0.8fr;
            }
        }

        .canned-image-grid {
            display: grid;
            grid-template-columns: repeat(1, minmax(0, 1fr));
            gap: 1rem;
        }

        @media (min-width: 640px) {
            .canned-image-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (min-width: 1280px) {
            .canned-image-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        .canned-image-card {
            border: 1px solid #d1d5db;
            background: #fff;
            border-radius: 0.5rem;
            box-shadow: 0 3px 8px rgba(15, 23, 42, 0.08);
            height: 250px;
            overflow: hidden;
            position: relative;
        }

        .canned-image-card img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 0.85rem;
            transform-origin: center center;
            transition: transform 220ms ease, transform-origin 120ms ease;
            will-change: transform, transform-origin;
            cursor: zoom-in;
        }

        .canned-image-card:hover img {
            transform: scale(4.5);
        }

        .canned-image-card.is-zooming {
            z-index: 2;
        }
    </style>
@endpush

@section('content')
    @php
        $iconMap = [
            'cooking-essentials' => 'fa-bowl-food',
            'frozen' => 'fa-snowflake',
            'beverage' => 'fa-mug-hot',
            'snacks' => 'fa-cookie-bite',
            'packaging-supplies' => 'fa-box-open',
        ];
    @endphp

    <main class="min-h-screen pt-4 pb-14 bg-gradient-to-b from-[#f2f4f7] via-[#ededed] to-[#f7f7f7]">
        <div class="max-w-6xl mx-auto px-4">
            <section class="product-page-hero border border-white/40">
                <div class="relative z-10 w-full px-4 sm:px-8">
                    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-8 items-center mx-auto max-w-3xl">
                        @foreach($topCategories as $category)
                            @php
                                $isActive = $category->id === $activeCategory->id;
                                $hasChildren = $category->children->isNotEmpty();
                                $categoryUrl = $hasChildren
                                    ? route('products.show', ['categorySlug' => $category->slug, 'subcategorySlug' => $category->children->first()->slug])
                                    : route('products.show', ['categorySlug' => $category->slug]);
                            @endphp
                            <a href="{{ $categoryUrl }}"
                               title="View {{ $category->name }} products"
                               rel="noopener noreferrer"
                               aria-label="View {{ $category->name }} products"
                               class="top-category-card text-center flex flex-col items-center justify-center px-1
                               {{ $isActive ? 'bg-[#c41212] text-white shadow-xl' : 'bg-black/35 text-white hover:bg-black/45' }}">
                                <span class="top-category-icon {{ $isActive ? 'bg-[#d98282]' : 'bg-white/50' }}">
                                    @foreach($category->media as $icon)
                                        <img src="{{$icon->original_url}}" alt="{{ $category->name }} icon"
                                             title="{{ $category->name }} icon"
                                             loading="lazy"
                                             decoding="async"
                                             fetchpriority="low">
                                    @endforeach
                                </span>
                                <p class="mt-2 text-sm font-bold leading-tight drop-shadow">{{ $category->name }}</p>
                            </a>
                        @endforeach
                    </div>
                </div>
            </section>

            @if($activeCategory->children->isNotEmpty())
                <section class="mt-5">
                    <div class="flex flex-wrap gap-3">
                        @foreach($activeCategory->children as $child)
                            <a href="{{ route('products.show', ['categorySlug' => $activeCategory->slug, 'subcategorySlug' => $child->slug]) }}"
                               title="View {{ $child->name }} products"
                               rel="noopener noreferrer"
                               aria-label="View {{ $child->name }} products"
                               class="chip px-5 py-2 text-sm font-semibold {{ optional($activeSubcategory)->id === $child->id ? 'is-active' : '' }}">
                                {{ $child->name }}
                            </a>
                        @endforeach
                    </div>
                </section>
            @endif

            <section class="mt-9">
                <div class="mt-4 flex items-center justify-between flex-wrap gap-3">
                    <h1 class="text-xl md:text-4xl font-extrabold text-[var(--catalog-ink)]">
                        {{ $activeSubcategory ? $activeSubcategory->name . ' Products' : $activeCategory->name . ' Products' }}
                    </h1>
                    <div class="bg-white rounded-lg px-4 py-3 text-center border border-slate-200">
                        <p class="text-sm font-medium text-slate-600">
                            {{ $productImages->total() }} item(s)
                        </p>
                        @if($productImages->total() > 0)
                            <p class="mt-1 text-xs text-slate-500">
                                Page {{ $productImages->currentPage() }} of {{ $productImages->lastPage() }}
                            </p>
                        @endif
                    </div>
                </div>

                <div class="mt-5">
                    <div id="product-image-grid" class="canned-image-grid">
                        @forelse($productImages as $image)
                            <article class="canned-image-card" data-zoom-card>
                                <img src="{{ $image }}" alt="Product"
                                     data-zoom-image
                                     title="Product image"
                                     loading="lazy"
                                     decoding="async"
                                     fetchpriority="low">
                            </article>
                        @empty
                            <div class="rounded-xl bg-white border border-slate-200 p-6 text-slate-600">
                                No images found.
                            </div>
                        @endforelse
                    </div>

                </div>

                @if($productImages->total() > 0)
                    <div class="mt-8">
                        {{ $productImages->onEachSide(1)->links() }}
                    </div>
                @endif
            </section>
        </div>
    </main>

    @include('components.footer')
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('[data-zoom-card]').forEach(function (card) {
                const image = card.querySelector('[data-zoom-image]');

                if (!image) {
                    return;
                }

                card.addEventListener('mousemove', function (event) {
                    const bounds = card.getBoundingClientRect();
                    const x = ((event.clientX - bounds.left) / bounds.width) * 100;
                    const y = ((event.clientY - bounds.top) / bounds.height) * 100;

                    image.style.transformOrigin = `${x}% ${y}%`;
                    card.classList.add('is-zooming');
                });

                card.addEventListener('mouseleave', function () {
                    image.style.transformOrigin = 'center center';
                    card.classList.remove('is-zooming');
                });
            });
        });
    </script>
@endpush
