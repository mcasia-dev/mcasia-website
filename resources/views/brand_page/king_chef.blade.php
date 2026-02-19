    @extends('layouts.app')
    @section('title', 'McAsia - King Chef')
    @section('content')


<style>
  
  /* Viewing for Monitor going 2k - 4k resolution */
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


/*-------------------------------------------------*/



/*-----------Smaller Screens---------------------------------------*/
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

    .banner_kingchef
    {
      margin-top: -5%;
      object-fit contain;
      
    }

    .image_slideshow
    {
      height: 11rem;
      margin-top: 20%;
      width: 104%;
    }


    }
    /*-------------------------------------------------*/






</style>


<div class="relative overflow-hidden min-h-screen">

<!--------------------------------------------SLIDESHOW---------------------------------------------------->
<section class="banner_kingchef relative overflow-hidden">





<!-- Slideshow -->
<div class="image_slideshow relative w-full overflow-hidden rounded-lg shadow-lg mb-10 bg-black">
  <div id="slideshow" class="w-full h-full relative">
    <img src="{{ asset('images/product_brands/kingchef/banner.png') }}"
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
          src="{{ asset('images/product_brands/kingchef/1.png') }}" 
          alt="ABC Chili Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <!-- Content -->
      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          KING CHEF OYSTER SAUCE 
        </h3>


        <p class="text-gray-600 text-justify text-[15px] mt-3 leading-relaxed">
        Offers a rich, savory umami flavor with a hint  of sweetness and saltiness, to enhance the savory depth of dishes especially with vegetables, meats, and seafood.
        </p>




      </div>
    </div>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->






<!---------------------------------------------------------------CARD 2------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/kingchef/2.png') }}" 
          alt="ABC Chili Extra Hot"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          KING CHEF CANNED SHIITAKE MUSHROOM WHOLE
        </h3>


        <p class="text-gray-600 text-justify text-[15px] mt-3 leading-relaxed">
        Shiitake mushrooms are tan to dark brown, with caps that grow between 2 and 4 inches (5 and 10 cm). 
        While typically eaten like vegetables, shiitake are fungi that grow naturally on decaying hardwood trees. 
        They are known for their rich, savory taste and diverse health benefits. 
        Mushrooms are a fantastic ingredient, whether simply stir-fried or in soups.
        </p>


       

      </div>
    </div>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->




<!---------------------------------------------------------------CARD 3------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/kingchef/3.png') }}" 
          alt="ABC Chili Extra Hot"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          KING CHEF SUPERIOR SOTANGHON LONGKOU VERMICELLI
        </h3>



        <p class="text-gray-600 text-justify text-[15px] mt-3 leading-relaxed">
        Made from a blend of mungbean, pea, corn, and water, this allergen-free vermicelli offers a firm and springy texture perfect for stir-fry dishes. 
        Ideal for creating flavorful pancit sotanghon or other dry noodle recipes.
        </p>

        <p class="text-sm text-gray-600 mt-3 font-semibold">Features:</p>
        <ul class="list-disc text-justify text-[15px] ml-5 text-gray-600 space-y-4">
          <li>Made from: Mungbean, Pea, Corn, Water</li>
          <li>Does not contain any allergen</li>
          <li>Best for Stir-fry</li>
        </ul>



      </div>
    </div>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->







<!---------------------------------------------------------------CARD 4------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/kingchef/4.png') }}" 
          alt="ABC Sweet Soy Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          KING CHEF PREMIUM SOTANGHON LONGKOU VERMICELLI
        </h3>


         <p class="text-gray-600 text-justify text-[15px] mt-3 leading-relaxed">
        Crafted with potato, mungbean, pea, and water, this allergen-free vermicelli is specially made for soups. 
        It delivers a silky, glassy texture that holds up well in brothy dishes like sotanghon soup and hotpot.
        </p>


        <p class="text-sm text-gray-600 mt-3 font-semibold">Features:</p>
          <ul class="list-disc text-justify text-[15px] ml-5 text-gray-600 space-y-4">
          <li>Made from: Potato, Mungbean, Water, Pea</li>
          <li>Does not contain any allergen</li>
          <li>Best for Soup</li>
        </ul>




      </div>
    </div>


<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->










  <!---------------------------------------------------------------CARD 6------------------------------------------------------------------------->
   
 <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/kingchef/6.png') }}" 
          alt="ABC Sweet Soy Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          KING CHEF WHOLE DRIED SHIITAKE MUSHROOM
        </h3>

        <ul class="list-disc text-justify text-[15px] ml-5 text-gray-600 space-y-4">
          <li>Provide an intense, savory, umami flavor to a variety of dishes</li>
          <li>Carefully harvested, dried, and packaged to preserve their rich taste and nutritional benefits.</li>
        </ul>

      </div>
    </div>

<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->







  <!---------------------------------------------------------------CARD 7------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/kingchef/7.png') }}" 
          alt="ABC Sweet Soy Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          KING CHEF CANNED WHOLE CREAMSTYLE CORN (EO) 
        </h3>

        <p class="text-gray-600 text-justify text-[15px] mt-3 leading-relaxed">
        King Chef Cream Style Corn is a delectable corn choice that offers a delightful fusion of sweet and creamy flavors. 
        Its creamy texture makes it an excellent ingredient to add to various recipes, from casseroles and soups to savory pies and fritters.
        </p>




      </div>
    </div>


<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->




  <!---------------------------------------------------------------CARD 8------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/kingchef/8.png') }}" 
          alt="ABC Sweet Soy Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          KING CHEF CANNED WHOLE KERNEL CORN IN BRINE (NL) 
        </h3>

        <p class="text-gray-600 text-justify text-[15px] mt-3 leading-relaxed">
        King Chef Canned Whole Kernel Corn is made from fresh corn that has been harvested at its peak ripeness and then processed for preservation. 
        The corn kernels are carefully selected, cleaned, and cooked before being sealed in our airtight cans, usually with a small amount of added water or brine to maintain their flavor and texture. 
        It possesses a subtle sweetness, making it a versatile ingredient in various dishes. 
        </p>


      </div>
    </div>


<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->










  <!---------------------------------------------------------------CARD 9------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/kingchef/9.png') }}" 
          alt="ABC Sweet Soy Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          KING CHEF CANNED MUSHROOM WHOLE 
        </h3>

        <p class="text-gray-600 text-justify text-[15px] mt-3 leading-relaxed">
        Whole mushroom is the style of canned mushrooms that consists of the caps with attached stems which are more than 1/8 inch in length when measured from the under side of the cap to the cut end of the stem.
        Mushrooms are a fantastic ingredient, whether simply stir-fried or in soups.
        </p>





      </div>
    </div>


<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->






  <!---------------------------------------------------------------CARD 10------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/kingchef/10.png') }}" 
          alt="ABC Sweet Soy Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          KING CHEF CANNED STRAW MUSHROOM WHOLE 
        </h3>

        <p class="text-gray-600 text-justify text-[15px] mt-3 leading-relaxed">
        These are small, plump mushrooms whose cap is more like a small cone. The cone is dark brown at the top, lightening towards the rim. Mushrooms are a fantastic ingredient, whether simply stir-fried or in soups.
        </p>



      </div>
    </div>


<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->




  <!---------------------------------------------------------------CARD 11------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/kingchef/11.png') }}" 
          alt="ABC Sweet Soy Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          KING CHEF RICE FLOUR 
        </h3>

        <p class="text-gray-600 text-justify text-[15px] mt-3 leading-relaxed">
        Carefully harvested, dried, and packaged to preserve their rich taste and nutritional benefits.
        </p>


      </div>
    </div>


<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->








  <!---------------------------------------------------------------CARD 12------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/kingchef/12.png') }}" 
          alt="ABC Sweet Soy Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          KING CHEF BREADCRUMBS 
        </h3>

          <p class="text-sm text-gray-600 mt-3 font-semibold">Features:</p>
          <ul class="list-disc text-justify text-[15px] ml-5 text-gray-600 space-y-4">
          <li>Versatile and useful culinary ingredient made by grinding dried bread into fine, coarse, or panko-like granules</li>
          <li>Serve multiple purposes in cooking and baking</li>
          <li>Commonly used as a coating for fried or baked foods, like chicken cutlets, fish fillets, or vegetable fritters, providing a crispy and golden crust</li>
        </ul>


      </div>
    </div>


<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->





<!---------------------------------------------------------------CARD 13------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/kingchef/13.png') }}" 
          alt="ABC Sweet Soy Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          KING CHEF SESAME OIL 
        </h3>

        <p class="text-gray-600 text-justify text-[15px] mt-3  leading-relaxed">
        A sesame oil made from selected sesame seeds that have been carefully roasted for maximum aroma. It has a rich and fragrant aroma of sesame which can be used for seasoning, marinating and frying. Drizzle over your salad and dressing to add a flavorful aroma.
        </p>

      </div>
    </div>


<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->








<!---------------------------------------------------------------CARD 14------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/kingchef/14.png') }}" 
          alt="ABC Sweet Soy Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          KING CHEF COCONUT MILK 
        </h3>


        
        <p class="text-gray-600 text-justify text-[15px] mt-3 leading-relaxed">
        Bring creamy and authentic tropical flavors to your dishes with King Chef Coconut Milk
        </p>


          <p class="text-sm text-gray-600 mt-3 font-semibold">Features:</p>
          <ul class="list-disc text-justify text-[15px] ml-5 text-gray-600 space-y-4">
          <li>Made from coconut extracts and other ingredients.</li>
          <li>Pre-prepared and ready to use, saving you time and effort in the kitchen</li>
          <li>Perfect for enhancing the flavor of curries, soups, stews, desserts, and beverages</li>
        </ul>



      </div>
    </div>


<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->






<!---------------------------------------------------------------CARD 15------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/kingchef/15.png') }}" 
          alt="ABC Sweet Soy Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          KING CHEF GLUTINOUS RICE FLOUR 
        </h3>


        <p class="text-gray-600 text-justify text-[15px] mt-3 leading-relaxed">
        High Quality Products sourced directly from farmers and market partners. Wide variety of grocery essentials from meats, chicken, pork, beef, seafood, fresh fruits and vegetables, rice and many more.
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
