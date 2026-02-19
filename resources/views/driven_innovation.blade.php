@extends('layouts.app')
@section('title', 'McAsia - Driver Innovation')
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
                height: 120%;
                width: 100%;
                object-fit: contain;
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

                height: 80%;
                margin-top: 7%;
                width: 100%;
                object-fit: contain;

            }
        }

        /*--------------------Mobile Resolution-------------*/
        @media (max-width: 414px) {
            .image_cover {
                object-fit: contain;
                height: 100%;
                width: 100%;
                background-image: 60;
            }
        }
    </style>

    <div class="h-26"></div>

    <div class="relative overflow-hidden min-h-screen">

        {{-- Hero Section --}}
        <section class="relative h-screen overflow-hidden"> {{-- Reduced height --}}
            <img src="{{ asset('images/driven_innovation/1.jpg') }}" alt="Background"
                class="image_cover absolute inset-0 object-cover">

            {{-- Optional overlay --}}
            <div class="absolute inset-0 bg-black/40"></div>
        </section>


        <!-----------------------------------ABOUT US SECTION--------------------------------------------------------->
        <section class="max-w-7xl mx-auto px-4 py-12 space-y-7">
            <!-- Intro Section -->
            <div class="space-y-4 fade-section">
                <h2 class="text-2xl font-bold text-gray-900">Driven By Innovations</h2>
            </div>

            <div class="fade-section">
                <p class="text-gray-600 leading-relaxed text-justify">
                    With a steadfast commitment to operational excellence and superior service delivery,
                    <span class="font-semibold text-gray-800">McAsia Foodtrade Corporation</span> has consistently expanded
                    its customer network across the nation.
                    In 2017, the Company undertook a significant strategic investment in <span
                        class="font-semibold text-gray-800">Enterprise Resource Planning (ERP)</span> technology to enhance
                    efficiency,
                    transparency, and integration across all business processes. Furthermore, the establishment of the Cebu
                    warehouse marked a pivotal step in
                    strengthening the Company’s logistical capabilities, ensuring timely and reliable service to clients
                    throughout the Visayas and Mindanao regions.
                </p>
            </div>

            <!-- Innovation Section -->
            <div class="space-y-6 fade-section">
                <h3 class="text-2xl font-semibold text-gray-900">Innovation and Infrastructure</h3>
                <p class="text-gray-600 leading-relaxed text-justify">
                    <span class="font-semibold text-gray-800">McAsia Foodtrade Corporation</span>
                    recognizes that innovation and infrastructure are the cornerstones of sustainable growth. The Company
                    continues to
                    invest in modern technologies, process automation, and data-driven systems to optimize operations and
                    uphold the highest standards of efficiency.
                    Its state-of-the-art storage facilities and advanced logistics framework are designed to maintain
                    product integrity and ensure uninterrupted supply
                    chain performance. Through these ongoing initiatives, <span
                        class="font-semibold text-gray-800">McAsia</span> reaffirms its commitment to excellence,
                    positioning itself as a trusted partner in
                    the food distribution industry.
                </p>
            </div>

            <!-- Commitment Section -->
            <div class="space-y-6 fade-section">
                <p class="text-gray-600 leading-relaxed text-justify">
                    Guided by its vision of becoming a leading and trusted partner in the food distribution sector,
                    <span class="font-semibold text-gray-800">McAsia Foodtrade Corporation</span> remains dedicated to
                    sustainable growth, continuous improvement,
                    and strategic innovation. By leveraging technology, strengthening partnerships, and maintaining
                    uncompromising quality standards, the Company
                    continues to expand its reach and uphold its reputation as a reliable provider of premium food products
                    nationwide.
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
                }" x-init="startSlideshow();
                window.addEventListener('resize', () => { isMobile = window.innerWidth <= 434 })">


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
