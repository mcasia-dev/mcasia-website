    @extends('layouts.app')
    @section('title', 'McAsia - Oxford')
    @section('content')


    <style>

    /*--------------------Mobile Resolution-------------*/
    @media (max-width: 414px) {

    .banner_oxford
    {
      height: 14rem;
      margin-top: 10%;
      object-fit: contain;
      
    }

    .image_oxford
    {
      height: 12rem;
      width: 104%;
    }


    }
    /*-------------------------------------------------*/



    /*-----------Smaller Screens---------------------------------------*/
@media (min-width: 641px) and (max-width: 1439px) 
{

    
    .banner_oxford
    {
      height: 88%;
      margin-top: 7%;
      width: 100%;
    }



}
/*-------------------------------------------------------------------*/




    
    </style>




<div class="relative overflow-hidden min-h-screen">

<!--------------------------------------------SLIDESHOW---------------------------------------------------->
<section class="banner_oxford relative h-screen overflow-hidden">





<!-- Slideshow -->
<div class="image_oxford relative overflow-hidden rounded-lg shadow-lg mb-10 bg-black">
  <div id="slideshow" class="w-full h-full relative">
    <img src="{{ asset('images/product_brands/oxford/banner.png') }}"
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
          src="{{ asset('images/product_brands/oxford/1.png') }}" 
          alt="ABC Chili Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <!-- Content -->
      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          OXFORD PREMIER LEMON PUFF SANDWICH 
        </h3>

        <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
        Enjoy the perfect balance of light, flaky puff biscuits and a smooth, tangy lemon-flavored crème filling with Oxford Lemon Puff Sandwich. 
        Each bite offers a delightful crunch followed by a refreshing citrusy sweetness, making it an irresistible treat for any occasion. 
        Whether paired with tea, coffee, or enjoyed on its own, this zesty and airy biscuit is sure to brighten your day.        
        </p>


        
        <p class="text-sm text-gray-600 mt-3 font-semibold">Features:</p>
        <ul class="list-disc ml-5 text-sm text-gray-600 space-y-1">
          <li>No animal by-products, including fats and oils</li>
          <li>Certified Halal, all our products conform to Halal standards</li>
          <li>Crispy biscuits with a creamy lemon-flavored filling</li>
          <li>Made with high-quality ingredients</li>
          <li>Perfect for snacking, sharing, or pairing with beverages</li>
        </ul>



      </div>
    </div>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->






<!---------------------------------------------------------------CARD 2------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/oxford/2.png') }}" 
          alt="ABC Chili Extra Hot"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          OXFORD BRIGHTS LEMON CREAM SANDWICH
        </h3>

        <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
        Brighten your day with the zesty and refreshing taste of Oxford Lemon Crème Biscuits. These crisp, golden biscuits are perfectly paired with a smooth, tangy lemon-flavored crème filling, creating a delightful balance of crunch and citrusy sweetness. 
        Whether enjoyed as a snack, dessert, or alongside your favorite beverage, this biscuit offers a burst of refreshing flavor in every bite.        
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
          src="{{ asset('images/product_brands/oxford/3.png') }}" 
          alt="ABC Chili Extra Hot"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          OXFORD BRIGHTS BUTTER CRÈME SANDWICH
        </h3>

        <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
        Brights Butter Cream is a buttery, delicious, gourmet taste. 
        You'll never want to stop. 
        Brights Butter Cream will have you coming back for more. 
        This biscuit is good with any kind of dip or topping.
        </p>

        <p class="text-sm text-gray-600 mt-3 font-semibold">Features:</p>
        <ul class="list-disc ml-5 text-sm text-gray-600 space-y-1">
          <li>No animal by-products, including fats and oils</li>
          <li>Certified Halal All our products conform to Halal standards</li>
          <li>Crispy biscuits with a creamy butter-flavored filling</li>
          <li>Made with high-quality ingredients</li>
          <li>Perfect for snacking, sharing, or pairing with beverages</li>
        </ul>


      </div>
    </div>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->







<!---------------------------------------------------------------CARD 4------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/oxford/4.png') }}" 
          alt="ABC Sweet Soy Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          OXFORD BRIGHTS COFFEE CRÈME SANDWICH
        </h3>



        <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
        Treat yourself to the delightful taste of Oxford Biscuits.
        A sweet and creamy snack that everyone will love.
        Features a rich and smooth cream filling sandwiched between two crispy biscuits available in different flavors.
        Ideal for sharing with friends and family during gatherings or as a treat.
        Enjoy as a dessert, with coffee or tea, or as a quick pick-me-up anytime.
        Get this 1 pack (125 grams) of Oxford Brights Cream Sandwich.
        </p>





      </div>
    </div>


<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->







  <!---------------------------------------------------------------CARD 5------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/oxford/5.png') }}" 
          alt="ABC Sweet Soy Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          OXFORD BRIGHTS CHOCOLATE CRÈME SANDWICH
        </h3>


        
          <p class="text-sm text-gray-600 mt-3 font-semibold">Features:</p>
          <ul class="list-disc ml-5 text-sm text-gray-600 space-y-1">
          <li>Double Chocolate Delight: Features chocolate-flavored biscuits with a rich, creamy chocolate filling for an irresistible chocolate-on-chocolate experience.</li>
          <li>Perfect Crunch: Crisp, baked cookies offer a satisfying crunch that complements the smooth, creamy filling.</li>
          <li>Premium Ingredients: Made with high-quality ingredients to ensure a delicious and indulgent chocolate flavor in every bite.</li>
          <li>Indulgent Filling: Filled with smooth chocolate cream that melts in your mouth for a truly decadent treat.</li>
          <li>Perfect for Gifting: A luxurious treat that makes an ideal gift for chocolate lovers for festivals or as a party favor.</li>
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
