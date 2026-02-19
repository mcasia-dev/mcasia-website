@extends('layouts.app')
@section('content')
<!-- Animation -->
<style>

  html, body {
  overflow-x: hidden;
}


  @media (min-width: 1440px) {

    .images-preview{

    width: 100%;
    height: 100%;          /* same as h-[180px] */
    object-fit: cover;      /* same as object-cover */
    border-radius: 0;       /* same as rounded-none */


    }
    

  }


  /* Medium screen and up (md = 768px) */
@media (min-width: 768px) {
  .image-container {
    height: 60%;          /* same as h-[180px] */
  }

  .images-preview{
    width: 100%;
    height: 100%;          /* same as h-[180px] */



  }
}




  @keyframes scroll {
    from { transform: translateX(0); }
    to { transform: translateX(-50%); }
  }

  .animate-scroll {
    animation: scroll 50s linear infinite;
    width: max-content;
  }


    .full-bleed {
    width: 100vw;
    position: relative;
    left: 1%;
    right: 50%;
    margin-left: -50vw;
    margin-right: -50vw;
  }


    [x-cloak] { display: none !important; }

</style>


<!-- Slideshow -->
<div class="relative w-full h-64 md:h-[500px] overflow-hidden rounded-lg shadow-lg mb-10 bg-black">
  <div id="slideshow" class="w-full h-full relative">
    <img src="{{ asset('images/EXPLORE NEW RECEIPES/1.png') }}"
         class="absolute top-0 left-0 w-full h-full object-cover opacity-100 transition-opacity duration-1000" />
    <img src="{{ asset('images/EXPLORE NEW RECEIPES/2.png') }}"
         class="absolute top-0 left-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000" />
    <img src="{{ asset('images/EXPLORE NEW RECEIPES/3.png') }}"
         class="absolute top-0 left-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000" />
    <img src="{{ asset('images/EXPLORE NEW RECEIPES/4.png') }}"
         class="absolute top-0 left-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000" />

    <!-- Overlay Content Box -->
    <div class="absolute inset-0 flex items-center justify-center">
        <div class="bg-black/50 p-6 rounded-xl shadow-9xl w-full max-w-xl text-center">
        <h2 class="text-2xl font-bold text-white mb-3">Explore New Recipes</h2>
        <p class="text-white mb-4" >
          Explore, cook, and enjoy the rich flavors of Asia without leaving home. McAsia makes it easy to create dishes that delight every craving. Truly, your Home to your Asian Cravings
        </p>
        <button id="toggleContent"
                class="px-6 py-2 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition">
          Explore
        </button>
      </div>
    </div>
  </div>
</div>



<div id="productsSection" class="block">



<!--------------------------------------------3rd Section: Products & Brands Showcase-------------------------------------->

<div class="section min-h-screen flex flex-col items-center justify-start text-white px-4 md:px-6 relative"
     id="section3"
     x-data="{
        openModal: false,
        activeProduct: null,
        currentIndex: 0,
        interval: null,
        thumbIndex: 0,
        selectedImage: null,
        products: [

        { name: 'ABC', description: '', images: [
        { src: 'images/BRAND/ABC/1.png', description: '' },
        { src: 'images/BRAND/ABC/2.png', description: 'ABC SWEET SAUCE 135ML',                                 url: '', info: '' },
        { src: 'images/BRAND/ABC/3.png', description: 'ABC SWEET SAUCE 625ML',                                 url: '', info: '' },
        { src: 'images/BRAND/ABC/4.png', description: 'ABC CHILI SAUCE SAMBAL ASLI 335ML',                     url: 'https://mcasiamart.ph/products/abc-chili-sauce-sambal-asli-335ml?_pos=4&_sid=4b0f2a24b&_ss=r', info: 'Made from high-quality selection of fresh chili peppers and fresh garlic' },
        { src: 'images/BRAND/ABC/5.png', description: 'ABC HOT AND SWEET CHILI SAUCE 335ML',                   url: 'https://mcasiamart.ph/products/abc-hot-and-sweet-chili-sauce-335ml?_pos=3&_sid=4b0f2a24b&_ss=r', info: 'Great as a dip for your favorite deep-fried foods' },

    ] },

    { name: 'DAISHO', description: '', images: [
        { src: 'images/BRAND/DAISHO/1.png', description: '' },
        { src: 'images/BRAND/DAISHO/1.png', description:  'DAISHO AJIKO 225G',                                                url: '', info: ''},
        { src: 'images/BRAND/DAISHO/2.png', description:  'DAISHO BBQ (YAKINIKU) SAUCE ORIGINAL 580G',                        url: '', info: ''},
        { src: 'images/BRAND/DAISHO/3.png', description:  'DAISHO BEEF RICE BOWL SAUCE 175G',                                 url: '', info: ''},
        { src: 'images/BRAND/DAISHO/4.png', description:  'DAISHO YAKIICHI GARLIC BLACK PEPPER(YAKINIKU) 240G',               url: '', info: ''},
        { src: 'images/BRAND/DAISHO/5.png', description:  'DAISHO YAKIICHI GARLIC SOY SAUCE PEPPER(YAKINIKU) 240G',           url: '', info: ''},
        { src: 'images/BRAND/DAISHO/6.png', description:  'DAISHO TERIYAKI SAUCE',                                            url: '', info: ''},

    ] 
    
    },


        { name: 'HENG', description: '', images: [
        { src: 'images/BRAND/HENG/1.png', description: '' },
        { src: 'images/BRAND/HENG/2.png', description:  'CRISPY PRAWN CHILLI 180G',                                                url: '', info: ''},
        { src: 'images/BRAND/HENG/3.png', description:  'CRISPY SEWAWEED CHILI 160G',                                              url: '', info: ''},
        { src: 'images/BRAND/HENG/4.png', description:  'FIVE SPICES FRIED CHICKEN MIX 50G',                                       url: '', info: ''},
        { src: 'images/BRAND/HENG/5.png', description:  'GOLDEN SALTED EGG POWDER 120G',                                           url: '', info: ''},
        { src: 'images/BRAND/HENG/6.png', description:  'NYONYA CHICKEN CURRY SAUCE 200G',                                         url: '', info: ''},
        { src: 'images/BRAND/HENG/7.png', description:  'NYONYA CURRY LAKSA PASTE 200G',                                           url: '', info: ''},
        { src: 'images/BRAND/HENG/8.png', description:  'NYONYA HAINANESE CHICKEN RICE PASTE 100G',                                url: '', info: ''},
        { src: 'images/BRAND/HENG/9.png', description:  'NYONYA RENDANG SAUCE 200G',                                               url: 'https://mcasiamart.ph/products/hengs-nyonya-rendang-sauce-200g?_pos=6&_sid=fa4c52bbe&_ss=r', info: 'Malacca Nyonya cuisine is a fusion of traditional malay and chinese culinary influences coupled with recipes passed down from generations.'},
        { src: 'images/BRAND/HENG/10.png', description: 'PRAWN FLAVOUR FRIED CHICKEN MIX 50G',                                     url: '', info: ''},


    ] 
    
    },




        
        { name: 'OXFORD', description: '', images: [
        { src: 'images/BRAND/OXFORD/1.png', description: '' },
        { src: 'images/BRAND/OXFORD/2.png', description:  'OXFORD BRIGHTS BUTTER CRÈME SANDWICH 125G',                       url: 'https://mcasiamart.ph/products/oxford-brights-butter-creme-sandwich-125g?_pos=5&_sid=9bf6150d9&_ss=r', info: 'Brights Butter Cream is a buttery, delicious, gourmet taste. Youll never want to stop.'},
        { src: 'images/BRAND/OXFORD/3.png', description:  'CHEESE PUFF SANDWICH 190G',                                       url: '', info: ''},
        { src: 'images/BRAND/OXFORD/4.png', description:  'CHOCOLATE PUFF SANDWICH 190G',                                    url: '', info: ''},
        { src: 'images/BRAND/OXFORD/5.png', description:  'OXFORD BRIGHTS COFFEE CRÈME SANDWICH 125G',                       url: 'https://mcasiamart.ph/products/oxford-brights-coffee-creme-sandwich-125g?_pos=4&_sid=9bf6150d9&_ss=r', info: ''},
        { src: 'images/BRAND/OXFORD/6.png', description:  'CORN CRACKERS BISCUITS 400G',                                     url: '', info: ''},
        { src: 'images/BRAND/OXFORD/7.png', description:  'LEMON PUFF SANDWICH 190G',                                        url: 'https://mcasiamart.ph/products/oxford-premier-lemon-puff-sandwich-190g?_pos=3&_sid=9bf6150d9&_ss=r', info: 'Enjoy the perfect balance of light, flaky puff biscuits and a smooth, tangy lemon-flavored crème filling with Oxford Lemon Puff Sandwich. Each bite offers a delightful crunch followed by a refreshing citrusy sweetness'},
        { src: 'images/BRAND/OXFORD/8.png', description:  'ORANGE CREAM 125G',                                               url: '', info: ''},
        { src: 'images/BRAND/OXFORD/9.png', description:  'SUGAR CRACKERS BISCUITS 400G',                                    url: '', info: ''},
        { src: 'images/BRAND/OXFORD/10.png', description: 'VEGE CRACKERS BISCUITS 150G',                                     url: '', info: ''},
        { src: 'images/BRAND/OXFORD/11.png', description: 'VEGE CRACKERS BISCUITS 400G',                                     url: '', info: ''},


    ] 
    
    },
    


    { name: 'KING CHEF', description: '', images: [
        { src: 'images/BRAND/KING CHEF/1.png', description: ''},
        { src: 'images/BRAND/KING CHEF/2.png', description: 'KING CHEF BREAD CRUMBS 1KG',                               url: 'https://mcasiamart.ph/products/king-chef-bread-crumbs-1kg?_pos=16&_sid=0c4040b40&_ss=r', info: ''},
        { src: 'images/BRAND/KING CHEF/3.png', description: 'KING CHEF BREAD CRUMBS 230G',                              url: '', info: '' },
        { src: 'images/BRAND/KING CHEF/4.png', description: 'KING CHEF CANNED MUSHROOM PIECES AND STEMS 425G',          url: '', info: '' },
        { src: 'images/BRAND/KING CHEF/5.png', description: 'KING CHEF CANNED SHIITAKE MUSHROOM 284G',                  url: 'https://mcasiamart.ph/products/king-chef-canned-shiitake-mushroom-whole-284g?_pos=2&_sid=0c4040b40&_ss=r', info: 'Shiitake mushrooms are tan to dark brown, with caps that grow between 2 and 4 inches (5 and 10 cm). While typically eaten like vegetables, shiitake are fungi that grow naturally on decaying hardwood trees.'},
        { src: 'images/BRAND/KING CHEF/6.png', description: 'KING CHEF CANNED STRAW MUSHROOM IN BRINE 425G EASY OPEN',  url: '', info: '' },
        { src: 'images/BRAND/KING CHEF/7.png', description: 'KING CHEF CANNED WHOLE KERNEL CORN 425G EASY OPEN',        url: 'https://mcasiamart.ph/products/king-chef-canned-whole-kernel-corn-425g?_pos=19&_sid=0c4040b40&_ss=r', info: 'King Chef Canned Whole Kernel Corn is made from fresh corn that has been harvested at its peak ripeness and then processed for preservation.' },
        { src: 'images/BRAND/KING CHEF/8.png', description: 'KING CHEF CANNED WHOLE MUSHEROOM IN BRINE 425G',           url: '', info: '' },
        { src: 'images/BRAND/KING CHEF/9.png', description: 'KING CHEF CANNED YOUNG CORN CUT 425G',                     url: 'https://mcasiamart.ph/products/king-chef-canned-young-corn-cut-425g?_pos=20&_sid=0c4040b40&_ss=r', info: 'Canned young corn cut is made of premium young corn cobs, cut into pieces.' },
        { src: 'images/BRAND/KING CHEF/10.png', description: 'KING CHEF CANNED YOUNG CORN WHOLE 425G',                  url: '', info: '' },
        { src: 'images/BRAND/KING CHEF/11.png', description: 'KING CHEF CANOLA OIL 1L',                                 url: '', info: '' },
        { src: 'images/BRAND/KING CHEF/12.png', description: 'KING CHEF COCONUT CREAM 400ML',                           url: '', info: '' },
        { src: 'images/BRAND/KING CHEF/13.png', description: 'KING CHEF COCONUT MILK 400ML.',                           url: 'https://mcasiamart.ph/products/king-chef-coconut-milk-400ml?_pos=18&_sid=0c4040b40&_ss=r', info: '' },
        { src: 'images/BRAND/KING CHEF/14.png', description: 'KING CHEF CREAM STYLE CORN 425G',                         url: '', info: '' },
        { src: 'images/BRAND/KING CHEF/15.png', description: 'KING CHEF DRIED SHIITAKE MUSHROOM 200G',                  url: 'https://mcasiamart.ph/products/king-chef-dried-shitake-mushroom-whole-200g?_pos=6&_sid=0c4040b40&_ss=r', info: '' },
        { src: 'images/BRAND/KING CHEF/16.png', description: 'KING CHEF GLUTINOUS RICE FLOUR',                          url: 'https://mcasiamart.ph/products/king-chef-glutinous-rice-flour?_pos=21&_sid=0c4040b40&_ss=r', info: '' },
        { src: 'images/BRAND/KING CHEF/17.png', description: 'KING CHEF OYSTER SAUCE 250G',                             url: '', info: '' },
        { src: 'images/BRAND/KING CHEF/18.png', description: 'KING CHEF OYSTER SAUCE 510G',                             url: '', info: '' },
        { src: 'images/BRAND/KING CHEF/19.png', description: 'KING CHEF PALM OIL 1L',                                   url: 'https://mcasiamart.ph/products/king-chef-palm-oil-1l?_pos=7&_sid=0c4040b40&_ss=r', info: '' },
        { src: 'images/BRAND/KING CHEF/20.png', description: 'KING CHEF PREMIUM SOTANGHON LONGKOU VERMICELLI 500G',     url: 'https://mcasiamart.ph/products/king-chef-premium-sotanghon-longkou-vermicelli-500g-1?_pos=8&_sid=0c4040b40&_ss=r', info: 'Crafted with potato, mungbean, pea, and water, this allergen-free vermicelli is specially made for soups. It delivers a silky, glassy texture that holds up well in brothy dishes like sotanghon soup and hotpot.' },
        { src: 'images/BRAND/KING CHEF/21.png', description: 'KING CHEF RICE FLOUR',                                    url: 'https://mcasiamart.ph/products/king-chef-rice-flour-500g?_pos=15&_sid=0c4040b40&_ss=r', info: '' },
        { src: 'images/BRAND/KING CHEF/22.png', description: 'KING CHEF SOYBEAN OIL 1L',                                url: '', info: '' },
        { src: 'images/BRAND/KING CHEF/23.png', description: 'KING CHEF SUPERIOR SOTANGHON LONGKOU VERMICELLI 250G',    url: 'https://mcasiamart.ph/products/king-chef-superior-sotanghon-longkou-vermicelli-250g-1?_pos=5&_sid=0c4040b40&_ss=r', info: 'Made from a blend of mungbean, pea, corn, and water, this allergen-free vermicelli offers a firm and springy texture perfect for stir-fry dishes. Ideal for creating flavorful pancit sotanghon or other dry noodle recipes.' },


    ] },

        { name: 'MEET-U', description: '', images: [
        { src: 'images/BRAND/MEETU/1.png', description: '' },
        { src: 'images/BRAND/MEETU/2.png', description: 'BLACK WHITE COFFEE 40G 15S FRONT',              url: 'https://mcasiamart.ph/products/meet-u-black-white-coffee-15sx40g?_pos=3&_sid=dcfb1839e&_ss=r', info: 'A delicious combination of bold black coffee and smooth white coffee, with just the right amount of sweetness and creaminess.'},
        { src: 'images/BRAND/MEETU/3.png', description: 'BLUE MOUNTAIN BLEND COFFEE 15G 10S',            url: 'https://mcasiamart.ph/products/meet-u-blue-mountain-blend-coffee-10sx16g?_pos=6&_sid=dcfb1839e&_ss=r', info: 'Blue Mountain Coffee is freshly ground, moderately baked. The sweet, sour and bitter flavours of coffee are perfectly matched. It is rich and mellow along with unique aroma.'},
        { src: 'images/BRAND/MEETU/4.png', description: 'CLASSIC COFFEE 3 IN 1 20G 10S',                 url: 'https://mcasiamart.ph/products/meet-u-classic-coffee-3in1-10sx20g?_pos=4&_sid=dcfb1839e&_ss=r', info: 'A convenient and delicious instant coffee mix that combines premium coffee, non-dairy creamer, and sugar.'},
        { src: 'images/BRAND/MEETU/5.png', description: 'WHITE COFFEE 3 IN 1 20G 10S',                   url: 'https://mcasiamart.ph/collections/malaysia/products/king-chef-premium-sotanghon-longkou-vermicelli-500g?_pos=1&_sid=05a399f77&_ss=r', info: 'Crafted with potato, mungbean, pea, and water, this allergen-free vermicelli is specially made for soups. It delivers a silky, glassy texture that holds up well in brothy dishes like sotanghon soup and hotpot.'},
    ] },

    { name: 'MILCASA', description: '', images: [
        { src: 'images/BRAND/MILCASA/1.png', description: '' },
        { src: 'images/BRAND/MILCASA/2.png', description: 'MILCASA LOWFAT 1L',         url: '', info: ''},
        { src: 'images/BRAND/MILCASA/3.png', description: 'MILCASA FULL CREAM 1L',     url: 'https://mcasiamart.ph/products/milcasa-full-cream-3-5-pct?_pos=2&_sid=785c11990&_ss=r', info: ''},
    ] },

    { name: 'OTAFUKU', description: '', images: [
        { src: 'images/BRAND/OTAFUKU/1.png', description: '' },
        { src: 'images/BRAND/OTAFUKU/2.png', description: 'OTAFUKU TAKOYAKI FLOURS 180G',    url: 'https://mcasiamart.ph/collections/snacks/products/oxford-brights-butter-creme-sandwich-125g?_pos=1&_sid=1297d562b&_ss=r', info: 'Brights Butter Cream is a buttery, delicious, gourmet taste. Youll never want to stop. Brights Butter Cream will have you coming back for more. This biscuit is good with any kind of dip or topping.'},
        { src: 'images/BRAND/OTAFUKU/3.png', description: 'OTAFUKU OKONOMI SAUCE  300G',     url: 'https://mcasiamart.ph/products/oxford-brights-coffee-creme-sandwich-125g?_pos=1&_sid=3633df7ba&_ss=r', info: ''},
        { src: 'images/BRAND/OTAFUKU/4.png', description: 'OTAFUKU OMURICE SAUCE  300G',     url: 'https://mcasiamart.ph/products/otafuku-omurice-sauce-300g?_pos=1&_sid=9ba6f46a3&_ss=r', info: 'Enjoy the rich and savory taste of Japanese-style omurice at home! This ready-to-use sauce is perfect for drizzling over fluffy omelets with fried rice. Made with a blend of tomato and spices for that authentic sweet and tangy flavor.'},
        { src: 'images/BRAND/OTAFUKU/5.png', description: 'OTAFUKU TAKOYAKI SAUCE 300G',     url: 'https://mcasiamart.ph/products/otafuku-takoyaki-sauce-300g?_pos=7&_sid=9ba6f46a3&_ss=r', info: 'Create authentic Japanese street food flavors at home with Otafuku Takoyaki Sauce, the perfect topping for your delicious takoyaki (octopus balls).'},
        { src: 'images/BRAND/OTAFUKU/6.png', description: 'OTAFUKU TONKATSU SAUCE 340G',     url: '', info: ''},
    ] },

    { name: 'OZAKI', description: '', images: [
        { src: 'images/BRAND/OZAKI/1.png', description: '' },
        { src: 'images/BRAND/OZAKI/2.png', description: 'OZAKI CRABSTICK 500G',                url: 'https://mcasiamart.ph/products/ozaki-crabstick-500g?_pos=20&_sid=aa4730a77&_ss=r', info: 'Crab sticks, krab sticks, imitation crab meat or seafood sticks are a type of seafood made of starch and finely pulverized white fish that has been shaped '},
        { src: 'images/BRAND/OZAKI/3.png', description: 'OZAKI FROZEN EDAMAME 500G',           url: 'https://mcasiamart.ph/products/ozaki-frozen-edamame-500g?_pos=18&_sid=aa4730a77&_ss=r', info: 'Endamame are young green soybean, these arefrozen peeled endamame soy bean. '},
        { src: 'images/BRAND/OZAKI/4.png', description: 'OZAKI HONMIRIN 1L',                   url: 'https://mcasiamart.ph/products/ozaki-honmirin-1l?_pos=8&_sid=aa4730a77&_ss=r', info: 'Hon Mirin is a naturally fermented sweet rice wine used primarily to flavor Japanese dishes.'},
        { src: 'images/BRAND/OZAKI/5.png', description: 'OZAKI JAPANESE MAYONNAISE 400G',      url: 'https://mcasiamart.ph/products/ozaki-mayonnaise-400g?_pos=2&_sid=aa4730a77&_ss=r', info: 'Level up your favorite appetizer and snack more flavorful with the brand new OZAKI Mayonnaise!'},
        { src: 'images/BRAND/OZAKI/6.png', description: 'OZAKI NORI SHEETS PREM 10s 28g',      url: 'https://mcasiamart.ph/products/ozaki-nori-sheets-prem-10sheets?_pos=19&_sid=aa4730a77&_ss=r', info: 'Edible seaweed or a dried seaweed flatten into sheets. '},
        { src: 'images/BRAND/OZAKI/7.png', description: 'OZAKI RYORISHU SAKE 1L',              url: '', info: ''},
    ] },



    { name: 'SEA CHEF', description: '', images: [

        { src: 'images/BRAND/SEA CHEF/1.png',  description: ''},
        { src: 'images/BRAND/SEA CHEF/2.png',  description: 'SEA CHEF CRABSTICK 1KG',                               url: 'https://mcasiamart.ph/products/sea-chef-crabstick-1kg?_pos=1&_sid=7015daab5&_ss=r', info: 'Add flavor and variety to your meals with Sea Chef Crabstick. Made from quality seafood, these tender and flavorful sticks are perfect for salads, sushi, soups, stir-fries, or as a tasty snack on their own.'},
        { src: 'images/BRAND/SEA CHEF/3.png',  description: 'SEA CHEF FROZEN SEAFOOD PANCAKE 200G',                 url: 'https://mcasiamart.ph/products/sea-chef-frozen-seafood-pancake-200g?_pos=10&_sid=7015daab5&_ss=r', info: 'Savor the delicious taste of Sea Chef Frozen Seafood Pancake, made with a mix of fresh seafood and a well-seasoned batter.'},
        { src: 'images/BRAND/SEA CHEF/4.png',  description: 'SEA CHEF HOTPOT - CHIKUHAW',                           url: 'https://mcasiamart.ph/products/sea-chef-frozen-chikuwa-500g?_pos=2&_sid=7015daab5&_ss=r', info: 'Enjoy the authentic taste of Sea Chef Frozen Chikuwa — a delicious fish cake made from premium fish paste, seasoned, and shaped into a tube before being perfectly cooked and frozen for freshness.'},
        { src: 'images/BRAND/SEA CHEF/5.png',  description: 'SEA CHEF HOTPOT - FROZEN CUTTLEFISH',                  url: 'https://mcasiamart.ph/products/sea-chef-frozen-cuttlefish-ball-500g?_pos=3&_sid=7015daab5&_ss=r', info: 'Enjoy the rich, savory taste of Sea Chef Frozen Cuttlefish Ball — made from premium cuttlefish blended to perfection for a smooth and springy texture.'},
        { src: 'images/BRAND/SEA CHEF/6.png',  description: 'SEA CHEF HOTPOT - FROZEN FISH TOFU',                   url: 'https://mcasiamart.ph/products/sea-chef-frozen-fish-tofu-500g?_pos=6&_sid=7015daab5&_ss=r', info: 'Enjoy the smooth and savory taste of Sea Chef Frozen Fish Tofu — a delightful blend of fish paste and tofu, offering a soft yet bouncy texture.'},
        { src: 'images/BRAND/SEA CHEF/7.png',  description: 'SEA CHEF HOTPOT - FROZEN FISHBALL ',                   url: '', info: ''},
        { src: 'images/BRAND/SEA CHEF/8.png',  description: 'SEA CHEF HOTPOT - FROZEN IMITATION KING CRAB BALL',    url: 'https://mcasiamart.ph/products/sea-chef-frozen-imitation-king-crab-ball-500g?_pos=9&_sid=7015daab5&_ss=r', info: 'Delight in the premium taste of Sea Chef Frozen Imitation King Crab Ball — crafted from quality fish paste and seasoned to capture the rich flavor of king crab. Each piece is tender, juicy, and full of seafood goodness.'},
        { src: 'images/BRAND/SEA CHEF/9.png',  description: 'SEA CHEF HOTPOT - HOTPOT SET',                         url: 'https://mcasiamart.ph/products/sea-chef-frozen-hotpot-set-500g?_pos=5&_sid=7015daab5&_ss=r', info: 'Enjoy a complete and flavorful hotpot experience with Sea Chef Frozen Hotpot Set — a convenient mix of assorted seafood balls and bites, all made from quality ingredients for a delicious and satisfying meal.'},
        { src: 'images/BRAND/SEA CHEF/10.png', description: 'SEA CHEF HOTPOT - IMITATION KING CRAB NUGGET',         url: 'https://mcasiamart.ph/products/sea-chef-frozen-imitation-crab-nugget-500g?_pos=8&_sid=7015daab5&_ss=r', info: 'Savor the rich and savory flavor of Sea Chef Frozen Imitation Crab Nugget — made from premium fish paste and seasoned to taste like real crab meat. Each nugget is soft, juicy, and full of seafood goodness.'},
        { src: 'images/BRAND/SEA CHEF/11.png', description: 'SEA CHEF HOTPOT - VEGETABLE FRIED FISHBALL ',          url: '', info: ''},

    ] },




    { name: 'UM-MAMI', description: '', images: [

        { src: 'images/BRAND/UM-MAMI/1.png',  description: '' },
        { src: 'images/BRAND/UM-MAMI/2.png',  description: 'PORK SAUSAGE 500G',                   url: '', info: ''},
        { src: 'images/BRAND/UM-MAMI/3.png',  description: 'SAIKORO STEAK 500G',                  url: 'https://mcasiamart.ph/collections/501-800/products/um-mami-saikoro-steak-500g?_pos=1&_sid=978b17b6a&_ss=r', info: 'Um-Mami Saikoro Steak 500G is made from high-quality beef, featuring a unique coarsely-ground texture. This steak cooks in a matter of minutes and is packed with umami flavor and juiciness, making it the perfect choice for an easy and delicious meal. The 500g size ensures there is enough to feed a group.'},
        { src: 'images/BRAND/UM-MAMI/4.png',  description: 'UNAGI KABAYAKI 50P 200G',             url: 'https://mcasiamart.ph/products/um-mami-unagi-kabayaki-200g?_pos=1&_sid=270fa9e77&_ss=r', info: 'UM-MAMI Unagi Kabayaki is a 200g pack of premium grilled eel fillet, carefully prepared and glazed with authentic kabayaki sauce made from soy sauce, sugar, and mirin. The eel is tender, rich in flavor, and has a perfect balance of sweet and savory taste'},

    ] }

],

startSlideshow() {
      this.interval = setInterval(() => {
        this.currentIndex = (this.currentIndex + 1) % Math.ceil(this.products.length / 2);
      }, 5000);
    },

    stopSlideshow() {
      clearInterval(this.interval);
      this.interval = null;
    },

    resetSlideshow() {
      this.stopSlideshow();
      this.startSlideshow();
    }
  }"
  x-init="startSlideshow()"
>

<div class="w-full flex ml-30">
  <h1 class="text-[25px] font-bold text-black drop-shadow-lg whitespace-nowrap"
      style="font-family: Arial, sans-serif;">
    Products & Brands
  </h1>
</div>


<!-- Showcase Slider -->
<div class="relative w-screen h-auto md:h-[370px] overflow-hidden rounded-none shadow-2xl image-container">
  
  <!-- Sliding Wrapper -->
  <div 
    class="flex transition-transform duration-700 ease-in-out"
    :style="`transform: translateX(-${currentIndex * 100}%)`"
  >

    <!-- Each batch is a group of 2 landscape cards -->
    <template x-for="batch in Math.ceil(products.length / 2)" :key="batch">
      <div class="flex-shrink-0 w-full flex flex-col md:flex-row gap-6 p-6 justify-center items-center">

        <template x-for="(product, i) in products.slice((batch-1)*2, (batch-1)*2 + 2)" :key="product.name">
          <div 
            class="w-full md:w-1/2 bg-white rounded-xl shadow-lg overflow-hidden cursor-pointer transition transform hover:scale-[1.02] flex justify-center"
            @click="activeProduct = product; openModal = true; thumbIndex = 0; selectedImage = product.images[0]"
          >
            <img 
              :src="product.images[0].src" 
              :alt="product.name"
              class="w-full h-[180px] md:h-[220px] object-cover rounded-none images-preview"
            >
          </div>
        </template>

        <!-- Add invisible placeholder for consistent layout if last batch has only 1 image -->
        <template x-if="products.slice((batch-1)*2, (batch-1)*2 + 2).length === 1">
          <div class="hidden md:block w-1/2 h-[180px] md:h-[220px] bg-transparent"></div>
        </template>

      </div>
    </template>
  </div>

  <!-- Controls -->
  <button 
    @click="
      currentIndex = (currentIndex - 1 + Math.ceil(products.length/2)) % Math.ceil(products.length/2);
      resetSlideshow();
    "
    class="absolute left-3 top-1/2 -translate-y-1/2 bg-black/50 p-3 rounded-full text-white hover:bg-red-600 transition z-10">
    ‹
  </button>

  <button 
    @click="
      currentIndex = (currentIndex + 1) % Math.ceil(products.length/2);
      resetSlideshow();
    "
    class="absolute right-3 top-1/2 -translate-y-1/2 bg-black/50 p-3 rounded-full text-white hover:bg-red-600 transition z-10">
    ›
  </button>

</div>
    <!-- Modal -->
    <div x-show="openModal"
         x-transition.opacity
         x-cloak
         class="fixed inset-0 flex items-center justify-center bg-black/80 z-50 p-4"
         @click.self="openModal = false">

        <div class="bg-white rounded-2xl w-full max-w-6xl h-[85vh] p-6 relative overflow-y-auto">
            <button @click="openModal = false"
                    class="absolute top-4 right-6 text-black  text-1xl">✕</button>

            <!-- Two-column layout: Image left, Description right -->
            <div class="flex flex-col md:flex-row gap-6 items-start">
                <!-- Main Image -->
                <div class="flex-1 flex justify-center">
                    <img :src="selectedImage?.src" class="w-full max-h-[300px] object-contain rounded-lg shadow-lg">
                </div>

                <!-- Description/Text -->
                <div class="flex-1 flex flex-col justify-start">
                    <h2 class="text-2xl font-bold text-black mb-4" x-text="selectedImage?.description"></h2>
                    <p class="text-black mb-4 text-lg" x-text="selectedImage?.info"></p>
                    <p class="text-black text-lg" x-text="activeProduct?.description"></p>

                
<!-- ✅ Show active button if URL has a value -->
<template x-if="'url' in selectedImage && selectedImage.url.trim() !== ''">
  <a 
    :href="selectedImage.url" 
    target="_blank"
    class="mt-2 bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-lg font-semibold transition"
  >
    <center>View Products</center>
  </a>
</template>

<!-- ⚪ Greyed out if URL exists but is empty -->
<template x-if="'url' in selectedImage && selectedImage.url.trim() === ''">
  <button 
    disabled
    class="mt-2 bg-gray-500 text-white px-5 py-2 rounded-lg font-semibold opacity-70 cursor-not-allowed"
  >
    Link Unavailable
  </button>
</template>


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
<!-------------------------------------------------------------------------END OF CODE-------------------------------------------------------------------------------->


    <div class="h-30"></div>




<!---------------------------------------------------------------------RETAIL BRANDS SLIDER------------------------------------------------------------------>
<div class="w-full flex ml-30">
  <h1 class="text-[25px] font-bold text-black drop-shadow-lg whitespace-nowrap"
      style="font-family: Arial, sans-serif;">
    Our Retail Partners
  </h1>
</div>
<div class="full-bleed bg-white py-10 h-[257px] flex flex-col items-center">
  <!-- Scrolling container -->
  <div class="relative w-full overflow-hidden border-y border-gray-300 py-8">
    <div class="flex items-center gap-1 animate-scroll">

      {{-- Generate logos once --}}
      @foreach (range(1, 23) as $i)
        <div class="flex-shrink-0 flex items-center justify-center w-50 h-15 bg-white rounded-lg shadow-sm transition-transform duration-300 hover:scale-105">
          <img 
            src="{{ asset("images/Retail Partner/$i.png") }}" 
            alt="Retail Brand {{ $i }}" 
            class="w-[160px] h-[180px] object-contain"
          >
        </div>
      @endforeach

      {{-- Duplicate for seamless infinite scroll --}}
      @foreach (range(1, 23) as $i)
        <div class="flex-shrink-0 flex items-center justify-center w-50 h-36 bg-white rounded-lg shadow-sm transition-transform duration-300 hover:scale-105">
          <img 
            src="{{ asset("images/Retail Partner/$i.png") }}" 
            alt="Retail Brand {{ $i }}" 
            class="w-[160px] h-[180px] object-contain"
          >
        </div>
      @endforeach

    </div>
  </div>
</div>

<!------------------------------------------------------------------------------------------------------------------------------------------------------------>






    <div class="h-20"></div>


<!-------------------------------------------------------------------------8th Section--------------------------------------------------->
<section class="bg-white flex items-center justify-center text-gray-800 mx-auto my-10 -mt-25 rounded-2xl shadow-md
                w-[90%] sm:w-[500px] h-[250px] border border-gray-200 -mt-10">
  <div class="text-center">
    <h2 class="text-2xl font-semibold mb-6" style="font-family: Arial, sans-serif;">Shop Online</h2>




    <div class="flex justify-center space-x-6">



      <!-- Tiktok -->
      <a href="https://www.tiktok.com/@mcasiamartph" target="_blank" class="hover:scale-110 transition-transform duration-300 translate-x-3">
        <img src="{{ asset('images/tiktok_new_logo.png') }}" alt="Tiktok" class="w-20 h-20">
      </a>

      
      <!-- McAsia Mart -->
      <a href="https://mcasiamart.ph" target="_blank" class="hover:scale-110 transition-transform duration-300 ">
        <img src="{{ asset('images/mcasia_new_logo.png') }}" alt="McAsiaMart" class="w-25 h-25">
      </a>


      <!-- Lazada -->
      <a href="https://www.lazada.com.ph/shop/mcasia-mart" target="_blank" class="hover:scale-110 transition-transform duration-300">
        <img src="{{ asset('images/lazada_new_logo.png') }}" alt="Lazada" class="w-20 h-20">
      </a>

      <!-- Shopee -->
      <a href="https://shopee.ph/mcasiamart" target="_blank" class="hover:scale-110 transition-transform duration-300">
        <img src="{{ asset('images/shopee_new_logo.png') }}" alt="Shopee" class="w-20 h-20">
      </a>
    </div>
  </div>
</section>




<!--------- First Page Content ------------------------------------------------>
  </div>
</div>
</div>

<!-------------------------------------------------------------------------END OF CODE----------------------------------------------------------->





<!----------------------------------------------------------------------RECIPE SECTION---------------------------------------------->
<div id="recipesSection" class="hidden px-6">

  <!-- Section 4: Recipes Showcase -->
  <div id="section4" x-data="{ open: false, recipe: null }">

    <!-- Title -->
    <h2 class="text-2xl font-bold mb-5 ml-8">Recipes</h2> <!-- move right -->
      </h2>

    @php
      $recipes = [
        [



          'image' => 'images/RECIPE/1.jpg',
          'title' => 'MIXED SEA FOOD',
          'videoEmbed' => 'https://www.youtube.com/embed/JYHa_sgQVCg?si=a20Ryq25jNjy8TD7',
          'ingredients' => [
            ['name' => '1 Pack of Lobo Chinese Five Spice Blend Powder'],
            ['name' => '1 kl. Marble Potatoes'],
            ['name' => '1 Pack Hungarian Sausage'],
            ['name' => '3 Pcs. Fresh Corn, cut in three'],
            ['name' => '4 pcs crabs, cut into 2'],
            ['name' => '500g Sea Chef Shrimp, Peeled and Deveined'],
            ['name' => '1/4 Cup Garlic'],
            ['name' => '1 lemon/lime'],
            ['name' => '1 Onion'],
            ['name' => 'Salt and pepper to taste'],
          ],
          'instructions' => [
            'Boil 5L of water over medium high heat and add the Lobo Chinese Five Spice blend powder',
            'Add salt, pepper, marble potatoes, Hungarian sausage, lemon, onions and garlic. Cover and boil for 10 minutes',
            'Add corn and cook for 5 minutes',
            'Add crab and cook for 5 minutes',
            'Add Sea Chef Shrimp, cook for another 3 to 4 minutes',
            'Drain off water and pour the contents in a serving tray.'
          ]
        ],



        [
          'image' => 'images/RECIPE/2.jpg',
          'title' => 'PORK ADOBO',
          'videoEmbed' => 'https://www.youtube.com/embed/9Dty-_sEHy4?si=fO0Y5joZenBLBHhk',
          'ingredients' => [
            ['name' => '2 Lbs Pork Belly'],
            ['name' => '2 tbsp garlic (minced or crushed)'],
            ['name' => '2 pcs bay leaf'],
            ['name' => '4 tbsp vinegar'],
            ['name' => '1/2 cup Kikkoman Soy Sauce Koikuchi'],
            ['name' => '1 tbsp peppercorn'],
            ['name' => '2 cups water'],
            ['name' => '1 cup stock'],
            ['name' => 'Salt to taste'],
          ],
          'instructions' => [
            'Mix pork belly with soy sauce, vinegar, bay leaves, peppercorn and garlic',
            'Sear the marinated pork until brown on all sides, then set aside',
            'In the same pan, sauté garlic until fragrant',
            'Put back the pork into the pan, cover and bring to a boil',
            'Once boiling, add the stock',
            'Simmer for 20–25 minutes or until the pork is tender',
            'Transfer onto a platter and serve hot'
          ]
        ],



        [
          'image' => 'images/RECIPE/3.jpg',
          'title' => 'BUBBLE MILK TEA',
          'videoEmbed' => 'https://www.youtube.com/embed/LWUGjDALRF0?si=u1TPCZQ8KEJ_rhiG',
          'ingredients' => [
            ['name' => '500ml of hot water'],
            ['name' => '1000ml of cold water'],
            ['name' => '1 pack MEET U Milk White Tea 3-in-1'],
            ['name' => 'Tapioca pearls (cooked)'],
          ],
          'instructions' => [
            'Pour hot water to dissolve the milk tea powder',
            'Mix and stir until fully dissolved',
            'Add in cold water and stir',
            'Add tapioca pearls',
            'Pour the milk tea mixture in a glass and enjoy'
          ]
        ],




        [
          'image' => 'images/RECIPE/4.jpg',
          'title' => 'Coconut Milk Shake',
          'videoEmbed' => 'https://player.vimeo.com/video/809621403?h=419fbf3b78',
          'ingredients' => [
            ['name' => '2 cups vanilla ice cream'],
            ['name' => 'coconut flakes (optional)'],
            ['name' => '1 cup crushed iced'],
            ['name' => '2/3 cups Vico Rich Coconut Milk'],
            ['name' => '2/3 cups Vico Fresh Natural Coconut Water'],
          ],
          'instructions' => [
            'Add all ingredients to a large blender.',
            'Blend until smooth and creamy.',
            'Pour into a chilled glass and top with coconut flakes if desired.',
          ]
        ],



        [
          'image' => 'images/RECIPE/5.jpg',
          'title' => 'Longevity Noodles With Chicken And Mushroom',
          'videoEmbed' => 'https://player.vimeo.com/video/791757071?h=de543c777f',
          'ingredients' => [
            ['name' => '16 ounces fresh noodles'],
            ['name' => '6 ounces of boneless chicken breast'],
            ['name' => '12 pieces King Chef Shiitake Mushroom'],
            ['name' => '3/4 cup Chinese chive chopped'],
            ['name' => '1 piece carrot julienne'],
            ['name' => '1/4 cup scallions chopped'],
            ['name' => '5 tablespoons oyster sauce'],
            ['name' => '6 cups water'],
            ['name' => '1/4 cup Shaoxing cooking wine'],
            ['name' => '3 tablespoons of King Chef Canola Oil'],
            ['name' => '1/8 teaspoon ground black pepper'],
            ['name' => '1 tablespoon dark soy sauce'],
            ['name' => '1/2 cup of chicken broth'],
          ],
          'instructions' => [
            'Over medium high heat, add 3 tbsp of king chef canola oil in a wok. Add in the chicken and stir-fry for 3 minutes or until cooked. Transfer into a bowl and set aside',
            'Add in the shrimp. Season it with salt and pepper. Stir-fry for 3 minutes. Transfer into a separate bowl and set aside.',
            'In the same wok, sauté onion and garlic. Pour in the dark soy sauce and shaoxing wine. Add in the cooked chicken, carrots, and shiitake mushroom. Pour in the chicken broth and mix everything.',
            'Transfer the noodles into the wok. then toss gently for a minute or two, just enough to combine everything well and ensure an even color. Add the chives, spring onions, and cooked shrimp. Transfer on plate.',
          ]
        ],



        [
          'image' => 'images/RECIPE/6.jpg',
          'title' => 'Pad Thai',
          'videoEmbed' => 'https://player.vimeo.com/video/732031915?h=51f4a0ca3a',
          'ingredients' => [
            ['name' => '4 tbsp. King Chef Canola Oil'],
            ['name' => 'About 8 pcs Sea Chef Shrimp'],
            ['name' => '4 pcs chicken thigh fillet, diced'],
            ['name' => '2 tbsp. garlic, chopped finely'],
            ['name' => '3 tbsp. onions, chopped finely'],
            ['name' => '2 square firm tofu, diced'],
            ['name' => '1 pack Lami Rice Noodle 200g (soaked in warm water for 10 minutes)'],
            ['name' => '1 cup Thai Dancer Pad Thai Stir-Fry Sauce'],
            ['name' => '2-3 pcs eggs'],
            ['name' => '2 cups bean sprouts'],
            ['name' => '1/2 cup chives, cut into 3” strips'],
          ],
          'instructions' => [
            'In a work over medium heat, pour King Chef Canola Oil and add some of the garlic.',
            'Cook Sea Chef Shrimp until pink. Remove from pan.',
            'Brown chicken pieces until half cooked.',
            'Add the rest of the garlic and onions',
            'Add tofu, Lami Rice Noodle 200g, and sauté.',
            'Add Thai Dancer Pad Thai Stir-Fry Sauce. Sauté to coat noodles evenly.',
            'Push noodles to the side to add in unbeaten eggs. Sauté with the rest of the ingredients.',
            'Add cooked shrimp back the pan.',
            'Sauté in bean sprouts and some of the chive.',
            'Remove from heat and add remaining chives for garnish.',
            'Best consumed immediately.',

          ]
        ],



        
        [
          'image' => 'images/RECIPE/7.jpg',
          'title' => 'Spring Rolls',
          'videoEmbed' => 'https://player.vimeo.com/video/791755881?h=ece154b679',
          'ingredients' => [
            ['name' => '20 Spring roll wrappers'],
            ['name' => '6 King Chef Canned Shiitake Mushrooms'],
            ['name' => '230g skinless, boneless chicken thighs'],
            ['name' => '110g raw Sea Chef Shrimp, deveined'],
            ['name' => '600g cabbage shredded'],
            ['name' => '1 teaspoon sea salt'],
            ['name' => '1 1/2 tablespoons cornstarch mixed with 3 tablespoons of mushroom soaking liquid'],
            ['name' => '1 egg'],
            ['name' => '2 tablespoons onion'],
            ['name' => '2 teaspoon garlic'],
            ['name' => '1/4 cup celery'],
            ['name' => '2 tablespoons oyster sauce'],
            ['name' => '1 teaspoon spring onions'],
            ['name' => '1 tablespoon shaoxing wine'],
            ['name' => '2 tablespoon of dark soy sauce'],

          ],


          'instructions' => [
            'Heat the pan with some oil and put 2 tbsp of onion. Add 1/4 cup of celery and 2 tsp. of garlic.',
            'Add the chicken thighs, then pour the 1 tbsp of light soy sauce and oyster sauce , stir fry and season with white pepper and salt.',
            'Cook for a minute, and add 2 tbsp of dark soy sauce.',
            'When it turns into brown, add the King Chef Shitake Mushroom, shrimp and season with sugar.',
            'Pour 1tbsp. of shaoxing wine, put the shredded cabbage and gently pour cornstarch slurry and stir fry until softens. Add 1/4 cup spring onions, onions leaks and stir again.',
            'Place around 2 spoon of filling into the center of the spring roll. Tuck in the sides and roll it up, sealing the edges wit flour mixture.',
            'Pour enough oil into the pot, and throw spring roll until the skin is golden and crispy. Drain on a paper towel and serve.',
          ]
        ],




        [
          'image' => 'images/RECIPE/8.jpg',
          'title' => 'Cantonese Wonton Soup',
          'videoEmbed' => 'https://player.vimeo.com/video/791755843?h=48d4855a17',
          'ingredients' => [
            ['name' => '1 pack of wonton wrappers, around 50'],
            ['name' => '2 lb shell-on medium shrimp (0r 1lb 10oz deshelled)'],
            ['name' => '4 pcs chicken thigh fillet, diced'],
            ['name' => '2 tbsp. garlic, chopped finely'],
            ['name' => '3 tbsp. onions, chopped finely'],
            ['name' => '2 square firm tofu, diced'],
            ['name' => '1 pack Lami Rice Noodle 200g (soaked in warm water for 10 minutes)'],
            ['name' => '1 cup Thai Dancer Pad Thai Stir-Fry Sauce'],
            ['name' => '2-3 pcs eggs'],
            ['name' => '2 cups bean sprouts'],
            ['name' => '1/2 cup chives, cut into 3” strips'],

          ],

          
          'instructions' => [
            'On a mixing bowl, pour Sea Chef Shrimp and mix the 2 tbsp. of Shaoxing Wine',
            'Gently add 2 tbsp. corn starch, 1 tsp. salt, sugar, and sesame oil. Add also the 1 tsp. of white pepper powder',
            'Pour the egg white in the mixture and combine all the ingredients then set aside',
            'Prepare a wrapper and place 1 tbsp. of the shrimp mixture. Flip the corner of the wrapper inward to wrap, the fold the two sides.',
            'Repeat these steps until you finish the filling or wonton wrapper',
            'Bring a medium pot of broth to boil and cook the wonton,  then serve the hot soup!',
          ]
        ]


      ];
    @endphp

    <!-- Recipe Thumbnails -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
      @foreach($recipes as $recipe)
        <div class="bg-white rounded-xl shadow-xl overflow-hidden cursor-pointer hover:scale-105 transition-transform duration-300"
             @click="open = true; recipe = {{ json_encode($recipe) }}">
          <img src="{{ $recipe['image'] }}" class="w-full h-64 object-stretch" alt="{{ $recipe['title'] }}">
          <div class="p-4">
            <h3 class="font-bold text-xl text-red-600">{{ $recipe['title'] }}</h3>
          </div>
        </div>
      @endforeach
    </div>

    <!-- Modal -->
    <div x-show="open" x-transition
         class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50">
      <div class="bg-white rounded-xl shadow-2xl w-11/12 md:w-4/5 lg:w-2/3 max-h-[95vh] overflow-y-auto flex flex-col"
           @click.away="open = false">

        <!-- Header -->
        <div class="flex justify-between items-center p-5 border-b sticky top-0 bg-white z-10">
          <h2 class="text-2xl font-bold text-black" x-text="recipe?.title"></h2>
          <button @click="open = false" class="text-gray-600 hover:text-black text-1xl">X</button>
        </div>

        <!-- Content -->
        <div class="p-6 space-y-8">

          <!-- Video or Image -->
          <div>
            <template x-if="recipe?.videoEmbed">
              <div class="relative pb-[56.25%] h-0 overflow-hidden rounded-lg">
                <iframe 
                  class="absolute top-0 left-0 w-full h-full"
                  :src="open ? recipe.videoEmbed + '&autoplay=1&mute=1' : recipe.videoEmbed"
                  frameborder="0"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
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
     <div class="h-20"></div>
<!--------------------------------------------------------------END OF CODE-------------------------------------------->


    </div>




@include('components.footer')

@endsection


@push('scripts')
@vite('resources/js/consumer_products.js')
@endpush

