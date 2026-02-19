    @extends('layouts.app')
    @section('title', 'McAsia - Heng')
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
    <img src="{{ asset('images/product_brands/heng/banner.png') }}"
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
          src="{{ asset('images/product_brands/heng/1.png') }}" 
          alt="ABC Chili Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <!-- Content -->
      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          HENG'S PRAWN STOCK 
        </h3>


        
        <p class="text-sm text-gray-600 mt-3 font-semibold">Features:</p>
        <ul class="list-disc ml-5 text-sm text-gray-600 space-y-1">
          <li>Made from the finest wholesome prawn</li>
          <li>Best for preparation of soup base, fish ball, fried noodles, meat and vegetable dishes </li>
          <li>Brings out homemade taste</li>
        </ul>


        <p class="text-sm text-gray-600 mt-3 font-semibold">Specifications:</p>
        <ul class="list-disc ml-5 text-sm text-gray-600 space-y-1">
          <li>Brand: Heng’s</li>
          <li>Size: 500g</li>
          <li>Quantity Per Package (QPP): 1pc Sachet / Pack</li>
          <li>Parcel Size: 9cm x 15cm x 20cm</li>
          <li>Item Weight: 0.5kg</li>
          <li>Parcel Weight: 0.78kg</li>
        </ul>




      </div>
    </div>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->






<!---------------------------------------------------------------CARD 2------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/heng/2.png') }}" 
          alt="ABC Chili Extra Hot"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          HENG'S SATAY CELUP SAUCE
        </h3>

        <p class="text-sm text-gray-600 mt-3 font-semibold">Features:</p>
        <ul class="list-disc ml-5 text-sm text-gray-600 space-y-1">
          <li>An assortment of fresh and semi-cooked seafood, meat and vegetables on skewers dipped into the pot of aromatic satay sauce.</li>
          <li>Made using traditional recipe</li>
          <li>With exotic blend of spices and fresh ingredients come together to make it a delicious and tantalizing treat to your taste bud.</li>
        </ul>


        <p class="text-sm text-gray-600 mt-3 font-semibold">Specifications:</p>
        <ul class="list-disc ml-5 text-sm text-gray-600 space-y-1">
          <li>Brand: Heng's</li>
          <li>Size: 200g</li>
          <li>Quantity Per Pack (QPP): 1pc Sachet / Pack</li>
          <li>Parcel Size: 3cm x 21cm x 27cm</li>
          <li>Item Weight: 0.2kg</li>
          <li>Parcel Weight: 0.4kg</li>

        </ul>

      </div>
    </div>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->




<!---------------------------------------------------------------CARD 3------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/heng/3.png') }}" 
          alt="ABC Chili Extra Hot"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          HENG'S PEPPER SALT PRAWN SPICES
        </h3>



        <p class="text-sm text-gray-600 mt-3 font-semibold">Features:</p>
        <ul class="list-disc ml-5 text-sm text-gray-600 space-y-1">
          <li>Perfect seasoning for your Asian Dishes</li>
          <li>Brings out the fragrant and flavorful aroma of Prawn that gives dishes a more delicious taste.</li>
          <li>Experiencing an authentic taste of Prawns and real herbs and spices combined in these seasoning</li>
        </ul>


        <p class="text-sm text-gray-600 mt-3 font-semibold">Specifications:</p>
        <ul class="list-disc ml-5 text-sm text-gray-600 space-y-1">
          <li>Brand: Hengs</li>
          <li>Size: 25g</li>
          <li>Quantity Per Package (QPP): 1pc sachet / pack</li>
          <li>Parcel Size: 3cm x 14cm x 18cm</li>
          <li>Item Weight: 0.03kg</li>
          <li>Parcel Weight: 0.05kg</li>
        </ul>

      </div>
    </div>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->







<!---------------------------------------------------------------CARD 4------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/heng/4.png') }}" 
          alt="ABC Sweet Soy Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          HENG'S GINSENG CHICKEN SOUP HERBS and SPICES
        </h3>



        <p class="text-sm text-gray-600 mt-3 font-semibold">Specifications:</p>
        <ul class="list-disc ml-5 text-sm text-gray-600 space-y-1">
          <li>Brand: Heng’s</li>
          <li>Size: 25g </li>
          <li>Quantity Per Package (QPP): 1pc Sachet / Pack</li>
          <li>Parcel Size: 3cm x 17cm x 23cm</li>
          <li>Item Weight: 0.025kg</li>
          <li>Parcel Weight: 0.04kg</li>
        </ul>


      </div>
    </div>


<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->







  <!---------------------------------------------------------------CARD 5------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/heng/5.png') }}" 
          alt="ABC Sweet Soy Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          HENG'S EMPEROR CHICKEN HERBS and SPICES
        </h3>

        <p class="text-sm text-gray-600 mt-3 font-semibold">Features:</p>
        <ul class="list-disc ml-5 text-sm text-gray-600 space-y-1">
          <li>Made from selected fresh herbs and spices that lets out the original Asian taste of Chicken.</li>
          <li>Perfect seasoning and coating for your Asian chicken Dishes and it brings out the fragrant and flavorful aroma of Chicken with Herbs that gives dishes a more delicious taste.</li>
          <li>Experiencing an authentic taste of Chicken and real herbs and spices combined in these seasoning.</li>
        </ul>


        <p class="text-sm text-gray-600 mt-3 font-semibold">Specifications:</p>
        <ul class="list-disc ml-5 text-sm text-gray-600 space-y-1">
          <li>Brand: Heng's</li>
          <li>Size: 50g </li>
          <li>Quantity Per Package (QPP): 1pc Sachet / Pack</li>
          <li>Parcel Size: 3cm x 15cm x 21cm</li>
          <li>Item Weight: 0.05kg</li>
          <li>Parcel Weight: 0.69kg</li>
        </ul>


      </div>
    </div>


<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->










  <!---------------------------------------------------------------CARD 6------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/heng/6.png') }}" 
          alt="ABC Sweet Soy Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          HENG'S NYONYA RENDANG SAUCE
        </h3>

        <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
        Malacca Nyonya cuisine is a fusion of traditional malay and chinese culinary influences coupled with recipes passed down from generations. 
        Meticulous in its preparation, the harmony of selected fresh herbs and spices, positions Malacca’s Nyonya cuisine as one of the top delicacies in Southeast Asia.
        </p>


        
        <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
        Heng’s Malacca Nyonya Rendang Sauce comprises of fantastically spicy sweetness with tender chicken chunks and fresh coconut milk, bringing you mouthfuls of unforgettable delight. 
        You will be sure to enjoy this time-cherished flavour with your family and friends!
        </p>



      </div>
    </div>


<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->







  <!---------------------------------------------------------------CARD 7------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/heng/7.png') }}" 
          alt="ABC Sweet Soy Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          HENG'S GOLDEN SALTED EGG POWDER 
        </h3>

        <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
        Ready-made salted egg powder for seasoning and cooking. Add a tablespoon or two to poultry or seafood with curry leaves for authentic salted egg dishes        
        </p>




      </div>
    </div>


<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->




  <!---------------------------------------------------------------CARD 8------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/heng/8.png') }}" 
          alt="ABC Sweet Soy Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          HENG'S SCALLOP SAUCE
        </h3>

        <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
        A paste that adds rich flavor to your favorite dishes
        </p>




      </div>
    </div>


<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->










  <!---------------------------------------------------------------CARD 9------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/heng/9.png') }}" 
          alt="ABC Sweet Soy Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          HENG'S CURRY LAKSA PASTE 
        </h3>

        <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
        Make your dishes more flavorful. It has real extracts of Abalone that turns your dishes into something special!
        </p>


        
        <p class="text-sm text-gray-600 mt-3 font-semibold">Features:</p>
        <ul class="list-disc ml-5 text-sm text-gray-600 space-y-1">
          <li>With distinctly fiery richness goes generously with rice noodles, fish cake, prawns and coconut milk</li>
        </ul>


        <p class="text-sm text-gray-600 mt-3 font-semibold">Specifications:</p>
        <ul class="list-disc ml-5 text-sm text-gray-600 space-y-1">
          <li>Brand: Heng’s</li>
          <li>Size: 200g</li>
          <li>Quantity Per Pack (QPP): 1pc Sachet / Pack</li>
          <li>Parcel Size: 3cm x 21cm x 27cm</li>
          <li>Item Weight: 200g</li>
          <li>Parcel Weight: 0.4Kg</li>

        </ul>




      </div>
    </div>


<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->






  <!---------------------------------------------------------------CARD 10------------------------------------------------------------------------->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col hover:shadow-xl transition-shadow">

      <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
        <img 
          src="{{ asset('images/product_brands/heng/10.png') }}" 
          alt="ABC Sweet Soy Sauce"
          class="max-h-full max-w-full object-contain p-2"
        >
      </div>

      <div class="p-5 flex-1 flex flex-col">

        <h3 class="text-lg font-semibold text-center text-gray-800 leading-snug">
          HENG'S TRADITIONAL HERBAL BROTH SPICES 
        </h3>

        <p class="text-gray-600 text-justify text-sm mt-3 leading-relaxed">
        Make your dishes more flavorful. It has real extracts of Abalone that turns your dishes into something special!
        </p>


              <p class="text-sm text-gray-600 mt-3 font-semibold">Features:</p>
        <ul class="list-disc ml-5 text-sm text-gray-600 space-y-1">
          <li>Contains a meticulously balanced blend of herbs and spices, capturing the essence of authentic recipes. </li>
          <li>Free from added MSG, it ensures a natural taste, making it a perfect seasoning for a variety of Asian dishes.</li>
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
