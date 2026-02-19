<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Website Intro Animation</title>
  @vite('resources/css/app.css')
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

  <style>
    /* Smooth fade animation */
    @keyframes fadeInOut {
      0% { opacity: 0; }
      50% { opacity: 1; }
      100% { opacity: 0; }
    }
  </style>
</head>

<body class="bg-gradient-to-b from-gray-900 via-black to-gray-900 text-white overflow-hidden">

  <div 
    x-data="{ stage: 'intro' }"
    class="relative w-full h-screen flex items-center justify-center"
  >

    <!-- 🎬 Video Intro -->
    <div 
      x-show="stage === 'intro'"
      x-transition.opacity.duration.800ms
      class="absolute inset-0 flex items-center justify-center bg-black z-10"
    >
      <video 
        src="{{ asset('images/test/videos_intro.mp4') }}" 
        autoplay 
        muted 
        playsinline 
        @ended="stage = 'fadeOut'"
        class="w-full h-full object-cover"
      ></video>
    </div>

    <!-- 🌫️ Fade to white after video -->
    <div 
      x-show="stage === 'fadeOut'"
      x-transition.opacity.duration.1200ms
      @transitionend="setTimeout(() => stage = 'site', 1000)" 
      class="absolute inset-0 bg-white z-20"
    ></div>

    <!-- 🌐 Main Site (Section 1) -->
    <div 
      x-show="stage === 'site'"
      x-transition.opacity.duration.1000ms
      class="absolute inset-0 bg-gray-50 text-gray-900 z-0 overflow-y-scroll snap-y snap-mandatory h-screen"
    >

<!--------------------------------------------------SECTION 1--------------------------------------------------------------------------->
<section class="relative min-h-screen flex flex-col items-center justify-center space-y-6 snap-start overflow-hidden">

  <!-- 🎬 Background Video -->
  <video 
    autoplay 
    muted 
    loop 
    playsinline 
    class="absolute inset-0 w-full h-full object-cover opacity-90"
  >
    <source src="{{ asset('videos/videos.mp4') }}" type="video/mp4">
    Your browser does not support the video tag.
  </video>

  <!-- 🔲 Overlay (dark tint for text readability) -->
  <div class="w-screen h-screen absolute inset-0 bg-black/50"></div>

  <!-- ✨ Foreground Content -->
  <div class="relative z-10 text-center text-white px-6 animate-fadeIn">
    <h1 class="text-5xl font-extrabold mb-4">HOME TO YOUR ASIAN CRAVINGS</h1>
    <p class="text-lg max-w-xl mx-auto mb-6 text-gray-200">
      Scroll down to continue your journey.
    </p>
  </div>
</section>
<!--------------------------------------------------END OF SECTION 1--------------------------------------------------------------------------->







<!------------------------------------------------------SECTION 2--------------------------------------------------------------------------->
<section 
  class="h-screen flex items-center justify-center bg-gray-50 snap-start relative overflow-hidden"
  x-data="heroSection()"
  x-init="observeSection($el)">
  
  <!-- Backgrounds -->
  <template x-for="(bg, index) in backgrounds" :key="index">
    <div 
      x-show="currentBg === index"
      x-transition.opacity.duration.1000ms
      class="absolute inset-0 w-full h-full bg-cover bg-center"
      :style="`background-image: url(${bg})`"
    ></div>
  </template>

  <!-- Overlay -->
  <div class="absolute inset-0 bg-black/40 z-10"></div>

  <!-- Foreground Content -->
  <div class="relative z-20 flex flex-col items-center justify-center text-center space-y-6 px-6 h-full">
    
    <!-- Word by Word Text -->
    <h2 class="text-4xl md:text-5xl font-extrabold text-white drop-shadow-lg">
      <template x-for="(word, index) in visibleWords" :key="index">
        <span x-text="word" class="inline-block mr-2 opacity-0" 
              x-transition.opacity.duration.500ms
              x-init="$el.classList.remove('opacity-0')"></span>
      </template>
    </h2>

    <!-- Images / Final Card View -->
    <div class="flex flex-wrap gap-4 mt-6 justify-center w-full relative h-64 md:h-72">
      
      <!-- Slideshow Images -->
      <template x-for="(img, index) in images" :key="'slide-' + index">
        <img 
          :src="img" 
          class="absolute w-48 h-48 md:w-64 md:h-64 object-cover rounded-lg"
          x-show="visibleImageIndex === index && !showAllCards"
          x-transition.opacity.duration.1000ms
        >
      </template>

      <!-- Staggered Cards -->
      <template x-for="(img, index) in visibleCards" :key="'card-' + index">
        <div 
          class="w-45 h-45 md:w-45 md:h-45 bg-white rounded-lg shadow-lg overflow-hidden opacity-0 transform scale-90 cursor-pointer"
          x-transition.opacity.duration.700ms
          x-transition.scale.duration.700ms
          x-init="$el.classList.remove('opacity-0')"
          @mouseenter="currentBg = index"
          @mouseleave="currentBg = images.length - 1"
        >
          <img :src="img" class="w-full h-full object-cover">
        </div>
      </template>

    </div>
  </div>
</section>
<!--------------------------------------------------END OF SECTION 2--------------------------------------------------------------------------->



<!------------------------------------------------------SECTION 3--------------------------------------------------------------------------->
<section 
  class="min-h-screen flex flex-col items-center justify-center text-white relative snap-start overflow-hidden transition-all duration-700 bg-black"
  x-data="{
    selected: null,
    loadedBg: '',
    brands: {
      apple: {
        name: 'Sea Chef',
        bg: 'images/test/sea_chef_back_2.png',
        items: [
          { name: 'SEA CHEF CRABSTICK 1KG',                 description: 'Add flavor and variety to your meals with Sea Chef Crabstick.', price: 350, img: 'https://mcasiamart.ph/cdn/shop/files/SEA_CHEF_CRABSTICK_1KG_1024x1024.jpg?v=1758851667',          url: 'https://mcasiamart.ph/products/sea-chef-crabstick-1kg?_pos=1&_sid=843300295&_ss=r' },
          { name: 'SEA CHEF FROZEN SEAFOOD PANCAKE 200G',   description: 'Fresh catch of the day served with rice and tangy sauce.',      price: 420, img: 'https://mcasiamart.ph/cdn/shop/files/SEACHEFFROZENSEAFOODPANCAKE200G_1024x1024.png?v=1749453054', url: 'https://mcasiamart.ph/products/sea-chef-frozen-seafood-pancake-200g?_pos=2&_sid=843300295&_ss=r' },
        ]
      },
      samsung: {
        name: 'Long Beach',
        bg: 'images/test/long_beach_back.jpg',
        items: [
          { name: 'Tropical Juice', description: 'A refreshing mix of tropical fruits served chilled.', price: 180, img: 'images/test/juice.jpg', url: '#' },
          { name: 'Beach Burger', description: 'A juicy burger topped with pineapple and BBQ sauce.', price: 299, img: 'images/test/burger.jpg', url: '#' },
          { name: 'Sea Breeze Salad', description: 'Crisp greens with seafood and light vinaigrette.', price: 250, img: 'images/test/salad.jpg', url: '#' }
        ]
      },
      sony: {
        name: 'Gaban',
        bg: 'images/test/gaban_back.jpg',
        items: [
          { name: 'Spicy Tuna Roll', description: 'Fresh tuna roll with Gaban’s signature spice.', price: 380, img: 'images/test/tuna_roll.jpg', url: '#' },
          { name: 'Tempura Mix', description: 'Crispy shrimp and veggies served with soy dipping sauce.', price: 340, img: 'images/test/tempura.jpg', url: '#' },
          { name: 'Sushi Platter', description: 'An assortment of handcrafted sushi favorites.', price: 560, img: 'images/test/sushi_platter.jpg', url: '#' }
        ]
      }
    },
    selectBrand(key) {
      const bgUrl = this.brands[key].bg;
      const img = new Image();
      img.src = bgUrl;
      img.onload = () => {
        this.loadedBg = bgUrl;
        this.selected = key;
      };
    }
  }"
  :style="loadedBg ? `background-image: url(${loadedBg}); background-size: cover; background-position: center; background-repeat: no-repeat;` : ''"
>

  <!-- Brand Selection -->
  <div 
    class="flex flex-col sm:flex-row sm:flex-wrap justify-center items-center gap-6 p-6 w-full max-w-md mx-auto"
    x-show="!selected"
    x-transition
  >
    <template x-for="(brand, key) in brands" :key="key">
      <button 
        class="bg-white text-black flex flex-col items-center justify-center p-4 rounded-2xl shadow-lg hover:scale-105 transition-transform duration-500 w-full sm:w-40"
        @click="selectBrand(key)"
      >
        <img :src="`https://dummyimage.com/200x200/000/fff&text=${brand.name}`" 
             class="w-28 h-28 object-cover rounded-xl mb-3" />
        <h3 class="font-semibold text-lg" x-text="brand.name"></h3>
      </button>
    </template>
  </div>

  <!-- Brand Items -->
  <div 
    class="absolute inset-0 flex flex-col items-center justify-start text-center p-4 sm:p-8 overflow-y-auto"
    x-show="selected"
    x-transition
  >
    <h1 class="text-3xl sm:text-5xl font-extrabold mt-6 mb-8 text-white drop-shadow-md" x-text="brands[selected]?.name"></h1>

<!-- Centered Horizontal Scrollable Item Row -->
<div class="flex justify-center overflow-x-auto gap-4 w-full px-4 sm:px-6 py-4 snap-x snap-mandatory">
  <template x-for="item in brands[selected]?.items" :key="item.name">
    <div class="bg-white text-black rounded-2xl shadow-lg flex-shrink-0 w-64 flex flex-col snap-center">
      <img :src="item.img" :alt="item.name" class="w-full h-48 object-contain">
      <div class="p-4 flex flex-col items-center space-y-2 flex-grow">
        <h2 class="font-bold text-lg" x-text="item.name"></h2>
        <p class="text-gray-600 text-sm leading-snug" x-text="item.description"></p>
        <span class="text-lg font-semibold text-green-600" x-text="'₱' + item.price"></span>
        <a :href="item.url" target="_blank" class="mt-auto bg-black text-white px-4 py-2 rounded-full hover:bg-gray-800 transition">
          View Item
        </a>
      </div>
    </div>
  </template>
</div>

    <button 
      class="mt-10 bg-white text-black px-6 py-2 rounded-full hover:bg-gray-200 transition text-sm font-semibold"
      @click="selected = null; loadedBg = '';"
    >
      ← Back to Brands
    </button>
  </div>
</section>
<!--------------------------------------------------END OF SECTION 3------------------------------------------------------>



<!------------------------------------------------------Section 4--------------------------------------------------------->
<section
  class="min-h-screen flex items-center justify-center text-white relative overflow-hidden snap-start"
  x-data="productFeature()"
  x-init="observeSection($el)"
>
  <!-- Backgrounds (fade crossfade) -->
  <template x-for="(p, i) in products" :key="'bg-'+i">
    <div
      class="absolute inset-0 w-full h-full bg-center bg-cover transition-opacity duration-[1500ms] ease-out"
      :style="`background-image: url(${p.bg})`"
      x-show="currentProduct === i"
      x-transition:enter="transition-opacity ease-out duration-1000"
      x-transition:enter-start="opacity-0"
      x-transition:enter-end="opacity-100"
      x-transition:leave="transition-opacity ease-in duration-1000"
      x-transition:leave-start="opacity-100"
      x-transition:leave-end="opacity-0"
      x-cloak
    ></div>
  </template>

  <!-- Dark overlay -->
  <div class="absolute inset-0 bg-black/60"></div>

  <!-- Content container -->
  <div
    class="relative z-10 max-w-7xl w-full px-6 md:px-12 py-16"
    x-show="visible"
    x-transition.opacity.duration.1000ms
    x-cloak
  >
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">

      <!-- Left: Image area -->
      <div
        class="w-full h-[420px] md:h-[520px] rounded-2xl overflow-hidden relative flex items-center justify-center"
        @mouseenter="hovering = true"
        @mouseleave="hovering = false"
      >
        <template x-for="(p, i) in products" :key="'img-'+i">
          <img
            :src="p.image"
            alt=""
            class="absolute inset-0 m-auto w-[320px] md:w-[420px] h-auto object-cover rounded-2xl shadow-2xl transition-opacity duration-[1200ms] ease-in-out"
            x-show="currentProduct === i"
            x-transition:enter="transition-opacity duration-1000 ease-out"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity duration-1000 ease-in"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            x-cloak
          />
        </template>

        <!-- Badge -->
        <template x-for="(p, i) in products" :key="'badge-'+i">
          <div
            class="absolute top-5 left-5 inline-block px-3 py-1 rounded-full text-sm bg-white/20 backdrop-blur-sm font-semibold transition-opacity duration-500"
            x-show="currentProduct === i"
            x-transition.opacity.duration.700ms
            x-cloak
            x-text="p.badge"
          ></div>
        </template>
      </div>

      <!-- Right: Text (soft fade crossfade) -->
      <div class="w-full relative min-h-[320px]">
        <template x-for="(p, i) in products" :key="'text-'+i">
          <div
            class="absolute top-0 left-0 w-full space-y-6"
            x-show="currentProduct === i"
            x-transition:enter="transition-opacity ease-out duration-1000"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-in duration-1000"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            x-cloak
          >
            <h2 class="text-3xl md:text-4xl font-extrabold leading-tight" x-text="p.title"></h2>
            <p class="text-gray-200 text-lg max-w-xl" x-text="p.description"></p>

            <ul class="space-y-2 text-gray-300">
              <template x-for="(f, idx) in p.features" :key="idx">
                <li class="flex items-center gap-3">
                  <span class="text-indigo-400">✔</span>
                  <span x-text="f"></span>
                </li>
              </template>
            </ul>

            <div class="flex items-center gap-4 pt-4">
                <button
                  x-show="p.url"
                  @click="window.open(p.url, '_blank')"
                  class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 rounded-full font-semibold transition-colors duration-300 shadow-lg"
                >
                  Shop Now
                </button>
            </div>
          </div>
        </template>
      </div>

    </div>
  </div>
</section>
<!------------------------------------------------------End of Section 4-------------------------------------------------->









<!--------------------------------------------------------Section 5--------------------------------------------------------->
<section
  class="min-h-screen flex flex-col items-center justify-center text-white bg-gradient-to-b from-gray-900 via-gray-800 to-gray-900 relative overflow-hidden snap-start"
  x-data="buySection()"
  x-init="observeSection($el)"
>
  <!-- Background Glow -->
  <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,rgba(99,102,241,0.15),transparent)]"></div>

  <!-- Content -->
  <div
    class="relative z-10 text-center w-full px-6"
    x-show="visible"
    x-transition.opacity.duration.1000ms
    x-cloak
  >
    <h2 class="text-4xl md:text-5xl font-extrabold mb-6 tracking-tight">
      Where to Buy Our Product?
    </h2>
    <p class="text-gray-300 mb-12 text-lg">
      You can find our premium products at your favorite retailers and trusted online platforms.
    </p>

    <!-- Horizontal Logo Line -->
    <div
      class="flex flex-wrap justify-center items-center gap-8 md:gap-12"
    >
      <template x-for="(store, i) in stores" :key="i">
        <div
          class="relative group w-[160px] h-[160px] md:w-[180px] md:h-[180px] overflow-hidden rounded-2xl shadow-2xl transition-transform duration-500 hover:scale-110 hover:shadow-indigo-600/40 cursor-pointer"
          x-show="visible"
          x-transition:enter="transition ease-out duration-1000"
          x-transition:enter-start="opacity-0 translate-y-8"
          x-transition:enter-end="opacity-100 translate-y-0"
          :style="`transition-delay: ${i * 150}ms`"
          @click="window.open(store.url, '_blank')"
        >
          <img
            :src="store.image"
            alt=""
            class="absolute inset-0 w-full h-full object-contain brightness-90 group-hover:brightness-110 transition-all duration-500 bg-white/5 rounded-2xl p-4"
          />

          <!-- Hover overlay label -->
          <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-500 flex items-center justify-center">
            <span class="text-lg font-semibold" x-text="store.name"></span>
          </div>
        </div>
      </template>
    </div>
  </div>
</section>
<!------------------------------------------------------End of Section 5-------------------------------------------------->


</div>
  </div>

                                  <!-----------Script 2 Functionalities---------------->
<script>
function heroSection() {
  return {
    text: "Choose McAsia Foodtrade as your trusted partner for authentic Asian food products.",
    words: [],
    visibleWords: [],
    images: [
      'https://mcasiafoodtrade.ph/wp-content/uploads/2023/11/ALCOHOLIC-430x430.jpg',
      'https://mcasiafoodtrade.ph/wp-content/uploads/2023/11/BEAUTY-WELLNESS-430x430.jpg',
      'https://mcasiafoodtrade.ph/wp-content/uploads/2023/11/CAFE-BAR-ESSENTIALS-430x430.jpg',
      'https://mcasiafoodtrade.ph/wp-content/uploads/2023/11/CHILLED-FRESH-430x430.jpg',
      'https://mcasiafoodtrade.ph/wp-content/uploads/2023/11/FOOD-PANTRY-STAPLES-430x430.jpg',
    ],
    backgrounds: [
      '{{ asset("images/test/gaban_back.jpg") }}',
      '{{ asset("images/test/long_beach_back.jpg") }}',
      '{{ asset("images/test/sea_chef_back_2.png") }}',
      '{{ asset("images/test/gaban_back.jpg") }}',
      '{{ asset("images/test/sea_chef_back_2.png") }}',
    ],
    currentBg: 0,
    visibleImageIndex: -1,
    showAllCards: false,
    visibleCards: [],

    observeSection(el) {
      const observer = new IntersectionObserver(
        ([entry]) => {
          if (entry.isIntersecting) {
            this.startAnimation();
            observer.unobserve(el); // stop observing after first trigger
          }
        }, 
        { threshold: 0.5 } // triggers when 50% of section is visible
      );
      observer.observe(el);
    },

    startAnimation() {
      this.words = this.text.split(" ");
      let i = 0;
      let wordInterval = setInterval(() => {
        this.visibleWords.push(this.words[i]);
        i++;
        if (i >= this.words.length) {
          clearInterval(wordInterval);
          this.showImages();
        }
      }, 300);
    },

    showImages() {
      let i = 0;
      let imgInterval = setInterval(() => {
        this.visibleImageIndex = i;
        this.currentBg = i;
        i++;
        if (i >= this.images.length) {
          clearInterval(imgInterval);
          setTimeout(() => {
            this.showAllCards = true;
            this.visibleImageIndex = -1;
            this.showCardsStaggered();
          }, 500);
        }
      }, 1500);
    },

    showCardsStaggered() {
      let i = 0;
      let staggerInterval = setInterval(() => {
        this.visibleCards.push(this.images[i]);
        i++;
        if (i >= this.images.length) clearInterval(staggerInterval);
      }, 300);
    }
  }
}
</script>


<!---------------------------------------------SECTION 4--------------------------------------------------->
<script>
function productFeature() {
  return {
    visible: false,
    hovering: false,
    currentProduct: 0,
    interval: null,
    products: [
      {
        title: "ABC HOT AND SWEET CHILI SAUCE 335ML",
        description: "ABC HOT AND SWEET CHILI SAUCE - MCASIA Great as a dip for your favorite deep-fried foods",
        image: "{{ asset('images/SAUCES AND CONDIMENTS/1.png') }}",
        bg: "{{ asset('images/HOMEPAGE/3.png') }}",
        url: "https://mcasiamart.ph/products/abc-hot-and-sweet-chili-sauce-335ml?_pos=1&_sid=a04e3c9ff&_ss=r",
        badge: "New Arrival 🆕",
        features: [
          "A mixture of sweet, savory, and spicy flavors",
          "Alternative for sriracha & ketchup",
          "Can be use as a cooking ingredient, or condiment on your favorite foods."
        ]
      },


      {
        title: "KING CHEF CANNED WHOLE CREAMSTYLE CORN (NL) 425G",
        description: "Our honey-infused sauces are crafted with care, blending sweet and savory to elevate your dishes effortlessly.",
        image: "{{ asset('images/OUR BEST SELLER/5.png') }}",
        bg: "{{ asset('images/HOMEPAGE/2.png') }}",
        url: "https://mcasiamart.ph/products/king-chef-canned-cream-style-corn-425g?_pos=1&_sid=e4efd53d1&_ss=r",
        badge: "Customer Favorite 💚",
        features: [
          "King Chef Cream Style Corn is a delectable corn choice that offers a delightful fusion of sweet and creamy flavors. Its creamy texture makes it an excellent ingredient to add to various recipes, from casseroles and soups to savory pies and fritters."    
        ]
      },



      {
        title: "OXFORD PREMIER LEMON PUFF SANDWICH 190G",
        description: "Enjoy the perfect balance of light, flaky puff biscuits and a smooth, tangy lemon-flavored crème filling with Oxford Lemon Puff Sandwich.",
        image: "{{ asset('images/SNACKS/6.png') }}",
        bg: "{{ asset('images/HOMEPAGE/4.png') }}",
        url: "https://mcasiamart.ph/products/oxford-premier-lemon-puff-sandwich-190g?_pos=3&_sid=ed57ce415&_ss=r",
        badge: "Customer Favorite 💚",
        features: [
          "No animal by-products, including fats and oils",
          "Certified Halal, all our products conform to Halal standards",
          "Crispy biscuits with a creamy lemon-flavored filling",
          "Made with high-quality ingredients",
          "Perfect for snacking, sharing, or pairing with beverages"
        ]
      },




    ],

    observeSection(el) {
      const observer = new IntersectionObserver(([entry]) => {
        if (entry.isIntersecting) {
          this.visible = true;
          this.startRotation();
          observer.unobserve(el);
        }
      }, { threshold: 0.4 });
      observer.observe(el);
    },

    startRotation() {
      if (this.interval) clearInterval(this.interval);
      this.interval = setInterval(() => {
        if (!this.hovering) {
          this.currentProduct = (this.currentProduct + 1) % this.products.length;
        }
      }, 10000);
    },

    goToProduct(i) {
      this.currentProduct = i;
      if (this.interval) {
        clearInterval(this.interval);
        this.startRotation();
      }
    }
  };
}
</script>
<!------------------------------------------END OF SECTION 4----------------------------------------------->



  

<!------------------------------------------SECTION 5 SCRIPT------------------------------------------------>
<script>
function buySection() {
  return {
    visible: false,
    stores: [
      {
        name: "Shopee",
        image: "{{ asset('images/shopee_circle.jpg') }}",
        url: "https://shopee.ph/mcasiamart",
      },
      {
        name: "Lazada",
        image: "{{ asset('images/lazada_circle.jpg') }}",
        url: "https://www.lazada.com.ph/shop/mcasia-mart/?path=index.htm",
      },
      {
        name: "Tiktok",
        image: "{{ asset('images/tiktok_circle.png') }}",
        url: "https://www.tiktok.com/@mcasiafoodtrade_",
      },
      {
        name: "McAsiaMart",
        image: "{{ asset('images/McAsiaMart_Circle.jpg') }}",
        url: "https://mcasiamart.ph",
      },
    ],

    observeSection(el) {
      const observer = new IntersectionObserver(([entry]) => {
        if (entry.isIntersecting) {
          this.visible = true;
          observer.unobserve(el);
        }
      }, { threshold: 0.3 });
      observer.observe(el);
    },
  };
}
</script>
<!-------------------------------------------END OF SCRIPT-------------------------------------------------->