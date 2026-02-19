@extends('layouts.app')

@section('content')

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
        }

        .animate-scroll {
            animation: scroll 40s linear infinite;
            display: flex;
        }

        .text-justify {
            text-align: justify;
        }

        /* Viewing for Monitor going 2k - 4k resolution */
        @media (min-width: 1440px) {
            .content-wrapper {
                margin-left: -17rem;
                /* Move content slightly right */
                margin-top: 8rem;
                /* Optional vertical offset */
            }

            .image_slideshow {
                margin-left: 10rem;
            }
        }

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
                gap: 20px !important;
            }

            /* Logo images resize properly */
            #logos img {
                max-height: 60px !important;
                width: auto !important;
                object-fit: contain !important;
            }
        }
    </style>

    <div class="w-full">

        <div class="h-26"></div>


        <!---------------------------------------------------Section--------------------------------------------------->
        <div
            class="flex flex-col text-justify md:flex-row items-center md:items-start w-full max-w-7xl mx-auto py-10 gap-10 -mt-9 ml-10 mobile-section">
            <!-- LEFT: Information -->
            <div class="w-full md:w-1/2 space-y-4 px-4">
                <h2 class="text-[18px] font-bold text-gray-800">Bringing Asian Flavors Closer to You Anytime, Anywhere</h2>
                <p class="text-gray-600 text-[13px] text-justify leading-relaxed">
                    Shop authentic Asian food and beverages online, from everyday essentials to premium brands all just a
                    few clicks away at McAsia Mart.
                    Whether you’re craving a quick snack, a taste of home, or something new to discover, our carefully
                    curated selection delivers quality, authenticity, and true Asian flavor straight to your door.
                </p>


                <p class="text-gray-600 text-[13px] text-justify leading-relaxed">
                    With fast, reliable delivery and trusted platforms, your favorite Asian tastes are always within
                    reach—making every craving easy to satisfy.
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
            <div class="image_slideshow relative w-[500px] h-64 md:h-[315px] overflow-hidden rounded-lg shadow-lg bg-black">
                <div id="slideshow" class="w-full h-full relative">
                    <img src="{{ asset('images/ecommerce/1.png') }}"
                        class="absolute top-0 left-0 w-full h-full object-cover opacity-100 transition-opacity duration-1000" />
                </div>
            </div>
        </div>

        <!---------------------------------------------------Section 2--------------------------------------------------->
        <section id="logos" class="w-full bg-white py-10">
            <div
                class="grid logo-grid grid-cols-2 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-4 w-full justify-items-center items-center">
                <!-- 1. Lazada -->
                <a href="https://www.lazada.com.ph/shop/mcasia-mart" target="_blank" class="block">
                    <div class="flex flex-col items-center space-y-3 cursor-pointer">
                        <img src="{{ asset('images/ecommerce/lazada_logo.png') }}" alt="Logo 1" class="h-16 object-cover">
                        <img src="{{ asset('images/ecommerce/background/lazada_background.png') }}" alt="Background 1"
                            class="w-[300px] h-[200px] object-cover rounded-md shadow-md">
                    </div>
                </a>

                <!-- 2. Shopee -->
                <a href="https://shopee.ph/mcasiamart" target="_blank" class="block">
                    <div class="flex flex-col items-center space-y-3 cursor-pointer">
                        <img src="{{ asset('images/ecommerce/shopee_logo.png') }}" alt="Logo 2" class="h-16 object-cover">
                        <img src="{{ asset('images/ecommerce/background/shopee_background.png') }}" alt="Background 2"
                            class="w-[300px] h-[200px] object-cover rounded-md shadow-md">
                    </div>
                </a>

                <!-- 3. TikTok -->
                <a href="https://www.tiktok.com/@mcasiafoodtrade_" target="_blank" class="block">
                    <div class="flex flex-col items-center space-y-3 cursor-pointer">
                        <img src="{{ asset('images/ecommerce/tiktok_logo.png') }}" alt="Logo 3" class="h-16 object-cover">
                        <img src="{{ asset('images/ecommerce/background/tiktok_background.png') }}" alt="Background 3"
                            class="w-[300px] h-[200px] object-cover rounded-md shadow-md">
                    </div>
                </a>

                <!-- 4. M.C. Asia Mart -->
                <a href="https://mcasiamart.ph" target="_blank" class="block">
                    <div class="flex flex-col items-center space-y-3 cursor-pointer">
                        <img src="{{ asset('images/ecommerce/mcasiamart_logo.png') }}" alt="Logo 4"
                            class="h-16 object-cover">
                        <img src="{{ asset('images/ecommerce/background/mcasiamart_background.png') }}" alt="Background 4"
                            class="w-[300px] h-[200px] object-cover rounded-md shadow-md">
                    </div>
                </a>
            </div>
        </section>
        <!--------------------------------------------------End Section--------------------------------------------------->

        @push('scripts')

        <!----------------------------------------------------SECTION 2------------------------------------------>
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
                }, { threshold: 0.9 }); // Trigger when 30% of section is visible

                // Observe all logo items
                document.querySelectorAll(".logo-item").forEach((el, index) => {
                    el.style.transitionDelay = `${index * 1500}ms`; // Staggered fade
                    observer.observe(el);
                });
            });
        </script>
    </div>

    @vite('resources/js/consumer_products.js')
    @include('components.footer')
@endsection
