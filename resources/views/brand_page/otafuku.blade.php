    @extends('layouts.app')
    @section('title', 'McAsia - Otafuku')
    @section('content')



<style>
  
/*-------------Viewing for Monitor going 2k - 4k resolution----------*/
    @media (min-width: 1440px) {
    .content-wrapper {
      margin-left: -17rem; /* Move content slightly right */
      margin-top: 8rem; /* Optional vertical offset */
      }

    .image_slideshow
    {
      margin-top: 7%;
      height: 630px;
    }

    }


/*---------------------------------------------------------------------*/



/*------------------------Smaller Screens-----------------------------*/
@media (min-width: 641px) and (max-width: 1439px) 
{

    
    .image_slideshow
    {
      height: 88%;
      margin-top: 7%;
      width: 100%;
    }



}
/*-------------------------------------------------------------------*/








  /*--------------------Mobile Resolution-------------*/
  @media (max-width: 414px) {
  .image_slideshow
  {
    height: 11rem;
    margin-top: 18%;
  }
  }
  /*-------------------------------------------------*/






</style>




<div class="relative overflow-hidden min-h-screen">

<!--------------------------------------------SLIDESHOW---------------------------------------------------->
<section class="relative overflow-hidden">





<!-- Slideshow -->
<div class="relative w-full h-64 md:h-[500px] overflow-hidden rounded-lg shadow-lg mb-10 bg-black">
  <div id="slideshow" class="w-full h-full relative">
    <img src="{{ asset('images/product_brands/otafuku/banner.png') }}"
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
          src="{{ asset('images/product_brands/otafuku/1.png') }}" 
          alt="ABC Chili Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <!-- Content -->
      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          OTAFUKU KIMCHI SAUCE 
        </h3>


        <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
        Bring authentic Korean flavor to your dishes with Otafuku Kimchi Sauce! Perfect for making your own kimchi or adding a spicy, tangy kick to stir-fries, soups, fried rice, and marinades.
        </p>




      </div>
    </div>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->






<!---------------------------------------------------------------CARD 2------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/otafuku/2.png') }}" 
          alt="ABC Chili Extra Hot"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          OTAFUKU OKONOMIYAKI TAKOYAKI MIX
        </h3>


        <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
        Make your favorite Japanese street food at home! This mix is perfect for cooking fluffy okonomiyaki (savory pancakes) or crispy takoyaki (octopus balls). 
        Just add your choice of ingredients, cook, and enjoy authentic flavor in every bite.
        </p>


       

      </div>
    </div>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->




<!---------------------------------------------------------------CARD 3------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/otafuku/3.png') }}" 
          alt="ABC Chili Extra Hot"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          OTAFUKU SUSHI SAUCE
        </h3>



        <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
        A light and tangy sauce made with fragrant yuzu citrus and savory soy sauce. 
        Perfect as a dipping sauce for shabu-shabu, gyoza, or sashimi. Also great as a dressing or marinade for salads and grilled dishes.        
        </p>


      </div>
    </div>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->







<!---------------------------------------------------------------CARD 4------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/otafuku/4.png') }}" 
          alt="ABC Sweet Soy Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          OTAFUKU OMURICE SAUCE
        </h3>


         <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
         Enjoy the rich and savory taste of Japanese-style omurice at home! This ready-to-use sauce is perfect for drizzling over fluffy omelets with fried rice. 
         Made with a blend of tomato and spices for that authentic sweet and tangy flavor.
        </p>


      </div>
    </div>


<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->







  <!---------------------------------------------------------------CARD 5------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/otafuku/5.png') }}" 
          alt="ABC Sweet Soy Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          OTAFUKU OKONOMIYAKI SAUCE
        </h3>


        
         <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
        Experience the authentic taste of Japan with Otafuku Okonomiyaki Sauce, the classic sweet and savory condiment that perfectly complements okonomiyaki (Japanese savory pancakes). 
        Made from a blend of fruits, vegetables, and selected spices, this sauce delivers a rich umami flavor with a hint of sweetness and tanginess.
        </p>

        <p class="text-sm text-gray-600 mt-3 font-semibold">Features:</p>
        <ul class="list-disc ml-5 text-sm text-gray-600 space-y-1">
          <li>Authentic Japanese-style okonomiyaki sauce</li>
          <li>Made from a blend of fruits, vegetables, and spices</li>
          <li>Sweet, savory, and tangy flavor that enhances any dish</li>
          <li>Perfect for okonomiyaki, takoyaki, yakisoba, and other Japanese favorites</li>
        </ul>




      </div>
    </div>


<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->










  <!---------------------------------------------------------------CARD 6------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/otafuku/6.png') }}" 
          alt="ABC Sweet Soy Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          OTAFUKU OKONOMIYAKI SAUCE
        </h3>

        <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
        This is one of Otafuku's best-selling product with authentic okonomiyaki taste. 
        It is a sauce with sauce based on Japanese Vinegar seasoned with 50kinds of ingredients with many vegetables and fruits. 
        Indulge in the sweetness and savory rich-flavor by adding it to your okonomiyaki, takoyaki or as a seasoning to your stir0fry meat and vegetable dishes.
        </p>




      </div>
    </div>


<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->







  <!---------------------------------------------------------------CARD 7------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/otafuku/7.png') }}" 
          alt="ABC Sweet Soy Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          OTAFUKU TONKATSU SAUCE 
        </h3>

        <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
        A rich, thick, and tangy-sweet sauce specially made for tonkatsu (breaded pork cutlets). 
        Also great as a dip for fried dishes or as a seasoning for stir-fry. 
        Made with a blend of fruits, vegetables, and spices for an authentic Japanese flavor.        
        </p>




      </div>
    </div>


<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->




  <!---------------------------------------------------------------CARD 8------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/otafuku/8.png') }}" 
          alt="ABC Sweet Soy Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          OTAFUKU TAKOYAI SAUCE
        </h3>

        <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
        Create authentic Japanese street food flavors at home with Otafuku Takoyaki Sauce, the perfect topping for your delicious takoyaki (octopus balls). 
        This sauce has a rich, savory-sweet flavor with a hint of umami, specially crafted to complement the soft and flavorful takoyaki.
        </p>


        <p class="text-sm text-gray-600 mt-3 font-semibold">Features:</p>
        <ul class="list-disc ml-5 text-sm text-gray-600 space-y-1">
          <li>Authentic Japanese takoyaki sauce made from a blend of fruits, vegetables, and spices</li>
          <li>Sweet, savory, and tangy taste with a smooth, thick texture</li>
          <li>Perfectly pairs with takoyaki, okonomiyaki, yakisoba, and other Japanese dishes</li>
          <li>Ready to use — just drizzle over cooked takoyaki and top with mayonnaise, bonito flakes, and aonori for the best flavor</li>
        </ul>




      </div>
    </div>


<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->










  <!---------------------------------------------------------------CARD 9------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/otafuku/9.png') }}" 
          alt="ABC Sweet Soy Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          OTAFUKU TAKOYAKI SAUCE 
        </h3>

        <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
        A rich, sweet and savory sauce for your Takoyaki, made from tomatoes, apples, dates and onions for a tangy and rich taste. Glaze over your hot Takoyaki, it will perfectly compliment other toppings such as aonori seaweed and Bonito flakes.
        </p>





      </div>
    </div>


<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->






  <!---------------------------------------------------------------CARD 10------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/otafuku/10.png') }}" 
          alt="ABC Sweet Soy Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          THAI DANCER CORIANDER LIME CHILI DIPPING SAUCE 
        </h3>



        <p class="text-sm text-gray-600 mt-3 font-semibold">Features:</p>
          <ul class="list-disc ml-5 text-justify text-sm text-gray-600 space-y-1">
          <li>A ready to use sauce.</li>
          <li>Delicious with roasted meats, barbecue, pizza, and bread (sandwiches). </li>
          <li>Can also be used as a dip and enjoyed with chips and nachos.</li>
        </ul>


        






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
