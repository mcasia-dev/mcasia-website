@extends('layouts.app')
@section('title', 'McAsia - Beverage')
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

        /*-------------------------------------------------*/
    </style>

    <div class="w-full">

        <div class="h-26"></div>

        <!---------------------------------------------------Section--------------------------------------------------->
        <div
            class="flex flex-col text-justify md:flex-row items-center md:items-start w-full max-w-7xl mx-auto py-10 gap-10 -mt-9 ml-10 mobile-section">
            <!-- LEFT: Information -->
            <div class="w-full md:w-1/2 space-y-4 px-4">
                <h2 class="text-[18px] font-bold text-gray-800">Refreshing the Taste of Asia, One Sip at a Time</h2>
                <p class="text-gray-600 text-[13px] text-justify leading-relaxed">
                    Discover the vibrant world of Asian beverages from authentic teas and fruit drinks to indulgent milk
                    teas and refreshing juices.
                    Our Beverages Group brings together trusted brands and well-loved flavors that capture the essence of
                    Asia in every bottle and cup.
                </p>


                <p class="text-gray-600 text-[13px] text-justify leading-relaxed">
                    Whether you’re looking for a quick pick-me-up, a taste of nostalgia, or something new to enjoy, our
                    selection offers the perfect drink for every mood and moment.
                    Each product is crafted with quality ingredients and authentic recipes to deliver pure, refreshing
                    satisfaction
                </p>

                <p class="text-gray-600 text-[13px] text-justify leading-relaxed">
                    Our retail products are trusted by families and home cooks who value quality and authenticity.
                    Whether you’re preparing a simple everyday dish or recreating your favorite Asian specialties, our
                    brands make it easy to enjoy the taste of home, anytime.
                </p>


                <p class="text-gray-600 text-[13px] text-justify leading-loose">
                    Available in stores and cafés nationwide, we make it easy to enjoy the taste of Asia wherever you are
                    one refreshing sip at a time.
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
            <div class="image_slideshow relative w-[500px] h-64 md:h-[335px] overflow-hidden rounded-lg shadow-lg bg-black">
                <div id="slideshow" class="w-full h-full relative">
                    <img src="{{ asset('images/BEVERAGES_ASSETS/1.jpg') }}"
                        class="absolute top-0 left-0 w-full h-full object-cover opacity-100 transition-opacity duration-1000" />
                </div>
            </div>
        </div>
        <!--------------------------------------------------End Section-------------------------------------------------->

        <!---------------------------------------------------Section 2--------------------------------------------------->
        <section id="logos" class="w-full bg-white py-10">
            <div
                class="grid logo-grid grid-cols-2 sm:grid-cols-5 md:grid-cols-5 lg:grid-cols-5 w-full justify-items-center items-center">
                <!-- 1. Logo + Background Below -->
                <div class="flex flex-col items-center space-y-3">
                    <img src="{{ asset('images/BEVERAGES_ASSETS/hamasaen.png') }}" alt="Logo 1" class="h-16 object-cover">
                    <img src="{{ asset('images/BEVERAGES_ASSETS/Backgrounds/1.jpg') }}" alt="Background 1"
                        class="w-[200px] h-[100px] object-cover rounded-md shadow-md">
                </div>

                <!-- 2. Logo + Background Below -->
                <div class="flex flex-col items-center space-y-3">
                    <img src="{{ asset('images/BEVERAGES_ASSETS/longbeach.png') }}" alt="Logo 2" class="h-16 object-cover">
                    <img src="{{ asset('images/BEVERAGES_ASSETS/Backgrounds/2.png') }}" alt="Background 2"
                        class="w-[200px] h-[100px] object-cover rounded-md shadow-md">
                </div>

                <!-- 3. Logo + Background Below -->
                <div class="flex flex-col items-center space-y-3">
                    <img src="{{ asset('images/BEVERAGES_ASSETS/milcasa1.png') }}" alt="Logo 3" class="h-16 object-cover">
                    <img src="{{ asset('images/BEVERAGES_ASSETS/Backgrounds/3.jpg') }}" alt="Background 3"
                        class="w-[200px] h-[100px] object-cover rounded-md shadow-md">
                </div>
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
        <!----------------------------------------------------SECTION 2------------------------------------------>

    </div>



    @vite('resources/js/consumer_products.js')
    @include('components.footer')
@endsection
