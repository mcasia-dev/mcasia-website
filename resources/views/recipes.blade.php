@extends('layouts.app')
@section('title', 'McAsia - Recipes')
@section('content')

    <style>
        [x-cloak] {
            display: none !important;
        }

        .recipes-page {
            background: radial-gradient(950px 460px at 6% -6%, rgba(220, 38, 38, 0.1), transparent 60%),
            radial-gradient(820px 500px at 95% 8%, rgba(248, 113, 113, 0.1), transparent 56%),
            #f7f7f5;
        }

        .recipes-surface {
            border: 1px solid #ececec;
            background: #fff;
            box-shadow: 0 14px 38px rgba(15, 23, 42, 0.06);
        }

        .recipe-card {
            border: 1px solid #ececec;
            background: #fff;
            box-shadow: 0 10px 24px rgba(15, 23, 42, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .recipe-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 30px rgba(15, 23, 42, 0.14);
        }

        .recipe-thumb {
            position: relative;
            overflow: hidden;
        }

        .recipe-thumb::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(15, 23, 42, 0.35), rgba(15, 23, 42, 0));
            opacity: 0;
            transition: opacity 0.25s ease;
        }

        .recipe-card:hover .recipe-thumb::after {
            opacity: 1;
        }

        .recipe-image {
            transition: transform 0.35s ease;
        }

        .recipe-card:hover .recipe-image {
            transform: scale(1.03);
        }

        .section-kicker {
            letter-spacing: 0.18em;
        }
    </style>

    <main class="recipes-page w-full overflow-x-hidden">
        <section class="relative w-full h-64 sm:h-80 lg:h-[500px] overflow-hidden bg-black">
            <div id="slideshow" class="w-full h-full relative">
                <img src="{{ asset('images/EXPLORE NEW RECEIPES/1.png') }}" alt="Recipe Banner 1" title="Explore New Recipes 1" loading="lazy"
                     decoding="async" fetchpriority="high"
                     class="absolute top-0 left-0 w-full h-full object-cover opacity-100 transition-opacity duration-1000"/>
                <img src="{{ asset('images/EXPLORE NEW RECEIPES/2.png') }}" alt="Recipe Banner 2" title="Explore New Recipes 2" loading="lazy"
                     decoding="async" fetchpriority="high"
                     class="absolute top-0 left-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000"/>
                <img src="{{ asset('images/EXPLORE NEW RECEIPES/3.png') }}" alt="Recipe Banner 3" title="Explore New Recipes 3" loading="lazy"
                     decoding="async" fetchpriority="high"
                     class="absolute top-0 left-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000"/>
                <img src="{{ asset('images/EXPLORE NEW RECEIPES/4.png') }}" alt="Recipe Banner 4" title="Explore New Recipes 4" loading="lazy"
                     decoding="async" fetchpriority="high"
                     class="absolute top-0 left-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000"/>
            </div>
        </section>

        <section id="recipesSection" class="max-w-7xl mx-auto px-4 sm:px-6 py-8 sm:py-10 lg:py-12">
            <article class="recipes-surface rounded-3xl p-5 sm:p-7 mb-6 sm:mb-8">
                <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4">
                    <div>
                        <p class="section-kicker text-xs font-semibold uppercase text-red-600 mb-2">Discover Recipes</p>
                        <h1 class="text-3xl sm:text-4xl font-bold text-gray-900">Recipes</h1>
                    </div>
                    <div class="flex items-center gap-3">
                    <span
                        class="inline-flex items-center h-10 px-4 rounded-xl border border-red-100 bg-red-50 text-red-600 font-semibold text-sm">
                        {{ $recipes->total() }} recipe{{ $recipes->total() === 1 ? '' : 's' }}
                    </span>
                    </div>
                </div>
            </article>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                @forelse($recipes as $recipe)
                    <a href="{{ route('recipes.show', ['slug' => $recipe['slug']]) }}"
                       title="View recipe: {{ $recipe['title'] }}"
                       rel="noopener noreferrer"
                       aria-label="View recipe details for {{ $recipe['title'] }}"
                       class="recipe-card rounded-2xl overflow-hidden text-left block">
                        <div class="recipe-thumb">
                            <img src="{{ $recipe['image'] }}"
                                 class="recipe-image w-full h-56 sm:h-60 object-cover"
                                 alt="{{ $recipe['title'] }}"
                                 title="{{ $recipe['title'] }}"
                                 loading="lazy"
                                 decoding="async"
                                 fetchpriority="high">
                        </div>
                        <div class="p-4 sm:p-5">
                            <h3 class="font-bold text-lg sm:text-xl text-gray-900 line-clamp-2">{{ $recipe['title'] }}</h3>
                            @if(!empty($recipe['description']))
                                <p class="text-sm text-gray-600 leading-relaxed mt-2">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($recipe['description']), 120) }}
                                </p>
                            @endif
                            <span class="inline-flex items-center gap-2 mt-3 text-sm font-semibold text-red-600">
                            View details
                            <i class="fa-solid fa-arrow-right text-xs"></i>
                        </span>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full recipes-surface rounded-2xl text-center py-10">
                        <p class="text-gray-500">No recipes available yet.</p>
                    </div>
                @endforelse
            </div>

            @if($recipes->hasPages())
                <div class="mt-8 recipes-surface rounded-2xl p-4 sm:p-5">
                    {{ $recipes->links() }}
                </div>
            @endif
        </section>

        @include('components.footer')
    </main>
@endsection

@push('scripts')
    @vite('resources/js/consumer_products.js')
@endpush
