@extends('layouts.app')
@section('title', 'McAsia - Driven Innovation')
@section('content')

<style>
    body.fade-in {
        opacity: 1;
    }

    .fade-section {
        opacity: 0;
        transform: translateY(24px);
        transition: opacity 0.8s ease-out, transform 0.8s ease-out;
    }

    .fade-section.visible {
        opacity: 1;
        transform: translateY(0);
    }

    .innovation-hero::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.35));
    }

    .brand-slide img {
        width: 100%;
        height: clamp(170px, 24vw, 280px);
        object-fit: contain;
    }

    .carousel-track {
        transition: transform 700ms cubic-bezier(0.22, 1, 0.36, 1);
    }

    .brand-tile {
        border: 1px solid #e5e7eb;
        background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
        box-shadow: 0 8px 24px rgba(15, 23, 42, 0.06);
    }

    .brand-tile:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 28px rgba(15, 23, 42, 0.12);
    }

    .carousel-dot {
        width: 10px;
        height: 10px;
        border-radius: 999px;
        background: #d1d5db;
        transition: all 250ms ease;
    }

    .carousel-dot.active {
        width: 28px;
        background: #dc2626;
    }
</style>

<main class="w-full overflow-x-hidden">
    <div class="pt-20 lg:pt-32"></div>

    <section class="innovation-hero relative h-[36vh] sm:h-[46vh] lg:h-[58vh] overflow-hidden">
        <img src="{{ asset('images/driven_innovation/1.jpg') }}" alt="Driven Innovation"
            class="absolute inset-0 w-full h-full object-cover">
        <div class="relative z-10 h-full flex items-center justify-center text-center px-4 sm:px-6">
            <div>
                {{-- <h1 class="text-3xl sm:text-4xl lg:text-6xl font-bold text-white">Driven By Innovation</h1>
                <p class="text-white/90 mt-3 text-sm sm:text-base lg:text-lg max-w-2xl mx-auto">
                    Technology, infrastructure, and service excellence powering growth nationwide.
                </p> --}}
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 py-10 sm:py-14 lg:py-16 space-y-8 sm:space-y-10">
        <article class="fade-section space-y-4">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">Driven By Innovations</h2>
            <p class="text-gray-600 leading-relaxed text-justify text-sm sm:text-base">
                With a steadfast commitment to operational excellence and superior service delivery,
                <span class="font-semibold text-gray-800">McAsia Foodtrade Corporation</span> has consistently expanded
                its customer network across the nation. In 2017, the Company undertook a significant strategic investment
                in <span class="font-semibold text-gray-800">Enterprise Resource Planning (ERP)</span> technology to
                enhance efficiency, transparency, and integration across all business processes. Furthermore, the
                establishment of the Cebu warehouse marked a pivotal step in strengthening the Company's logistical
                capabilities, ensuring timely and reliable service to clients throughout the Visayas and Mindanao regions.
            </p>
        </article>

        <article class="fade-section space-y-4">
            <h3 class="text-xl sm:text-2xl font-semibold text-gray-900">Innovation and Infrastructure</h3>
            <p class="text-gray-600 leading-relaxed text-justify text-sm sm:text-base">
                <span class="font-semibold text-gray-800">McAsia Foodtrade Corporation</span>
                recognizes that innovation and infrastructure are the cornerstones of sustainable growth. The Company
                continues to invest in modern technologies, process automation, and data-driven systems to optimize
                operations and uphold the highest standards of efficiency. Its state-of-the-art storage facilities and
                advanced logistics framework are designed to maintain product integrity and ensure uninterrupted supply
                chain performance. Through these ongoing initiatives,
                <span class="font-semibold text-gray-800">McAsia</span> reaffirms its commitment to excellence,
                positioning itself as a trusted partner in the food distribution industry.
            </p>
        </article>

        <article class="fade-section space-y-4">
            <h3 class="text-xl sm:text-2xl font-semibold text-gray-900">Sustained Commitment</h3>
            <p class="text-gray-600 leading-relaxed text-justify text-sm sm:text-base">
                Guided by its vision of becoming a leading and trusted partner in the food distribution sector,
                <span class="font-semibold text-gray-800">McAsia Foodtrade Corporation</span> remains dedicated to
                sustainable growth, continuous improvement, and strategic innovation. By leveraging technology,
                strengthening partnerships, and maintaining uncompromising quality standards, the Company continues to
                expand its reach and uphold its reputation as a reliable provider of premium food products nationwide.
            </p>
        </article>

        <div class="fade-section">
            <a href="#" onclick="history.back(); return false;"
                class="inline-flex items-center gap-2 px-5 py-2.5 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 hover:border-gray-400 transition">
                <i class="fa-solid fa-arrow-left"></i>
                <span>Back</span>
            </a>
        </div>
    </section>

    <section class="py-10 sm:py-14 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6" x-data="{
                currentIndex: 0,
                interval: null,
                isMobile: window.innerWidth < 768,
                get batchSize() { return this.isMobile ? 1 : 2; },
                products: [
                    { name: 'ABC', link: '/abc', images: [{ src: 'images/BRAND/ABC/1.png' }] },
                    { name: 'DAISHO', link: '/daisho', images: [{ src: 'images/BRAND/DAISHO/1.png' }] },
                    { name: 'OXFORD', link: '/oxford', images: [{ src: 'images/BRAND/OXFORD/1.png' }] },
                    { name: 'HENG', link: '/heng', images: [{ src: 'images/BRAND/HENG/1.png' }] },
                    { name: 'MILCASA', link: '/milcasa', images: [{ src: 'images/BRAND/MILCASA/1.png' }] },
                    { name: 'KING CHEF', link: '/king-chef', images: [{ src: 'images/BRAND/KING CHEF/1.png' }] },
                    { name: 'OTAFUKU', link: '/otafuku', images: [{ src: 'images/BRAND/OTAFUKU/1.png' }] },
                    { name: 'SEA CHEF', link: '/sea-chef', images: [{ src: 'images/BRAND/SEA CHEF/1.png' }] },
                    { name: 'UM-MAMI', link: '/ummami', images: [{ src: 'images/BRAND/UM-MAMI/1.png' }] },
                    { name: 'OZAKI', link: '/ozaki', images: [{ src: 'images/BRAND/OZAKI/1.png' }] }
                ],
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

            <div class="fade-section flex items-center justify-between mb-4 sm:mb-6">
                <h2 class="text-xl sm:text-2xl font-semibold text-gray-900">Featured Brands</h2>
            </div>

            <div class="relative overflow-hidden rounded-2xl bg-white shadow-sm border border-gray-100"
                @mouseenter="stopSlideshow()" @mouseleave="startSlideshow()">
                <div class="flex carousel-track"
                    :style="`transform: translateX(-${currentIndex * 100}%);`">
                    <template x-for="batch in totalBatches" :key="batch">
                        <div class="flex-shrink-0 w-full p-4 sm:p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                                <template x-for="(product, i) in products.slice((batch - 1) * batchSize, (batch - 1) * batchSize + batchSize)" :key="product.name">
                                    <button type="button" class="brand-tile brand-slide rounded-xl p-4 sm:p-5 transition text-left"
                                        @click="window.location.href = product.link">
                                        <img :src="product.images[0].src" :alt="product.name">
                                        <div class="mt-3 text-center">
                                            <span class="inline-block text-xs sm:text-sm font-semibold tracking-wide text-gray-700" x-text="product.name"></span>
                                        </div>
                                    </button>
                                </template>
                            </div>
                        </div>
                    </template>
                </div>

                <button type="button" @click="currentIndex = (currentIndex - 1 + totalBatches) % totalBatches; resetSlideshow();"
                    class="absolute left-3 top-1/2 -translate-y-1/2 bg-black/55 p-2.5 rounded-full text-white hover:bg-red-600 transition z-10"
                    aria-label="Previous slide">
                    <span aria-hidden="true">&#8249;</span>
                </button>

                <button type="button" @click="currentIndex = (currentIndex + 1) % totalBatches; resetSlideshow();"
                    class="absolute right-3 top-1/2 -translate-y-1/2 bg-black/55 p-2.5 rounded-full text-white hover:bg-red-600 transition z-10"
                    aria-label="Next slide">
                    <span aria-hidden="true">&#8250;</span>
                </button>

                <div class="absolute bottom-3 left-1/2 -translate-x-1/2 z-10 flex items-center gap-2 bg-white/80 backdrop-blur-sm px-3 py-2 rounded-full border border-gray-200">
                    <template x-for="(_, index) in Array.from({ length: totalBatches })" :key="index">
                        <button type="button"
                            class="carousel-dot"
                            :class="{ 'active': currentIndex === index }"
                            @click="goToSlide(index)"
                            :aria-label="`Go to slide ${index + 1}`">
                        </button>
                    </template>
                </div>
            </div>
        </div>
    </section>

    @include('components.footer')
</main>

<script>
    window.addEventListener('load', () => {
        document.body.classList.add('fade-in');
    });

    const fadeSections = document.querySelectorAll('.fade-section');

    const fadeInOnScroll = () => {
        const triggerBottom = window.innerHeight * 0.85;
        fadeSections.forEach(section => {
            const sectionTop = section.getBoundingClientRect().top;
            if (sectionTop < triggerBottom) {
                section.classList.add('visible');
            }
        });
    };

    window.addEventListener('scroll', fadeInOnScroll);
    window.addEventListener('load', fadeInOnScroll);

    if (window.AOS) {
        AOS.init({
            duration: 1000,
            once: true,
        });
    }
</script>
@endsection
