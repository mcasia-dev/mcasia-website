    @extends('layouts.app')
    @section('title', 'McAsia - Vico')
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
<div class="image_slideshow relative w-full overflow-hidden rounded-lg shadow-lg mb-10 bg-white">
  <div id="slideshow" class="w-full h-full relative">
    <img src="{{ asset('images/product_brands/vico/banner.png') }}"
         class="absolute top-0 left-0 w-full h-full object-contain opacity-100 transition-opacity duration-1000" />
    <!-- Overlay Content Box -->
  </div>
</div>









</section>
<!------------------------------------------------------------------------------------------------------------------------->





<!----------------------------------------------------------Section 2--------------------------------------------------->
<section class="relative w-full py-16 bg-gray-100">

  <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

<!---------------------------------------------------------------CARD 1------------------------------------------------------------------------>
<div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

  <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
    <img 
      src="{{ asset('images/product_brands/vico/1.png') }}" 
      alt="[Name of title]"
      class="max-h-full max-w-full object-contain p-2"
    >
  </div>

  <div class="p-5 flex-1 flex flex-col">
    <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
      VICO RICH COCONUT MILK
    </h3>


    <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
    Coconut milk is an opaque, milky-white liquid extracted from the grated pulp of mature coconuts. It is basically shredded coconut flesh that is pureed with water and strained to create a rich, shock-white liquid that can lend body, flavor, and richness to soups, curries, wilted greens, and much more. It can also be taken as a drink because it has the same processing as those of milks.
    </p>
  </div>

</div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->

















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
