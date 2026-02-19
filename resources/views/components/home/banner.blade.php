@php
    $fallbackHeroImages = [
        asset('images/home/banner/homepage-banner-1.jpg'),
        asset('images/home/banner/homepage-banner-2.jpg'),
        asset('images/home/banner/homepage-banner-4.jpg'),
    ];

    $fromProps = collect($homepageBanners ?? [])
        ->map(fn($banner) => $banner->media[0]->original_url ?? null)
        ->filter()
        ->values()
        ->all();

    $heroImages = count($fromProps) > 0 ? $fromProps : $fallbackHeroImages;
@endphp

<section class="relative text-white overflow-hidden h-screen">
    <img id="heroImage" src="{{ $heroImages[0] ?? '' }}" alt=""
        class="absolute inset-0 w-full h-[800px] object-cover z-0 hero-fade" />

    <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/45 to-black/30 z-10"></div>

    <div class="relative z-20 h-full">
        <div class="h-full">
            <div class="max-w-6xl mx-auto h-full px-6 md:px-10">
                <div class="h-full flex items-center">
                    <div class="max-w-2xl">
                        <div class="flex flex-col items-start gap-4">
                            <div class="inline-flex items-center gap-2 text-sm font-semibold uppercase tracking-[0.2em] text-white/80 shine-pill"
                                data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                                Our Story
                            </div>
                            <h1 class="text-white text-5xl md:text-7xl font-extrabold mb-3 md:mb-6 leading-tight shine-text py-2"
                                data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
                                HOME TO YOUR ASIAN CRAVINGS
                            </h1>
                            <a href="/about_us"
                                class="custom-border bg-red-700 text-white text-sm text-center rounded-full font-semibold hover:bg-red-500 transition-colors"
                                data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">
                                Read More
                            </a>
                            <div class="flex items-center gap-2" aria-label="Banner pagination" data-aos="fade-up"
                                data-aos-delay="800" data-aos-duration="1000">
                                @foreach ($heroImages as $index => $image)
                                    <button type="button"
                                        class="hero-dot w-4 h-4 rounded-full border-2 border-white/90 transition-colors"
                                        data-index="{{ $index }}" aria-label="Go to slide {{ $index + 1 }}"></button>
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
    @keyframes heroFadeIn {
        from {
            opacity: 0.1;
            transform: scale(1.01);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .hero-fade {
        animation: heroFadeIn 1600ms ease-in-out;
        will-change: opacity, transform;
        transition: opacity 900ms ease-in-out;
        opacity: 1;
        background-color: #000;
    }

    .hero-fade.is-fading {
        opacity: 0;
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
        const heroImageEl = document.getElementById("heroImage");
        const heroDots = Array.from(document.querySelectorAll(".hero-dot"));
        if (!heroImageEl || heroImages.length === 0) return;

        let heroIndex = 0;
        let heroTimer = null;

        const setActiveDot = (index) => {
            heroDots.forEach((dot, i) => {
                dot.classList.toggle("is-active", i === index);
            });
        };

        const swapHeroImage = (nextIndex) => {
            const nextSrc = heroImages[nextIndex] || "";
            if (!nextSrc) return;

            const preload = new Image();
            preload.onload = () => {
                heroImageEl.classList.add("is-fading");
                window.setTimeout(() => {
                    heroImageEl.src = nextSrc;
                    heroImageEl.classList.remove("is-fading");
                }, 250);
            };
            preload.src = nextSrc;
        };

        const startHeroRotation = () => {
            if (heroTimer) {
                window.clearInterval(heroTimer);
                heroTimer = null;
            }

            heroIndex = 0;
            heroImageEl.src = heroImages[0] || "";
            setActiveDot(heroIndex);

            if (heroImages.length > 1) {
                heroTimer = window.setInterval(() => {
                    heroIndex = (heroIndex + 1) % heroImages.length;
                    swapHeroImage(heroIndex);
                    setActiveDot(heroIndex);
                }, 5000);
            }
        };

        heroDots.forEach((dot) => {
            dot.addEventListener("click", () => {
                const index = Number(dot.dataset.index || 0);
                heroIndex = index;
                swapHeroImage(heroIndex);
                setActiveDot(heroIndex);
                if (heroTimer) {
                    window.clearInterval(heroTimer);
                    heroTimer = null;
                }
                if (heroImages.length > 1) {
                    heroTimer = window.setInterval(() => {
                        heroIndex = (heroIndex + 1) % heroImages.length;
                        heroImageEl.src = heroImages[heroIndex];
                        setActiveDot(heroIndex);
                    }, 5000);
                }
            });
        });

        startHeroRotation();
    })();
</script>
