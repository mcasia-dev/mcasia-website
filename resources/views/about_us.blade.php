@extends('layouts.app')
@section('title', 'McAsia - About Us')
@section('content')

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Marcellus&family=Work+Sans:wght@300;400;500;600&display=swap');

        :root {
            --ink: #141414;
            --ivory: #f8f7f2;
            --accent: #0f766e;
        }

        body.fade-in {
            opacity: 1;
        }

        .about-page {
            font-family: 'Work Sans', sans-serif;
            background: radial-gradient(1200px 600px at 10% -10%, rgba(15, 118, 110, 0.1), transparent 60%),
                radial-gradient(1000px 500px at 90% 20%, rgba(245, 158, 11, 0.1), transparent 55%),
                var(--ivory);
            color: var(--ink);
        }

        .about-heading {
            font-family: 'Marcellus', serif;
            letter-spacing: 0.02em;
        }

        .timeline {
            position: relative;
            padding-left: 1.75rem;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 2px;
            background: linear-gradient(to bottom, var(--accent), rgba(15, 118, 110, 0.3));
        }

        .timeline-dot {
            position: absolute;
            left: -6px;
            top: 6px;
            width: 14px;
            height: 14px;
            border-radius: 50%;
            background: var(--accent);
            box-shadow: 0 0 0 6px rgba(15, 118, 110, 0.15);
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

        .story-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .story-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.08);
        }
    </style>

    @php
        $timelines = [
            [
                'title' => '2012: The Beginning',
                'description' => '<p class="text-gray-600 leading-relaxed text-justify"> <span class="font-semibold text-gray-800">McAsia</span> started as a direct importer of Japanese dry food items, supplying restaurants, hotels, and food institutions primarily within Metro Manila and parts of the Visayas. With its commitment to quality and reliability, the company quickly became a preferred partner for establishments seeking authentic Asian ingredients. </p>',
            ],
            [
                'title' => '2017: Expansion and Digital Transformation',
                'description' => '<p class="text-gray-600 leading-relaxed text-justify"> Driven by growing demand, <span class="font-semibold text-gray-800">McAsia</span> expanded its distribution nationwide in 2017. This milestone year also marked the company\'s investment in Enterprise Resource Planning (ERP) software, strengthening its operational capabilities and streamlining its processes. To better reach customers in the Visayas and Mindanao regions, <span class="font-semibold text-gray-800">McAsia</span> established a dedicated warehouse in Cebu, further enhancing service efficiency and logistical reach. </p>',
            ],
            [
                'title' => '2022: Strengthening Infrastructure',
                'description' => '<p class="text-gray-600 leading-relaxed text-justify"> In early 2022, <span class="font-semibold text-gray-800">McAsia</span> elevated its supply chain operations with the development of a larger, fully equipped warehouse featuring expanded storage capacity. The implementation of a Warehouse Management System (WMS) enabled improved inventory control and faster fulfillment, ensuring that clients across the Philippines receive products efficiently and at optimal quality. </p>',
            ],
            [
                'title' => 'Today: A Trusted Nationwide Partner',
                'description' => '<p class="text-gray-600 leading-relaxed text-justify mb-4">From its humble beginnings, <span class="font-semibold text-gray-800">McAsia</span> has grown into a comprehensive supplier of Asian food products, offering a diverse portfolio that includes dry goods, frozen items, alcoholic beverages, fresh produce, and everyday pantry staples. The company serves the market through food service establishments, retail channels such as supermarkets and grocery stores, and its own e-commerce platform, <span class="font-semibold text-gray-800">McAsia</span> Mart.</p><p class="text-gray-600 leading-relaxed text-justify mb-4"><span class="font-semibold text-gray-800">McAsia</span> proudly acts as a vital link between international brands and the Philippine market. Partnering with well-known names such as Somi and Ozaki from Japan and Gaban from Malaysia, the company provides business-to-business (B2B) support to:</p><ul class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-gray-600 list-disc list-inside ml-2"><li>Restaurants and hotels</li><li>Caterers and resorts</li><li>Supermarkets and grocery stores</li><li>E-Commerce platforms</li></ul><p class="text-gray-600 leading-relaxed text-justify mt-4">Through its unwavering commitment to authenticity, quality, and customer service, <span class="font-semibold text-gray-800">McAsia</span> continues to deliver an ever-expanding range of Asian food options, helping bring the flavors of Asia to tables across the Philippines.</p>',
            ],
        ];
    @endphp

    <main class="about-page">
        <section class="relative h-[42vh] sm:h-[50vh] lg:h-[62vh] overflow-hidden pt-16 lg:pt-0">
            <img src="{{ asset('images/HOMEPAGE/1.jpg') }}" alt="McAsia Background"
                class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/45 to-black/55"></div>
            <div class="relative z-10 flex items-center justify-center h-full">
                <div class="text-center px-4 sm:px-6 max-w-3xl">
                    <h1 class="about-heading text-3xl sm:text-4xl lg:text-6xl font-bold text-white mb-3 sm:mb-4"
                        data-aos="fade-down" data-aos-duration="1000">
                        Our Story
                    </h1>
                    <p class="text-base sm:text-lg lg:text-xl text-gray-200" data-aos="fade-up" data-aos-duration="1000"
                        data-aos-delay="200">
                        Bridging the Philippines with the authentic flavors of Asia since 2012
                    </p>
                </div>
            </div>
        </section>

        <section class="py-12 sm:py-16 lg:py-20 bg-white/90">
            <div class="max-w-5xl mx-auto px-4 sm:px-6 fade-section">
                <p class="text-gray-600 leading-relaxed text-base sm:text-lg lg:text-xl text-justify">
                    <span class="font-semibold text-gray-800">McAsia Foodtrade Corporation</span>,
                    established in March 2012, began with a clear vision to bridge the Philippines with the rich flavors
                    of Asia by providing authentic, high-quality food products to businesses and consumers nationwide.
                    Operating under the trading name McAsia, the company set out to become a trusted source of Asian
                    culinary essentials in the country.
                </p>
            </div>
        </section>

        <section class="py-12 sm:py-16 lg:py-20">
            <div class="max-w-5xl mx-auto px-4 sm:px-6 space-y-6 sm:space-y-8">
                @foreach ($timelines as $timeline)
                    <article
                        class="fade-section story-card bg-white rounded-2xl p-5 sm:p-6 md:p-8 shadow-sm border border-gray-100">
                        <div class="timeline">
                            <span class="timeline-dot"></span>
                            <h3 class="text-lg sm:text-xl md:text-2xl font-semibold text-gray-900 mb-3">{{ $timeline['title'] }}
                            </h3>
                            {!! $timeline['description'] !!}
                        </div>
                    </article>
                @endforeach
            </div>
        </section>

        <section class="py-12 sm:py-16 lg:py-20 bg-gray-50/90">
            <div class="max-w-6xl mx-auto px-4 sm:px-6">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-center text-gray-900 mb-8 sm:mb-12 fade-section">
                    Our Purpose & Values
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
                    <article
                        class="fade-section story-card bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100">
                        <div class="h-44 sm:h-48 overflow-hidden">
                            <img src="{{ asset('images/about_us/1.jpg') }}" alt="Mission"
                                class="w-full h-full object-cover">
                        </div>
                        <div class="p-5 sm:p-6">
                            <h3 class="text-xl font-semibold text-gray-800 mb-3 flex items-center gap-2">
                                <i class="fa-solid fa-bullseye text-teal-600"></i>
                                Mission
                            </h3>
                            <p class="text-gray-600 leading-relaxed">
                                We are dedicated to delivering authentic Asian products that satisfy and elevate every
                                Filipino's Asian cravings with uncompromising quality.
                            </p>
                        </div>
                    </article>

                    <article
                        class="fade-section story-card bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100">
                        <div class="h-44 sm:h-48 overflow-hidden">
                            <img src="{{ asset('images/about_us/2.jpg') }}" alt="Vision" class="w-full h-full object-cover">
                        </div>
                        <div class="p-5 sm:p-6">
                            <h3 class="text-xl font-semibold text-gray-800 mb-3 flex items-center gap-2">
                                <i class="fa-solid fa-eye text-amber-500"></i>
                                Vision
                            </h3>
                            <p class="text-gray-600 leading-relaxed">
                                To be the leading provider of Asian consumer products, offering authentic taste that
                                uncovers the heart of Asian flavors and beyond.
                            </p>
                        </div>
                    </article>

                    <article
                        class="fade-section story-card bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100">
                        <div class="h-44 sm:h-48 overflow-hidden">
                            <img src="{{ asset('images/about_us/3.jpg') }}" alt="Core Values"
                                class="w-full h-full object-cover">
                        </div>
                        <div class="p-5 sm:p-6">
                            <h3 class="text-xl font-semibold text-gray-800 mb-3 flex items-center gap-2">
                                <i class="fa-solid fa-gem text-teal-600"></i>
                                Core Values
                            </h3>
                            <ul class="space-y-2 text-gray-600">
                                <li class="flex items-start gap-2"><i
                                        class="fa-solid fa-check text-teal-600 mt-1"></i><span>Excellence in everything we
                                        do</span></li>
                                <li class="flex items-start gap-2"><i
                                        class="fa-solid fa-check text-teal-600 mt-1"></i><span>Customer Commitment</span>
                                </li>
                                <li class="flex items-start gap-2"><i
                                        class="fa-solid fa-check text-teal-600 mt-1"></i><span>Integrity in all
                                        dealings</span></li>
                                <li class="flex items-start gap-2"><i
                                        class="fa-solid fa-check text-teal-600 mt-1"></i><span>Teamwork and
                                        collaboration</span></li>
                                <li class="flex items-start gap-2"><i
                                        class="fa-solid fa-check text-teal-600 mt-1"></i><span>Sustainable practices</span>
                                </li>
                            </ul>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <div class="text-center pt-2 sm:pt-4 fade-section">
            <a href="#" onclick="history.back(); return false;"
                class="inline-flex items-center gap-2 px-6 py-3 border-2 border-gray-300 rounded-lg text-gray-700 hover:border-gray-400 hover:bg-gray-50 transition-colors duration-300">
                <i class="fa-solid fa-arrow-left"></i>
                <span>Back</span>
            </a>
        </div>

        @include('components.footer')
    </main>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (window.AOS) {
                AOS.init({
                    once: true,
                    duration: 900,
                    easing: 'ease-in-out',
                });
            }
        });
    </script>

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
    </script>
@endsection
