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


    /* Smooth scrolling for logos */
    @keyframes scroll {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-50%);
        }

        /* Move only half since logos are duplicated */
    }

    .animate-scroll {
        animation: scroll 40s linear infinite;
        display: flex;
    }

    .text-justify {
        text-align: justify;
    }

    <style>body.fade-in {
        opacity: 1;
    }

    /* Fade-in animation for sections */
    .fade-section {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 1s ease-out, transform 1s ease-out;
    }

    .fade-section.visible {
        opacity: 1;
        transform: translateY(0);
    }

    /*-------------Viewing for Monitor going 2k - 4k resolution----------*/
    @media (min-width: 1440px) {
        .content-wrapper {
            margin-left: -17rem;
            /* Move content slightly right */
            margin-top: 8rem;
            /* Optional vertical offset */
        }
    }

    /*------------------------Smaller Screens-----------------------------*/
    @media (min-width: 641px) and (max-width: 1439px) {}

    /*-------------------- Mobile Resolution -------------*/
    @media (max-width: 414px) {

        /* Entire section: remove the left offset + reduce spacing */
        .mobile-section {
            margin-top: 3px;
            !important;
            margin-left: 0 !important;
            padding: 20px 15px !important;
            gap: 20px !important;
        }

        /* Text readability */
        .mobile-section h2 {
            font-size: 16px !important;
            line-height: 1.3;
        }

        .mobile-section p {
            font-size: 13px !important;
            line-height: 1.5;
        }

        /* Fix slideshow size for mobile */
        .image_slideshow {
            width: 100% !important;
            height: 220px !important;
            /* Adjust to your liking */
        }

        .image_slideshow img {
            object-fit: cover;
        }

        /* Fix spacing between section and rest of page */
        #logos {
            padding-top: 30px !important;
            padding-bottom: 30px !important;
        }

        /* Adjust grid layout on mobile */
        #logos .logo-grid {
            grid-template-columns: repeat(3, 1fr) !important;
            /* 3 per row */
            gap: 20px !important;
        }

        /* Logo images resize properly */
        #logos img {
            max-height: 60px !important;
            /* slightly smaller but clean */
            width: auto !important;
            object-fit: contain !important;
        }
    }
</style>

</style>

<div class="w-full">
    <div class="h-26"></div>
    <!---------------------------------------------------Section--------------------------------------------------->
    <div
        class="mobile-section flex flex-col text-justify md:flex-row items-center md:items-start w-full max-w-7xl mx-auto py-10 gap-10 -mt-9 ml-10">

        <!-- LEFT: Information -->
        <div class="w-full md:w-1/2 space-y-4 px-4">
            <h2 class="text-[18px] font-bold text-gray-800">Bringing the Flavors of Asia to Your Kitchen</h2>
            <p class="text-gray-600 text-[13px] text-justify leading-relaxed">
                Discover a world of authentic Asian taste with our wide range of ingredients, sauces, condiments, and
                ready-to-use products all crafted to bring your culinary creations to life.
                From bold street food favorites to comforting classics, we make it easy to recreate the flavors your
                customers crave.
            </p>

            <p class="text-gray-600 text-[13px] text-justify leading-relaxed">
                Trusted by chefs and foodservice professionals, our products are chosen for their quality, authenticity,
                and consistency.
                Each one is made to deliver the real taste of Asia while saving you time in the kitchen without
                sacrificing flavor.
            </p>

            <p class="text-gray-600 text-[13px] text-justify leading-loose">
                Whether you run a cozy café, a bustling restaurant, or a large hotel kitchen, we provide tailored
                foodservice solutions that make every dish shine.
                With dependable supply and premium-quality ingredients, you can serve every plate with confidence and
                bring the true taste of Asia to every table.
            </p>

            <br>

            <a href="#" onclick="history.back(); return false;"
                class="btn btn-outline-light d-inline-flex align-items-center gap-2 -px-6 py-2"
                style="font-size: 16px;">

                <i class="fa-solid fa-arrow-left"></i>
                <span>Back</span>
            </a>
        </div>

        <!-- RIGHT: Slideshow -->
        <div
            class="image_slideshow relative md:w-[500px]  md:h-64 md:h-[335px] overflow-hidden rounded-lg shadow-lg bg-black">
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
    <!--------------------------------------------------End Section-------------------------------------------------->

    <!---------------------------------------------------Section 2--------------------------------------------------->
    <section id="logos" class="relative w-full h-full flex justify-center items-center bg-white py-10">
        <div
            class="grid logo-grid grid-cols-2 sm:grid-cols-5 md:grid-cols-5 lg:grid-cols-5 w-full justify-items-center items-center">
            @foreach ($brandLogos as $key => $brandLogo)
            <img src="{{ $brandLogo['url'] }}" alt="{{ $brandLogo['name'] . $key + 1 }}"
                class="max-h-30 w-auto object-contain opacity-0 transition-all duration-500 transform scale-90 logo-item">
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
                    // Add animation when visible
                    entry.target.classList.remove("opacity-0", "scale-90");
                    entry.target.classList.add("opacity-100", "scale-100");
                }
            });
        }, { threshold: 0.3 }); // Trigger when 30% of section is visible

        // Observe all logo items
        document.querySelectorAll(".logo-item").forEach((el, index) => {
            el.style.transitionDelay = `${index * 100}ms`; // Staggered fade
            observer.observe(el);
        });
    });
</script>

@vite('resources/js/consumer_products.js')
@include('components.footer')
@endsection
