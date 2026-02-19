    @extends('layouts.app')
    @section('title', 'McAsia - ABC')
    @section('content')


    <style>
    @media (max-width: 414px) {

    .image_slideshow
    {
      height: 12rem;
      margin-top: 3rem;
      object-fit: contain;
    
    }


    }



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






    </style>
    


<div class="relative overflow-hidden min-h-screen">

<!--------------------------------------------SLIDESHOW---------------------------------------------------->
<section class="relative  overflow-hidden">





<!-- Slideshow -->
<div class="image_slideshow relative overflow-hidden rounded-lg shadow-lg mb-10 bg-black">
  <div id="slideshow" class="w-full h-full relative">
    <img src="{{ asset('images/product_brands/abc/banner.png') }}"
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
          src="{{ asset('images/product_brands/abc/1.png') }}" 
          alt="ABC Chili Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <!-- Content -->
      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          ABC CHILI SAUCE SAMBAL ASLI
        </h3>

        <p class="text-gray-600 text-sm mt-3 leading-relaxed">
          Elevate your meals with ABC Chili Sauce.  
          Made from high-quality fresh chili peppers and garlic.
        </p>

          <p class="text-sm text-gray-600 mt-3 font-semibold">Features:</p>
          <ul class="list-disc ml-5 text-sm text-gray-600 space-y-1">
            <li>No preservatives</li>
            <li>No MSG</li>
            <li>Trusted Indonesian chili sauce</li>
          </ul>

      </div>
    </div>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->






<!---------------------------------------------------------------CARD 2------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/abc/2.png') }}" 
          alt="ABC Chili Extra Hot"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          ABC HOT AND SWEET CHILI SAUCE
        </h3>

        <p class="text-gray-600 text-sm mt-3 leading-relaxed">
          ABC HOT AND SWEET CHILI SAUCE. Great as a dip for your favorite deep-fried foods
        </p>

        <p class="text-sm text-gray-600 mt-3 font-semibold">Features:</p>
        <ul class="list-disc ml-5 text-sm text-gray-600 space-y-1">
          <li>A mixture of sweet, savory, and spicy flavors</li>
          <li>Alternative for sriracha & ketchup</li>
          <li>Can be use as a cooking ingredient, or condiment on your favorite foods</li>
        </ul>



      </div>
    </div>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->









<!---------------------------------------------------------------CARD 3------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/abc/3.png') }}" 
          alt="ABC Sweet Soy Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          ABC SOY SAUCE
        </h3>

        <p class="text-gray-600 text-sm mt-3 leading-relaxed">
          Delicious tasting for cooking all types of meat, poultry, seafood, vegetable or tofu and fried rice, as well as for a table sauce.
        </p>

        <p class="text-sm text-gray-600 mt-3 font-semibold">Features:</p>
        <ul class="list-disc ml-5 text-sm text-gray-600 space-y-1">
          <li>Indonesian Style Soy Sauce</li>
          <li>Caramel-coloured sweet soy sauce</li>
          <li>Sweetened with Sun-dried Palm Tree Sugar</li>
          <li>Unique flavor</li>
          <li>Perfectly blended as a barbecue Sauce or marinade for steak, lamb chops, chicken, etc</li>
        </ul>



      </div>
    </div>

  </div>


<div class="h-20"></div>

    <a href="#" onclick="history.back(); return false;"
   class="btn btn-outline-light d-inline-flex align-items-center gap-2 px-4 py-20 mt-30"
   style="font-size: 20px;">

    <i class="fa-solid fa-arrow-left"></i>
    <span>Back</span>
</a>


</section>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->




















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
