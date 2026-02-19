    @extends('layouts.app')
    @section('title', 'McAsia - Daisho')
    @section('content')

    <style>
    /* Viewing for Monitor going 2k - 4k resolution */
    @media (min-width: 1440px) {
    .content-wrapper {
      margin-left: -17rem; /* Move content slightly right */
      margin-bottom: 5rem; /* Optional vertical offset */
      }

    .banner_daisho
    {
      height: 90%;
      width:  100%;
      margin-top: 5%;
    }

    }
    /*-------------------------------------------------*/


    /*-----------Smaller Screens---------------------------------------*/
@media (min-width: 641px) and (max-width: 1439px) 
{

    
    .banner_daisho
    {
      height: 88%;
      margin-top: 7%;
      width: 100%;
    }



}
/*-------------------------------------------------------------------*/



    /*--------------------Mobile Resolution-------------*/
    @media (max-width: 414px) {

    .banner_daisho
    {
      height: 14rem;
      margin-top: 15%;
      object-fit: contain;
    
    }


    }
    /*-------------------------------------------------*/






    </style>




<div class="relative overflow-hidden min-h-screen">

<!--------------------------------------------SLIDESHOW---------------------------------------------------->
<section class="banner_daisho relative h-screen overflow-hidden">





<!-- Slideshow -->
<div class="relative w-full overflow-hidden rounded-lg shadow-lg mb-10 bg-black">
  <div id="slideshow" class="w-full h-full relative">
    <img src="{{ asset('images/product_brands/daisho/banner.png') }}"
         class="absolute top-0 left-0 w-full h-full object-cover opacity-100 transition-opacity duration-1000" />
    <!-- Overlay Content Box -->
  </div>
</div>









</section>
<!------------------------------------------------------------------------------------------------------------------------->





<!----------------------------------------------------------Section 2--------------------------------------------------->
<section class="relative w-full py-16 bg-gray-100">

  <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
    
<!---------------------------------------------------------------CARD 1------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <!-- Image -->
      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/daisho/1.png') }}" 
          alt="ABC Chili Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <!-- Content -->
      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          DAISHO AJI SHIO KOSHO
        </h3>

        <p class="text-gray-600 text-sm mt-3 leading-relaxed">
        Elevate your dishes with Daisho Aji Shio Kosho, a premium Japanese seasoned salt and pepper blend that adds a perfectly balanced flavor to any meal. 
        Made with high-quality salt, black pepper, and a hint of umami seasoning, it enhances the natural taste of meat, seafood, and vegetables.        
        </p>
      </div>
    </div>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->






<!---------------------------------------------------------------CARD 2------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/daisho/2.png') }}" 
          alt="ABC Chili Extra Hot"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          DAISHO AJI SHIO KOSHO
        </h3>

        <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
          Elevate your dishes with Daisho Aji Shio Kosho, a premium Japanese seasoned salt and pepper blend that adds a perfectly balanced flavor to any meal. 
          Made with high-quality salt, black pepper, and a hint of umami seasoning, it enhances the natural taste of meat, seafood, and vegetables.
        </p>

        <p class="text-sm text-gray-600 mt-3 font-semibold">Features:</p>
        <ul class="list-disc ml-5 text-sm text-gray-600 space-y-1">
          <li>Authentic Japanese-style salt and pepper seasoning</li>
          <li>Made with finely ground salt and black pepper for even seasoning</li>
          <li>Adds a savory umami flavor that complements any dish</li>
          <li>Ideal for grilled meats, fried dishes, stir-fries, and marinades</li>
        </ul>




      </div>
    </div>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->




<!---------------------------------------------------------------CARD 3------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/daisho/3.png') }}" 
          alt="ABC Sweet Soy Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          DAISHO COCO ICHIBANYA MAPO TOFU SPICY CURRY SOUP
        </h3>

        <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
        Daisho Coco Ichibanya Mapo Tofu Spicy Curry Soup" is
        a packaged soup that combines the flavors of Japanese curry and Mapo Tofu. It's a collaboration between Daisho and CoCo Ichibanya, a Japanese curry house, and is designed to be a spicy, flavorful curry pot soup. The soup is a ready-to-heat, single-serving packet that can be customized by adding other ingredients like meat, vegetables, or mushrooms.     
        </p>



      </div>
    </div>


<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->








<!---------------------------------------------------------------CARD 4------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/daisho/4.png') }}" 
          alt="ABC Sweet Soy Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          DAISHO KARAAGE SHOYU
        </h3>

        <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
        A Japanese seasoning mix perfect for making flavorful and crispy fried chicken. Infused
        with rich soy sauce and spices, this blend delivers an authentic karaage taste. Ideal for quick and easy meals at home.
        </p>



        <p class="text-sm text-gray-600 mt-3 font-semibold">Features:</p>
        <ul class="list-disc ml-5 text-sm text-gray-600 space-y-1">
          <li>Authentic Japanese flavor</li>
          <li>Soy sauce-based seasoning</li>
          <li>Great for fried chicken dishes</li>
          <li>Product of Japan</li>
        </ul>




      </div>
    </div>


<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->







  <!---------------------------------------------------------------CARD 5------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/daisho/5.png') }}" 
          alt="ABC Sweet Soy Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          DAISHO MENTSUYU SAUCE (YUZU FLAVOR)
        </h3>

        <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
        A flavorful Japanese soup base infused with the refreshing taste of yuzu citrus. 
        Perfect for cold or hot noodles like soba and udon, or as a seasoning for dipping sauces, simmered dishes, and more.
        </p>




        

      </div>
    </div>


<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->








  <!---------------------------------------------------------------CARD 6------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/daisho/6.png') }}" 
          alt="ABC Sweet Soy Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          DAISHO YAKINIKUDORI NINNIKU SHOYU AJI
        </h3>


        <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
        Yakiniku no Tare can be used on any type of meat or vegetable. The unique blend of umami flavours is designed for a perfect balance of sweet, salty, and spicy. This marinade usually has a thick consistency, perfect for tenderising.
        </p>

    



      </div>
    </div>


<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->







</div>



<div class="h-20"></div>

    <a href="#" onclick="history.back(); return false;"
   class="btn btn-outline-light d-inline-flex align-items-center gap-2 px-4 py-20 mt-30"
   style="font-size: 20px;">

    <i class="fa-solid fa-arrow-left"></i>
    <span>Back</span>
</a>



</section>



@include('components.footer')

@endsection
@vite('resources/js/consumer_products.js')  


<!----------------------------------------------------SECTION 2------------------------------------------>
<script>
document.addEventListener("DOMContentLoaded", () => {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        // Add animation when visible
        entry.target.classList.remove("opacity-0", "scale-90");
        entry.target.classList.add("opacity-100", "scale-100");
      }
    });
  }, { threshold: 0.3 }); // Trigger when 30% of section is visible

  // Observe all logo items
  document.querySelectorAll(".logo-item").forEach((el, index) => {
    el.style.transitionDelay = `${index * 100}ms`; // Staggered fade
    observer.observe(el);
  });
});
</script>
<!----------------------------------------------------SECTION 2------------------------------------------>
