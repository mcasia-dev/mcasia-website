<header class="hidden md:block bg-white shadow-sm {{ ($navState['home'] ?? false) ? 'fixed top-0 left-0 w-full' : 'sticky top-0 w-full' }} z-[200] transition-all duration-300">
    <div class="w-full max-w-7xl mx-auto px-4 xl:px-6 py-3">
        <div class="flex items-center justify-between gap-5 xl:gap-8">
            <a href="/" class="flex items-center logo-img shrink-0">
                <img src="{{ asset('images/McAsia_Black_Red_Logo.png') }}" alt="McAsia Foodtrade Corporation Logo"
                     class="header-logo w-auto">
            </a>

            <div class="flex-1 min-w-0 flex flex-col gap-2 my-3 justify-center">
                <div class="flex justify-end items-center gap-4 shrink-0">
                    <a href="https://mcasiamart.ph"
                       class="flex items-center font-semibold text-gray-700 hover:text-red-600 transition">
                        <i class="fa-solid fa-cart-shopping text-sm mr-1"></i>
                        <span class="text-sm">Shop Online</span>
                    </a>
                </div>

                <nav class="flex-1 flex flex-wrap justify-center">
                    <div
                        class="header-nav flex flex-wrap items-center justify-center gap-4 xl:gap-7 whitespace-nowrap w-full text-[13px] xl:text-sm mt-1.5">
                        <div class="relative group">
                            <a href="/our-story"
                               class="{{ ($navState['ourStory'] ?? false) ? 'text-red-600' : 'text-gray-700' }} hover:text-red-600 font-bold flex items-center gap-1 pt-1 transition-colors duration-200">
                                Our Story
                            </a>
                        </div>

                        <div class="relative group">
                            <button
                                class="{{ ($navState['products'] ?? false) ? 'text-red-600' : 'text-gray-700' }} hover:text-red-600 font-bold flex items-center gap-1 pt-1 transition-colors duration-200">
                                Our Products

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="h-4 w-4 mt-0.5 transition-transform duration-200 group-hover:rotate-180"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>

                            <div
                                class="absolute left-0 top-full mt-0 hidden w-64 whitespace-normal rounded-lg border border-gray-100 bg-white shadow-lg z-50 group-hover:block">
                                <ul class="py-2">
                                    @foreach($products as $product)
                                        <li class="relative group/item">
                                            <a href="{{ $product['url'] ?: '#' }}"
                                               class="flex min-w-0 items-start justify-between gap-3 px-4 py-2 text-gray-700 font-bold whitespace-normal hover:bg-red-50 hover:text-red-600 transition">
                                                <span class="min-w-0 flex-1 break-words whitespace-normal leading-snug">{{ $product['title'] }}</span>
                                                @if(!empty($product['subheader']))
                                                    <i class="fa-solid fa-chevron-right mt-1 shrink-0 text-xs"></i>
                                                @endif
                                            </a>

                                            @if(!empty($product['subheader']))
                                                <div
                                                    class="absolute left-full top-0 ml-2 hidden w-64 whitespace-normal rounded-lg border border-gray-100 bg-white shadow-lg z-50 group-hover/item:block">
                                                    <ul class="py-2">
                                                        @foreach($product['subheader'] as $subhead)
                                                            <li>
                                                                <a href="{{ $subhead['url'] ?: '#' }}"
                                                                   class="block break-words whitespace-normal px-4 py-2 text-gray-700 font-semibold leading-snug hover:bg-red-50 hover:text-red-600 transition">
                                                                    {{ $subhead['title'] }}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        @if($edges)
                            <div class="relative group font-bold">
                                <button
                                    class="relative group {{ ($navState['ourEdge'] ?? false) ? 'text-red-600' : 'text-gray-700' }} hover:text-red-600 font-bold flex items-center gap-1 pt-1 transition-colors duration-200 focus:outline-none">
                                    Our Edge
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="h-4 w-4 mt-0.5 transition-transform duration-200 group-hover:rotate-180"
                                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </button>

                                <div
                                    class="absolute left-0 top-full hidden group-hover:block bg-white shadow-lg rounded-lg mt-0 w-auto border border-gray-100 z-50">
                                    <ul>
                                        @foreach($edges as $edge)
                                            <li>
                                                <a href="{{$edge['url']}}"
                                                   class="block px-4 py-2 text-gray-700 hover:bg-red-50 hover:text-red-600 transition">
                                                    {{$edge['title']}}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                        @endif

                        <div class="relative group">
                            <button
                                class="{{ ($navState['salesAvenue'] ?? false) ? 'text-red-600' : 'text-gray-700' }} hover:text-red-600 font-bold flex items-center gap-1 pt-1 transition-colors duration-200 focus:outline-none">
                                Sales Avenue
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="h-4 w-4 mt-0.5 transition-transform duration-200 group-hover:rotate-180"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>

                            <div
                                class="absolute left-0 top-full hidden font-bold group-hover:block bg-white shadow-lg rounded-lg mt-0 w-48 border border-gray-100 z-50">
                                <ul class="py-2">
                                    @foreach($salesAvenues ?? [] as $salesAvenue)
                                        @if(!empty($salesAvenue['subheader']))
                                            <li class="relative group/sales">
                                                <div
                                                    class="flex items-center justify-between px-4 py-2 text-gray-700 hover:bg-red-50 hover:text-red-600 transition">
                                                    <span>{{ $salesAvenue['title'] }}</span>
                                                    <i class="fa-solid fa-chevron-right text-xs"></i>
                                                </div>

                                                <div
                                                    class="absolute left-full top-0 hidden group-hover/sales:block w-64 bg-white shadow-lg rounded-lg border border-gray-100 z-50">
                                                    <ul class="py-2">
                                                        @foreach($salesAvenue['subheader'] as $subheader)
                                                            <li>
                                                                <a href="/sales-avenue/{{ $subheader['url'] ?: '#' }}"
                                                                   class="block px-4 py-2 text-gray-700 hover:bg-red-50 hover:text-red-600 transition">
                                                                    {{ $subheader['title'] }}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </li>
                                        @else
                                            <li>
                                                <a href="/sales-avenue/{{ $salesAvenue['url'] ?: '#' }}"
                                                   class="block px-4 py-2 text-gray-700 hover:bg-red-50 hover:text-red-600 transition">
                                                    {{ $salesAvenue['title'] }}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="relative group">
                            <button
                                class="{{ ($navState['catalog'] ?? false) ? 'text-red-600' : 'text-gray-700' }} hover:text-red-600 font-bold flex items-center gap-1 pt-1 transition-colors duration-200 focus:outline-none">
                                Catalog
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="h-4 w-4 mt-0.5 transition-transform duration-200 group-hover:rotate-180"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>

                            <div
                                class="absolute left-0 top-full hidden font-bold group-hover:block bg-white shadow-lg rounded-lg mt-0 w-48 border border-gray-100 z-50">
                                <a href="/product_catalog"
                                   class="block px-4 py-2 text-gray-700 hover:bg-red-50 hover:text-red-600 transition">
                                    Product Catalog
                                </a>
                                <a href="/menu_ideas_with_products"
                                   class="block px-4 py-2 text-gray-700 hover:bg-red-50 hover:text-red-600 transition">
                                    Menu Ideas
                                </a>
                            </div>
                        </div>

                        <div class="relative group">
                            <a href="/recipes"
                               class="{{ ($navState['recipes'] ?? false) ? 'text-red-600' : 'text-gray-700' }} hover:text-red-600 font-bold flex items-center gap-1 pt-1 transition-colors duration-200">
                                Recipes
                            </a>
                        </div>

                        <div class="relative group">
                            <a href="/news_event"
                               class="{{ ($navState['events'] ?? false) ? 'text-red-600' : 'text-gray-700' }} hover:text-red-600 font-bold flex items-center gap-1 pt-1 transition-colors duration-200">
                                Events
                            </a>
                        </div>

                        <div class="relative group">
                            <a href="/reach-us"
                               class="{{ ($navState['reachUs'] ?? false) ? 'text-red-600' : 'text-gray-700' }} hover:text-red-600 font-bold flex items-center gap-1 pt-1 transition-colors duration-200">
                                Reach Us
                            </a>
                        </div>

                        <div class="relative group">
                            <a href="/partnership"
                               class="{{ ($navState['partnership'] ?? false) ? 'text-red-600' : 'text-gray-700' }} hover:text-red-600 font-bold flex items-center gap-1 pt-1 transition-colors duration-200">
                                Be Our Partnerss
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
