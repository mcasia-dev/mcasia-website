@extends('layouts.app')
@section('title', 'News & Events')
@section('content')

    <style>
        html,
        body {
            overflow-x: hidden;
        }

        [x-cloak] {
            display: none !important;
        }

        .event-card {
            border: 1px solid #e5e7eb;
            background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .event-card:hover {
            box-shadow: 0 14px 30px rgba(15, 23, 42, 0.14);
        }

        .event-modal-shell {
            background: rgba(15, 23, 42, 0.78);
            backdrop-filter: blur(4px);
        }

        .event-modal-panel {
            border: 1px solid #e5e7eb;
            box-shadow: 0 24px 60px rgba(15, 23, 42, 0.32);
        }

        .event-dot {
            width: 9px;
            height: 9px;
            border-radius: 999px;
            background: #d1d5db;
            transition: all 200ms ease;
        }

        .event-dot.active {
            width: 24px;
            background: #dc2626;
        }
    </style>

    <div class="min-h-screen text-white px-4 md:px-8 py-8">
        <!-- Highlight Video Section -->
        <section class="relative w-full h-screen overflow-hidden">
            <video
                autoplay
                loop
                playsinline
                muted
                preload="metadata"
                class="absolute inset-0 w-full h-full object-cover">
                <source src="{{ asset('videos/videos.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>

            <!-- Optional overlay for text readability -->
            <div class="absolute inset-0 bg-black/30"></div>

            <div class="relative z-10 flex flex-col items-center justify-end h-full text-center px-4 pb-10 space-y-4">
                <p class="text-[25px] text-white drop-shadow-md animate-fade-in-up">
                    More Events
                </p>

                <!-- Down Arrow (Clickable & Smooth Scroll) -->
                <button onclick="document.querySelector('#news-events').scrollIntoView({ behavior: 'smooth' });"
                        class="mt-4 focus:outline-none">
                    <svg
                        class="w-8 h-8 text-white animate-bounce cursor-pointer hover:scale-125 transition-transform duration-300"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
            </div>
        </section>

        <div class="h-10"></div>

        <section id="news-events" class="max-w-7xl mx-auto text-black px-4 sm:px-6 py-10 sm:py-12">
            <h2 class="text-2xl sm:text-3xl font-bold text-center mb-8">McAsia Flavourful Happenings</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6">
                @forelse($events as $event)
                    @php
                        $eventImages = !empty($event['images'])
                            ? $event['images']
                            : [asset('images/EXPLORE NEW RECEIPES/1.png')];
                        $hasDescription = filled(trim($event['description'] ?? ''));
                    @endphp
                    <article class="event-card rounded-xl p-3 sm:p-4"
                             x-data="{
                            open: false,
                            index: 0,
                            fullImage: null,
                            images: {{ json_encode($eventImages) }},
                            slideshow: null,
                            openModal() {
                                this.open = true;
                                this.index = 0;
                                this.startSlideshow();
                                document.body.style.overflow = 'hidden';
                            },
                            closeModal() {
                                this.open = false;
                                this.fullImage = null;
                                this.stopSlideshow();
                                document.body.style.overflow = '';
                            },
                            startSlideshow() {
                                this.stopSlideshow();
                                this.slideshow = setInterval(() => {
                                    this.index = (this.index + 1) % this.images.length;
                                }, 4500);
                            },
                            stopSlideshow() {
                                if (this.slideshow) {
                                    clearInterval(this.slideshow);
                                    this.slideshow = null;
                                }
                            },
                            next() {
                                this.index = (this.index + 1) % this.images.length;
                                this.startSlideshow();
                            },
                            prev() {
                                this.index = (this.index - 1 + this.images.length) % this.images.length;
                                this.startSlideshow();
                            },
                            goTo(i) {
                                this.index = i;
                                this.startSlideshow();
                            }
                        }">

                        <button type="button" class="w-full text-left" @click.stop="openModal()">
                            <img src="{{ $eventImages[0] }}" alt="{{ $event['title'] }}"
                                 title="{{ $event['title'] }}"
                                 loading="lazy"
                                 decoding="async"
                                 fetchpriority="high"
                                 class="w-full h-44 sm:h-48 object-cover rounded-lg mb-3">
                            <h4 class="text-lg font-semibold line-clamp-2">{{ $event['title'] }}</h4>
                        </button>

                        <div x-show="open" x-cloak x-transition.opacity.duration.250ms
                             class="event-modal-shell fixed inset-0 flex items-center justify-center z-[9999] p-3 sm:p-4"
                             @click.self="closeModal()"
                             @keydown.escape.window="closeModal()">

                            <div x-show="open"
                                 x-transition:enter="transition ease-out duration-250"
                                 x-transition:enter-start="opacity-0 translate-y-4 scale-[0.98]"
                                 x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                                 x-transition:leave="transition ease-in duration-200"
                                 x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                                 x-transition:leave-end="opacity-0 translate-y-4 scale-[0.98]"
                                 class="event-modal-panel bg-white rounded-2xl w-full max-w-6xl max-h-[94vh] overflow-y-auto relative"
                                 @mouseenter="stopSlideshow()"
                                 @mouseleave="startSlideshow()">

                                <button @click="closeModal()"
                                        class="absolute top-3 right-3 sm:top-4 sm:right-4 h-10 w-10 inline-flex items-center justify-center rounded-full border border-gray-200 bg-white text-gray-700 hover:bg-gray-100 z-20"
                                        aria-label="Close">
                                    <span class="text-xl leading-none">&times;</span>
                                </button>

                                <div class="p-4 sm:p-6 lg:p-8 grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8">
                                    <div>
                                        <div
                                            class="relative w-full aspect-[4/3] bg-gray-100 rounded-xl overflow-hidden">
                                            <template x-for="(img, i) in images" :key="img + i">
                                                <img x-show="i === index"
                                                     x-transition:enter="transition ease-out duration-350"
                                                     x-transition:enter-start="opacity-0 scale-[0.98]"
                                                     x-transition:enter-end="opacity-100 scale-100"
                                                     x-transition:leave="transition ease-in duration-250"
                                                     x-transition:leave-start="opacity-100 scale-100"
                                                     x-transition:leave-end="opacity-0 scale-[0.98]"
                                                     :src="img"
                                                     :alt="`${@js($event['title'])} image ${i + 1}`"
                                                     :title="`${@js($event['title'])} image ${i + 1}`"
                                                     loading="eager"
                                                     decoding="async"
                                                     fetchpriority="high"
                                                     class="absolute inset-0 w-full h-full object-cover cursor-zoom-in"
                                                     @click="fullImage = img"
                                                />
                                            </template>

                                            <button @click="prev()"
                                                    class="absolute left-2 top-1/2 -translate-y-1/2 h-9 w-9 rounded-full bg-black/60 text-white hover:bg-red-600 transition"
                                                    aria-label="Previous image">
                                                <span aria-hidden="true">&#8249;</span>
                                            </button>

                                            <button @click="next()"
                                                    class="absolute right-2 top-1/2 -translate-y-1/2 h-9 w-9 rounded-full bg-black/60 text-white hover:bg-red-600 transition"
                                                    aria-label="Next image">
                                                <span aria-hidden="true">&#8250;</span>
                                            </button>

                                            <div
                                                class="absolute bottom-2 right-2 bg-black/65 text-white text-xs px-2 py-1 rounded-md">
                                                <span x-text="index + 1"></span>/<span x-text="images.length"></span>
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <div class="flex items-center justify-center gap-2">
                                                <template x-for="(img, i) in images" :key="'dot-' + i">
                                                    <button type="button" class="event-dot"
                                                            :class="{ 'active': i === index }"
                                                            @click="goTo(i)"
                                                            :aria-label="`Go to image ${i + 1}`"></button>
                                                </template>
                                            </div>

                                            <div class="mt-3 grid grid-cols-5 gap-2 max-h-28 overflow-y-auto pr-1">
                                                <template x-for="(img, i) in images" :key="'thumb-' + i">
                                                    <button type="button"
                                                            class="rounded-md overflow-hidden border-2"
                                                            :class="i === index ? 'border-red-600' : 'border-transparent'"
                                                            @click="goTo(i)">
                                                        <img :src="img"
                                                             class="w-full h-14 object-cover"
                                                             :alt="`${@js($event['title'])} thumbnail ${i + 1}`"
                                                             :title="`${@js($event['title'])} thumbnail ${i + 1}`"
                                                             loading="lazy"
                                                             decoding="async"
                                                             fetchpriority="high">
                                                    </button>
                                                </template>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex flex-col">
                                        <h3 class="text-2xl sm:text-3xl font-bold text-gray-900">{{ $event['title'] }}</h3>
                                        <p class="text-sm text-gray-500 mt-1 mb-4">{{ $event['date'] ?? '' }}</p>
                                        @if ($hasDescription)
                                            <p class="text-gray-700 text-sm sm:text-base leading-relaxed text-justify">
                                                {!! $event['description'] !!}
                                            </p>
                                        @else
                                            <p class="text-gray-500 text-sm">No description available.</p>
                                        @endif
                                    </div>
                                </div>

                                <div x-show="fullImage"
                                     class="fixed inset-0 bg-black/95 flex items-center justify-center z-[10000] p-4"
                                     @click="fullImage = null">
                                    <img :src="fullImage"
                                         :alt="`${@js($event['title'])} full image`"
                                         :title="`${@js($event['title'])} full image`"
                                         loading="lazy"
                                         decoding="async"
                                         fetchpriority="high"
                                         class="max-w-full max-h-full object-contain rounded-md shadow-2xl">
                                </div>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full text-center py-10">
                        <p class="text-gray-500">No events available yet.</p>
                    </div>
                @endforelse
            </div>

            @if($events->hasPages())
                <div class="mt-8 bg-white border border-gray-200 rounded-2xl p-4 sm:p-5">
                    {{ $events->links() }}
                </div>
            @endif

            <div class="pt-10 text-center">
                <a href="#"
                   title="Go back to the previous page"
                   rel="noopener noreferrer"
                   aria-label="Go back to the previous page"
                   onclick="history.back(); return false;"
                   class="inline-flex items-center gap-2 px-5 py-2.5 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 hover:border-gray-400 transition">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>Back</span>
                </a>
            </div>

        </section>
    </div>
    @include('components.footer')

@endsection
