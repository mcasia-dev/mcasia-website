    @extends('layouts.app')
    @section('title', 'McAsia - Ozaki')
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
<div class="image_slideshow relative w-full h-64 md:h-[500px] overflow-hidden rounded-lg shadow-lg mb-10 bg-black">
  <div id="slideshow" class="w-full h-full relative">
    <img src="{{ asset('images/product_brands/ozaki/banner.png') }}"
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
          src="{{ asset('images/product_brands/ozaki/1.png') }}" 
          alt="ABC Chili Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <!-- Content -->
      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          OZAKI TOBIKO ORANGE RECT 
        </h3>

        
        <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
        It is a flying fish roe colored in bright orange. It has a crunchy but soft texture. It is used as a garnish for many types of sushi.
        </p>



      </div>
    </div>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->






<!---------------------------------------------------------------CARD 2------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/ozaki/2.png') }}" 
          alt="ABC Chili Extra Hot"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          OZAKI NORI SHEETS PREM
        </h3>


        <p class="text-sm text-gray-600 mt-3 font-semibold">Features:</p>
        <ul class="list-disc ml-5 text-sm text-gray-600 space-y-1">
          <li>Edible seaweed or a dried seaweed flatten into sheets.</li>
          <li>Has a dark green color and a crunchy texture.</li>
          <li>Adds more flavor and crunch to your sushi rolls, onigiri rice or as toppings on noodles and miso soup.</li>
        </ul>


       

      </div>
    </div>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->




<!---------------------------------------------------------------CARD 3------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/ozaki/3.png') }}" 
          alt="ABC Chili Extra Hot"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          OZAKI NORI SHEETS PREM
        </h3>




        <p class="text-sm text-gray-600 mt-3 font-semibold">Features:</p>
        <ul class="list-disc ml-5 text-sm text-gray-600 space-y-1">
          <li>Edible seaweed or a dried seaweed flatten into sheets.</li>
          <li>Has a dark green color and a crunchy texture.</li>
          <li>Adds more flavor and crunch to your sushi rolls, onigiri rice or as toppings on noodles and miso soup.</li>
        </ul>


      </div>
    </div>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->




<!---------------------------------------------------------------CARD 4------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/ozaki/4.png') }}" 
          alt="ABC Chili Extra Hot"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          OZAKI MASAGO ORANGE RECT
        </h3>


          
        <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
        Bring authentic Japanese flavor to your dishes with Ozaki Konbu Dried Seaweed — a premium-quality kelp widely used in Japanese cuisine. Known for its rich umami taste, konbu is an essential ingredient in making dashi broth, soups, and other traditional recipes.|
        </p>



        
        <p class="text-sm text-gray-600 mt-3 font-semibold">Features:</p>
        <ul class="list-disc ml-5 text-sm text-gray-600 space-y-1">
          <li>Made from high-quality dried kelp harvested from clean waters</li>
          <li>Adds a deep umami flavor to soups, stocks, and stews</li>
          <li>Perfect for preparing Japanese dashi, sushi rice seasoning, or simmered dishes</li>
          <li>Made from high-quality dried kelp harvested from clean waters</li>
          <li>Can also be used in vegetable dishes, hotpots, and salads</li>
        </ul>


       

      </div>
    </div>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->




<!---------------------------------------------------------------CARD 5------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/ozaki/5.png') }}" 
          alt="ABC Chili Extra Hot"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          OZAKI KONBU DRIED SEAWEED
        </h3>


                 
        <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
        Bring authentic Japanese flavor to your dishes with Ozaki Konbu Dried Seaweed — a premium-quality kelp widely used in Japanese cuisine. Known for its rich umami taste, konbu is an essential ingredient in making dashi broth, soups, and other traditional recipes.|
        </p>


        <p class="text-sm text-gray-600 mt-3 font-semibold">Features:</p>
        <ul class="list-disc ml-5 text-sm text-gray-600 space-y-1">
          <li>Made from high-quality dried kelp harvested from clean waters</li>
          <li>Adds a deep umami flavor to soups, stocks, and stews</li>
          <li>Perfect for preparing Japanese dashi, sushi rice seasoning, or simmered dishes</li>
          <li>Can also be used in vegetable dishes, hotpots, and salads</li>

        </ul>


       

      </div>
    </div>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->






<!---------------------------------------------------------------CARD 6------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/ozaki/6.png') }}" 
          alt="ABC Chili Extra Hot"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          OZAKI GARI WHITE
        </h3>

         
        <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
        Add a refreshing touch to your Japanese dishes with Ozaki Gari White, premium-quality pickled ginger traditionally served with sushi and sashimi. Known for its light sweetness and mild tang, gari helps cleanse the palate between bites, enhancing the overall dining experience.|
        </p>


        <p class="text-sm text-gray-600 mt-3 font-semibold">Features:</p>
        <ul class="list-disc ml-5 text-sm text-gray-600 space-y-1">
          <li>Made from thinly sliced young ginger pickled in sweet vinegar</li>
          <li>Light, crisp, and mildly tangy flavor profile</li>
          <li>Perfect accompaniment for sushi, sashimi, and Japanese bento</li>
          <li>Can also be used as a garnish or ingredient in salads, rice bowls, and other Asian dishes</li>

        </ul>

       

      </div>
    </div>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->




<!---------------------------------------------------------------CARD 7------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/ozaki/7.png') }}" 
          alt="ABC Chili Extra Hot"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          OZAKI COOKING SAKE RYORISHOU
        </h3>


       <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
        Enhance your cooking with Ozaki Cooking Sake Ryorishou, a high-quality Japanese rice wine specially made for culinary use. This cooking sake brings out the natural flavors of your ingredients while adding a subtle umami richness to your dishes.
        </p>


        <p class="text-sm text-gray-600 mt-3 font-semibold">Features:</p>
        <ul class="list-disc ml-5 text-sm text-gray-600 space-y-1">
          <li>Made from premium fermented rice for authentic Japanese flavor</li>
          <li>Helps remove strong odors from meat and seafood</li>
          <li>Tenderizes ingredients and enhances overall taste</li>
          <li>Ideal for marinades, sauces, soups, and stir-fried or simmered dishes</li>

        </ul>

       

      </div>
    </div>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->



<!---------------------------------------------------------------CARD 8------------------------------------------------------------------------->
<div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

  <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
    <img 
      src="{{ asset('images/product_brands/ozaki/8.png') }}" 
      alt="[Name of title]"
      class="max-h-full max-w-full object-contain p-2"
    >
  </div>

  <div class="p-5 flex-1 flex flex-col">
    <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
      OZAKI WAKAME DRIED
    </h3>

          <p class="text-sm text-gray-600 mt-3 font-semibold">Features:</p>
          <ul class="list-disc ml-5 text-sm text-gray-600 space-y-1">
          <li>OZAKI WAKAME DRIED is a premium seaweed product perfect for enhancing your culinary creations.</li>
          <li>Rich in nutrients, it serves as a versatile ingredient for soups, salads, and sushi, making it ideal for health-conscious individuals and food enthusiasts alike.</li>
          <li>Its high-quality drying process preserves the natural flavors and textures, ensuring a delightful addition to any dish.</li>
          <li>This product is suitable for various dietary preferences, including vegan and gluten-free diets.</li>
          <li>Elevate your meals with the unique taste and health benefits of this exceptional dried seaweed.</li>

        </ul>

    

  </div>

</div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->

<!---------------------------------------------------------------CARD 9------------------------------------------------------------------------->
<div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

  <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
    <img 
      src="{{ asset('images/product_brands/ozaki/9.png') }}" 
      alt="[Name of title]"
      class="max-h-full max-w-full object-contain p-2"
    >
  </div>

  <div class="p-5 flex-1 flex flex-col">
    <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
      OZAKI SEASONED MENMA
    </h3>


    
    <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
    Ozaki Seasoned Menma is a Japanese condiment made from fermented and seasoned bamboo shoots, commonly used as a popular topping for ramen. It is described as having a slightly crunchy texture and a complex flavor that is savory, slightly sweet, and sometimes a little spicy. It can be enjoyed as a side dish or a snack, in addition to being a ramen topping. 
    </p>



  </div>

</div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->

<!---------------------------------------------------------------CARD 10------------------------------------------------------------------------>
<div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

  <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
    <img 
      src="{{ asset('images/product_brands/ozaki/10.png') }}" 
      alt="[Name of title]"
      class="max-h-full max-w-full object-contain p-2"
    >
  </div>

  <div class="p-5 flex-1 flex flex-col">
    <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
      OZAKI BENISHOGA
    </h3>


    <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
    It is a shredded red pickled ginger. Known as ‚ÄòShoga‚Äô, Shoga is used as an accompaniment to sushi, meats, and rice.
    </p>


  </div>

</div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->

<!---------------------------------------------------------------CARD 11------------------------------------------------------------------------>
<div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

  <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
    <img 
      src="{{ asset('images/product_brands/ozaki/11.png') }}" 
      alt="[Name of title]"
      class="max-h-full max-w-full object-contain p-2"
    >
  </div>

  <div class="p-5 flex-1 flex flex-col">
    <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
      OZAKI WASABI PASTE
    </h3>


       <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
       Add a bold kick of authentic Japanese heat to your meals with Ozaki Wasabi Paste. Made from premium-quality Japanese horseradish, this smooth and vibrant green paste delivers a sharp, aromatic flavor that enhances sushi, sashimi, noodles, and grilled dishes.
       </p>

      <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
      Perfectly balanced between spicy and fragrant, Ozaki Wasabi Paste brings out the natural taste of fresh fish and meats without overpowering them. Conveniently packed in a 43g tube, it’s easy to squeeze, store, and enjoy anytime.
      </p>


  </div>

</div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->

<!---------------------------------------------------------------CARD 12------------------------------------------------------------------------>
<div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

  <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
    <img 
      src="{{ asset('images/product_brands/ozaki/12.png') }}" 
      alt="[Name of title]"
      class="max-h-full max-w-full object-contain p-2"
    >
  </div>

  <div class="p-5 flex-1 flex flex-col">
    <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
      OZAKI MAYONNAISE
    </h3>

       <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
        Level up your favorite appetizer and snack more flavorful with the brand new OZAKI Mayonnaise! 
      </p>

  </div>

</div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->

<!---------------------------------------------------------------CARD 13------------------------------------------------------------------------>
<div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

  <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
    <img 
      src="{{ asset('images/product_brands/ozaki/13.png') }}" 
      alt="[Name of title]"
      class="max-h-full max-w-full object-contain p-2"
    >
  </div>

  <div class="p-5 flex-1 flex flex-col">
    <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
      OZAKI HONMIRIN
    </h3>

    <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
    Hon Mirin is a naturally fermented sweet rice wine used primarily to flavor Japanese dishes. Add a touch of unique flavor of sweetness to your sauces, broth, soup or other dishes like teriyaki and yakitori. It also remove strong odours from meat and fish.
    </p>

  </div>

</div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->

<!---------------------------------------------------------------CARD 14------------------------------------------------------------------------>
<div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

  <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
    <img 
      src="{{ asset('images/product_brands/ozaki/14.png') }}" 
      alt="[Name of title]"
      class="max-h-full max-w-full object-contain p-2"
    >
  </div>

  <div class="p-5 flex-1 flex flex-col">
    <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
      OZAKI AONORI POWDER
    </h3>


    <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
    Add a burst of authentic Japanese flavor and aroma to your dishes with Ozaki Aonori Powder — finely ground dried green seaweed commonly used as a garnish in Japanese cuisine. Its vibrant color and distinct umami taste make it a perfect finishing touch for your favorite meals.
    </p>



    <p class="text-sm text-gray-600 mt-3 font-semibold">Features:</p>
    <ul class="list-disc ml-5 text-sm text-gray-600 space-y-1">
    <li>Made from premium-quality dried green seaweed (aonori)</li>
    <li>Adds a fresh ocean aroma and rich umami flavor</li>
    <li>Commonly used for takoyaki, okonomiyaki, yakisoba, and tempura</li>
    </ul>




  </div>

</div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->

<!---------------------------------------------------------------CARD 15------------------------------------------------------------------------>
<div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

  <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
    <img 
      src="{{ asset('images/product_brands/ozaki/15.png') }}" 
      alt="[Name of title]"
      class="max-h-full max-w-full object-contain p-2"
    >
  </div>

  <div class="p-5 flex-1 flex flex-col">
    <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
      OZAKI CRABSTICK
    </h3>


    <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
    Crab sticks, krab sticks, imitation crab meat or seafood sticks are a type of seafood made of starch and finely pulverized white fish that has been shaped and cured to resemble the leg meat of snow crab or Japanese spider crab.
    </p>


    
    <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
    This crab stand-in has become popular over the past few decades and is commonly found in seafood salad, crab cakes, California sushi rolls and crab rangoons.
    </p>


  </div>

</div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->

<!---------------------------------------------------------------CARD 16------------------------------------------------------------------------>
<div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

  <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
    <img 
      src="{{ asset('images/product_brands/ozaki/16.png') }}" 
      alt="[Name of title]"
      class="max-h-full max-w-full object-contain p-2"
    >
  </div>

  <div class="p-5 flex-1 flex flex-col">
    <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
      OZAKI CHUKA WAKAME
    </h3>

    <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
    Frozen seasoned Wakame salad made from finely chopped wakame seaweed and seasoned with sesame oil, soy sauce, sugar, etc.
    </p>

    <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
    It can be served as a side dish or can be added to salads like tofu salad.
    </p>
    
  </div>

</div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->

<!---------------------------------------------------------------CARD 17------------------------------------------------------------------------>
<div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

  <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
    <img 
      src="{{ asset('images/product_brands/ozaki/17.png') }}" 
      alt="[Name of title]"
      class="max-h-full max-w-full object-contain p-2"
    >
  </div>

  <div class="p-5 flex-1 flex flex-col">
    <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
      OZAKI KIZAMI NORI
    </h3>

    <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
    Ozaki Kizami Nori is sprinkled to garnish on top of noodles and donburi (rice bowl). The nori seaweed is pre-shredded and packaged for convenience to enhance the flavor of your dish.
    </p>

  </div>

</div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->

<!---------------------------------------------------------------CARD 18------------------------------------------------------------------------>
<div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

  <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
    <img 
      src="{{ asset('images/product_brands/ozaki/18.png') }}" 
      alt="[Name of title]"
      class="max-h-full max-w-full object-contain p-2"
    >
  </div>

  <div class="p-5 flex-1 flex flex-col">
    <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
      OZAKI FROZEN EDAMAME
    </h3>

    <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
    Endamame are young green soybean, these arefrozen peeled endamame soy bean. It can be added to soup, salad such as chawan musi (egg custard dish), stews or simply served as a snack or appetizer.
    </p>

  </div>

</div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->

<!---------------------------------------------------------------CARD 20------------------------------------------------------------------------>
<div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

  <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
    <img 
      src="{{ asset('images/product_brands/ozaki/20.png') }}" 
      alt="[Name of title]"
      class="max-h-full max-w-full object-contain p-2"
    >
  </div>

  <div class="p-5 flex-1 flex flex-col">
    <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
      OZAKI WASABI POWDER PREM
    </h3>

    <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
    Wasabi powder is used as a spice in cooking. It has a sharp sensation of heat with pungent aroma, different from hot flavor of chili.
    Add a unique hot flavor by using it as a condiment to your soy sauce for sushi or sashimi or mixed with mayonnaise.
    </p>

  </div>

</div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->

<!---------------------------------------------------------------CARD 21------------------------------------------------------------------------>
<div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

  <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
    <img 
      src="{{ asset('images/product_brands/ozaki/21.png') }}" 
      alt="[Name of title]"
      class="max-h-full max-w-full object-contain p-2"
    >
  </div>

  <div class="p-5 flex-1 flex flex-col">
    <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
      OZAKI GARI PINK GRADE A
    </h3>

    <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
    A thinly sliced young ginger marinated from sugar and vinegar, this pickled radish is pink in color and has natural sweetness and is a perfect palate cleanser for your courses of sushi or sashimi, it also helps to enhance the flavors of your meal.
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
