@php
    $fallbackProductHighlights = [
        [
            'image' => asset('images/home/our-products/cooking-essential.png'),
            'label' => 'Cooking Essentials',
        ],
        [
            'image' => asset('images/home/our-products/frozen2.png'),
            'label' => 'Frozen Meat & Seafood',
        ],
        [
            'image' => asset('images/home/our-products/beverages.png'),
            'label' => 'Beverages',
        ],
        [
            'image' => asset('images/home/our-products/snacks.png'),
            'label' => 'Snacks',
        ],
    ];

    $fromProps = collect($productHighlights ?? [])
        ->map(function ($item) {
            return [
                'image' => $item['image'] ?? ($item->image ?? null),
                'label' => $item['label'] ?? ($item->label ?? null),
            ];
        })
        ->filter(fn($item) => !empty($item['image']))
        ->values()
        ->all();

    $productHighlightsData = count($fromProps) > 0 ? $fromProps : $fallbackProductHighlights;
@endphp

<section class="bg-white py-16">
    <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-2 items-center">
        <div data-aos="fade-right" data-aos-duration="700" class="w-full max-w-[450px] mx-auto lg:mx-0">
            <div class="relative rounded-2xl overflow-hidden shadow-lg">
                <img id="productHeroImage" src="{{ $productHighlightsData[0]['image'] ?? '' }}" alt=""
                    class="w-full h-full md:h-[340px] lg:h-[440px] object-cover product-hero-fade">
                <div class="absolute left-6 bottom-6 text-white">
                    <div class="flex items-center gap-2 mt-10" aria-label="Product image pagination">
                        @foreach ($productHighlightsData as $index => $item)
                            <button type="button"
                                class="product-hero-dot w-3.5 h-3.5 rounded-full border-2 border-white/90 transition-colors"
                                data-index="{{ $index }}" aria-label="Go to slide {{ $index + 1 }}"></button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div data-aos="fade-left" data-aos-duration="700" data-aos-delay="100" class="flex flex-col mt-10 md:mt-0">
            <h2 class="text-3xl sm:text-5xl font-bold text-gray-900 mb-4">Our Products</h2>
            <p class="mb-8 text-justify">
                We offer a carefully curated portfolio of authentic Asian food and beverage products, spanning Cooking
                Essentials, Frozen Meat & Seafood, Beverages, and Snacks—bringing genuine flavors and quality to modern
                consumers.
            </p>
            <a href="/view_all_brands"
                class="custom-border inline-flex items-center justify-center bg-red-700 text-white text-sm px-8 py-3 rounded-full font-semibold hover:bg-red-500 transition-colors">
                All Products
            </a>
        </div>
    </div>

    <x-home.our-brands />
</section>

<style>
    .product-hero-fade {
        transition: opacity 900ms ease-in-out;
        opacity: 1;
        background-color: #000;
        will-change: opacity;
    }

    .product-hero-fade.is-fading {
        opacity: 0;
    }

    .product-hero-dot.is-active {
        background-color: #ffffff;
    }
</style>

<script>
    (function() {
        const productHighlights = @json($productHighlightsData);
        const imageEl = document.getElementById("productHeroImage");
        const labelEl = document.getElementById("productHeroLabel");
        const dots = Array.from(document.querySelectorAll(".product-hero-dot"));
        if (!imageEl || productHighlights.length === 0) return;

        let index = 0;
        let timer = null;

        const setActiveDot = (activeIndex) => {
            dots.forEach((dot, i) => {
                dot.classList.toggle("is-active", i === activeIndex);
            });
        };

        const swapImage = (nextIndex) => {
            const next = productHighlights[nextIndex];
            if (!next || !next.image) return;

            const preload = new Image();
            preload.onload = () => {
                imageEl.classList.add("is-fading");
                window.setTimeout(() => {
                    imageEl.src = next.image;
                    if (labelEl) labelEl.textContent = next.label || "";
                    imageEl.classList.remove("is-fading");
                }, 250);
            };
            preload.src = next.image;
        };

        const startRotation = () => {
            if (timer) {
                window.clearInterval(timer);
                timer = null;
            }

            index = 0;
            imageEl.src = productHighlights[0].image || "";
            if (labelEl) labelEl.textContent = productHighlights[0].label || "";
            setActiveDot(index);

            if (productHighlights.length > 1) {
                timer = window.setInterval(() => {
                    index = (index + 1) % productHighlights.length;
                    swapImage(index);
                    setActiveDot(index);
                }, 5000);
            }
        };

        dots.forEach((dot) => {
            dot.addEventListener("click", () => {
                const nextIndex = Number(dot.dataset.index || 0);
                index = nextIndex;
                swapImage(index);
                setActiveDot(index);
                if (timer) {
                    window.clearInterval(timer);
                    timer = null;
                }
                if (productHighlights.length > 1) {
                    timer = window.setInterval(() => {
                        index = (index + 1) % productHighlights.length;
                        swapImage(index);
                        setActiveDot(index);
                    }, 5000);
                }
            });
        });

        startRotation();
    })();
</script>

