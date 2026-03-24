@php
    use App\Models\Brand;
    use Illuminate\Support\Facades\Schema;
@endphp

@props([
    'title' => 'Featured Brands',
    'sectionClass' => 'py-10 sm:py-14 bg-white/65',
    'containerClass' => 'max-w-7xl mx-auto px-4 sm:px-6',
    'products' => null,
    'fallbackProducts' => [
        ['name' => 'ABC', 'link' => '/abc', 'images' => [['src' => 'images/BRAND/ABC/1.png']]],
        ['name' => 'DAISHO', 'link' => '/daisho', 'images' => [['src' => 'images/BRAND/DAISHO/1.png']]],
        ['name' => 'OXFORD', 'link' => '/oxford', 'images' => [['src' => 'images/BRAND/OXFORD/1.png']]],
        ['name' => 'HENG', 'link' => '/heng', 'images' => [['src' => 'images/BRAND/HENG/1.png']]],
        ['name' => 'MILCASA', 'link' => '/milcasa', 'images' => [['src' => 'images/BRAND/MILCASA/1.png']]],
        ['name' => 'KING CHEF', 'link' => '/kingchef', 'images' => [['src' => 'images/BRAND/KING CHEF/1.png']]],
        ['name' => 'OTAFUKU', 'link' => '/otafuku', 'images' => [['src' => 'images/BRAND/OTAFUKU/1.png']]],
        ['name' => 'SEA CHEF', 'link' => '/seachef', 'images' => [['src' => 'images/BRAND/SEA CHEF/1.png']]],
        ['name' => 'UM-MAMI', 'link' => '/ummami', 'images' => [['src' => 'images/BRAND/UM-MAMI/1.png']]],
        ['name' => 'OZAKI', 'link' => '/ozaki', 'images' => [['src' => 'images/BRAND/OZAKI/1.png']]],
    ],
])

@php
    $resolvedProducts = collect();

    if (is_iterable($products)) {
        $resolvedProducts = collect($products);
    } elseif (Schema::hasTable('brands')) {
        try {
            $resolvedProducts = Brand::query()
                ->with('media')
                ->isActive()
                ->orderBy('brand_name')
                ->get()
                ->map(function (Brand $brand): array {
                    $logo = $brand->getFirstMediaUrl('brand-logo');
                    $banner = $brand->getFirstMediaUrl('brand-banner');

                    return [
                        'name' => $brand->brand_name,
                        'link' => $brand->slug ? url('/brands/' . $brand->slug) : '#',
                        'images' => [[
                            'src' => $banner ?: ($logo ?: asset('images/BRAND/ABC/1.png')),
                        ]],
                    ];
                })
                ->values();
        } catch (\Throwable $exception) {
            $resolvedProducts = collect();
        }
    }

    if ($resolvedProducts->isEmpty()) {
        $resolvedProducts = collect($fallbackProducts);
    }

    $normalizedProducts = $resolvedProducts
        ->map(function (array $product): array {
            $images = collect($product['images'] ?? [])
                ->map(function (array $image): array {
                    $src = $image['src'] ?? '';
                    $isAbsolute = str_starts_with($src, 'http://')
                        || str_starts_with($src, 'https://')
                        || str_starts_with($src, '/');

                    $image['src'] = $isAbsolute ? $src : asset($src);

                    return $image;
                })
                ->values()
                ->all();

            $product['images'] = !empty($images)
                ? $images
                : [['src' => asset('images/BRAND/ABC/1.png')]];

            return $product;
        })
        ->values()
        ->all();
@endphp

@once
    <style>
        .fbc-slide img {
            width: 100%;
            height: clamp(170px, 24vw, 280px);
            object-fit: contain;
        }

        .fbc-track {
            transition: transform 700ms cubic-bezier(0.22, 1, 0.36, 1);
        }

        .fbc-tile {
            border: 1px solid #e5e7eb;
            background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.06);
        }

        .fbc-tile:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 28px rgba(15, 23, 42, 0.12);
        }

        .fbc-dot {
            width: 10px;
            height: 10px;
            border-radius: 999px;
            background: #d1d5db;
            transition: all 250ms ease;
        }

        .fbc-dot.active {
            width: 28px;
            background: #dc2626;
        }
    </style>
@endonce

<section class="{{ $sectionClass }}">
    <div class="{{ $containerClass }}" x-data="{
        currentIndex: 0,
        interval: null,
        isMobile: window.innerWidth < 768,
        products: @js($normalizedProducts),
        get batchSize() { return this.isMobile ? 1 : 2; },
        get totalBatches() { return Math.ceil(this.products.length / this.batchSize); },
        startSlideshow() {
            this.stopSlideshow();
            this.interval = setInterval(() => {
                this.currentIndex = (this.currentIndex + 1) % this.totalBatches;
            }, 5000);
        },
        stopSlideshow() {
            if (this.interval) {
                clearInterval(this.interval);
                this.interval = null;
            }
        },
        resetSlideshow() {
            this.stopSlideshow();
            this.startSlideshow();
        },
        onResize() {
            this.isMobile = window.innerWidth < 768;
            if (this.currentIndex >= this.totalBatches) {
                this.currentIndex = 0;
            }
            this.resetSlideshow();
        },
        goToSlide(index) {
            this.currentIndex = index;
            this.resetSlideshow();
        }
    }" x-init="startSlideshow(); window.addEventListener('resize', () => onResize())">
        <div class="fade-section flex items-center justify-center sm:justify-between mb-4 sm:mb-6">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 text-center sm:text-left">{{ $title }}</h2>
        </div>

        <div class="relative overflow-hidden rounded-2xl bg-white shadow-sm border border-gray-100"
             @mouseenter="stopSlideshow()" @mouseleave="startSlideshow()">
            <div class="flex fbc-track"
                 :style="`transform: translateX(-${currentIndex * 100}%);`">
                <template x-for="batch in totalBatches" :key="batch">
                    <div class="flex-shrink-0 w-full p-4 sm:p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                            <template
                                x-for="(product, i) in products.slice((batch - 1) * batchSize, (batch - 1) * batchSize + batchSize)"
                                :key="product.name + '-' + i">
                                <button type="button"
                                        class="fbc-tile fbc-slide rounded-xl p-4 sm:p-5 transition text-left"
                                        @click="window.location.href = product.link">
                                    <img :src="product.images[0].src" :alt="product.name">
                                    <div class="mt-3 text-center">
                                        <span
                                            class="inline-block text-xs sm:text-sm font-semibold tracking-wide text-gray-700"
                                            x-text="product.name"></span>
                                    </div>
                                </button>
                            </template>
                        </div>
                    </div>
                </template>
            </div>

            <button type="button"
                    @click="currentIndex = (currentIndex - 1 + totalBatches) % totalBatches; resetSlideshow();"
                    class="absolute left-3 top-1/2 -translate-y-1/2 bg-black/55 p-2.5 rounded-full text-white hover:bg-red-600 transition z-10"
                    aria-label="Previous slide">
                <span aria-hidden="true">&#8249;</span>
            </button>

            <button type="button" @click="currentIndex = (currentIndex + 1) % totalBatches; resetSlideshow();"
                    class="absolute right-3 top-1/2 -translate-y-1/2 bg-black/55 p-2.5 rounded-full text-white hover:bg-red-600 transition z-10"
                    aria-label="Next slide">
                <span aria-hidden="true">&#8250;</span>
            </button>

            <div class="absolute inset-x-0 bottom-3 z-10 flex justify-center px-3">
                <div class="flex items-center gap-2 bg-white/80 backdrop-blur-sm px-3 py-2 rounded-full border border-gray-200">
                    <template x-for="(_, index) in Array.from({ length: totalBatches })" :key="index">
                        <button type="button"
                                class="fbc-dot"
                                :class="{ 'active': currentIndex === index }"
                                @click="goToSlide(index)"
                                :aria-label="`Go to slide ${index + 1}`">
                        </button>
                    </template>
                </div>
            </div>
        </div>
    </div>
</section>
