@extends('layouts.app')
@section('title', 'McAsia - Sales Avenue')
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

        .sales-card {
            border: 1px solid #e5e7eb;
            background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
            box-shadow: 0 8px 22px rgba(15, 23, 42, 0.08);
        }

        .sa-slide {
            transition: opacity 1s ease-in-out;
        }
    </style>

    @php
        $items = $salesAvenue->salesAvenues ?? collect();
    @endphp

    <main class="w-full overflow-x-hidden">
        <div class="pt-4"></div>
        @foreach($items as $item)

            <section class="max-w-7xl mx-auto px-4 sm:px-6 py-6 lg:py-10">
                <div class="flex flex-col lg:flex-row items-start gap-6 lg:gap-10">
                    <article class="fade-section w-full lg:w-1/2 space-y-4">
                        <h2 class="text-2xl lg:text-4xl font-bold text-gray-800 leading-tight">
                            {{ $item->title }}
                        </h2>
                        <p class="text-gray-600 text-sm lg:text-base text-justify leading-relaxed">
                            {!! $item->content !!}
                        </p>

                        <a href="#" onclick="history.back(); return false;"
                           class="inline-flex items-center gap-2 text-base text-gray-800 hover:text-red-600 transition-colors py-2">
                            <i class="fa-solid fa-arrow-left"></i>
                            <span>Back</span>
                        </a>
                    </article>

                    <div class="fade-section w-full lg:w-1/2">
                        <div
                            class="relative w-full aspect-[16/10] sm:aspect-[16/9] lg:aspect-[4/3] overflow-hidden rounded-xl shadow-lg bg-black">
                            @php
                                $heroImages = $item->getMedia('sales-avenue-banner')
                                    ->map(fn($media) => $media->getUrl())
                                    ->values()
                                    ->all();

                                if (empty($heroImages)) {
                                    $heroImages = [asset('images/retail_product/1.jpg')];
                                }
                            @endphp

                            <div class="absolute inset-0" data-sales-carousel data-interval="4500">
                                @foreach($heroImages as $index => $heroImage)
                                    <img src="{{ $heroImage }}"
                                         class="sa-slide absolute top-0 left-0 w-full h-full object-cover {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}"
                                         alt="{{ $salesAvenue->name }}">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            @if($items->isNotEmpty())
                <section class="max-w-7xl mx-auto px-4 sm:px-6 pb-10 lg:pb-12">
                    <div class="space-y-6">
                        @php
                            $images = $item->getMedia('sales-avenue-images');
                            $gridColumns = $item->grid_no ?? 3;
                        @endphp

                        @if($images->isNotEmpty())
                            <article class="sales-card fade-section rounded-xl p-5 sm:p-6">
                                <div class="grid gap-3 mt-5"
                                     style="grid-template-columns: repeat({{ $gridColumns }}, minmax(0, 1fr));">
                                    @foreach($images as $image)
                                        <div class="rounded-lg  bg-white p-2">
                                            <img src="{{ $image->getUrl() }}"
                                                 alt="{{ $item->title }}"
                                                 class="w-full h-32 sm:h-36 object-contain">
                                        </div>
                                    @endforeach
                                </div>
                            </article>
                        @endif
                    </div>
                </section>
            @endif
        @endforeach

        @include('components.footer')
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const fadeSections = document.querySelectorAll('.fade-section');
            const carousels = document.querySelectorAll('[data-sales-carousel]');

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

            carousels.forEach((carousel) => {
                const slides = carousel.querySelectorAll('.sa-slide');

                if (slides.length < 2) {
                    return;
                }

                let currentIndex = 0;
                const interval = Number(carousel.dataset.interval) || 4500;

                setInterval(() => {
                    slides[currentIndex].classList.remove('opacity-100');
                    slides[currentIndex].classList.add('opacity-0');

                    currentIndex = (currentIndex + 1) % slides.length;

                    slides[currentIndex].classList.remove('opacity-0');
                    slides[currentIndex].classList.add('opacity-100');
                }, interval);
            });
        });
    </script>
@endsection
