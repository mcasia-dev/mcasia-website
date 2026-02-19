    @extends('layouts.app')
    @section('title', 'McAsia - Sea Chef')
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
<div class="image_slideshow relative w-full overflow-hidden rounded-lg shadow-lg mb-10 bg-black">
  <div id="slideshow" class="w-full h-full relative">
    <img src="{{ asset('images/product_brands/seachef/banner.png') }}"
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
          src="{{ asset('images/product_brands/seachef/1.png') }}" 
          alt="ABC Chili Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <!-- Content -->
      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          SEA CHEF FROZEN CHIKUWA 
        </h3>


        <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
        Enjoy the authentic taste of Sea Chef Frozen Chikuwa — a delicious fish cake made from premium fish paste, seasoned, and shaped into a tube before being perfectly cooked and frozen for freshness.
        Perfect for oden, hotpot, stir-fry, or as a tasty snack, this ready-to-cook chikuwa offers a savory flavor and chewy texture that will enhance any meal in minutes.        
        </p>




      </div>
    </div>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->






<!---------------------------------------------------------------CARD 2------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/seachef/2.png') }}" 
          alt="ABC Chili Extra Hot"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          SEA CHEF FROZEN FISH BALL
        </h3>


        <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
        Bring home the delicious taste of Sea Chef Frozen Fish Ball — made from high-quality fish paste for a firm yet tender bite.
        Perfect for hotpot, soup, noodles, or fried snacks, these fish balls are quick to cook and packed with rich seafood flavor that everyone will love.
        </p>


       

      </div>
    </div>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->




<!---------------------------------------------------------------CARD 3------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/seachef/3.png') }}" 
          alt="ABC Chili Extra Hot"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          SEA CHEF FROZEN CUTTLEFISH BALL
        </h3>



        <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
        Enjoy the rich, savory taste of Sea Chef Frozen Cuttlefish Ball — made from premium cuttlefish blended to perfection for a smooth and springy texture.
        Ideal for hotpot, soup, noodles, or fried dishes, these cuttlefish balls cook quickly and add a delicious seafood flavor to any meal.
        </p>


      </div>
    </div>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->







<!---------------------------------------------------------------CARD 4------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/seachef/4.png') }}" 
          alt="ABC Sweet Soy Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          SEA CHEF FROZEN FISH TOFU
        </h3>


         <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
         Enjoy the smooth and savory taste of Sea Chef Frozen Fish Tofu — a delightful blend of fish paste and tofu, offering a soft yet bouncy texture.
         Perfect for hotpot, soup, stir-fry, or deep-fried dishes, this ready-to-cook fish tofu adds a rich seafood flavor and creamy texture to your favorite meals.
        </p>


      </div>
    </div>


<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->






  <!---------------------------------------------------------------CARD 6------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/seachef/6.png') }}" 
          alt="ABC Sweet Soy Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          SEA CHEF FROZEN HOTPOT SET
        </h3>

        <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
        Enjoy a complete and flavorful hotpot experience with Sea Chef Frozen Hotpot Set — a convenient mix of assorted seafood balls and bites, all made from quality ingredients for a delicious and satisfying meal.
        Perfect for hotpot, soup, noodles, or stir-fry, this ready-to-cook set saves time while delivering authentic seafood taste and texture.
        </p>




      </div>
    </div>


<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->







  <!---------------------------------------------------------------CARD 7------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/seachef/7.png') }}" 
          alt="ABC Sweet Soy Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          SEA CHEF FROZEN VEGETABLE FRIED FISH BALL 
        </h3>

        <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
        Enjoy a delicious twist on a classic favorite with Sea Chef Frozen Vegetable Fried Fish Ball. Made from quality fish paste blended with fresh vegetables, each piece is crispy outside and tender inside.
        Perfect for hotpot, soups, stir-fry, or snacks, it’s a tasty and convenient option for any meal.
        </p>




      </div>
    </div>


<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->




  <!---------------------------------------------------------------CARD 8------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/seachef/8.png') }}" 
          alt="ABC Sweet Soy Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          SEA CHEF FROZEN IMITATION CRAB NUGGET 
        </h3>

        <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
        Savor the rich and savory flavor of Sea Chef Frozen Imitation Crab Nugget — made from premium fish paste and seasoned to taste like real crab meat. Each nugget is soft, juicy, and full of seafood goodness.
        Perfect for hotpot, frying, or adding to noodles and bento meals, these ready-to-cook nuggets are convenient and delicious anytime.
        </p>


      </div>
    </div>


<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->










  <!---------------------------------------------------------------CARD 9------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/seachef/9.png') }}" 
          alt="ABC Sweet Soy Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          SEA CHEF FROZEN IMITATION KING CRAB BALL 
        </h3>

        <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
        Delight in the premium taste of Sea Chef Frozen Imitation King Crab Ball — crafted from quality fish paste and seasoned to capture the rich flavor of king crab. Each piece is tender, juicy, and full of seafood goodness.
        Perfect for hotpot, soups, noodles, or fried dishes, these ready-to-cook crab balls make any meal extra special and satisfying.
        </p>





      </div>
    </div>


<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->






  <!---------------------------------------------------------------CARD 10------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/seachef/10.png') }}" 
          alt="ABC Sweet Soy Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          SEA CHEF CRABSTICK 
        </h3>

        <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
        Add flavor and variety to your meals with Sea Chef Crabstick. Made from quality seafood, these tender and flavorful sticks are perfect for salads, sushi, soups, stir-fries, or as a tasty snack on their own.
        Conveniently packed in a 1kg bag, Sea Chef Crabstick is easy to prepare—just thaw and serve, or cook as you like. A versatile choice for everyday meals and special dishes.
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
