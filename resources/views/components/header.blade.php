<style>
    a {
        underline: none !important;
    }

    /* Header layout */
    .header-content {
        height: 96px;
        padding: 12px 0;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .header-content.hidden {
        display: none !important;
    }

    .header-content.shrink {
        height: 64px;
        padding: 6px 0;
    }

    /* Logo */
    .header-logo {
        max-height: 64px;
        transition: max-height 0.3s ease;
    }

    .header-content.shrink .header-logo {
        max-height: 42px;
    }

    /* Nav text */
    .button-navigation a,
    .button-navigation button {
        font-size: 14px;
        margin-top: 6px;
        line-height: 1.2;
        text-decoration-line: underline;
        text-decoration-thickness: 2px;
        text-underline-offset: 6px;
    }

    .header-content.shrink .header-nav {
        margin-top: 0;
    }

    .nav-text {
        font-size: 14px;
        margin-top: 8px;
    }

    .navigation-logo {
        margin-bottom: -4px;
    }
</style>

@php
    $brands = [
        ['name' => 'ABC', 'src' => asset('images/home/our-brands/abc.png'), 'url' => 'abc'],
        ['name' => 'Daisho', 'src' => asset('images/home/our-brands/daisho.png'), 'url' => 'daisho'],
        ['name' => 'Oxford', 'src' => asset('images/home/our-brands/oxford.png'), 'url' => 'oxford'],
        ['name' => 'Hengs', 'src' => asset('images/home/our-brands/hengs.png'), 'url' => 'heng'],
        ['name' => 'Milcasa', 'src' => asset('images/home/our-brands/milcasa.png'), 'url' => 'milcasa'],
        ['name' => 'Otafuku', 'src' => asset('images/home/our-brands/otafuku.png'), 'url' => 'otafuku'],
        ['name' => 'Sea Chef', 'src' => asset('images/home/our-brands/seachef.png'), 'url' => 'seachef'],
        ['name' => 'Ummami', 'src' => asset('images/home/our-brands/um-mami.png'), 'url' => 'ummami'],
        ['name' => 'King Chef', 'src' => asset('images/home/our-brands/kingchef.png'), 'url' => 'kingchef'],
        ['name' => 'Niigata', 'src' => asset('images/home/our-brands/niigata.png'), 'url' => null],
        ['name' => 'Ozaki', 'src' => asset('images/home/our-brands/ozaki.png'), 'url' => 'ozaki'],
        ['name' => 'Marukome', 'src' => asset('images/home/our-brands/marukome.jpg'), 'url' => null],
        ['name' => 'Somi', 'src' => asset('images/home/our-brands/somi.jpg'), 'url' => null],
        ['name' => 'Hamasaen', 'src' => asset('images/home/our-brands/hamasa-en.png'), 'url' => 'hamasaen'],
        ['name' => 'LongBeach', 'src' => asset('images/home/our-brands/longbeach.png'), 'url' => 'longbeach'],
        ['name' => 'Yamasa', 'src' => asset('images/home/our-brands/yamasa.png'), 'url' => null],
    ];
@endphp
<!-- Search Bar Modal -->
<div id="myModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white w-11/12 max-w-md p-6 rounded-lg shadow-lg relative">
        <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-600 text-2xl font-bold">
            &times;
        </button>

        <h2 class="text-xl font-semibold mb-4 text-center">Search</h2>

        <div class="flex items-center border border-gray-300 rounded overflow-hidden mb-4">
            <span class="px-3 text-gray-500">
                <i class="fa-solid fa-magnifying-glass"></i>
            </span>
            <input type="text" name="query" class="w-full px-3 py-2 focus:outline-none"
                placeholder="Type to search..." autofocus>
        </div>

        <div class="flex justify-end gap-2">
            <button onclick="closeModal()" class="px-4 py-2 bg-gray-300 rounded">
                Close
            </button>
            <button type="submit" form="searchForm" class="px-4 py-2 bg-red-600 text-white rounded">
                Search
            </button>
        </div>
    </div>
</div>

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
                            </button>

                            <div
                                class="absolute left-0 top-full mt-0 hidden group-hover:grid grid-cols-4 gap-2 p-2 w-[600px] max-h-80 overflow-y-auto bg-white shadow-lg rounded-lg border border-gray-100 z-50">
                                @foreach ($brands as $brand)
                                    @if ($brand['url'] != null)
                                        <a href="{{ $brand['url'] }}"
                                            class="block px-4 py-1 text-[12px] text-gray-700 hover:bg-red-50 hover:text-red-600 transition">
                                            <img src="{{ $brand['src'] }}" alt="{{ $brand['name'] }}"
                                                class="w-[100px] h-[50px] object-contain">
                                        </a>
                                    @else
                                        <div
                                            class="block px-4 py-1 text-[12px] text-gray-700 hover:bg-red-50 hover:text-red-600 transition">
                                            <img src="{{ $brand['src'] }}" alt="{{ $brand['name'] }}"
                                                class="w-[100px] h-[50px] object-contain">
                                        </div>
                                    @endif
                                @endforeach
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
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <div
                                class="absolute left-0 top-full hidden group-hover:block bg-white shadow-lg rounded-lg mt-0 w-60 border border-gray-100 z-50">
                                <a href="/driven_innovation"
                                    class="block px-4 py-2 text-gray-700 hover:bg-red-50 hover:text-red-600 transition">
                                    Driven by Innovation
                                </a>
                                <a href="/committed_quality_safety"
                                    class="block px-4 py-2 text-gray-700 hover:bg-red-50 hover:text-red-600 transition">
                                    Committed to Quality & Safety
                                </a>
                                <a href="/reliable_facilities"
                                    class="block px-4 py-2 text-gray-700 hover:bg-red-50 hover:text-red-600 transition">
                                    Built on Reliable Facilities
                                </a>
                                <a href="/distribution_network"
                                    class="block px-4 py-2 text-gray-700 hover:bg-red-50 hover:text-red-600 transition">
                                    Distribution Network
                                </a>
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
                                        d="M19 9l-7 7-7-7" />
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
                                        d="M19 9l-7 7-7-7" />
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

<header class="lg:hidden fixed top-0 left-0 w-full bg-white shadow-sm z-[200]">
    <div class="flex items-center justify-between px-4 py-3">
        <a href="/" class="flex items-center">
            <img src="{{ asset('images/McAsia_Black_Red_Logo.png') }}" alt="Logo" class="h-8 w-auto">
        </a>

        <button onclick="toggleDropdown('mobileProductDropdown')"
            class="flex items-center text-gray-700 px-3 py-2 bg-gray-100 rounded hover:bg-gray-200 transition">
            <img src="{{ asset('images/check_list_pen_ico.png') }}" alt="Product List" class="w-4 h-4 mr-1">
            <i class="fa-solid fa-chevron-down ml-1 transition-transform" id="mobileProductDropdownArrow"></i>
        </button>

        <div id="mobileProductDropdown"
            class="hidden absolute top-full left-0 right-0 bg-white shadow-lg max-h-auto h-auto overflow-y-auto z-50">
            <ul class="grid grid-cols-4 items-center justify-center">me
                @foreach ($brands as $brand)
                    @if ($brand['url'] != null)
                        <li>
                            <a href="{{ $brand['url'] }}"
                                class="flex items-center px-4 py-2 hover:bg-red-50 hover:text-red-600">
                                <img src="{{ $brand['src'] }}" alt="{{ $brand['url'] }}"
                                    class="w-16 h-auto object-contain mr-2">
                            </a>
                        </li>
                    @else
                        <li>
                            <div class="flex items-center px-4 py-2 hover:bg-red-50 hover:text-red-600">
                                <img src="{{ $brand['src'] }}" alt="{{ $brand['url'] }}"
                                    class="w-16 h-auto object-contain mr-2">
                            </div>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>

        <div class="flex items-center gap-4">
            <button onclick="toggleMobileMenu()" class="text-2xl text-gray-700">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
    </div>

    <nav id="mobileMenu" class="hidden bg-white border-t shadow-lg">
        <ul class="flex flex-col text-gray-700 text-[15px]">
            <li><a href="/" class="block px-4 py-3 border-b">Home</a></li>
            <li><a href="/about_us" class="block px-4 py-3 border-b">Our Story</a></li>

            <li class="border-b">
                <button onclick="toggleDropdown('ourEdgeDropdown')"
                    class="w-full text-left px-4 py-3 flex justify-between items-center">
                    Our Edge
                    <i class="fa-solid fa-chevron-down transition-transform" id="ourEdgeDropdownArrow"></i>
                </button>
                <ul id="ourEdgeDropdown" class="hidden flex flex-col bg-gray-50">
                    <li>
                        <a href="/driven_innovation" class="block px-6 py-2 hover:bg-red-50 hover:text-red-600">
                            Driven by Innovation
                        </a>
                    </li>
                    <li>
                        <a href="/committed_quality_safety"
                            class="block px-6 py-2 hover:bg-red-50 hover:text-red-600">
                            Committed to Quality & Safety
                        </a>
                    </li>
                    <li>
                        <a href="/reliable_facilities" class="block px-6 py-2 hover:bg-red-50 hover:text-red-600">
                            Built on Reliable Facilities
                        </a>
                    </li>
                    <li>
                        <a href="/distribution_network" class="block px-6 py-2 hover:bg-red-50 hover:text-red-600">
                            Distribution Network
                        </a>
                    </li>
                </ul>
            </li>

            <li class="border-b">
                <button onclick="toggleDropdown('ourSalesAvenue')"
                    class="w-full text-left px-4 py-3 flex justify-between items-center">
                    Sales Avenue
                    <i class="fa-solid fa-chevron-down transition-transform" id="ourSalesAvenueArrow"></i>
                </button>
                <ul id="ourSalesAvenue" class="hidden flex flex-col bg-gray-50">
                    <li>
                        <a href="/foodservice_solutions" class="block px-6 py-2 hover:bg-red-50 hover:text-red-600">
                            Food Services
                        </a>
                    </li>
                    <li>
                        <a href="/retail_product" class="block px-6 py-2 hover:bg-red-50 hover:text-red-600">
                            Retail
                        </a>
                    </li>
                    <li>
                        <a href="/beverage" class="block px-6 py-2 hover:bg-red-50 hover:text-red-600">
                            Beverages
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
                    class="w-full text-left px-4 py-3 flex justify-between items-center">
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
                        <a href="/menu_ideas_with_products"
                            class="block px-6 py-2 hover:bg-red-50 hover:text-red-600">
                            Menu Ideas
                        </a>
                    </li>
                </ul>
            </li>

            <li><a href="/recipes" class="block px-4 py-3 border-b">Recipes</a></li>
            <li><a href="/reach_us" class="block px-4 py-3 border-b">Reach Us</a></li>
            <li><a href="/partnership" class="block px-4 py-3 border-b">Be Our Partner</a></li>
            <li><a href="https://mcasiamart.ph" class="block px-4 py-3 border-b">Shop Online</a></li>
        </ul>
    </nav>
</header>

<script>
    const modal = document.getElementById('myModal');

    function openModal() {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeModal() {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    modal.addEventListener('click', function(e) {
        if (e.target === modal) closeModal();
    });
</script>

<script>
    window.addEventListener('scroll', function() {
        const header = document.querySelector('.header-content');

        if (window.scrollY > 120) {
            header.classList.add('shrink');
        } else {
            header.classList.remove('shrink');
        }
    });
</script>

<script>
    function toggleMobileMenu() {
        const menu = document.getElementById('mobileMenu');
        menu.classList.toggle('hidden');
    }
</script>

<script>
    function toggleDropdown(id) {
        const dropdown = document.getElementById(id);
        const arrow = document.getElementById(id + 'Arrow');
        dropdown.classList.toggle('hidden');
        arrow.classList.toggle('rotate-180');
    }
</script>
