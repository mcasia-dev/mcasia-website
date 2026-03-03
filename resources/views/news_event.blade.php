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
            <video autoplay loop playsinline muted class="absolute inset-0 w-full h-full object-cover">
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
                    <svg class="w-8 h-8 text-white animate-bounce cursor-pointer hover:scale-125 transition-transform duration-300"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
            </div>
        </section>

        @php
            // Example events
            $events = [
                [
                    'title' => 'MAFBEX 2025',
                    'date' => 'August 2025',
                    'description' => 'MAFBEX 2025 was held at the World Trade Center Manila, and McAsia Foodtrade Corporation was proud to be part of this exciting event. At our booth, we shared product samples, fun giveaways, and had the chance to meet with partners and food enthusiasts. It was a great way to show our quality products and connect with more people in the industry. Thank you to everyone who visited - we look forward to serving more flavors soon!',
                    'images' => [
                        'images/EVENTS/MAFBEX 2025/1.jpg',
                        'images/EVENTS/MAFBEX 2025/2.jpg',
                        'images/EVENTS/MAFBEX 2025/3.jpg',
                        'images/EVENTS/MAFBEX 2025/4.jpg',
                        'images/EVENTS/MAFBEX 2025/5.jpg',
                    ],
                ],
                [
                    'title' => 'WOFEX lloilo 2025',
                    'date' => 'August 2025',
                    'description' => 'McAsia Foodtrade Corporation brought bold flavors and kitchen excitement to WOFEX Iloilo 2025! We proudly joined the event to showcase our wide range of sauces, condiments, and Asian ingredients that bring authentic flavors to every kitchen. It was a great opportunity to connect with chefs, food entrepreneurs, and partners who share our passion for quality and taste. We\'re grateful to everyone who visited our booth and look forward to bringing more Asian flavors closer to you.',
                    'images' => [
                        'images/EVENTS/WOFEX lloilo 2025/1.jpg',
                        'images/EVENTS/WOFEX lloilo 2025/2.jpg',
                        'images/EVENTS/WOFEX lloilo 2025/3.jpg',
                        'images/EVENTS/WOFEX lloilo 2025/4.jpg',
                        'images/EVENTS/WOFEX lloilo 2025/5.jpg',
                        'images/EVENTS/WOFEX lloilo 2025/6.jpg',
                    ],
                ],
                [
                    'title' => 'WOFEX Manila 2025',
                    'date' => 'August 2025',
                    'images' => [
                        'images/EVENTS/WOFEX MANILA 2025/1.JPG',
                        'images/EVENTS/WOFEX MANILA 2025/2.JPG',
                        'images/EVENTS/WOFEX MANILA 2025/3.JPG',
                        'images/EVENTS/WOFEX MANILA 2025/4.JPG',
                        'images/EVENTS/WOFEX MANILA 2025/5.JPG',
                    ],
                    'description' => 'McAsia Foodtrade Corporation brought authentic Asian flavors to life at the recently concluded WOFEX Manila World Food Expo 2025, the country\'s biggest stage for food and beverage innovation. Visitors at our booth experienced the taste of Asia through free samples, live cooking demos, and exciting dishes prepared by celebrity chefs Nino Logarta, Ryan Siapian, and Tina Agregado, together with our valued principals. From sauces and condiments to specialty ingredients, we showcased how our products can make every kitchen adventure easier and more flavorful. It was a truly inspiring and delicious experience. Thank you for making this event a success - we look forward to sharing more flavors with you soon!'
                ],
                [
                    'title' => 'WOFEX Visayas 2025',
                    'date' => 'August 2025',
                    'images' => [
                        'images/EVENTS/WOFEX VISAYAS 2025/1.jpg',
                        'images/EVENTS/WOFEX VISAYAS 2025/2.jpg',
                        'images/EVENTS/WOFEX VISAYAS 2025/3.jpg',
                        'images/EVENTS/WOFEX VISAYAS 2025/4.jpg',
                        'images/EVENTS/WOFEX VISAYAS 2025/5.jpg',
                        'images/EVENTS/WOFEX VISAYAS 2025/6.jpg',
                        'images/EVENTS/WOFEX VISAYAS 2025/7.jpg',
                        'images/EVENTS/WOFEX VISAYAS 2025/8.jpg',
                    ],
                    'description' => 'McAsia Foodtrade Corporation was honored to be part of WOFEX Visayas 2025! The event was a dynamic platform where we showcased our trusted line of sauces, condiments, and Asian specialties that bring authentic flavors to every kitchen. It was an exciting opportunity to connect with industry leaders, strengthen partnerships, and highlight our commitment to quality and innovation. With every event like WOFEX, McAsia continues to serve solutions that inspire chefs, home cooks, and food businesses alike. Thank you to everyone who visited and connected with us during the event. '
                ],
                [
                    'title' => 'WOFEX Davao 2025',
                    'date' => 'August 2025',
                    'images' => [
                        'images/EVENTS/WOFEX Davao 2025/1.jpg',
                        'images/EVENTS/WOFEX Davao 2025/2.jpg',
                        'images/EVENTS/WOFEX Davao 2025/3.jpg',
                        'images/EVENTS/WOFEX Davao 2025/4.jpg',
                        'images/EVENTS/WOFEX Davao 2025/5.jpg',
                    ],
                    'description' => 'McAsia Foodtrade Corporation proudly joined WOFEX Mindanao, one of Mindanao\'s biggest food and beverage gatherings. The event was a flavorful stage for us to showcase our trusted range of Asian products that make every dish more delicious and convenient. We were delighted to meet industry partners, chefs, and food lovers who share the same passion for quality and taste.  As we continue our journey, we are slowly bringing the home of Asian cravings to Davao - thank you to everyone who visited and shared this experience with us! '
                ],
                [
                    'title' => 'WOFEX Manila 2023',
                    'date' => 'August 6, 2025',
                    'images' => [
                        'images/EVENTS/WOFEX MANILA 2023/01_WOF.jpg',
                        'images/EVENTS/WOFEX MANILA 2023/02_WOF.jpg',
                        'images/EVENTS/WOFEX MANILA 2023/03_WOF.jpg',
                        'images/EVENTS/WOFEX MANILA 2023/04_WOF.jpg',
                        'images/EVENTS/WOFEX MANILA 2023/05_WOF.jpg',
                        'images/EVENTS/WOFEX MANILA 2023/06_WOF.jpg',
                        'images/EVENTS/WOFEX MANILA 2023/07_WOF.jpg',
                        'images/EVENTS/WOFEX MANILA 2023/08_WOF.jpg',

                    ],
                    'description' =>
                        'McAsia\'s booth at the World Food Expo last August 2-5, 2023 at the SMX Convention Center Manila, was a symphony of flavors and aromas, designed to captivate the palates of visitors. From the moment attendees stepped into our space, they were enveloped in an ambiance that celebrated the artistry and passion behind our culinary creations.',
                    'The carefully curated displays featured our signature dishes, highlighting the quality of our Asian ingredients and the craftsmanship that sets us apart'
                ],
                // [
                //     'title' => 'WOFEX Cebu 2023',
                //     'date' => 'April 24, 2023',
                //     'images' => [
                //         'https://mcasiafoodtrade.ph/wp-content/uploads/2023/07/342335781_569158718654567_3828589371071699165_n.jpg',
                //         'https://mcasiafoodtrade.ph/wp-content/uploads/2023/07/342513751_609894934087360_3630082966185560219_n.jpg',
                //         'https://mcasiafoodtrade.ph/wp-content/uploads/2023/07/342511311_610762660669477_2013223865411140735_n-2.jpg',
                //         'https://mcasiafoodtrade.ph/wp-content/uploads/2023/07/342202074_1176372153046709_8460370401537678584_n-2.jpg',
                //     ],
                //     'description' => 'In a celebration of food and culinary innovation, McAsia Team had the privilege of participating in the World Food Expo held in the vibrant city of Cebu for the World Food Expo Visayas happened last April 20-23, 2023 at Waterfront Hotels & Casinos, Cebu City.'
                // ],
                [
                    'title' => 'MAFBEX 2023',
                    'date' => 'June 19, 2023',
                    'images' => [
                        'images/EVENTS/MAFBEX 2023/mafbex1.jpg',
                        'images/EVENTS/MAFBEX 2023/mafbex2.jpg',
                        'images/EVENTS/MAFBEX 2023/mafbex3.jpg',
                        'images/EVENTS/MAFBEX 2023/mafbex4.jpg',
                        'images/EVENTS/MAFBEX 2023/mafbex5.jpg',
                        'images/EVENTS/MAFBEX 2023/mafbex6.jpg',
                        'images/EVENTS/MAFBEX 2023/mafbex7.jpg',
                        'images/EVENTS/MAFBEX 2023/mafbex8.jpg',
                    ],
                    'description' => 'The Manila Food Expo happened last June 14-18, 2023 in World Trade Center, Manila provided a platform for us to explore and embrace regional culinary trends. From unique street food creations to innovative fusion dishes,'
                ],
                [
                    'title' => 'Thailand Week 2023',
                    'date' => 'June 19, 2023',
                    'images' => [
                        'images/EVENTS/Thailand Week 2023/thai1.JPG',
                        'images/EVENTS/Thailand Week 2023/thai2.JPG',
                        'images/EVENTS/Thailand Week 2023/thai3.JPG',
                        'images/EVENTS/Thailand Week 2023/thai4.JPG',
                        'images/EVENTS/Thailand Week 2023/thai5.JPG',
                        'images/EVENTS/Thailand Week 2023/thai6.JPG',
                        'images/EVENTS/Thailand Week 2023/thai7.JPG',
                        'images/EVENTS/Thailand Week 2023/thai8.JPG',
                        'images/EVENTS/Thailand Week 2023/thai9.JPG',
                        'images/EVENTS/Thailand Week 2023/thai10.JPG',
                    ],
                    'description' => ''
                ],
                [
                    'title' => 'Noel Bazaar 2022',
                    'date' => 'June 19, 2023',
                    'images' => [
                        'images/EVENTS/NOEL Bazaar 2022/noel_bazaar1.JPG',
                        'images/EVENTS/NOEL Bazaar 2022/noel_bazaar2.JPG',
                        'images/EVENTS/NOEL Bazaar 2022/noel_bazaar3.JPG',
                        'images/EVENTS/NOEL Bazaar 2022/noel_bazaar4.JPG',
                        'images/EVENTS/NOEL Bazaar 2022/noel_bazaar5.JPG',
                        'images/EVENTS/NOEL Bazaar 2022/noel_bazaar6.JPG',
                        'images/EVENTS/NOEL Bazaar 2022/noel_bazaar7.JPG',
                        'images/EVENTS/NOEL Bazaar 2022/noel_bazaar8.JPG',
                        'images/EVENTS/NOEL Bazaar 2022/noel_bazaar9.JPG',
                        'images/EVENTS/NOEL Bazaar 2022/noel_bazaar10.JPG',
                        'images/EVENTS/NOEL Bazaar 2022/noel_bazaar11.JPG',
                        'images/EVENTS/NOEL Bazaar 2022/noel_bazaar12.JPG',
                        'images/EVENTS/NOEL Bazaar 2022/noel_bazaar13.JPG',
                        'images/EVENTS/NOEL Bazaar 2022/noel_bazaar14.JPG',
                        'images/EVENTS/NOEL Bazaar 2022/noel_bazaar15.JPG',
                        'images/EVENTS/NOEL Bazaar 2022/noel_bazaar16.JPG',
                    ],
                    'description' => 'As the holiday season unfolded, our team had the pleasure of participating in the much-anticipated Christmas Bazaar of 2022, Noel Bazaar - an event that transformed the ordinary into the extraordinary and spread festive cheer throughout the community. McAsias booth, adorned with twinkling lights and exuding a warm and welcoming ambiance, became a haven for holiday shoppers seeking unique gifts and delightful Asian products Our participation in the Christmas Bazaar allowed us to present exclusive holiday offerings that resonated with the festive spirit We want to send thanks to all who participated with us last November and December event dates that happened at Filinvest Tent, Alabang and World Trade Center'
                ],
                // [
                //     'title' => 'WOFEX Manila 2022',
                //     'date' => 'June 19, 2023',
                //     'images' => [
                //         'https://mcasiafoodtrade.ph/wp-content/uploads/2023/11/297574535_882671376469684_2999360323446627874_n.jpg',
                //         'https://mcasiafoodtrade.ph/wp-content/uploads/2023/11/297660701_882671799802975_210699793026921347_n.jpg',
                //         'https://mcasiafoodtrade.ph/wp-content/uploads/2023/11/297601056_882671829802972_98910655444194783_n.jpg',
                //         'https://mcasiafoodtrade.ph/wp-content/uploads/2023/11/297626116_882671869802968_683372144773233079_n.jpg',
                //         'https://mcasiafoodtrade.ph/wp-content/uploads/2023/11/297689432_882672013136287_8404949495675449345_n.jpg',
                //         'https://mcasiafoodtrade.ph/wp-content/uploads/2023/11/297571825_882672039802951_3959572961363665160_n.jpg',
                //     ],
                //     'description' => 'The World Food Expo (WOFEX) 2022 was a feast for the senses, bringing together food enthusiasts, industry leaders, and culinary innovators from around the country. This happened last August 3-6, 2023 at SMX Convention Center, Pasay City. This was the first-ever expo experience of McAsia. This culinary extravaganza was a testament to our commitment to showcasing the best in food and beverage',
                // ],
                // [
                //     'title' => 'McAsia & Kobeya New Year's Toast 2022',
                //     'date' => 'January 7, 2023',
                //     'images' => [
                //         'https://mcasiafoodtrade.ph/wp-content/uploads/2023/11/thumbnail-1.jpg',
                //         'https://mcasiafoodtrade.ph/wp-content/uploads/2023/07/DSC07188-1536x864.jpg',
                //         'https://mcasiafoodtrade.ph/wp-content/uploads/2023/07/DSC07207-1536x864.jpg',
                //         'https://mcasiafoodtrade.ph/wp-content/uploads/2023/07/DSC07436-1536x864.jpg',
                //         'https://mcasiafoodtrade.ph/wp-content/uploads/2023/07/DSC07446-1536x864.jpg',
                //         'https://mcasiafoodtrade.ph/wp-content/uploads/2023/07/DSC07477-1536x864.jpg',
                //     ],
                //     'description' => 'As the year drew to a new chapter, McAsia embraced the festive spirit with a spectacular New Years Toast and Christmas Party, bringing together colleagues, friends, and the warmth of the holiday season. The event was held at Felicidad Mansion, Quezon City last January 6, 2023, and it was a dazzling affair that marked the end of the year with joy, gratitude, and anticipation for the adventures that lie ahead.',
                // ],
                // [
                //     'title' => 'ABC Hot & Sweet Chili Donation Drive',
                //     'date' => 'January 7, 2023',
                //     'images' => [
                //         'https://mcasiafoodtrade.ph/wp-content/uploads/2023/11/401076115_657908519790810_3693639043077205660_n.jpg',
                //         'https://mcasiafoodtrade.ph/wp-content/uploads/2023/11/401076317_657908513124144_3911741493152524187_n.jpg',
                //         'https://mcasiafoodtrade.ph/wp-content/uploads/2023/11/400836935_657908523124143_1650869408429332145_n.jpg',
                //         'https://mcasiafoodtrade.ph/wp-content/uploads/2023/11/401076116_657908563124139_9047497740408235196_n.jpg',
                //         'https://mcasiafoodtrade.ph/wp-content/uploads/2023/11/401093252_657908609790801_6297931591554095694_n.jpg',
                //         'https://mcasiafoodtrade.ph/wp-content/uploads/2023/11/401063216_657908746457454_1719933888189202571_n.jpg',
                //     ],
                //     'description' => 'As part of McAsia Foodtrade Corporation's Corporate Social Responsibility, we are able to donate boxes of ABC Sauces PH goods to our neighboring communities:',
                // ],
            ];
        @endphp

        <div class="h-10"></div>

                <section id="news-events" class="max-w-7xl mx-auto text-black px-4 sm:px-6 py-10 sm:py-12">
            <h2 class="text-2xl sm:text-3xl font-bold text-center mb-8">McAsia Flavourful Happenings</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6">
                @foreach($events as $event)
                    @php
                        $eventImages = array_map(fn($img) => asset($img), $event['images']);
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
                                class="w-full h-44 sm:h-48 object-cover rounded-lg mb-3">
                            <h4 class="text-lg font-semibold line-clamp-2">{{ $event['title'] }}</h4>
                            <p class="text-sm text-gray-500 mt-1">{{ $event['date'] ?? '' }}</p>
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
                                        <div class="relative w-full aspect-[4/3] bg-gray-100 rounded-xl overflow-hidden">
                                            <template x-for="(img, i) in images" :key="img + i">
                                                <img x-show="i === index"
                                                    x-transition:enter="transition ease-out duration-350"
                                                    x-transition:enter-start="opacity-0 scale-[0.98]"
                                                    x-transition:enter-end="opacity-100 scale-100"
                                                    x-transition:leave="transition ease-in duration-250"
                                                    x-transition:leave-start="opacity-100 scale-100"
                                                    x-transition:leave-end="opacity-0 scale-[0.98]"
                                                    :src="img"
                                                    class="absolute inset-0 w-full h-full object-cover cursor-zoom-in"
                                                    @click="fullImage = img">
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

                                            <div class="absolute bottom-2 right-2 bg-black/65 text-white text-xs px-2 py-1 rounded-md">
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
                                                        <img :src="img" class="w-full h-14 object-cover" alt="">
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
                                                {{ $event['description'] }}
                                            </p>
                                        @else
                                            <p class="text-gray-500 text-sm">No description available.</p>
                                        @endif
                                    </div>
                                </div>

                                <div x-show="fullImage"
                                    class="fixed inset-0 bg-black/95 flex items-center justify-center z-[10000] p-4"
                                    @click="fullImage = null">
                                    <img :src="fullImage" class="max-w-full max-h-full object-contain rounded-md shadow-2xl">
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="pt-10 text-center">
                <a href="#" onclick="history.back(); return false;"
                    class="inline-flex items-center gap-2 px-5 py-2.5 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 hover:border-gray-400 transition">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>Back</span>
                </a>
            </div>

        </section>
    </div>
    @include('components.footer')

@endsection
