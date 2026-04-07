@extends('layouts.app')
@props(['section' => []])
@php
    use Illuminate\Support\Facades\Storage;

    $fallbackHeroImages = [
        asset('images/home/banner/homepage-banner-1.jpg'),
        asset('images/home/banner/homepage-banner-2.jpg'),
        asset('images/home/banner/homepage-banner-3.jpg'),
    ];

    $fromProps = collect(data_get($section, 'images', []))
        ->map(fn ($path) => filled($path) ? Storage::disk('public')->url($path) : null)
        ->filter()
        ->values()
        ->all();

    $heroImages = count($fromProps) > 0 ? $fromProps : $fallbackHeroImages;
    $eyebrow = data_get($section, 'eyebrow', 'Our Story');
    $title = data_get($section, 'title', 'HOME TO YOUR ASIAN CRAVINGS');
    $buttonLabel = data_get($section, 'button_label', 'Read More');
    $buttonUrl = data_get($section, 'button_url', '/our-story');
@endphp

@push('styles')
    @vite('resources/css/autoscroll.css')
@endpush

<section class="relative text-white overflow-hidden h-screen">
    <img
        id="heroImageA"
        src="{{ $heroImages[0] ?? '' }}"
        alt="McAsia Foodtrade Corporation Banner"
        title="McAsia Foodtrade Corporation"
        loading="eager"
        decoding="async"
        fetchpriority="high"
        class="hero-layer is-active absolute inset-0 w-full h-full object-cover z-0"
    />
    <img
        id="heroImageB" src=""
        alt="McAsia Foodtrade Corporation Banner"
        title="McAsia Foodtrade Corporation"
        loading="eager"
        decoding="async"
        fetchpriority="high"
        class="hero-layer absolute inset-0 w-full h-full object-cover z-0"
    />

    <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/45 to-black/30 z-10"></div>

    <div class="relative z-20 h-full">
        <div class="h-full">
            <div class="max-w-6xl mx-auto h-full px-6 md:px-10">
                <div class="h-full flex items-center">
                    <div class="max-w-2xl">
                        <div class="flex flex-col items-start gap-4">
                            <div
                                class="inline-flex items-center gap-2 text-4xl md:text-6xl font-brophyscript font-medium italic leading-8 text-white prose"
                                data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                                    {{ $eyebrow }}
                            </div>
                            <h1 class="text-white text-5xl md:text-7xl font-modica-bold font-extrabold mb-3 md:mb-6 leading-tight shine-text py-2"
                                data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
                                {{ $title }}
                            </h1>
                            <a href="{{ $buttonUrl }}"
                               title="{{ $buttonLabel }}"
                               rel="noopener noreferrer"
                               aria-label="{{ $buttonLabel }}"
                               class="custom-border bg-red-700 text-white text-xs sm:text-sm text-center font-semibold hover:bg-red-500 transition-colors"
                               data-aos="fade-up"
                               data-aos-delay="600"
                               data-aos-duration="1000"
                            >
                                {{ $buttonLabel }}
                            </a>
                            <div class="flex items-center gap-2" aria-label="Banner pagination" data-aos="fade-up"
                                 data-aos-delay="800" data-aos-duration="1000">
                                @foreach ($heroImages as $index => $image)
                                    <button type="button"
                                            class="hero-dot w-4 h-4 rounded-full border-2 border-white/90 transition-colors"
                                            data-index="{{ $index }}"
                                            aria-label="Go to slide {{ $index + 1 }}"></button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    .hero-layer {
        opacity: 0;
        transform: scale(1.015);
        will-change: opacity, transform;
        transition: opacity 1200ms ease-in-out, transform 1400ms ease-in-out;
        background-color: #000;
    }

    .hero-layer.is-active {
        opacity: 1;
        transform: scale(1);
    }

    .hero-dot.is-active {
        background-color: #ffffff;
        position: relative;
    }

    .hero-dot.is-active::after {
        content: "";
        position: absolute;
        width: 3px;
        height: 3px;
        border-radius: 9999px;
        background-color: #000000;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>
<script>
    (function () {
        const heroImages = @json($heroImages);
        const heroImageA = document.getElementById("heroImageA");
        const heroImageB = document.getElementById("heroImageB");
        const heroDots = Array.from(document.querySelectorAll(".hero-dot"));
        if (!heroImageA || !heroImageB || heroImages.length === 0) return;

        let heroIndex = 0;
        let heroTimer = null;
        let isTransitioning = false;
        let activeImageEl = heroImageA;
        let inactiveImageEl = heroImageB;

        const setActiveDot = (index) => {
            heroDots.forEach((dot, i) => {
                dot.classList.toggle("is-active", i === index);
            });
        };

        const swapHeroImage = (nextIndex) => {
            if (isTransitioning || nextIndex === heroIndex) return;

            const nextSrc = heroImages[nextIndex] || "";
            if (!nextSrc) return;

            isTransitioning = true;
            heroIndex = nextIndex;
            const preload = new Image();
            const commitSwap = () => {
                inactiveImageEl.src = nextSrc;
                inactiveImageEl.classList.add("is-active");
                activeImageEl.classList.remove("is-active");

                window.setTimeout(() => {
                    const previousActive = activeImageEl;
                    activeImageEl = inactiveImageEl;
                    inactiveImageEl = previousActive;
                    isTransitioning = false;
                }, 1250);
            };
            preload.onload = commitSwap;
            preload.onerror = commitSwap;
            preload.src = nextSrc;
        };

        const restartHeroRotation = () => {
            if (heroTimer) {
                window.clearInterval(heroTimer);
                heroTimer = null;
            }

            if (heroImages.length > 1) {
                heroTimer = window.setInterval(() => {
                    const nextIndex = (heroIndex + 1) % heroImages.length;
                    swapHeroImage(nextIndex);
                    setActiveDot(nextIndex);
                }, 5000);
            }
        };

        const startHeroRotation = () => {
            heroIndex = 0;
            heroImageA.src = heroImages[0] || "";
            heroImageA.classList.add("is-active");
            heroImageB.classList.remove("is-active");
            activeImageEl = heroImageA;
            inactiveImageEl = heroImageB;
            setActiveDot(heroIndex);
            restartHeroRotation();
        };

        heroDots.forEach((dot) => {
            dot.addEventListener("click", () => {
                const nextIndex = Number(dot.dataset.index || 0);
                if (nextIndex === heroIndex) return;

                swapHeroImage(nextIndex);
                setActiveDot(nextIndex);
                restartHeroRotation();
            });
        });

        startHeroRotation();
    })();
</script>
