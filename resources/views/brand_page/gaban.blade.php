    @extends('layouts.app')
    @section('title', 'McAsia - Gaban')
    @section('content')


    <style>  
/*-------------Viewing for Monitor going 2k - 4k resolution----------*/
    @media (min-width: 1440px) {
    .content-wrapper {
      margin-left: -17rem; /* Move content slightly right */
      margin-top: 8rem; /* Optional vertical offset */
      }

.image_slideshow {
  width: 100%;
  height: auto;        /* allow natural height */
}

.image_slideshow img {
  width: 100%;
  height: auto;
  object-fit: contain; /* show full image */
}

    }


/*---------------------------------------------------------------------*/



/*------------------------Smaller Screens-----------------------------*/
@media (min-width: 641px) and (max-width: 1439px) 
{

    
.image_slideshow {
  width: 100%;
  height: auto;        /* allow natural height */
}

.image_slideshow img {
  width: 100%;
  height: auto;
  object-fit: contain; /* show full image */
}



}
/*-------------------------------------------------------------------*/








  /*--------------------Mobile Resolution-------------*/
  @media (max-width: 414px) {
   .image_slideshow {
    width: 100%;
    height: 30%;
    margin-top: 20%;
  }

  .image_slideshow img {
    width: 100%;
    height: auto;
    object-fit: cover;
  }
  }
  /*-------------------------------------------------*/

</style>




<div class="relative overflow-hidden min-h-screen">

<!--------------------------------------------SLIDESHOW---------------------------------------------------->
<section class="relative overflow-hidden">





<!-- Slideshow -->
<div class="image_slideshow relative w-full overflow-hidden rounded-lg shadow-lg mb-10 bg-white">
  <div id="slideshow" class="w-full h-full relative">
    <img src="{{ asset('images/product_brands/gaban/banner.png') }}"
         class="absolute top-0 left-0 w-full h-full object-contain opacity-100 transition-opacity duration-1000" />
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
          src="{{ asset('images/product_brands/gaban/1.png') }}" 
          alt="ABC Chili Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <!-- Content -->
      <div class="p-5 flex-1 flex flex-col">



        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          GABAN NUTMEG GROUND
        </h3>



        <p class="text-gray-600 text-justify text-[15px] mt-3 leading-relaxed">
        Add a rich, aromatic touch to your dishes with GABAN Nutmeg Ground. Made from high-quality nutmeg seeds and finely ground for convenience, this spice is perfect for both sweet and savory recipes.
        </p>



        <p class="text-sm text-gray-600 mt-3 font-semibold">Features:</p>
        <ul class="list-disc text-justify text-[15px] ml-5 text-gray-600 space-y-1">
          <li>Warm, Sweet, and Slightly Spicy Flavor</li>
          <li>Great for Baked Goods, Cream Sauces, Meats & Beverages</li>
          <li>Finely Ground for Easy Mixing</li>
        </ul>


      </div>
    </div>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->






<!---------------------------------------------------------------CARD 2------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/gaban/2.png') }}" 
          alt="ABC Chili Extra Hot"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          GABAN ITALIAN SEASONING
        </h3>


        <p class="text-gray-600 text-justify text-[15px] mt-3 leading-relaxed">
        Gaban Italian Seasoning Whole – 1kg. A premium blend of aromatic herbs including oregano, basil, rosemary, and thyme, delivering authentic Italian flavors. Ideal for pasta, pizza, sauces, marinades, roasted meats, and Mediterranean-inspired dishes. Specially packed for foodservice and bulk use.
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
