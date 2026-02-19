    @extends('layouts.app')
    @section('title', 'McAsia - Ummami')
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
    <img src="{{ asset('images/product_brands/ummami/banner.png') }}"
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
          src="{{ asset('images/product_brands/ummami/1.png') }}" 
          alt="ABC Chili Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <!-- Content -->
      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          UM-MAMI SAIKORO STEAK 
        </h3>


        <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
        Um-Mami Saikoro Steak 500G is made from high-quality beef, featuring a unique coarsely-ground texture. 
        This steak cooks in a matter of minutes and is packed with umami flavor and juiciness, making it the perfect choice for an easy and delicious meal. 
        The 500g size ensures there is enough to feed a group.
        </p>




      </div>
    </div>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->






<!---------------------------------------------------------------CARD 2------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/ummami/2.png') }}" 
          alt="ABC Chili Extra Hot"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          UM-MAMI UNAGI KABAYAKI
        </h3>


        <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
        UM-MAMI Unagi Kabayaki is a 200g pack of premium grilled eel fillet, carefully prepared and glazed with authentic kabayaki sauce made from soy sauce, sugar, and mirin. 
        The eel is tender, rich in flavor, and has a perfect balance of sweet and savory taste.
        </p>


       

      </div>
    </div>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->




<!---------------------------------------------------------------CARD 3------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/ummami/3.png') }}" 
          alt="ABC Chili Extra Hot"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          UM-MAMI ARABIKI SAUSAGE
        </h3>



        <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
        Enjoy the rich and savory taste of UM-MAMI Arabiki Sausage. Made with quality pork and seasoned Japanese-style, these sausages are juicy, flavorful, and perfect for any meal. 
        Easy to cook—great for breakfast, bento, or as a tasty snack.
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
