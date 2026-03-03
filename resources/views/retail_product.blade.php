@extends('layouts.app')
@section('title', 'McAsia - Retail Product')
@section('content')

@php
    $retailLogos = [
        '1.png', '2.png', '3.png', '4.png', '5.png', '6.png', '7.png', '9.png',
        '10.png', '11.png', '12.png', '13.png', '14.png', '15.png', '16.png',
        '17.png', '18.png', '19.png', '20.png', '21.png', '22.png', '23.png',
    ];
@endphp

<style>
    html,
    body {
        overflow-x: hidden;
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

    .logo-card {
        border: 1px solid #e5e7eb;
        background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
        box-shadow: 0 8px 22px rgba(15, 23, 42, 0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .logo-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 28px rgba(15, 23, 42, 0.14);
    }
</style>

<main class="w-full overflow-x-hidden">
    <div class="pt-24 lg:pt-36"></div>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 py-6 lg:py-10">
        <div class="flex flex-col lg:flex-row items-start gap-6 lg:gap-10">
            <article class="fade-section w-full lg:w-1/2 space-y-4">
                <h2 class="text-2xl lg:text-4xl font-bold text-gray-800 leading-tight">Bringing Asia's Best Flavors to Every Home</h2>
                <p class="text-gray-600 text-sm lg:text-base text-justify leading-relaxed">
                    We bring the vibrant flavors of Asia straight to your kitchen with a wide range of authentic products
                    from savory sauces and condiments to ready-to-cook and ready-to-eat favorites. Each product is made
                    to help families enjoy meals that are not only delicious but also convenient and full of genuine
                    Asian taste.
                </p>
                <p class="text-gray-600 text-sm lg:text-base text-justify leading-relaxed">
                    Available in leading supermarkets and stores nationwide, we ensure Asia's best flavors are always
                    within reach, so you can cook, share, and savor every moment with confidence and authenticity.
                </p>

                <a href="#" onclick="history.back(); return false;"
                    class="inline-flex items-center gap-2 text-base text-gray-800 hover:text-red-600 transition-colors py-2">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>Back</span>
                </a>
            </article>

            <div class="fade-section w-full lg:w-1/2">
                <div class="relative w-full aspect-[16/10] sm:aspect-[16/9] lg:aspect-[4/3] overflow-hidden rounded-xl shadow-lg bg-black">
                    <div id="slideshow" class="w-full h-full relative">
                        <img src="{{ asset('images/retail_product/1.jpg') }}"
                            class="absolute top-0 left-0 w-full h-full object-cover opacity-100 transition-opacity duration-1000" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="logos" class="relative w-full bg-white py-8 lg:py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4 sm:gap-5 lg:gap-6">
            @foreach ($retailLogos as $index => $logo)
                <article class="logo-card fade-section rounded-lg p-3 sm:p-4 flex items-center justify-center">
                    <img src="{{ asset('images/Retail Partner/' . $logo) }}"
                        alt="Retail Partner {{ $index + 1 }}"
                        class="h-12 sm:h-14 lg:h-16 w-auto object-contain logo-item">
                </article>
            @endforeach
        </div>
    </section>

    @include('components.footer')
</main>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const fadeSections = document.querySelectorAll('.fade-section');

        const fadeInOnScroll = () => {
            const triggerBottom = window.innerHeight * 0.88;
            fadeSections.forEach((section) => {
                const sectionTop = section.getBoundingClientRect().top;
                if (sectionTop < triggerBottom) {
                    section.classList.add('visible');
                }
            });
        };

        fadeInOnScroll();
        window.addEventListener('scroll', fadeInOnScroll);
    });
</script>

@vite('resources/js/consumer_products.js')
@endsection
