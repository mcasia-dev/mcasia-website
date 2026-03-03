@extends('layouts.app')
@section('title', 'McAsia - Beverage')
@section('content')

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

    .beverage-card {
        border: 1px solid #e5e7eb;
        background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
        box-shadow: 0 8px 22px rgba(15, 23, 42, 0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .beverage-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 28px rgba(15, 23, 42, 0.14);
    }
</style>

<main class="w-full overflow-x-hidden">
    <div class="pt-24 lg:pt-36"></div>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 py-6 lg:py-10">
        <div class="flex flex-col lg:flex-row items-start gap-6 lg:gap-10">
            <article class="fade-section w-full lg:w-1/2 space-y-4">
                <h2 class="text-xl lg:text-4xl font-bold text-gray-800 leading-tight">Refreshing the Taste of Asia, One Sip at a Time</h2>

                <p class="text-gray-600 text-sm lg:text-base text-justify leading-relaxed">
                    Discover the vibrant world of Asian beverages from authentic teas and fruit drinks to indulgent milk
                    teas and refreshing juices. Our Beverages Group brings together trusted brands and well-loved flavors
                    that capture the essence of Asia in every bottle and cup.
                </p>

                <p class="text-gray-600 text-sm lg:text-base text-justify leading-relaxed">
                    Whether you're looking for a quick pick-me-up, a taste of nostalgia, or something new to enjoy, our
                    selection offers the perfect drink for every mood and moment. Each product is crafted with quality
                    ingredients and authentic recipes to deliver pure, refreshing satisfaction.
                </p>

                <p class="text-gray-600 text-sm lg:text-base text-justify leading-relaxed">
                    Our retail products are trusted by families and home cooks who value quality and authenticity.
                    Whether you're preparing a simple everyday dish or recreating your favorite Asian specialties, our
                    brands make it easy to enjoy the taste of home, anytime.
                </p>

                <p class="text-gray-600 text-sm lg:text-base text-justify leading-relaxed">
                    Available in stores and cafes nationwide, we make it easy to enjoy the taste of Asia wherever you are,
                    one refreshing sip at a time.
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
                        <img src="{{ asset('images/BEVERAGES_ASSETS/1.jpg') }}"
                            class="absolute top-0 left-0 w-full h-full object-cover opacity-100 transition-opacity duration-1000" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="logos" class="w-full bg-white py-8 lg:py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
            <article class="beverage-card fade-section rounded-xl p-4 sm:p-5">
                <div class="flex flex-col items-center gap-4">
                    <img src="{{ asset('images/BEVERAGES_ASSETS/hamasaen.png') }}" alt="Hamasaen" class="h-14 sm:h-16 w-auto object-contain">
                    <img src="{{ asset('images/BEVERAGES_ASSETS/Backgrounds/1.jpg') }}" alt="Hamasaen Products"
                        class="w-full h-32 sm:h-36 object-cover rounded-md logo-item">
                </div>
            </article>

            <article class="beverage-card fade-section rounded-xl p-4 sm:p-5">
                <div class="flex flex-col items-center gap-4">
                    <img src="{{ asset('images/BEVERAGES_ASSETS/longbeach.png') }}" alt="Longbeach" class="h-14 sm:h-16 w-auto object-contain">
                    <img src="{{ asset('images/BEVERAGES_ASSETS/Backgrounds/2.png') }}" alt="Longbeach Products"
                        class="w-full h-32 sm:h-36 object-cover rounded-md logo-item">
                </div>
            </article>

            <article class="beverage-card fade-section rounded-xl p-4 sm:p-5">
                <div class="flex flex-col items-center gap-4">
                    <img src="{{ asset('images/BEVERAGES_ASSETS/milcasa1.png') }}" alt="Milcasa" class="h-14 sm:h-16 w-auto object-contain">
                    <img src="{{ asset('images/BEVERAGES_ASSETS/Backgrounds/3.jpg') }}" alt="Milcasa Products"
                        class="w-full h-32 sm:h-36 object-cover rounded-md logo-item">
                </div>
            </article>
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
