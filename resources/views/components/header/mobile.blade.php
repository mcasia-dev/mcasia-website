{{--Mobile View--}}
<header class="md:hidden {{ ($navState['home'] ?? false) ? 'fixed top-0 left-0 w-full' : 'sticky top-0 w-full' }} bg-white shadow-sm z-[200]">
    <div class="px-4 py-3">
        <div class="flex items-center justify-between gap-3">
            <a href="/" class="flex items-center shrink-0">
                <img src="{{ asset('images/McAsia_Black_Red_Logo.png') }}" alt="Logo" class="h-16 w-auto">
            </a>

            <button onclick="toggleMobileMenu()" class="text-2xl text-gray-700 leading-none shrink-0">
                <i id="mobileMenuIcon" class="fa-solid fa-bars transition-all duration-300"></i>
            </button>
        </div>

    </div>

    <nav id="mobileMenu"
        class="hidden opacity-0 -translate-y-2 transition-all duration-300 ease-out bg-white border-t shadow-lg overflow-y-auto max-h-screen">
        <ul class="flex flex-col text-gray-700 text-[15px]">
            <li><a href="/" class="block px-4 py-3 border-b {{ ($navState['home'] ?? false) ? 'text-red-600 font-semibold bg-red-50/60' : '' }}">Home</a></li>
            <li><a href="/our-story" class="block px-4 py-3 border-b {{ ($navState['ourStory'] ?? false) ? 'text-red-600 font-semibold bg-red-50/60' : '' }}">Our Story</a></li>

            <li class="border-b">
                <button onclick="toggleDropdown('mobileProductDropdown')"
                    class="w-full text-left px-4 py-3 flex justify-between items-center {{ ($navState['products'] ?? false) ? 'text-red-600 font-semibold bg-red-50/60' : '' }}">
                    <span class="flex items-center">
                        Our Products
                    </span>
                    <i class="fa-solid fa-chevron-down transition-transform" id="mobileProductDropdownArrow"></i>
                </button>

                <div id="mobileProductDropdown" class="hidden bg-gray-50 overflow-y-auto">
                    <ul class="flex flex-col divide-y divide-gray-100">
                        @foreach($products as $product)
                            <li class="ml-3 pl-3 px-4 py-2">
                                @if(!empty($product['subheader']))
                                    @php($productDropdownId = 'mobileProductSubheader' . $loop->index)
                                    <button onclick="toggleDropdown('{{ $productDropdownId }}')"
                                        class="w-full text-left text-gray-700 flex justify-between items-center hover:text-red-600">
                                        {{ $product['title'] }}
                                        <i class="fa-solid fa-chevron-down transition-transform"
                                            id="{{ $productDropdownId }}Arrow"></i>
                                    </button>

                                    <ul id="{{ $productDropdownId }}" class="hidden mt-1 pl-4">
                                        @foreach($product['subheader'] as $subhead)
                                            <li>
                                                <a href="{{ $subhead['url'] ?: '#' }}"
                                                    class="block py-1 text-sm text-gray-600 hover:text-red-600">
                                                    {{ $subhead['title'] }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @elseif(!empty($product['url']))
                                    <a href="{{ $product['url'] }}"
                                        class="block text-gray-700 hover:text-red-600">
                                        {{ $product['title'] }}
                                    </a>
                                @else
                                    <span class="block font-semibold text-gray-700">
                                        {{ $product['title'] }}
                                    </span>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </li>

            <li class="border-b">
                <button onclick="toggleDropdown('ourEdgeDropdown')"
                    class="w-full text-left px-4 py-3 flex justify-between items-center {{ ($navState['ourEdge'] ?? false) ? 'text-red-600 font-semibold bg-red-50/60' : '' }}">
                    Our Edge
                    <i class="fa-solid fa-chevron-down transition-transform" id="ourEdgeDropdownArrow"></i>
                </button>
                <ul id="ourEdgeDropdown" class="hidden flex flex-col bg-gray-50">
                    @foreach($edges as $edge)
                        <li>
                            <a href="{{ $edge['url'] }}" class="block px-6 py-2 hover:bg-red-50 hover:text-red-600">
                                {{ $edge['title'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>

            <li class="border-b">
                <button onclick="toggleDropdown('ourSalesAvenue')"
                    class="w-full text-left px-4 py-3 flex justify-between items-center {{ ($navState['salesAvenue'] ?? false) ? 'text-red-600 font-semibold bg-red-50/60' : '' }}">
                    Sales Avenue
                    <i class="fa-solid fa-chevron-down transition-transform" id="ourSalesAvenueArrow"></i>
                </button>
                <ul id="ourSalesAvenue" class="hidden flex flex-col bg-gray-50">
                    <li>
                        <button onclick="toggleDropdown('ourSalesAvenueFoodServices')"
                            class="w-full text-left px-6 py-2 flex justify-between items-center hover:bg-red-50 hover:text-red-600">
                            Food Services
                            <i class="fa-solid fa-chevron-down transition-transform"
                                id="ourSalesAvenueFoodServicesArrow"></i>
                        </button>
                        <ul id="ourSalesAvenueFoodServices" class="hidden flex flex-col bg-gray-100">
                            <li>
                                <a href="/beverage" class="block px-8 py-2 hover:bg-red-50 hover:text-red-600">
                                    Beverages
                                </a>
                            </li>
                            <li>
                                <a href="/foodservice_solutions"
                                    class="block px-8 py-2 hover:bg-red-50 hover:text-red-600">
                                    Food
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="/retail_product" class="block px-6 py-2 hover:bg-red-50 hover:text-red-600">
                            Retail
                        </a>
                    </li>
                    <li>
                        <a href="/ecommerce" class="block px-6 py-2 hover:bg-red-50 hover:text-red-600">
                            Ecommerce
                        </a>
                    </li>
                </ul>
            </li>

            <li class="border-b">
                <button onclick="toggleDropdown('ourCatalog')"
                    class="w-full text-left px-4 py-3 flex justify-between items-center {{ ($navState['catalog'] ?? false) ? 'text-red-600 font-semibold bg-red-50/60' : '' }}">
                    Catalog
                    <i class="fa-solid fa-chevron-down transition-transform" id="ourCatalogArrow"></i>
                </button>
                <ul id="ourCatalog" class="hidden flex flex-col bg-gray-50">
                    <li>
                        <a href="/product_catalog" class="block px-6 py-2 hover:bg-red-50 hover:text-red-600">
                            Product Catalog
                        </a>
                    </li>
                    <li>
                        <a href="/menu_ideas_with_products" class="block px-6 py-2 hover:bg-red-50 hover:text-red-600">
                            Menu Ideas
                        </a>
                    </li>
                </ul>
            </li>

            <li><a href="/recipes" class="block px-4 py-3 border-b {{ ($navState['recipes'] ?? false) ? 'text-red-600 font-semibold bg-red-50/60' : '' }}">Recipes</a></li>
            <li><a href="/news_event" class="block px-4 py-3 border-b {{ ($navState['events'] ?? false) ? 'text-red-600 font-semibold bg-red-50/60' : '' }}">Events</a></li>
            <li><a href="/reach-us" class="block px-4 py-3 border-b {{ ($navState['reachUs'] ?? false) ? 'text-red-600 font-semibold bg-red-50/60' : '' }}">Reach Us</a></li>
            <li><a href="/partnership" class="block px-4 py-3 border-b {{ ($navState['partnership'] ?? false) ? 'text-red-600 font-semibold bg-red-50/60' : '' }}">Be Our Partners</a></li>
            <li><a href="https://mcasiamart.ph" class="block px-4 py-3 border-b">Shop Online</a></li>
        </ul>
    </nav>
</header>
