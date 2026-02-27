<header class="hidden lg:block bg-white shadow-sm fixed top-0 left-0 w-full z-[200] transition-all duration-300">
    <div class="w-full max-w-7xl mx-auto px-6 py-3">
        <div class="flex  items-center justify-between gap-8">
            <a href="/" class="flex items-center logo-img shrink-0">
                <img src="{{ asset('images/McAsia_Black_Red_Logo.png') }}" alt="Logo" class="header-logo w-auto">
            </a>

            <div class="flex flex-col gap-2 my-3 justify-center">
                <div class="flex justify-end items-center gap-4 shrink-0">
                    <a href="https://mcasiamart.ph"
                       class="flex items-center font-semibold text-gray-700 hover:text-red-600 transition">
                        <i class="fa-solid fa-cart-shopping text-sm mr-1"></i>
                        <span class="text-sm">Shop Online</span>
                    </a>
                </div>

                <nav class="flex-1 flex flex-wrap justify-center">
                    <div
                        class="header-nav flex items-center justify-center gap-8 whitespace-nowrap w-full text-sm mt-1.5">
                        <div class="relative group">
                            <a href="/about_us"
                               class="text-gray-700 hover:text-red-600 font-bold flex items-center gap-1 pt-1 transition-colors duration-200">
                                Our Story
                            </a>
                        </div>

                        <div class="relative group">
                            <button
                                class="text-gray-700 hover:text-red-600 font-bold flex items-center gap-1 pt-1 transition-colors duration-200">
                                Our Products

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="h-4 w-4 mt-0.5 transition-transform duration-200 group-hover:rotate-180"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>

                            <div
                                class="absolute left-0 top-full mt-0 hidden group-hover:block w-64 bg-white shadow-lg rounded-lg border border-gray-100 z-50">
                                <ul class="py-2">
                                    @foreach($products as $product)
                                        <li class="relative group/item">
                                            <a href="{{ $product['url'] ?: '#' }}"
                                               class="flex items-center justify-between px-4 py-2 text-gray-700 font-bold hover:bg-red-50 hover:text-red-600 transition">
                                                <span>{{ $product['title'] }}</span>
                                                @if(!empty($product['subheader']))
                                                    <i class="fa-solid fa-chevron-right text-xs"></i>
                                                @endif
                                            </a>

                                            @if(!empty($product['subheader']))
                                                <div
                                                    class="absolute left-full top-0 hidden group-hover/item:block w-64 bg-white shadow-lg rounded-lg border border-gray-100 z-50">
                                                    <ul class="py-2">
                                                        @foreach($product['subheader'] as $subhead)
                                                            <li>
                                                                <a href="{{ $subhead['url'] ?: '#' }}"
                                                                   class="block px-4 py-2 text-gray-700 font-semibold hover:bg-red-50 hover:text-red-600 transition">
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

                        <div class="relative group font-bold">
                            <button
                                class="relative group text-gray-700 hover:text-red-600 font-bold flex items-center gap-1 pt-1 transition-colors duration-200 focus:outline-none">
                                Our Edge
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="h-4 w-4 mt-0.5 transition-transform duration-200 group-hover:rotate-180"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>

                            <div
                                class="absolute left-0 top-full hidden group-hover:block bg-white shadow-lg rounded-lg mt-0 w-60 border border-gray-100 z-50">
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

                        <div class="relative group">
                            <button
                                class="text-gray-700 hover:text-red-600 font-bold flex items-center gap-1 pt-1 transition-colors duration-200 focus:outline-none">
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
                                <a href="/foodservice_solutions"
                                   class="block px-4 py-2 text-gray-700 hover:bg-red-50 hover:text-red-600 transition">
                                    Food Services
                                </a>
                                <a href="/retail_product"
                                   class="block px-4 py-2 text-gray-700 hover:bg-red-50 hover:text-red-600 transition">
                                    Retail
                                </a>
                                <a href="/beverage"
                                   class="block px-4 py-2 text-gray-700 hover:bg-red-50 hover:text-red-600 transition">
                                    Beverages
                                </a>
                                <a href="/ecommerce"
                                   class="block px-4 py-2 text-gray-700 hover:bg-red-50 hover:text-red-600 transition">
                                    Ecommerce
                                </a>
                            </div>
                        </div>

                        <div class="relative group">
                            <button
                                class="text-gray-700 hover:text-red-600 font-bold flex items-center gap-1 pt-1 transition-colors duration-200 focus:outline-none">
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
                               class="text-gray-700 hover:text-red-600 font-bold flex items-center gap-1 pt-1 transition-colors duration-200">
                                Recipes
                            </a>
                        </div>

                        <div class="relative group">
                            <a href="/news_event"
                               class="text-gray-700 hover:text-red-600 font-bold flex items-center gap-1 pt-1 transition-colors duration-200">
                                Events
                            </a>
                        </div>

                        <div class="relative group">
                            <a href="/reach_us"
                               class="text-gray-700 hover:text-red-600 font-bold flex items-center gap-1 pt-1 transition-colors duration-200">
                                Reach Us
                            </a>
                        </div>

                        <div class="relative group">
                            <a href="/partnership"
                               class="text-gray-700 hover:text-red-600 font-bold flex items-center gap-1 pt-1 transition-colors duration-200">
                                Be Our Partners
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
