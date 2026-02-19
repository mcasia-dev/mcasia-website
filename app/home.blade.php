@extends('layouts.app')
@section('title', 'McAsia')
@section('content')


@push('styles')
@vite('resources/css/autoscroll.css')
@endpush





  
<!-- First Section: Main Page -->
<div class="section h-[77vh] flex items-center justify-center text-white relative px-4 md:px-6
    bg-gradient-to-r from-red-300/70 via-red-200/50 to-red-100/30 bg-[length:239%_630%] animate-gradient"
    id="section1">


     <div class="flex flex-col md:flex-row items-center justify-between max-w-6xl w-full relative z-10">

        <!-- Left Column: Logo + Text + Buttons -->
        <div class="w-full md:w-4/5 flex flex-col items-center text-center mb-10 md:mb-0 z-10">

            <!-- Logo -->
            <img src="{{ asset('images/McAsia_Black_Red_Logo.png') }}" 
                 alt="Logo" 
                 class="w-64 md:w-70 h-auto mb-6">

            <!-- Heading -->
            <h1 class="text-4xl sm:text-4xl md:text-7xl font-chendolle mb-4 text-red-600 leading-snug">
                Home to your<br>
                Asian Cravings
            </h1>

            <!-- Buttons -->
            <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 mt-6">
                <a href="{{ route('consumer_products') }}" 
                   class="px-6 py-3 bg-red-400 text-white font-semibold rounded-lg hover:bg-red-700 transition text-center">
                    Discover Consumer Products
                </a>
                <a href="{{ route('foodservice_solutions') }}" 
                   class="px-6 py-3 bg-red-400 text-white font-semibold rounded-lg border border-red-600 hover:bg-red-700 transition text-center">
                    See Foodservice Solutions
                </a>
            </div>

        </div>

        <!-- Right Column: Background Slides -->
        <div class="w-full md:w-1/2 relative h-64 sm:h-80 md:h-[500px] flex items-center justify-center mt-6 md:mt-0">
            <div class="bg-slide active absolute inset-0 bg-cover bg-center rounded-xl shadow-xl" style="background-image: url('{{ asset('images/SAUCES.png') }}');"></div>
            <div class="bg-slide absolute inset-0 bg-cover bg-center rounded-xl shadow-xl" style="background-image: url('{{ asset('images/SOUP BASE.jpg') }}');"></div>
            <div class="bg-slide absolute inset-0 bg-cover bg-center rounded-xl shadow-xl" style="background-image: url('{{ asset('images/CANNED GOODS.jpg') }}');"></div>
        </div>

    </div>
</div>






<!-- Second Section (Compressed, Auto Height) -->
<div class="section flex items-center justify-center relative text-white px-4 md:px-6 py-12" 
     id="section2"
     style="background-size: cover; background-position: center;">
    
    <!-- Dark Overlay -->
    <div class="absolute inset-0 bg-black/60"></div>
    
    <div class="flex flex-col md:flex-row items-center justify-between w-full relative z-10">

      <!-- Left Column (Text) -->
<div class="w-full md:w-1/2 flex flex-col justify-center text-center md:text-left p-2 md:pl-16">
    <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-chendolle mb-4 text-red-500 drop-shadow-md leading-tight">
        Who We Are
    </h2>
    <p class="text-base sm:text-lg md:text-xl lg:text-2xl mb-4 text-white/95 leading-relaxed">
        McAsia Foodtrade Corporation is a leading importer, distributor, and brand partner of authentic Asian food and beverage products in the Philippines.
    </p>
<a href="/about_us" 
   class="mt-6 w-48 px-6 py-2 bg-red-600 text-white text-base md:text-lg font-semibold rounded-lg shadow-md hover:bg-red-700 transition inline-block text-center">
    About Us
</a>
</div>

<!-- Right Column (Image) -->
<div class="w-full md:w-1/2 flex items-center justify-center relative mt-4 md:mt-0">
    
    <!-- Overlay Highlight Box -->
    <div class="absolute inset-y-0 right-0 w-full bg-gradient-to-l from-red-900/70 to-transparent"></div>
    
    <!-- Highlighted Image -->
    <img src="{{ asset('images/LOGO.jpg') }}" 
         alt="Highlighted Food" 
         class="relative w-105 max-w-lg object-contain shadow-xl transform hover:scale-105 transition duration-500">
</div>


    </div>
</div>








<!-- 3rd Section Products & Brands Showcase -->
<div class="section min-h-screen flex flex-col items-center justify-center text-white px-4 md:px-6 relative"
     id="section3"
     style="background: linear-gradient(135deg, #1f2937 0%, #111827 100%);"
     x-data="{
        openModal: false,
        activeProduct: null,
        currentIndex: 0,
        interval: null,
        thumbIndex: 0,
        selectedImage: null,
        products: [

        { name: 'Beverages', description: '', images: [
        { src: 'images/PER CATEGORY/BEVERAGE.png', description: '' },
        { src: 'images/BEVERAGE/1.png', description: 'Blue Mountain Blend Coffee 10Sx16G' },
        { src: 'images/BEVERAGE/2.png', description: 'LONGBEACH 100% BUTTERFLY PEA POWDER 100 G' },
        { src: 'images/BEVERAGE/3.png', description: 'LONGBEACH ALMOND SYRUP 740 ML' },
        { src: 'images/BEVERAGE/4.jpg', description: 'LONGBEACH BANANA PUREE SYRUP 900 ML' },
        { src: 'images/BEVERAGE/5.jpg', description: 'LONGBEACH BLACK TEA POWDER 900 G' },
        { src: 'images/BEVERAGE/6.png', description: 'LONGBEACH BROWN SUGAR (KUROMISU) SYRUP 740 ML' },
        { src: 'images/BEVERAGE/7.png', description: 'LONGBEACH CARAMEL SAUCE 900 ML' },
        { src: 'images/BEVERAGE/8.png', description: 'LONGBEACH MACADAMIA SYRUP 740 ML' },
        { src: 'images/BEVERAGE/9.png', description: 'LONGBEACH MASCAPONE CHEESE FOAM POWDER 400 G' },
        { src: 'images/BEVERAGE/10.png', description: 'LONGBEACH MATCHA SAUCE 900 ML' },
        { src: 'images/BEVERAGE/11.jpg', description: 'LONGBEACH MOJITO SYRUP 740 ML' },
        { src: 'images/BEVERAGE/12.png', description: 'LONGBEACH TAMARIND SYRUP 740ML' },
        { src: 'images/BEVERAGE/13.png', description: 'LONGBEACH VANILLA SYRUP 740 ML' },
        { src: 'images/BEVERAGE/14.png', description: 'LONGBEACH VANILLA ZERO CALORIES SYRUP 740 ML' },
        { src: 'images/BEVERAGE/15.png', description: 'Meet U Classic Coffee 3 in 1 10SX20G' }
    ] },

    { name: 'Canned Goods', description: '', images: [
        { src: 'images/CANNED GOODS.jpg', description: '' },
        { src: 'images/CANNED GOODS/1.png', description:  'KING CHEF Canned Straw Mushroom in Brine EASY OPEN' },
        { src: 'images/CANNED GOODS/2.jpg', description:  'KING CHEF Canned Cream Style Corn 425G' },
        { src: 'images/CANNED GOODS/3.jpg', description:  'KING CHEF Canned Mushroom Pieces and Stems 425G' },
        { src: 'images/CANNED GOODS/4.jpg', description:  'KING CHEF Canned Mushroom whole 425G' },
        { src: 'images/CANNED GOODS/5.jpg', description:  'KING CHEF Canned Shiitake Mushroom Whole 284G' },
        { src: 'images/CANNED GOODS/6.jpg', description:  'KING CHEF Canned Straw Mushroom Whole 425G' },
        { src: 'images/CANNED GOODS/7.jpg', description:  'KING CHEF Canned Water Chesnut Whole 567G' },
        { src: 'images/CANNED GOODS/8.png', description:  'KING CHEF Canned Whole Kernel Corn 410G' },
        { src: 'images/CANNED GOODS/9.jpg', description:  'KING CHEF Canned Whole Kernel Corn 425G' },
        { src: 'images/CANNED GOODS/10.jpg', description: 'KING CHEF Canned Whole Kernel Corn Easy Open 425G' },
        { src: 'images/CANNED GOODS/11.jpg', description: 'KING CHEF Canned YOUNG CORN CUT 425G' },
        { src: 'images/CANNED GOODS/12.jpg', description: 'KING CHEF Canned YOUNG CORN Whole 425G' }
    ] },

    { name: 'Frozen', description: '', images: [
        { src: 'images/PER CATEGORY/FROZEN.jpg', description: '' },
        { src: 'images/FROZEN/1.png', description: 'SEA CHEF CRABSTICK 1KG' },
        { src: 'images/FROZEN/2.png', description: 'SEA CHEF CRABSTICK FOR HOT POT 1KG' },
        { src: 'images/FROZEN/3.png', description: 'SEA CHEF FISH TOFU SQUARE 500G' },
        { src: 'images/FROZEN/4.jpg', description: 'SEA CHEF FROZEN SEAFOOD PANCAKE 200G' },
        { src: 'images/FROZEN/5.png', description: 'SEA CHEF SHRIMP VN HLSO 26_30 1.8KG' },
        { src: 'images/FROZEN/6.jpg', description: 'Sea Chef Shrimp Vn Pdto 41_50 Iqf 1Kg' },
        { src: 'images/FROZEN/7.jpg', description: 'Sea Chef Tofu Stick Cheesy 1Kg' },
        { src: 'images/FROZEN/8.jpg', description: 'UM-MAMI ARABIKI SAUSAGE 400g' },
        { src: 'images/FROZEN/9.jpg', description: 'Um-Mami Unagi Kabayaki 200G' }
    ] },

    { name: 'Noodles', description: '', images: [
        { src: 'images/PER CATEGORY/NOODLES.jpg', description: '' },
        { src: 'images/NOODLES/1.png', description: '3 STAR ELEPHANT RICE NOODLE 2MM 400G' },
        { src: 'images/NOODLES/2.png', description: '3 STAR ELEPHANT RICE NOODLE 3MM 400G' },
        { src: 'images/NOODLES/3.png', description: '3 STAR ELEPHANT RICE NOODLE 5MM 400G' },
        { src: 'images/NOODLES/4.png', description: 'KING CHEF PREMIUM SOTANGHON LONGKOU VERMICELLI 500G' },
        { src: 'images/NOODLES/5.png', description: 'KING CHEF SUPERIOR SOTANGHON LONGKOU VERMICELLI 250G' }
    ] },

    { name: 'Seasonings', description: '', images: [
        { src: 'images/PER CATEGORY/HENGS.jpg', description: '' },
        { src: 'images/SEASONINGS/1.png', description: 'HENGS FIVE SPICES FRIED CHICKEN MIX 50G' },
        { src: 'images/SEASONINGS/2.png', description: 'HENGS GOLDEN SALTED EGG POWDER 120G' },
        { src: 'images/SEASONINGS/3.png', description: 'HENGS Prawn Stock 500G' },
        { src: 'images/SEASONINGS/4.png', description: 'HENGS Salt Baked Chicken herbs & spices 25G' }
    ] },

    { name: 'Snacks', description: '', images: [
        { src: 'images/PER CATEGORY/SNACKS.png', description: '' },
        { src: 'images/SNACKS/1.png', description: 'OXFORD BRIGHTS BUTTER CREAM 125G' },
        { src: 'images/SNACKS/2.png', description: 'OXFORD BRIGHTS COFFEE CREAM 125G' },
        { src: 'images/SNACKS/3.png', description: 'OXFORD CHEESE PUFF SANDWICH 190G' },
        { src: 'images/SNACKS/4.png', description: 'OXFORD CHOCOLATE PUFF SANDWICH 190G' },
        { src: 'images/SNACKS/5.png', description: 'OXFORD CORN CRACKERS BISCUITS 150G' },
        { src: 'images/SNACKS/6.png', description: 'OXFORD LEMON PUFF SANDWICH 190G' },
        { src: 'images/SNACKS/7.png', description: 'OXFORD SUGAR CRACKERS BISCUITS 400G' },
        { src: 'images/SNACKS/8.png', description: 'OXFORD VEGE CRACKERS BISCUITS 400G' }
    ] },

    { name: 'Sauces & Condiments', description: '', images: [
        { src: 'images/SAUCES.png', description: '' },
        { src: 'images/SAUCES AND CONDIMENTS/1.png', description: 'ABC CHILI SAUCE SAMBAL ASLI' },
        { src: 'images/SAUCES AND CONDIMENTS/2.png', description: 'ABC HOT AND SWEET CHILI SAUCE 335ML' },
        { src: 'images/SAUCES AND CONDIMENTS/3.png', description: 'ABC SWEET SAUCE 620ML' },
        { src: 'images/SAUCES AND CONDIMENTS/4.png', description: 'DAISHO MENTSUYU SAUCE (YUZU FLAVOR) 185G' },
        { src: 'images/SAUCES AND CONDIMENTS/5.jpg', description: 'DAISHO YAKINIKU WASABI SAUCE 180G' },
        { src: 'images/SAUCES AND CONDIMENTS/6.png', description: 'DAISHO YAKINIKUDORI NINNIKU SHOYU AJI 235G' },
        { src: 'images/SAUCES AND CONDIMENTS/7.png', description: 'DAISHO YAKITORI SAUCE 180G' },
        { src: 'images/SAUCES AND CONDIMENTS/8.png', description: 'DAISHO YUZU DRESSING 150G' },
        { src: 'images/SAUCES AND CONDIMENTS/9.jpg', description: 'OTAFUKU KATSUMESHI SAUCE 1150G' },
        { src: 'images/SAUCES AND CONDIMENTS/10.jpg', description: 'OTAFUKU KIMCHI SAUCE 590G' },
        { src: 'images/SAUCES AND CONDIMENTS/11.jpg', description: 'OTAFUKU OKONOMIYAKI SAUCE 300G' },
        { src: 'images/SAUCES AND CONDIMENTS/12.jpg', description: 'OTAFUKU TAKOYAKI SAUCE 2.1KG' },
        { src: 'images/SAUCES AND CONDIMENTS/13.jpg', description: 'Otafuku Takoyaki Sauce 300G' },
        { src: 'images/SAUCES AND CONDIMENTS/14.jpg', description: 'OTAFUKU YAKISOBA SAUCE 2.2KG' },
        { src: 'images/SAUCES AND CONDIMENTS/15.jpg', description: 'OTAFUKU YAKISOBA SAUCE 300G' },
        { src: 'images/SAUCES AND CONDIMENTS/16.jpg', description: 'OTAFUKU YUZU PONZU SAUCE 300ML' }
    ] },



    { name: 'Soup Base', description: '', images: [
        { src: 'images/PER CATEGORY/SOUP BASE.jpg', description: '' }
    ] },




    { name: 'Rice', description: '', images: [
        { src: 'images/PER CATEGORY/NIIGATA.jpg', description: '' }
    ] }

],

        startSlideshow() {
            this.interval = setInterval(() => {
                this.currentIndex = (this.currentIndex + 1) % Math.ceil(this.products.length / 3);
            }, 5000);
        },
        stopSlideshow() { clearInterval(this.interval); }
     }"
     x-init="startSlideshow()">

    <!-- Section Title -->
    <h1 class="text-4xl sm:text-5xl md:text-6xl font-chendolle tracking-wide mb-12 text-center text-red-500 drop-shadow-lg">
        Products & Brands
    </h1>

    <!-- Showcase Slider -->
    <div class="relative w-full max-w-7xl h-[400px] md:h-[300px] overflow-hidden rounded-2xl shadow-2xl">

        <!-- Sliding Wrapper -->
        <div class="flex transition-transform duration-700 ease-in-out h-full"
             :style="`transform: translateX(-${currentIndex * 100}%)`">

            <!-- Each batch is a group of 3 -->
            <template x-for="batch in Math.ceil(products.length / 3)" :key="batch">
                <div class="flex-shrink-0 w-full flex h-full">
                    <template x-for="product in products.slice((batch-1)*3, (batch-1)*3 + 3)" :key="product.name">
                        <div class="w-1/3 flex flex-col items-center justify-between bg-gray-800/80 p-4 cursor-pointer h-full"
                             @click="activeProduct = product; openModal = true; thumbIndex = 0; selectedImage = product.images[0]">
                            
                            <!-- Product Image -->
                            <div class="flex-grow flex items-center justify-center">
                                <img :src="product.images[0].src" :alt="product.name"
                                     class="max-h-[70%] object-contain rounded-xl shadow-lg">
                            </div>

                            <!-- Product Text -->
                            <div class="mt-4 text-center">
                                <h2 class="text-xl md:text-2xl font-bold text-white mb-1" x-text="product.name"></h2>
                                <p class="text-sm text-gray-300" x-text="product.description"></p>
                            </div>
                        </div>
                    </template>
                </div>
            </template>
        </div>

        <!-- Controls -->
        <button @click="currentIndex = (currentIndex - 1 + Math.ceil(products.length/3)) % Math.ceil(products.length/3)"
                class="absolute left-3 top-1/2 -translate-y-1/2 bg-black/50 p-3 rounded-full text-white hover:bg-red-600 transition">‹</button>
        <button @click="currentIndex = (currentIndex + 1) % Math.ceil(products.length/3)"
                class="absolute right-3 top-1/2 -translate-y-1/2 bg-black/50 p-3 rounded-full text-white hover:bg-red-600 transition">›</button>
    </div>

    <!-- Modal -->
    <div x-show="openModal"
         x-transition.opacity
         class="fixed inset-0 flex items-center justify-center bg-black/80 z-50 p-4"
         @click.self="openModal = false">

        <div class="bg-gray-900 rounded-2xl w-full max-w-6xl h-[85vh] p-6 relative overflow-y-auto">
            <button @click="openModal = false"
                    class="absolute top-4 right-6 text-gray-400 hover:text-red-500 text-3xl">✕</button>

            <!-- Two-column layout: Image left, Description right -->
            <div class="flex flex-col md:flex-row gap-6 items-start">
                <!-- Main Image -->
                <div class="flex-1 flex justify-center">
                    <img :src="selectedImage?.src" class="w-full max-h-[400px] object-contain rounded-lg shadow-lg">
                </div>

                <!-- Description/Text -->
                <div class="flex-1 flex flex-col justify-start">
                    <h2 class="text-3xl font-bold text-red-500 mb-4" x-text="activeProduct?.name"></h2>
                    <p class="text-gray-300 mb-4 text-lg" x-text="selectedImage?.description"></p>
                    <p class="text-gray-300 text-lg" x-text="activeProduct?.description"></p>
                </div>
            </div>

            <!-- Thumbnails below everything -->
            <div class="mt-6">
                <h3 class="text-xl font-semibold text-white mb-3">More Images</h3>
                <div class="flex items-center">
                    <button @click="thumbIndex = Math.max(thumbIndex - 5, 0)"
                            class="p-2 bg-black/50 rounded-full text-white hover:bg-red-600 transition mr-3">‹</button>
                    <div class="flex space-x-4 w-full justify-center">
                        <template x-for="(img, idx) in activeProduct?.images.slice(thumbIndex, thumbIndex + 5)" :key="idx">
                            <img :src="img.src"
                                 @click="selectedImage = img"
                                 class="w-32 h-32 object-contain rounded-lg shadow-md cursor-pointer transition hover:scale-105"
                                 :class="selectedImage === img ? 'ring-4 ring-red-500' : ''">
                        </template>
                    </div>
                    <button @click="thumbIndex = Math.min(thumbIndex + 5, activeProduct.images.length - 5)"
                            class="p-2 bg-black/50 rounded-full text-white hover:bg-red-600 transition ml-3">›</button>
                </div>
            </div>

        </div>
    </div>
</div>










<!-- Section 4: Recipes Showcase -->
<div class="section bg-gradient-to-br from-red-50 via-orange-100 to-yellow-50 py-24" id="section4" x-data="{ open: false, recipe: null }">
  <div class="w-full max-w-7xl mx-auto px-6">
    <h1 class="text-4xl sm:text-5xl md:text-6xl font-chendolle mb-16 text-center text-red-600">
      Recipes
    </h1>

    @php
      $recipes = [

        [
          'image' => 'images/RECIPE/1.jpg',
          'title' => 'MIXED SEA FOOD',
          'videoEmbed' => 'https://www.youtube.com/embed/JYHa_sgQVCg?si=a20Ryq25jNjy8TD7',
          'ingredients' => [
            ['name' => '1 Pack of Lobo Chinese Five Spice Blend Powder', 'img' => 'images/RECIPE/SUSHI/1.png'],
            ['name' => '1 kl. Marble Potatoes', 'img' => 'images/RECIPE/SUSHI/2.png'],
            ['name' => '1 Pack Hungarian Sausage', 'img' => 'images/RECIPE/SUSHI/3.png'],
            ['name' => '3 Pcs. Fresh Corn, cut in three', 'img' => 'images/RECIPE/SUSHI/5.png'],
            ['name' => '4 pcs crabs, cut into 2', 'img' => 'images/RECIPE/SUSHI/6.png'],
            ['name' => '500g Sea Chef Shrimp, Peeled and Deveined', 'img' => 'images/RECIPE/SUSHI/8.png'],
            ['name' => '1/4 Cup Garlic', 'img' => 'images/RECIPE/SUSHI/8.png'],
            ['name' => '1 lemon/lime', 'img' => 'images/RECIPE/SUSHI/8.png'],
            ['name' => '1 Onion', 'img' => 'images/RECIPE/SUSHI/8.png'],
            ['name' => 'Salt and pepper to taste', 'img' => 'images/RECIPE/SUSHI/8.png'],
          ],
          'instructions' => [
            'Boil 5L of water over medium high heat and add the Lobo chinese Five Spice blend powder',
            'Add salt, pepper, marble potatoes, hungarian sausage, lemon, onions and garlic. Cover and boil for 10 minutes',
            'Add corn and cook for 5 minutes',
            'Add Crab and cook for 5 minutes',
            'Add Sea Chef Shrimp, cook for another 3 to 4 minutes.',
            'Drain off water and pour the contents in a serving tray.'
          ]
        ],

        [
          'image' => 'images/RECIPE/2.jpg',
          'title' => 'PORK ADOBO',
          'videoEmbed' => 'https://www.youtube.com/embed/9Dty-_sEHy4?si=fO0Y5joZenBLBHhk',
          'ingredients' => [
            ['name' => '2 Lbs Pork Belly',                        'img' => 'images/RECIPE/HOTPOT/1.png'],
            ['name' => '2 tbsp garlic minced or crushed',         'img' => 'images/RECIPE/HOTPOT/2.png'],
            ['name' => '2 pcs bay leaf',                          'img' => 'images/RECIPE/HOTPOT/3.jpg'],
            ['name' => '4 tbsp vinegar',                          'img' => 'images/RECIPE/HOTPOT/5.jpg'],
            ['name' => '1/2 cup kikkoman soy sauce Koikuchi',     'img' => 'images/RECIPE/HOTPOT/6.png'],
            ['name' => '1 tbsp peppercorn',                       'img' => 'images/RECIPE/HOTPOT/7.png'],
            ['name' => '2 cups water',                            'img' => 'images/RECIPE/HOTPOT/8.jpg'],
            ['name' => '1 cup stock',                             'img' => 'images/RECIPE/HOTPOT/9.jpg'],
            ['name' => 'Salt to taste',                           'img' => 'images/RECIPE/HOTPOT/10.png'],
          ],
          'instructions' => [
            'Kikkoman Soy Sauce Koikuchi',
            'Vinegar, Bay Leaves, Peppercorn',
            'Garlic',
            'Mix',
            'Sear the marinated pork until brown on all sides',
            'Remove, Then Set Aside',
            'Using the same pan, saute garlic until fragrant',
            'Put back the pork into the pan, cover and bring to a boil',
            'once boiling, add the stock',
            'simmer for 20-25 minutes or until the pork is tender.',
            'transfer onto a platter and serve hot'
          ]
        ],

        [
          'image' => 'images/RECIPE/3.jpg',
          'title' => 'BUBBLE MILK TEA',
          'videoEmbed' => 'https://www.youtube.com/embed/LWUGjDALRF0?si=u1TPCZQ8KEJ_rhiG',
          'ingredients' => [
            ['name' => '500ml of hot water',                                'img' => 'images/RECIPE/HOTPOT/1.png'],
            ['name' => '1000ml of cold water',                              'img' => 'images/RECIPE/HOTPOT/2.png'],
            ['name' => '1 pack MEET U MILK WHITE TEA 3IN1',                 'img' => 'images/RECIPE/HOTPOT/3.jpg'],
            ['name' => 'Tapioca Pearls(Cooked)',                            'img' => 'images/RECIPE/HOTPOT/4.jpg'],
          ],
          'instructions' => [
            'Pour hot water to dissolve the milk tea',
            'mix and stir',
            'Once the poweder mix is dissolved, add in cold water and stir',
            'Tapioca Pearls',
            'Pour the milk tea mixture in a glass and enjoy',
          ]
        ]

      ];
    @endphp

    <!-- Recipe Thumbnails -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
      @foreach($recipes as $recipe)
        <div class="bg-white rounded-xl shadow-xl overflow-hidden cursor-pointer hover:scale-105 transition-transform duration-300"
             @click="open = true; recipe = {{ json_encode($recipe) }}">
          <img src="{{ $recipe['image'] }}" class="w-full h-64 object-contain" alt="{{ $recipe['title'] }}">
          <div class="p-4">
            <h3 class="font-bold text-xl text-red-600">{{ $recipe['title'] }}</h3>
          </div>
        </div>
      @endforeach
    </div>

    <!-- Modal -->
    <div x-show="open" x-transition class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50">
      <div class="bg-white rounded-xl shadow-2xl w-11/12 md:w-4/5 lg:w-2/3 max-h-[95vh] overflow-y-auto flex flex-col"
           @click.away="open = false">

        <!-- Header -->
        <div class="flex justify-between items-center p-5 border-b sticky top-0 bg-white z-10">
          <h2 class="text-2xl font-bold text-red-600" x-text="recipe?.title"></h2>
          <button @click="open = false" class="text-gray-600 hover:text-red-600 text-xl">✖</button>
        </div>

        <!-- Content -->
        <div class="p-6 space-y-8">

          <!-- Video or Image -->
          <div>
            <template x-if="recipe?.videoEmbed">
              <div class="relative pb-[56.25%] h-0 overflow-hidden rounded-lg">
              <iframe 
                class="absolute top-0 left-0 w-full h-full"
                x-bind:src="open ? recipe.videoEmbed + '&autoplay=1&mute=1' : recipe.videoEmbed"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen>
              </iframe>
              </div>
            </template>
            <template x-if="!recipe?.videoEmbed">
              <img :src="recipe?.image" class="w-full h-80 md:h-96 object-cover rounded-lg">
            </template>
          </div>

          <!-- Side by Side Layout -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            <!-- Ingredients -->
            <div>
              <h3 class="text-xl font-semibold mb-4 text-black">🧂 Ingredients</h3>
              <ul class="space-y-3 text-gray-700">
                <template x-for="ingredient in recipe?.ingredients" :key="ingredient.name">
                  <li class="flex items-center space-x-3">
                    <span x-text="ingredient.name"></span>
                  </li>
                </template>
              </ul>
            </div>

            <!-- Instructions -->
            <div>
              <h3 class="text-xl font-semibold mb-4 text-black">👨‍🍳 Instructions</h3>
              <ol class="list-decimal list-inside space-y-3 text-gray-700">
                <template x-for="step in recipe?.instructions" :key="step">
                  <li x-text="step"></li>
                </template>
              </ol>
            </div>

          </div>

        </div>

      </div>
    </div>

  </div>
</div>



<div class="section min-h-screen flex flex-col items-center justify-center text-white px-4 md:px-6 relative"
     id="section3"
     style="background: linear-gradient(135deg, #1f2937 0%, #111827 100%);"
     x-data="{
        products: [



            { 
              name: 'ABC CHILI SAUCE SAMBAL ASLI 335ML', 
              description: 'Made from high-quality selection of fresh chili peppers and fresh garlic',
              price: '₱54.00',
              image: 'https://mcasiamart.ph/cdn/shop/files/ABCCHILISAUCESAMBALASLI_f49d3448-12cc-4dd4-a2dc-2326e55dc8e8_1024x1024.png?v=1749452680', 
              link: 'https://mcasiamart.ph/products/abc-chili-sauce-sambal-asli-335ml' 
            },


            

            { name: 'MEET U CLASSIC COFFEE 3IN1', description: 'A convenient and delicious instant coffee mix that combines premium coffee, non-dairy creamer, and sugar.', 
             price: '₱150.00', 
             image: 'https://mcasiamart.ph/cdn/shop/files/MeetUClassicCoffee3in110SX20G_1024x1024.png?v=1749453046', 
             link: 'https://mcasiamart.ph/collections/non-alcoholic/products/meet-u-classic-coffee-3in1-10sx20g' 
             },




            { name: 'KIRISHIMA SHOCHU KURO IMO 1.8L',
            description: 'Sip gentle sensation of sweet aroma with this Sochu! Kuro Kirishima was the first shochu made by the founder of Kirishima Brewery, Kichikuse Enatsu.', 
            price: '₱1,032.00', 
            image: 'https://mcasiamart.ph/cdn/shop/files/KIRISHIMA_SHOCHUKUROIMO1.8L_1024x1024.jpg?v=1749452776', 
            link: 'https://mcasiamart.ph/collections/alcoholic/products/kirishima-shochu-kuro-kirishima-imo-1-8l' 
            },



            { name: 'ABC SOY SAUCE 620ML', 
             description: 'Delicious tasting for cooking all types of meat, poultry, seafood, vegetable or tofu and fried rice, as well as for a table sauce', 
             price: '₱200.00', 
             image: 'https://mcasiamart.ph/cdn/shop/files/ABCSWEETSAUCE620ML_1024x1024.png?v=1749452724', 
             link: 'https://mcasiamart.ph/collections/food-and-pantry-staples/products/abc-sweet-sauce-620ml' 
             },




            { name: 'OZAKI CRABSTICK 500G', 
             description: 'Crab sticks, krab sticks, imitation crab meat or seafood sticks are a type of seafood made of starch and finely pulverized white fish', 
             price: '₱275.00', 
             image: 'https://mcasiamart.ph/cdn/shop/files/OZAKICRABSTICK500G_1024x1024.png?v=1749452684', 
             link: 'https://mcasiamart.ph/collections/meat-poultry-seafoods/products/ozaki-crabstick-500g' 
            },




            { name: 'SEA CHEF CRABSTICK FOR HOT POT 1KG', 
             description: 'Crab sticks, krab sticks, imitation crab meat or seafood sticks are a type of seafood made of starch and finely pulverized white fish that has been shaped and cured to resemble the leg meat of snow crab or Japanese spider crab.', 
             price: '₱363.00', 
             image: 'https://mcasiamart.ph/cdn/shop/files/SEACHEFCRABSTICKFORHOTPOT1KG_1024x1024.png?v=1749452755', 
             link: 'https://mcasiamart.ph/collections/frozen-ready-to-eat-goods/products/sea-chef-crabstick-for-hot-pot-1kg' 
             }



        ],
        currentIndex: 0,
        openModal: false,
        activeProduct: null,
        interval: null,
        startSlideshow() {
            this.interval = setInterval(() => {
                this.currentIndex = (this.currentIndex + 1) % Math.ceil(this.products.length / 3);
            }, 5000);
        },
        stopSlideshow() { clearInterval(this.interval); },
        showProduct(product) {
            this.activeProduct = product;
            this.openModal = true;
        }
     }"
     x-init="startSlideshow()">

    <h1 class="text-4xl sm:text-5xl md:text-6xl font-chendolle tracking-wide mb-12 text-center text-red-500 drop-shadow-lg">
        Featured Products
    </h1>

    <!-- Carousel -->
    <div class="relative w-full max-w-7xl overflow-hidden rounded-2xl shadow-2xl">
        <div class="flex transition-transform duration-700 ease-in-out"
             :style="`transform: translateX(-${currentIndex * 100}%)`">

            <template x-for="batch in Math.ceil(products.length / 3)" :key="batch">
                <div class="flex-shrink-0 w-full flex gap-4 p-4">
                    <template x-for="product in products.slice((batch-1)*3, (batch-1)*3 + 3)" :key="product.name">
                        <div class="w-1/3 bg-gray-800/80 p-4 rounded-lg cursor-pointer flex flex-col items-center justify-center"
                             @click="showProduct(product)">
                            <img :src="product.image" :alt="product.name" class="max-h-[200px] object-contain rounded-lg mb-4">
                            <h2 class="text-lg font-bold text-white text-center" x-text="product.name"></h2>
                            <p class="text-sm text-gray-300 text-center mt-1" x-text="product.description"></p>
                            <p class="text-red-500 font-semibold mt-2" x-text="product.price"></p>
                        </div>
                    </template>
                </div>
            </template>
        </div>

        <!-- Controls -->
        <button @click="currentIndex = (currentIndex - 1 + Math.ceil(products.length/3)) % Math.ceil(products.length/3)"
                class="absolute left-3 top-1/2 -translate-y-1/2 bg-black/50 p-3 rounded-full text-white hover:bg-red-600 transition">‹</button>
        <button @click="currentIndex = (currentIndex + 1) % Math.ceil(products.length/3)"
                class="absolute right-3 top-1/2 -translate-y-1/2 bg-black/50 p-3 rounded-full text-white hover:bg-red-600 transition">›</button>
    </div>

    <!-- Modal -->
    <div x-show="openModal"
         x-transition.opacity
         class="fixed inset-0 flex items-center justify-center bg-black/80 z-50 p-4"
         @click.self="openModal = false">
        <div class="bg-gray-900 rounded-2xl w-full max-w-3xl p-6 relative">
            <button @click="openModal = false"
                    class="absolute top-4 right-6 text-gray-400 hover:text-red-500 text-3xl">✕</button>

            <div class="flex flex-col md:flex-row gap-6">
                <div class="flex-1 flex justify-center items-center">
                    <img :src="activeProduct?.image" class="w-full max-h-[300px] object-contain rounded-lg">
                </div>
                <div class="flex-1 flex flex-col justify-start">
                    <h2 class="text-2xl font-bold text-red-500 mb-4" x-text="activeProduct?.name"></h2>
                    <p class="text-gray-300 mb-4" x-text="activeProduct?.description"></p>
                    <p class="text-red-500 font-semibold text-lg" x-text="activeProduct?.price"></p>
                    <a :href="activeProduct?.link" target="_blank" class="mt-4 bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 text-center">Go to Website</a>
                </div>
            </div>
        </div>
    </div>
</div>





<!-- 6th Section: Recipe Section -->
<div class="section py-12 flex items-center text-white w-full"
     id="section6"
     style="background: linear-gradient(90deg, #f97316 0%, #84cc16 100%);">

  <!-- Keep container centered content but transparent -->
  <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-6 items-center">

    <!-- Left Content -->
    <div class="flex flex-col space-y-6" data-aos="fade-right">
      <h1 class="text-2xl sm:text-3xl md:text-4xl font-chendolle text-red-600">
        For Everyday Moments
      </h1>
      <ul class="text-base text-gray-100 list-disc list-inside space-y-1">
        <li>Explore Retail Product Range</li>
        <li>Get Recipes &amp; Meal Ideas</li>
        <li>Find us in McAsia Mart, Shopee, Lazada, TikTok, or your nearest supermarket</li>
      </ul>
      <a href="#" 
         class="inline-block bg-white text-pink-600 px-5 py-2 rounded-lg font-semibold shadow hover:bg-gray-100 transition self-start">
        View Retail Products
      </a>
    </div>

    <!-- Right Image -->
    <div class="flex justify-center" data-aos="fade-left">
      <img src="{{ asset('images/Everyday Moments/1.png') }}" 
           alt="Featured Recipe" 
           class="rounded-xl shadow-lg object-cover w-full h-72">
    </div>

  </div>
</div>


<!-- 7th Info Section -->
<div class="section py-12 text-white w-full"
     style="background: linear-gradient(90deg, #ff0000ff 0%, #84cc16 100%);">

  <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-0 items-stretch">

    <!-- Left Image Column -->
    <div class="flex justify-center items-center p-6" data-aos="fade-right">
      <img src="{{ asset('images/Everyday Moments/2.png') }}"
           alt="Featured Recipe"
           class="rounded-xl shadow-lg object-cover w-full h-72 bg-transparent">
    </div>

    <!-- Right Content Column -->
    <div class="flex flex-col justify-center p-6 space-y-6" data-aos="fade-left">
      <h1 class="text-2xl sm:text-3xl md:text-4xl font-chendolle text-red-600 drop-shadow-md">
        For Businesses That Serve
      </h1>
      <ul class="text-base text-white list-disc list-inside space-y-1">
        <li>Bulk Packs & Consistent Supply</li>
        <li>Trusted By Restaurants, Hotels, Cafés</li>
        <li>Download Product Catalog</li>
      </ul>
      <a href="#" 
         class="inline-block bg-white text-pink-600 px-5 py-2 rounded-lg font-semibold shadow hover:bg-gray-100 transition self-start">
        View Foodservice Products
      </a>
    </div>

  </div>
</div>












<!-- Shop & News Section -->
<div class="section min-h-screen flex items-center justify-center 
            text-white px-6 py-12" 
     id="section9"
     style="background: linear-gradient(90deg, #000000ff 30%, #ff0f0fff 50%, #ff0077ff 100%);">


     <div class="container mx-auto max-w-7xl grid grid-cols-1 md:grid-cols-2 gap-10">
    <!-- Left Side: Shop Online -->
    <div class="bg-gray-800 rounded-2xl shadow-lg p-8 text-center">
      <!-- Title -->
      <h2 class="text-3xl sm:text-4xl md:text-5xl font-chendolle mb-12 text-red-600">
        🛒 Shop Online
      </h2>

      <!-- Logos Grid -->
      <div class="grid grid-cols-2 gap-10 items-center justify-center">
        <div class="flex justify-center" data-aos="zoom-in" data-aos-delay="100">
          <a href="https://shopee.ph/mcasiamart" target="_blank" rel="noopener">
            <img src="{{ asset('images/Shopee-Mall.jpeg') }}" 
                 alt="Shopee" 
                 class="w-32 h-32 md:w-40 md:h-40 object-contain hover:scale-110 transition-transform duration-300">
          </a>
        </div>

        <div class="flex justify-center" data-aos="zoom-in" data-aos-delay="300">
          <a href="https://www.lazada.com.ph/shop/mcasia-mart/" target="_blank" rel="noopener">
            <img src="{{ asset('images/lazada.jpg') }}" 
                 alt="Lazada" 
                 class="w-32 h-32 md:w-40 md:h-40 object-contain hover:scale-110 transition-transform duration-300">
          </a>
        </div>

        <div class="flex justify-center" data-aos="zoom-in" data-aos-delay="500">
          <a href="https://vt.tiktok.com/ZSAmgrcKv/?page=TikTokShop" target="_blank" rel="noopener">
            <img src="{{ asset('images/tiktok_icon.png') }}" 
                 alt="TikTok" 
                 class="w-32 h-32 md:w-40 md:h-40 object-contain hover:scale-110 transition-transform duration-300">
          </a>
        </div>

        <div class="flex justify-center" data-aos="zoom-in" data-aos-delay="700">
          <a href="https://mcasiamart.ph" target="_blank" rel="noopener">
            <img src="{{ asset('images/McAsiaMart.jpg') }}" 
                 alt="McAsiaMart" 
                 class="w-32 h-32 md:w-40 md:h-40 object-contain hover:scale-110 transition-transform duration-300">
          </a>
        </div>
      </div>
    </div>

    <!-- Right Side: News & Events -->
    <div class="bg-gray-800 rounded-2xl shadow-lg p-6 md:p-8">
      <h2 class="text-3xl sm:text-4xl md:text-5xl font-chendolle text-center mb-12 text-red-600">
        📰 News & Events
      </h2>

      @php
        $events = [
          [
            'title' => 'WOFEX Manila 2023',
            'date' => 'August 6, 2025',
            'description' => 'McAsia’s booth at the World Food Expo last August 2-5, 2023 at the SMX Convention Center Manila, was a symphony of flavors and aromas, designed to captivate the palates of visitors.',
            'images' => [
                'https://mcasiafoodtrade.ph/wp-content/uploads/2023/11/365309671_605395005042162_8665672183080610030_n.jpg',
                'https://mcasiafoodtrade.ph/wp-content/uploads/2023/11/362915216_605986988316297_3417780447851312438_n.jpg',
                'https://mcasiafoodtrade.ph/wp-content/uploads/2023/11/364024435_604917185089944_24185452207523667_n-1.jpg',
            ],
          ],
          [
            'title' => 'Wofex Cebu 2023',
            'date' => 'April 24, 2023',
            'description' => 'In a celebration of food and culinary innovation, McAsia Team had the privilege of participating in the World Food Expo held in the vibrant city of Cebu for the World Food Expo Visayas happened last April 20-23, 2023 at Waterfront Hotels & Casinos, Cebu City.',
            'images' => [
                'https://mcasiafoodtrade.ph/wp-content/uploads/2023/07/342335781_569158718654567_3828589371071699165_n.jpg',
                'https://mcasiafoodtrade.ph/wp-content/uploads/2023/07/342513751_609894934087360_3630082966185560219_n.jpg',
                'https://mcasiafoodtrade.ph/wp-content/uploads/2023/07/342511311_610762660669477_2013223865411140735_n-2.jpg',
            ],
          ],
        ];
      @endphp

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-6">
        @foreach($events as $event)
        <div class="cursor-pointer bg-gray-700 rounded-lg shadow-md hover:bg-gray-600 transition p-3 md:p-4"
             x-data="{ open: false, fullScreen: false, index: 0, images: {{ json_encode($event['images']) }} }"
             x-init="setInterval(() => { index = (index + 1) % images.length }, 5000)">

          <!-- Event Card -->
          <div @click="open = true">
            <img src="{{ $event['images'][0] }}" alt="{{ $event['title'] }}" class="w-full h-48 md:h-56 object-cover rounded mb-2">
            <h4 class="text-lg font-semibold text-white mb-1">{{ $event['title'] }}</h4>
            <p class="text-sm text-gray-400">{{ $event['date'] }}</p>
          </div>

          <!-- Modal -->
          <div x-show="open" x-transition class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 p-4 overflow-auto">
            <div class="bg-white rounded-xl p-6 md:p-8 w-11/12 md:w-4/5 lg:w-3/4 xl:w-2/3 relative">

              <!-- Close Modal -->
              <button @click="open = false; fullScreen = false; index = 0"
                      class="absolute top-3 right-3 text-gray-600 hover:text-black text-lg font-bold">✖</button>

              <!-- Title & Date -->
              <h2 class="text-3xl font-bold text-center text-red-600 mb-4">{{ $event['title'] }}</h2>
              <p class="text-center text-sm text-gray-500 mb-4">{{ $event['date'] }}</p>

              <!-- Slider with Fade Transition -->
              <div class="relative mb-4 h-[200px] md:h-[450px]">
                <template x-for="(img, i) in images" :key="i">
                  <img :src="img"
                       x-show="i === index"
                       x-transition:enter="transition-opacity duration-500"
                       x-transition:enter-start="opacity-0"
                       x-transition:enter-end="opacity-100"
                       x-transition:leave="duration-0"
                       class="absolute top-0 left-0 w-full h-full object-contain rounded-md cursor-pointer"
                       @click="fullScreen = true">
                </template>

                <!-- Prev / Next Buttons -->
                <button @click="index = (index - 1 + images.length) % images.length"
                        class="absolute left-2 top-1/2 -translate-y-1/2 bg-black text-white px-3 py-2 rounded-full text-lg">
                  ‹
                </button>
                <button @click="index = (index + 1) % images.length"
                        class="absolute right-2 top-1/2 -translate-y-1/2 bg-black text-white px-3 py-2 rounded-full text-lg">
                  ›
                </button>
              </div>

              <!-- Description -->
              <p class="text-gray-700 text-justify leading-snug">{{ $event['description'] }}</p>
            </div>

            <!-- Fullscreen Image Overlay -->
            <div x-show="fullScreen" x-transition.opacity
                 class="fixed inset-0 bg-black bg-opacity-95 flex items-center justify-center z-50 cursor-zoom-out"
                 @click="fullScreen = false">
              <img :src="images[index]" class="max-w-full max-h-full object-contain rounded-md">
            </div>
          </div>
        </div>
        @endforeach
      </div>

      <!-- Check More Button -->
      <div class="mt-6 text-center">
        <a href="/news_event" 
           class="inline-block bg-red-600 hover:bg-red-700 transition px-6 py-3 rounded-xl font-semibold text-white">
           Check News & Events
        </a>
      </div>
    </div>

  </div>
</div>

@include('components.footer')

@push('styles')
@vite('resources/css/autoscroll.css')
@endpush

@push('scripts')
@vite(['resources/js/section2-animate.js', 'resources/js/autoscroll.js'])
@endpush



@endsection

