@extends('layouts.app')
@section('title', 'McAsia - Reliable Facilities')
@section('content')

    <style>
        body.fade-in {
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

            .image_cover {
                object-fit: cover;
                height: 76%;
                width: 100%;
            }

            .content_text {
                margin-top: -10%;
            }

            .spacing_1 {
                margin-bottom: 1rem;
            }

            .images-preview {
                width: 110%;
                height: auto;
                max-height: 280px;
                object-fit: contain;
            }
        }

        /*------------------------Smaller Screens-----------------------------*/
        @media (min-width: 641px) and (max-width: 1439px) {
            .image_cover {

                height: 60%;
                margin-top: 1%;
                width: 100%;
                object-fit: cover;

            }

            .content_text {
                margin-top: -20%;
            }
        }

        /*--------------------Mobile Resolution-------------*/
        @media (max-width: 414px) {
            .image_cover {
                object-fit: cover;
                height: 40%;
                width: max-content;
            }

            .content_text {
                margin-top: -120%;
            }
        }
    </style>

    <div class="relative overflow-hidden">
        {{-- Hero Section --}}
        <section class="relative h-screen overflow-hidden"> {{-- Reduced height --}}
            <img src="{{ asset('images/reliable_facilities/1.jpg') }}" alt="Background"
                class="image_cover absolute inset-0">
        </section>

        <!-----------------------------------ABOUT US SECTION--------------------------------------------------------->
        <section class="content_text mx-auto px-4 py-12 space-y-10">
            <!-- Intro Section -->
            <div class="fade-section">
                <h2 class="text-2xl font-bold text-gray-900">Built on Reliable Facilities</h2>
            </div>

            <div class="fade-section">
                <p class="text-gray-600 leading-relaxed text-justify">
                    Committed to maintaining the highest standards of safety and quality,
                    <span class="font-semibold text-gray-800">McAsia Foodtrade Corporation</span>, made a strategic
                    investment in a state-of-the-art warehouse, established in early 2022.
                    The facility is designed to optimize storage capacity, streamline inventory management, and support
                    efficient distribution operations.
                    Equipped with advanced <span class="font-semibold text-gray-800">Warehouse Management System (WMS)
                        technology</span> and a fleet of dedicated delivery trucks, the warehouse ensures a seamless,
                    reliable, and fully integrated supply chain, reinforcing <span
                        class="font-semibold text-gray-800">McAsia's</span> commitment to operational excellence and timely
                    delivery across the nation.
                </p>
            </div>

            <!-- Innovation Section -->
            <div class="fade-section">
                <p class="text-gray-600 leading-relaxed text-justify">
                    Leveraging technology and industry best practices, <span class="font-semibold text-gray-800">McAsia
                        Foodtrade Corporation</span>, continuously enhances its logistics and supply chain operations.
                    The integration of real-time inventory tracking, automated processes, and optimized delivery routes
                    allows the company to maintain product integrity, reduce lead times, and respond swiftly to customer
                    demands.
                    This forward-looking approach ensures that <span class="font-semibold text-gray-800">McAsia</span> not
                    only meets but exceeds the expectations of its partners and clients, reinforcing its reputation as a
                    reliable and innovative leader in food distribution nationwide.
                </p>
            </div>

            <!-- Commitment Section -->
            <div class="fade-section">
                <p class="text-gray-600 leading-relaxed text-justify">
                    Through these advanced systems and meticulous operational standards, <span
                        class="font-semibold text-gray-800">McAsia</span> ensures that every product reaches its destination
                    safely, efficiently, and in optimal condition, reflecting the Company’s unwavering commitment to
                    quality, safety, and customer satisfaction.
                </p>
            </div>
        </section>

        <!------------------------------------------------------------------------------------------------------------------------------->
        <a href="#" onclick="history.back(); return false;"
            class="btn btn-outline-light d-inline-flex align-items-center gap-2 px-3 py-2" style="font-size: 16px;">

            <i class="fa-solid fa-arrow-left"></i>
            <span>Back</span>
        </a>

        <div class="spacing_1"></div>

        <!--------------------------------------------3rd Section: Products & Brands Showcase-------------------------------------->
        <div class="section min-h-screen flex flex-col items-center justify-start text-white px-4 md:px-6 relative"
            id="section3" x-data="{
            openModal: false,
            activeProduct: null,
            currentIndex: 0,
            interval: null,
            thumbIndex: 0,
            selectedImage: null,
            isMobile: window.innerWidth <= 434,
            get batchSize() { return this.isMobile ? 1 : 2 },

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
                        { name: 'OZAKI', link: '/ozaki', images: [{ src: 'images/BRAND/OZAKI/1.png' }] },
                    ],

            startSlideshow() {
                this.interval = setInterval(() => {
                    this.currentIndex = (this.currentIndex + 1) % Math.ceil(this.products.length / this.batchSize);
                }, 5000);
            },

            stopSlideshow() {
                clearInterval(this.interval);
                this.interval = null;
            },

            resetSlideshow() {
                this.stopSlideshow();
                this.startSlideshow();
            }
         }" x-init="
            startSlideshow();
            window.addEventListener('resize', () => { isMobile = window.innerWidth <= 434 })
         ">

            <div class="w-full flex center ml-210"></div>

            <!-- Showcase Slider -->
            <div class="relative w-screen h-auto md:h-[370px] overflow-hidden rounded-none shadow-2xl image-container">
                <!-- Sliding Wrapper -->
                <div class="flex transition-transform duration-700 ease-in-out"
                    :style="`transform: translateX(-${currentIndex * 100}%)`">

                    <!-- Each batch -->
                    <template x-for="batch in Math.ceil(products.length / batchSize)" :key="batch">
                        <div class="flex-shrink-0 w-full flex flex-col md:flex-row gap-6 p-6 justify-center items-center">

                            <!-- PRODUCTS -->
                            <template
                                x-for="(product, i) in products.slice((batch-1)*batchSize, (batch-1)*batchSize + batchSize)"
                                :key="product.name">
                                <div class="w-full md:w-1/2 cursor-pointer transition transform hover:scale-[1.02] flex justify-center"
                                    @click="window.location.href = product.link">
                                    <img :src="product.images[0].src" :alt="product.name" class="images-preview">
                                </div>
                            </template>

                            <!-- Desktop placeholder -->
                            <template
                                x-if="products.slice((batch-1)*batchSize, (batch-1)*batchSize + batchSize).length < batchSize">
                                <div class="hidden md:block w-1/2 h-[180px] md:h-[220px] bg-transparent"></div>
                            </template>

                        </div>
                    </template>
                </div>

                <!-- Controls -->
                <button @click="
          currentIndex = (currentIndex - 1 + Math.ceil(products.length / batchSize)) % Math.ceil(products.length / batchSize);
          resetSlideshow();
        " class="absolute left-3 top-1/2 -translate-y-1/2 bg-black/50 p-3 rounded-full text-white hover:bg-red-600 transition z-10">
                    ‹
                </button>

                <button @click="
          currentIndex = (currentIndex + 1) % Math.ceil(products.length / batchSize);
          resetSlideshow();
        " class="absolute right-3 top-1/2 -translate-y-1/2 bg-black/50 p-3 rounded-full text-white hover:bg-red-600 transition z-10">
                    ›
                </button>
            </div>

            <div class="h-30"></div>
        </div>
    </div>

    @include('components.footer')

    <script>
        // Fade-in for entire page
        window.addEventListener("load", () => {
            document.body.classList.add("fade-in");
        });

        // Fade-in each section on scroll
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

        AOS.init({
            duration: 1000,
            once: true,
        });
    </script>
@endsection
