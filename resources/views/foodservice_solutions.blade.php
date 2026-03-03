@extends('layouts.app')
@section('title', 'McAsia - Food Service')
@section('content')
@php
    $brandLogos = [
        [
            'url' => asset('images/FOOD_SERVICES_ICO/ICONS/Logo1.png'),
            'name' => 'Logo',
        ],
        [
            'url' => asset('images/FOOD_SERVICES_ICO/ICONS/Logo2.png'),
            'name' => 'Logo',
        ],
        [
            'url' => asset('images/FOOD_SERVICES_ICO/ICONS/Logo3.png'),
            'name' => 'Logo',
        ],
        [
            'url' => asset('images/FOOD_SERVICES_ICO/ICONS/Logo4.png'),
            'name' => 'Logo',
        ],
        [
            'url' => asset('images/FOOD_SERVICES_ICO/ICONS/Logo5.png'),
            'name' => 'Logo',
        ],
        [
            'url' => asset('images/FOOD_SERVICES_ICO/ICONS/Logo6.png'),
            'name' => 'Logo',
        ],
        [
            'url' => asset('images/FOOD_SERVICES_ICO/ICONS/Logo7.png'),
            'name' => 'Logo',
        ],
        [
            'url' => asset('images/FOOD_SERVICES_ICO/ICONS/Logo9.png'),
            'name' => 'Logo',
        ],
        [
            'url' => asset('images/FOOD_SERVICES_ICO/ICONS/Logo10.png'),
            'name' => 'Logo',
        ],
        [
            'url' => asset('images/FOOD_SERVICES_ICO/ICONS/Logo11.png'),
            'name' => 'Logo',
        ],

        [
            'url' => asset('images/FOOD_SERVICES_ICO/ICONS/Logo12.png'),
            'name' => 'Logo',
        ],
        [
            'url' => asset('images/FOOD_SERVICES_ICO/ICONS/Logo13.png'),
            'name' => 'Logo',
        ],
        [
            'url' => asset('images/FOOD_SERVICES_ICO/ICONS/Logo14.png'),
            'name' => 'Logo',
        ],
        [
            'url' => asset('images/FOOD_SERVICES_ICO/ICONS/Logo15.png'),
            'name' => 'Logo',
        ],
        [
            'url' => asset('images/FOOD_SERVICES_ICO/ICONS/Logo16.png'),
            'name' => 'Logo',
        ],
        [
            'url' => asset('images/FOOD_SERVICES_ICO/ICONS/Logo17.png'),
            'name' => 'Logo',
        ],
        [
            'url' => asset('images/FOOD_SERVICES_ICO/ICONS/Logo18.png'),
            'name' => 'Logo',
        ],
        [
            'url' => asset('images/FOOD_SERVICES_ICO/ICONS/Logo19.png'),
            'name' => 'Logo',
        ],
        [
            'url' => asset('images/FOOD_SERVICES_ICO/ICONS/Logo20.png'),
            'name' => 'Logo',
        ],
        [
            'url' => asset('images/FOOD_SERVICES_ICO/ICONS/Logo21.png'),
            'name' => 'Logo',
        ],
        [
            'url' => asset('images/FOOD_SERVICES_ICO/ICONS/Logo22.png'),
            'name' => 'Logo',
        ],
        [
            'url' => asset('images/FOOD_SERVICES_ICO/ICONS/Logo23.png'),
            'name' => 'Logo',
        ],
        [
            'url' => asset('images/FOOD_SERVICES_ICO/ICONS/Logo24.png'),
            'name' => 'Logo',
        ],
    ];
@endphp

<style>
    html,
    body {
        overflow-x: hidden;
    }
</style>

<div class="w-full">
    <div class="pt-24 lg:pt-36"></div>

    <div class="flex flex-col lg:flex-row items-start w-full max-w-7xl mx-auto px-4 sm:px-6 py-6 lg:py-10 gap-6 lg:gap-10">
        <div class="w-full lg:w-1/2 space-y-4">
            <h2 class="text-xl lg:text-4xl font-bold text-gray-800 leading-tight">Bringing the Flavors of Asia to Your Kitchen</h2>
            <p class="text-gray-600 text-sm lg:text-base text-justify leading-relaxed">
                Discover a world of authentic Asian taste with our wide range of ingredients, sauces, condiments, and
                ready-to-use products all crafted to bring your culinary creations to life.
                From bold street food favorites to comforting classics, we make it easy to recreate the flavors your
                customers crave.
            </p>

            <p class="text-gray-600 text-sm lg:text-base text-justify leading-relaxed">
                Trusted by chefs and foodservice professionals, our products are chosen for their quality, authenticity,
                and consistency.
                Each one is made to deliver the real taste of Asia while saving you time in the kitchen without
                sacrificing flavor.
            </p>

            <p class="text-gray-600 text-sm lg:text-base text-justify leading-relaxed">
                Whether you run a cozy cafe, a bustling restaurant, or a large hotel kitchen, we provide tailored
                foodservice solutions that make every dish shine.
                With dependable supply and premium-quality ingredients, you can serve every plate with confidence and
                bring the true taste of Asia to every table.
            </p>

            <a href="#" onclick="history.back(); return false;"
                class="inline-flex items-center gap-2 text-base text-gray-800 hover:text-red-600 transition-colors py-2">
                <i class="fa-solid fa-arrow-left"></i>
                <span>Back</span>
            </a>
        </div>

        <div class="image_slideshow relative w-full lg:w-1/2 aspect-[16/10] sm:aspect-[16/9] lg:aspect-[4/3] overflow-hidden rounded-lg shadow-lg bg-black">
            <div id="slideshow" class="w-full h-full relative">
                <img src="{{ asset('images/food_service/1.jpg') }}"
                    class="absolute top-0 left-0 w-full h-full object-cover opacity-100 transition-opacity duration-1000" />
                <img src="{{ asset('images/food_service/2.jpg') }}"
                    class="absolute top-0 left-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000" />
                <img src="{{ asset('images/food_service/3.jpg') }}"
                    class="absolute top-0 left-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000" />
            </div>
        </div>
    </div>

    <section id="logos" class="relative w-full flex justify-center items-center bg-white py-8 lg:py-10">
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-y-8 gap-x-6 w-full max-w-7xl px-4 sm:px-6 justify-items-center items-center">
            @foreach ($brandLogos as $key => $brandLogo)
            <img src="{{ $brandLogo['url'] }}" alt="{{ $brandLogo['name'] . $key + 1 }}"
                class="h-14 sm:h-16 lg:h-20 w-auto object-contain opacity-0 transition-all duration-500 transform scale-90 logo-item">
            @endforeach
        </div>
    </section>
</div>
@push('scripts')

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.remove("opacity-0", "scale-90");
                    entry.target.classList.add("opacity-100", "scale-100");
                }
            });
        }, { threshold: 0.3 });

        document.querySelectorAll(".logo-item").forEach((el, index) => {
            el.style.transitionDelay = `${index * 100}ms`;
            observer.observe(el);
        });
    });
</script>

@vite('resources/js/consumer_products.js')
@include('components.footer')
@endsection
