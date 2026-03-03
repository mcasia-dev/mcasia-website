@extends('layouts.app')
@section('title', 'McAsia - Ecommerce')
@section('content')

@php
    $platforms = [
        [
            'name' => 'Lazada',
            'url' => 'https://www.lazada.com.ph/shop/mcasia-mart',
            'logo' => asset('images/ecommerce/lazada_logo.png'),
            'banner' => asset('images/ecommerce/background/lazada_background.png'),
        ],
        [
            'name' => 'Shopee',
            'url' => 'https://shopee.ph/mcasiamart',
            'logo' => asset('images/ecommerce/shopee_logo.png'),
            'banner' => asset('images/ecommerce/background/shopee_background.png'),
        ],
        [
            'name' => 'TikTok',
            'url' => 'https://www.tiktok.com/@mcasiafoodtrade_',
            'logo' => asset('images/ecommerce/tiktok_logo.png'),
            'banner' => asset('images/ecommerce/background/tiktok_background.png'),
        ],
        [
            'name' => 'McAsia Mart',
            'url' => 'https://mcasiamart.ph',
            'logo' => asset('images/ecommerce/mcasiamart_logo.png'),
            'banner' => asset('images/ecommerce/background/mcasiamart_background.png'),
        ],
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

    .platform-card {
        border: 1px solid #e5e7eb;
        background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
        box-shadow: 0 8px 22px rgba(15, 23, 42, 0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .platform-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 28px rgba(15, 23, 42, 0.14);
    }
</style>

<main class="w-full overflow-x-hidden">
    <div class="pt-24 lg:pt-36"></div>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 py-6 lg:py-10">
        <div class="flex flex-col lg:flex-row items-start gap-6 lg:gap-10">
            <article class="fade-section w-full lg:w-1/2 space-y-4">
                <h2 class="text-xl lg:text-4xl font-bold text-gray-800 leading-tight">Bringing Asian Flavors Closer to You Anytime, Anywhere</h2>
                <p class="text-gray-600 text-sm lg:text-base text-justify leading-relaxed">
                    Shop authentic Asian food and beverages online, from everyday essentials to premium brands, all just
                    a few clicks away at McAsia Mart. Whether you're craving a quick snack, a taste of home, or something
                    new to discover, our carefully curated selection delivers quality, authenticity, and true Asian flavor
                    straight to your door.
                </p>
                <p class="text-gray-600 text-sm lg:text-base text-justify leading-relaxed">
                    With fast, reliable delivery and trusted platforms, your favorite Asian tastes are always within
                    reach, making every craving easy to satisfy.
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
                        <img src="{{ asset('images/ecommerce/1.png') }}"
                            class="absolute top-0 left-0 w-full h-full object-cover opacity-100 transition-opacity duration-1000" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="logos" class="w-full bg-white py-8 lg:py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($platforms as $platform)
                <a href="{{ $platform['url'] }}" target="_blank" rel="noopener noreferrer"
                    class="platform-card fade-section rounded-xl p-4 sm:p-5 block">
                    <div class="flex flex-col items-center gap-4">
                        <img src="{{ $platform['logo'] }}" alt="{{ $platform['name'] }} logo"
                            class="h-14 sm:h-16 w-auto object-contain">
                        <img src="{{ $platform['banner'] }}" alt="{{ $platform['name'] }} storefront"
                            class="w-full h-36 sm:h-40 object-cover rounded-md logo-item">
                        <span class="text-sm font-semibold text-gray-700">{{ $platform['name'] }}</span>
                    </div>
                </a>
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
