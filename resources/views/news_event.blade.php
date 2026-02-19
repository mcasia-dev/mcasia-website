@extends('layouts.app')
@section('title', 'News & Events')
@section('content')

    <style>
        html,
        body {
            overflow-x: hidden;
        }

        /* Animation: from center to top-left (inside section) */
        @keyframes moveToTopLeft {
            0% {
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%) scale(1);
            }

            100% {
                top: -26px;
                left: -140px;
                transform: translate(0, 0) scale(0.5);
                /* Grows 1.5x larger */
            }
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
                    'description' => 'MAFBEX 2025 was held at the World Trade Center Manila, and McAsia Foodtrade Corporation was proud to be part of this exciting event. At our booth, we shared product samples, fun giveaways, and had the chance to meet with partners and food enthusiasts. It was a great way to show our quality products and connect with more people in the industry. Thank you to everyone who visited—we look forward to serving more flavors soon!',
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
                    'description' => 'McAsia Foodtrade Corporation brought bold flavors and kitchen excitement to WOFEX Iloilo 2025! We proudly joined the event to showcase our wide range of sauces, condiments, and Asian ingredients that bring authentic flavors to every kitchen. It was a great opportunity to connect with chefs, food entrepreneurs, and partners who share our passion for quality and taste. We’re grateful to everyone who visited our booth and look forward to bringing more Asian flavors closer to you.',
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
                    'description' => 'McAsia Foodtrade Corporation brought authentic Asian flavors to life at the recently concluded WOFEX Manila World Food Expo 2025, the country’s biggest stage for food and beverage innovation. Visitors at our booth experienced the taste of Asia through free samples, live cooking demos, and exciting dishes prepared by celebrity chefs Niño Logarta, Ryan Siapian, and Tina Agregado, together with our valued principals. From sauces and condiments to specialty ingredients, we showcased how our products can make every kitchen adventure easier and more flavorful. It was a truly inspiring and delicious experience. Thank you for making this event a success—we look forward to sharing more flavors with you soon!'
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
                    'description' => 'McAsia Foodtrade Corporation proudly joined WOFEX Mindanao, one of Mindanao’s biggest food and beverage gatherings. The event was a flavorful stage for us to showcase our trusted range of Asian products that make every dish more delicious and convenient. We were delighted to meet industry partners, chefs, and food lovers who share the same passion for quality and taste.  As we continue our journey, we are slowly bringing the home of Asian cravings to Davao—thank you to everyone who visited and shared this experience with us! '
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
                        'McAsia’s booth at the World Food Expo last August 2-5, 2023 at the SMX Convention Center Manila, was a symphony of flavors and aromas, designed to captivate the palates of visitors. From the moment attendees stepped into our space, they were enveloped in an ambiance that celebrated the artistry and passion behind our culinary creations.',
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
                    'description' => 'As the holiday season unfolded, our team had the pleasure of participating in the much-anticipated Christmas Bazaar of 2022, Noel Bazaar—an event that transformed the ordinary into the extraordinary and spread festive cheer throughout the community. McAsias booth, adorned with twinkling lights and exuding a warm and welcoming ambiance, became a haven for holiday shoppers seeking unique gifts and delightful Asian products Our participation in the Christmas Bazaar allowed us to present exclusive holiday offerings that resonated with the festive spirit We want to send thanks to all who participated with us last November and December event dates that happened at Filinvest Tent, Alabang and World Trade Center'
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
                //     'title' => 'McAsia & Kobeya New Year’s Toast 2022',
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
                //     'description' => 'As part of McAsia Foodtrade Corporation’s Corporate Social Responsibility, we are able to donate boxes of ABC Sauces PH goods to our neighboring communities:',
                // ],
            ];
        @endphp

        <div class="h-10"></div>

        <section id="news-events" class="min-h-screen text-black px-4 md:px-8 py-8">
            <!-- Page Title -->
            <h2 class="sm:text-1xl md:text-2xl lg:text-3xl font-bold text-center text-black mb-6 font-chendolle">
                McAsia Flavourful Happenings
            </h2>
            <!-- Events Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 md:gap-6">
                @foreach($events as $event)
                    @php
                        $eventImages = array_map(fn($img) => asset($img), $event['images']);
                        $hasDescription = filled(trim($event['description'] ?? ''));
                    @endphp
                    <div class="cursor-pointer rounded-lg shadow-md transition p-2 md:p-4"
                        x-data="{ open: false, index: 0, fullImage: null, images: {{ json_encode($eventImages) }} }">

                        <!-- Event Card -->
                        <div @click="open = true">
                            <img src="{{ $eventImages[0] }}" alt="{{ $event['title'] }}"
                                class="w-full h-36 sm:h-40 md:h-48 object-cover rounded mb-2 ">
                            <h4 class="text-lg font-semibold truncate">{{ $event['title'] }}</h4>
                            <p class="text-xs sm:text-sm text-gray-400">{{ $event['date'] }}</p>
                        </div>

                        <!-- Event Modal -->
                        <div x-show="open" x-data="{
                                                                                        index: 0,
                                                                                        fullImage: null,
                                                                                        images: {{ json_encode($eventImages) }},
                                                                                        slideshow: null,
                                                                                        startSlideshow() {
                                                                                            this.slideshow = setInterval(() => {
                                                                                                this.index = (this.index + 1) % this.images.length;
                                                                                            }, 5000);
                                                                                        },
                                                                                        stopSlideshow() {
                                                                                            clearInterval(this.slideshow);
                                                                                            this.index = 0;
                                                                                        }
                                                                                    }" x-init="startSlideshow()"
                            @click.away="open = false; stopSlideshow()"
                            class="fixed inset-0 bg-black bg-opacity-90 flex items-center justify-center z-[9999] overflow-auto p-4">

                            <div
                                class="bg-white rounded-xl w-full max-w-6xl max-h-[95vh] flex flex-col relative overflow-hidden">

                                <div
                                    class="relative w-full p-6 md:p-10 max-w-6xl mx-auto flex flex-col md:flex-row gap-8">

                                    <!-- Left: Slideshow -->
                                    <div class="relative flex-shrink-0 w-full md:w-1/2 flex justify-center">

                                        <!-- Slideshow Container -->
                                        <div class="relative mb-4 w-full max-w-[560px] h-[52vh] md:h-[60vh]">
                                            <template x-for="(img, i) in images" :key="i">
                                                <img x-show="i === index" x-transition:enter="transition-opacity duration-500"
                                                    x-transition:enter-start="opacity-0 scale-95"
                                                    x-transition:enter-end="opacity-100 scale-100"
                                                    x-transition:leave="transition-opacity duration-500"
                                                    x-transition:leave-start="opacity-100 scale-100"
                                                    x-transition:leave-end="opacity-0 scale-95" :src="img"
                                                    class="w-full h-full object-contain rounded-md cursor-zoom-in absolute inset-0"
                                                    @click="fullImage = img">
                                            </template>

                                            <!-- Prev Button -->
                                            <button @click="index = (index - 1 + images.length) % images.length"
                                                class="absolute left-2 top-1/2 -translate-y-1/2 bg-black bg-opacity-60 text-black px-4 py-2 rounded-full text-2xl z-10 hover:bg-opacity-80 transition">‹</button>

                                            <!-- Next Button -->
                                            <button @click="index = (index + 1) % images.length"
                                                class="absolute right-2 top-1/2 -translate-y-1/2 bg-black bg-opacity-60 text-black px-4 py-2 rounded-full text-2xl z-10 hover:bg-opacity-80 transition">›</button>
                                        </div>
                                    </div>

                                    <!-- Right: Title + Date + Description -->
                                    <div
                                        class="flex-1 flex flex-col justify-center p-4 text-center md:text-left">
                                        <h2 class="text-3xl font-bold text-black mb-2">{{ $event['title'] }}</h2>
                                        <p class="text-sm md:text-base text-gray-500 {{ $hasDescription ? 'mb-4' : '' }}">
                                            {{ $event['date'] }}
                                        </p>
                                        @if ($hasDescription)
                                            <p
                                                class="text-base md:text-lg text-gray-700 text-justify leading-relaxed overflow-auto">
                                                {{ $event['description'] }}
                                            </p>
                                        @endif
                                    </div>

                                    <!-- Close Button -->
                                    <button @click="open = false; stopSlideshow()"
                                        class="absolute top-4 right-4 w-10 h-10 rounded-full bg-white/95 text-black hover:bg-white text-2xl leading-none font-bold z-[10001] shadow-md">X</button>

                                    <!-- Fullscreen Preview -->
                                    <div x-show="fullImage"
                                        class="fixed inset-0 bg-black bg-opacity-95 flex items-center justify-center z-50 cursor-zoom-out"
                                        @click="fullImage = null">
                                        <img :src="fullImage" class="max-w-full max-h-full object-contain rounded-md shadow-xl">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>

            <div class="h-20"></div>

            <a href="#" onclick="history.back(); return false;"
                class="btn btn-outline-light d-inline-flex align-items-center gap-2 px-4 py-20 mt-30"
                style="font-size: 20px;">

                <i class="fa-solid fa-arrow-left"></i>
                <span>Back</span>
            </a>

        </section>
    </div>
    @include('components.footer')

@endsection
