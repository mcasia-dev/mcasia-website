    @extends('layouts.app')
    @section('title', 'McAsia - Long Beach')
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
      height: 98%;
    }

    }


/*---------------------------------------------------------------------*/



/*------------------------Smaller Screens-----------------------------*/
@media (min-width: 641px) and (max-width: 1439px) 
{

    
    .image_slideshow
    {
      height: 90%;
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
    <img src="{{ asset('images/product_brands/longbeach/banner.png') }}"
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
      src="{{ asset('images/product_brands/longbeach/1.png') }}" 
      alt="[Name of title]"
      class="max-h-full max-w-full object-contain p-2"
    >
  </div>

  <div class="p-5 flex-1 flex flex-col">
    <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
      LONGBEACH MOJITO SYRUP
    </h3>


    
        <p class="text-sm text-gray-600 mt-3 font-semibold">Features:</p>
        <ul class="list-disc ml-5 text-sm text-gray-600 space-y-1">
          <li>Versatile and flavorful syrup designed to infuse beverages and culinary creations with the refreshing taste of mojito</li>
          <li>Offers ample supply for both personal and professional use</li>
        </ul>

  </div>

</div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->

<!---------------------------------------------------------------CARD 2------------------------------------------------------------------------>
<div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

  <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
    <img 
      src="{{ asset('images/product_brands/longbeach/2.png') }}" 
      alt="[Name of title]"
      class="max-h-full max-w-full object-contain p-2"
    >
  </div>

  <div class="p-5 flex-1 flex flex-col">
    <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
      LONGBEACH ELDERFLOWER SYRUP
    </h3>


    <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
    Add a touch of floral elegance to your drinks with LongBeach Elderflower Syrup! Crafted from the delicate essence of elderflower blossoms, this syrup offers a sweet, fragrant flavor that enhances any beverage or dessert. Perfect for cocktails, mocktails, sodas, teas, and even pastries.
    </p>


  </div>

</div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->

<!---------------------------------------------------------------CARD 3------------------------------------------------------------------------>
<div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

  <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
    <img 
      src="{{ asset('images/product_brands/longbeach/3.png') }}" 
      alt="[Name of title]"
      class="max-h-full max-w-full object-contain p-2"
    >
  </div>

  <div class="p-5 flex-1 flex flex-col">
    <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
      LONGBEACH ALMOND SYRUP
    </h3>


    <ul class="list-disc ml-5 text-sm text-gray-600 space-y-1">
      <li>A Premium flavored syrup designed to infuse beverages and culinary creations with the rich, nutty essence of almonds</li>
      <li>Suitable for both home and professional use</li>
      <li>Enhancing the flavor profile of various beverages and dishes</li>
    </ul>


  </div>

</div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->

<!---------------------------------------------------------------CARD 4------------------------------------------------------------------------>
<div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

  <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
    <img 
      src="{{ asset('images/product_brands/longbeach/4.png') }}" 
      alt="[Name of title]"
      class="max-h-full max-w-full object-contain p-2"
    >
  </div>

  <div class="p-5 flex-1 flex flex-col">
    <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
      LONGBEACH CHERRY SYRUP 
    </h3>

    <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
    Experience the vibrant sweetness of ripe cherries in every drop with Longbeach Cherry Syrup. Crafted to capture the rich, fruity flavor and deep red color of fresh cherries, this syrup is perfect for adding a refreshing twist to drinks, desserts, and more.
    </p>


  </div>

</div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->

<!---------------------------------------------------------------CARD 5------------------------------------------------------------------------>
<div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

  <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
    <img 
      src="{{ asset('images/product_brands/longbeach/5.png') }}" 
      alt="[Name of title]"
      class="max-h-full max-w-full object-contain p-2"
    >
  </div>

  <div class="p-5 flex-1 flex flex-col">

    <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
      LONGBEACH LEMON TEA POWDER
    </h3>

    <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
    Mix it into sodas, mocktails, cocktails, or milkshakes for a burst of cherry goodness—or drizzle over ice cream, pancakes, and shaved ice for an indulgent treat. Made with high-quality ingredients and no artificial aftertaste, Longbeach Cherry Syrup delivers consistent flavor and aroma every time.
    </p>


  </div>

</div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->

<!---------------------------------------------------------------CARD 6------------------------------------------------------------------------>
<div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

  <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
    <img 
      src="{{ asset('images/product_brands/longbeach/6.png') }}" 
      alt="[Name of title]"
      class="max-h-full max-w-full object-contain p-2"
    >
  </div>

  <div class="p-5 flex-1 flex flex-col">

    <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
      LONGBEACH LEMONGRASS SYRUP
    </h3>

    <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
    Experience the refreshing and aromatic taste of lemongrass with Longbeach Lemongrass Syrup. Crafted from natural lemongrass extract, this syrup offers a perfect balance of citrusy brightness and gentle herbal notes—ideal for creating unique and invigorating beverages.   
    </p>


  </div>

</div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->

<!---------------------------------------------------------------CARD 7------------------------------------------------------------------------>
<div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

  <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
    <img 
      src="{{ asset('images/product_brands/longbeach/7.png') }}" 
      alt="[Name of title]"
      class="max-h-full max-w-full object-contain p-2"
    >
  </div>

  <div class="p-5 flex-1 flex flex-col">
    <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
      LONGBEACH POMELO PUREE
    </h3>

    <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
    Bring a burst of citrus freshness to your beverages and desserts with Longbeach Pomelo Puree. Made from carefully selected pomelos, this puree captures the perfect balance of tangy and sweet flavors with a hint of natural zest. Its smooth texture and vibrant aroma make it ideal for crafting refreshing drinks, smoothies, cocktails, and desserts.
    </p>

  </div>

</div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->

<!---------------------------------------------------------------CARD 8------------------------------------------------------------------------>
<div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

  <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
    <img 
      src="{{ asset('images/product_brands/longbeach/8.png') }}" 
      alt="[Name of title]"
      class="max-h-full max-w-full object-contain p-2"
    >
  </div>

  <div class="p-5 flex-1 flex flex-col">
    <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
      LONGBEACH PINK GUAVA PUREE
    </h3>

    <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
    Bring a burst of citrus freshness to your beverages and desserts with Longbeach Pomelo Puree. Made from carefully selected pomelos, this puree captures the perfect balance of tangy and sweet flavors with a hint of natural zest. Its smooth texture and vibrant aroma make it ideal for crafting refreshing drinks, smoothies, cocktails, and desserts.
    </p>

  </div>

</div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->

<!---------------------------------------------------------------CARD 9------------------------------------------------------------------------>
<div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

  <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
    <img 
      src="{{ asset('images/product_brands/longbeach/9.png') }}" 
      alt="[Name of title]"
      class="max-h-full max-w-full object-contain p-2"
    >
  </div>

  <div class="p-5 flex-1 flex flex-col">

    <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
      LONGBEACH TIRAMISU SYRUP
    </h3>

    <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
    Indulge in the decadent taste of Italy with LONGBEACH Tiramisu Syrup. Inspired by the classic dessert, this syrup combines the rich flavors of espresso-soaked ladyfingers, smooth mascarpone cream, and a hint of cocoa – all in one bottle.
    </p>

  </div>

</div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->

<!---------------------------------------------------------------CARD 10------------------------------------------------------------------------>
<div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

  <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
    <img 
      src="{{ asset('images/product_brands/longbeach/10.png') }}" 
      alt="[Name of title]"
      class="max-h-full max-w-full object-contain p-2"
    >
  </div>

  <div class="p-5 flex-1 flex flex-col">

    <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
      LONGBEACH COSMOPOLITAN SYRUP
    </h3>

    <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
    Elevate your drink experience with the sophisticated taste of LONGBEACH Cosmopolitan Syrup. Inspired by the iconic cocktail, this syrup blends tangy cranberry, zesty lime, and a hint of orange to deliver a bold, refreshing flavor – perfect for mocktails, cocktails, sodas, and more.
    </p>


  </div>

</div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->

<!---------------------------------------------------------------CARD 11------------------------------------------------------------------------>
<div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

  <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
    <img 
      src="{{ asset('images/product_brands/longbeach/11.png') }}" 
      alt="[Name of title]"
      class="max-h-full max-w-full object-contain p-2"
    >
  </div>

  <div class="p-5 flex-1 flex flex-col">

    <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
      LONGBEACH BANANA SYRUP
    </h3>

    <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
    Bring the sweet, tropical taste of ripe bananas to your drinks and desserts with LONGBEACH Banana Syrup! Made from high-quality ingredients, this syrup delivers a rich banana flavor and smooth texture that blends perfectly in both hot and cold recipes.
    </p>

  </div>

</div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->

<!---------------------------------------------------------------CARD 12------------------------------------------------------------------------>
<div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

  <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
    <img 
      src="{{ asset('images/product_brands/longbeach/12.png') }}" 
      alt="[Name of title]"
      class="max-h-full max-w-full object-contain p-2"
    >
  </div>

  <div class="p-5 flex-1 flex flex-col">

    <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
      LONGBEACH WHITE CHOCOLATE SYRUP
    </h3>

    
    <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
    Indulge in the smooth, creamy sweetness of LONGBEACH White Chocolate Syrup. Made with premium ingredients, this luxurious syrup delivers a rich white chocolate flavor that perfectly complements coffee, milkshakes, desserts, and more.
    </p>


  </div>

</div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->

<!---------------------------------------------------------------CARD 13------------------------------------------------------------------------>
<div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

  <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
    <img 
      src="{{ asset('images/product_brands/longbeach/13.png') }}" 
      alt="[Name of title]"
      class="max-h-full max-w-full object-contain p-2"
    >
  </div>

  <div class="p-5 flex-1 flex flex-col">

    <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
      LONGBEACH YUZU ORANGE PUREE
    </h3>

    <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
    Made from pure yuzu pulp imported from Japan, it has a sweet and fragrant taste with a subtle sour and slightly bitter flavor from nature. It is extremely popular in Japan and Korea.    
    </p>


  </div>

</div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->

<!---------------------------------------------------------------CARD 14------------------------------------------------------------------------>
<div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

  <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
    <img 
      src="{{ asset('images/product_brands/longbeach/14.png') }}" 
      alt="[Name of title]"
      class="max-h-full max-w-full object-contain p-2"
    >
  </div>

  <div class="p-5 flex-1 flex flex-col">

    <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
    LONGBEACH PINA COLADA SYRUP
    </h3>

    <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
    Bring the taste of the tropics to your drinks with Longbeach Pina Colada Syrup. A delicious blend of juicy pineapple and creamy coconut, this syrup delivers the classic Pina Colada flavor that’s smooth, refreshing, and perfectly balanced.
    </p>


  </div>

</div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->

<!---------------------------------------------------------------CARD 15------------------------------------------------------------------------>
<div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

  <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
    <img 
      src="{{ asset('images/product_brands/longbeach/15.png') }}" 
      alt="[Name of title]"
      class="max-h-full max-w-full object-contain p-2"
    >
  </div>

  <div class="p-5 flex-1 flex flex-col">

    <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
      LONGBEACH BEETROOT POWDER
    </h3>

    <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
    Fuel your day the natural way with LONGBEACH 100% Beetroot Powder – made from pure, finely ground beetroot with no additives, preservatives, or artificial coloring. Packed with nutrients and vibrant color, this superfood powder is perfect for smoothies, lattes, baked goods, or health drinks.
    </p>

  </div>

</div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->

<!---------------------------------------------------------------CARD 16------------------------------------------------------------------------>
<div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

  <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
    <img 
      src="{{ asset('images/product_brands/longbeach/16.png') }}" 
      alt="[Name of title]"
      class="max-h-full max-w-full object-contain p-2"
    >
  </div>

  <div class="p-5 flex-1 flex flex-col">

    <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
      LONGBEACH NON DAIRY CREAMER POWDER
    </h3>

    <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
    Achieve a rich, smooth, and creamy texture in every cup with Longbeach Non Dairy Creamer Powder. Specially formulated to enhance the flavor and body of your beverages, this premium creamer adds a velvety mouthfeel without overpowering the original taste.
    </p>


  </div>

</div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->

<!---------------------------------------------------------------CARD 17------------------------------------------------------------------------>
<div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

  <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
    <img 
      src="{{ asset('images/product_brands/longbeach/17.png') }}" 
      alt="[Name of title]"
      class="max-h-full max-w-full object-contain p-2"
    >
  </div>

  <div class="p-5 flex-1 flex flex-col">

    <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
      LONGBEACH PEACH TEA POWDER
    </h3>

    <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
    Enjoy the perfect blend of juicy peach flavor and bold black tea with LONGBEACH Peach Tea Powder. This instant tea mix delivers a smooth, fruity taste that's both refreshing and satisfying — perfect for hot days or a cozy tea break.
    </p>

  </div>

</div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->

<!---------------------------------------------------------------CARD 18------------------------------------------------------------------------>
<div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

  <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
    <img 
      src="{{ asset('images/product_brands/longbeach/18.png') }}" 
      alt="[Name of title]"
      class="max-h-full max-w-full object-contain p-2"
    >
  </div>

  <div class="p-5 flex-1 flex flex-col">

    <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
      LONGBEACH POPCORN SYRUP
    </h3>

    <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
    Enjoy the perfect blend of juicy peach flavor and bold black tea with LONGBEACH Peach Tea Powder. This instant tea mix delivers a smooth, fruity taste that's both refreshing and satisfying — perfect for hot days or a cozy tea break.
    </p>


  </div>

</div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->

<!---------------------------------------------------------------CARD 19------------------------------------------------------------------------>
<div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

  <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
    <img 
      src="{{ asset('images/product_brands/longbeach/19.png') }}" 
      alt="[Name of title]"
      class="max-h-full max-w-full object-contain p-2"
    >
  </div>

  <div class="p-5 flex-1 flex flex-col">

    <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
      LONGBEACH PINEAPPLE SYRUP
    </h3>

    <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
    Longbeach Pineapple Syrup is a sweet and refreshing fruit syrup, imported from Thailand, that captures the full flavor of pineapple with a balanced sweet and crisp taste. It is halal-certified and versatile, designed for professional use in cafes and bars, but can also be easily used at home by mixing with water or soda for a sparkling drink. The syrup is formulated for a simple yet full-flavored experience that doesn't require additional ingredients like simple syrup or lime juice. 
    </p>


  </div>

</div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->

<!---------------------------------------------------------------CARD 20------------------------------------------------------------------------>
<div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

  <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
    <img 
      src="{{ asset('images/product_brands/longbeach/20.png') }}" 
      alt="[Name of title]"
      class="max-h-full max-w-full object-contain p-2"
    >
  </div>

  <div class="p-5 flex-1 flex flex-col">
    
    <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
      LONGBEACH BUTTERSCOTH SYRUP
    </h3>


    <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
    Longbeach Butterscotch Syrup is a concentrated, halal-certified beverage syrup made in Thailand that features the flavor of brown sugar and butter. It has a sweet, smooth, and rich aroma, and is used to enhance a variety of drinks and desserts like coffee, cocktails, ice cream, and cakes. It is typically sold in 740ml bottles and is stored at room temperature, away from direct sunlight and heat. 
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
