@extends('layouts.app')
@section('title', 'McAsia - Retail Product')
@section('content')

<style>

  html, body {
  overflow-x: hidden;
}


/* Smooth scrolling for logos */
@keyframes scroll {
  0%   { transform: translateX(0); }
  100% { transform: translateX(-50%); } /* Move only half since logos are duplicated */
}
.animate-scroll {
  animation: scroll 40s linear infinite;
  display: flex;
}

.text-justify {
  text-align: justify;
}


   /* Viewing for Monitor going 2k - 4k resolution */
    @media (min-width: 1440px) {
    .content-wrapper {
      margin-left: -17rem; /* Move content slightly right */
      margin-top: 8rem; /* Optional vertical offset */
      }

    .image_slideshow
    {
      margin-left: 10rem;
    }

    }



/*-------------------- Mobile Resolution -------------*/
@media (max-width: 414px) {

  /* Entire section: remove the left offset + reduce spacing */
  .mobile-section {
    margin-top: 3px; !important;
    margin-left: 0 !important;
    padding: 20px 15px !important;
    gap: 20px !important;
  }

  /* Text readability */
  .mobile-section h2 {
    font-size: 16px !important;
    line-height: 1.3;
  }

  .mobile-section p {
    font-size: 13px !important;
    line-height: 1.5;
  }

  /* Fix slideshow size for mobile */
  .image_slideshow {
    width: 100% !important;
    height: 220px !important; /* Adjust to your liking */
  }

  .image_slideshow img {
    object-fit: cover;
  }



    /* Fix spacing between section and rest of page */
  #logos {
    padding-top: 30px !important;
    padding-bottom: 30px !important;
  }

  /* Adjust grid layout on mobile */
  #logos .logo-grid {
    grid-template-columns: repeat(3, 1fr) !important; /* 3 per row */
    gap: 20px !important;
  }

  /* Logo images resize properly */
  #logos img {
    max-height: 60px !important; /* slightly smaller but clean */
    width: auto !important;
    object-fit: contain !important;
  }



}
/*-------------------------------------------------*/



/*-------------------------------------------------*/



</style>

<div class="w-full">
    
<div class="h-26"></div>


<!---------------------------------------------------Section--------------------------------------------------->
<div class="flex flex-col text-justify md:flex-row items-center md:items-start w-full max-w-7xl mx-auto py-10 gap-10 -mt-9 ml-10 mobile-section">

  <!-- LEFT: Information -->
  <div class="w-full md:w-1/2 space-y-4 px-4">
    <h2 class="text-[31px] font-bold text-gray-800">Bringing Asia’s Best Flavors to Every Home</h2>
    <p class="text-gray-600 text-[13px] text-justify leading-relaxed">
    We bring the vibrant flavors of Asia straight to your kitchen with a wide range of authentic products from savory sauces and condiments to ready-to-cook and ready-to-eat favorites. 
    Each product is made to help families enjoy meals that are not only delicious but also convenient and full of genuine Asian taste.    
    </p>


    <p class="text-gray-600 text-[13px] text-justify leading-relaxed">
    Available in leading supermarkets and stores nationwide, we ensure Asia’s best flavors are always within reach—so you can cook, share, and savor every moment with confidence and authenticity.    
    </p>
{{--
    <p class="text-gray-600 text-[13px] text-justify leading-relaxed">
    Our retail products are trusted by families and home cooks who value quality and authenticity. 
    Whether you’re preparing a simple everyday dish or recreating your favorite Asian specialties, our brands make it easy to enjoy the taste of home, anytime.    
    </p>


    <p class="text-gray-600 text-[13px] text-justify leading-loose">
    Found in leading supermarkets and stores nationwide, we make sure your favorite Asian flavors are always within reach so you can cook, share, and savor every moment with the true essence of Asia.    
    </p>
--}}

        <br>

    <a href="#" onclick="history.back(); return false;"
   class="btn btn-outline-light d-inline-flex align-items-center gap-2 -px-6 py-2"
   style="font-size: 16px;">

    <i class="fa-solid fa-arrow-left"></i>
    <span>Back</span>
</a>



  </div>

  <!-- RIGHT: Slideshow -->
  <div class="image_slideshow relative w-[500px] h-64 md:h-[335px] overflow-hidden rounded-lg shadow-lg bg-black">
    <div id="slideshow" class="w-full h-full relative">
      <img src="{{ asset('images/retail_product/1.jpg') }}"
           class="absolute top-0 left-0 w-full h-full object-cover opacity-100 transition-opacity duration-1000" />
  </div>
</div>
</div>
<!--------------------------------------------------End Section-------------------------------------------------->









<!---------------------------------------------------Section 2--------------------------------------------------->
<section id="logos" class="relative w-full h-full flex justify-center items-center bg-white py-10">
  <div class="grid logo-grid grid-cols-2 sm:grid-cols-5 md:grid-cols-5 lg:grid-cols-5 w-full justify-items-center items-center">
    <!-- Example Logos -->
    <img src="{{ asset('images/Retail Partner/1.png') }}" alt="Logo 1" class="max-h-15 w-auto object-contain opacity-0 transition-all duration-500 transform scale-90 logo-item">
    <img src="{{ asset('images/Retail Partner/2.png') }}" alt="Logo 2" class="max-h-30 w-auto object-contain opacity-0 transition-all duration-500 transform scale-90 logo-item">
    <img src="{{ asset('images/Retail Partner/3.png') }}" alt="Logo 3" class="max-h-30 w-auto object-contain opacity-0 transition-all duration-500 transform scale-90 logo-item">
    <img src="{{ asset('images/Retail Partner/4.png') }}" alt="Logo 4" class="max-h-30 w-auto object-contain opacity-0 transition-all duration-500 transform scale-90 logo-item">
    <img src="{{ asset('images/Retail Partner/5.png') }}" alt="Logo 5" class="max-h-30 w-auto object-contain opacity-0 transition-all duration-500 transform scale-90 logo-item">
    <img src="{{ asset('images/Retail Partner/6.png') }}" alt="Logo 6" class="max-h-30 w-auto object-contain opacity-0 transition-all duration-500 transform scale-90 logo-item">
    <img src="{{ asset('images/Retail Partner/7.png') }}" alt="Logo 7" class="max-h-30 w-auto object-contain opacity-0 transition-all duration-500 transform scale-90 logo-item">
    <img src="{{ asset('images/Retail Partner/9.png') }}" alt="Logo 8" class="max-h-30 w-auto object-contain opacity-0 transition-all duration-500 transform scale-90 logo-item">
    <img src="{{ asset('images/Retail Partner/10.png') }}" alt="Logo 9" class="max-h-30 w-auto object-contain opacity-0 transition-all duration-500 transform scale-90 logo-item">
    <img src="{{ asset('images/Retail Partner/11.png') }}" alt="Logo 10" class="max-h-30 w-auto object-contain opacity-0 transition-all duration-500 transform scale-90 logo-item">
    <img src="{{ asset('images/Retail Partner/12.png') }}" alt="Logo 11" class="max-h-30 w-auto object-contain opacity-0 transition-all duration-500 transform scale-90 logo-item">
    <img src="{{ asset('images/Retail Partner/13.png') }}" alt="Logo 12" class="max-h-30 w-auto object-contain opacity-0 transition-all duration-500 transform scale-90 logo-item">
    <img src="{{ asset('images/Retail Partner/14.png') }}" alt="Logo 13" class="max-h-30 w-auto object-contain opacity-0 transition-all duration-500 transform scale-90 logo-item">
    <img src="{{ asset('images/Retail Partner/15.png') }}" alt="Logo 14" class="max-h-30 w-auto object-contain opacity-0 transition-all duration-500 transform scale-90 logo-item">
    <img src="{{ asset('images/Retail Partner/16.png') }}" alt="Logo 15" class="max-h-30 w-auto object-contain opacity-0 transition-all duration-500 transform scale-90 logo-item">
    <img src="{{ asset('images/Retail Partner/17.png') }}" alt="Logo 15" class="max-h-30 w-auto object-contain opacity-0 transition-all duration-500 transform scale-90 logo-item">
    <img src="{{ asset('images/Retail Partner/18.png') }}" alt="Logo 15" class="max-h-30 w-auto object-contain opacity-0 transition-all duration-500 transform scale-90 logo-item">
    <img src="{{ asset('images/Retail Partner/19.png') }}" alt="Logo 15" class="max-h-30 w-auto object-contain opacity-0 transition-all duration-500 transform scale-90 logo-item">
    <img src="{{ asset('images/Retail Partner/20.png') }}" alt="Logo 15" class="max-h-30 w-auto object-contain opacity-0 transition-all duration-500 transform scale-90 logo-item">
    <img src="{{ asset('images/Retail Partner/21.png') }}" alt="Logo 15" class="max-h-30 w-auto object-contain opacity-0 transition-all duration-500 transform scale-90 logo-item">
    <img src="{{ asset('images/Retail Partner/22.png') }}" alt="Logo 15" class="max-h-30 w-auto object-contain opacity-0 transition-all duration-500 transform scale-90 logo-item">
    <img src="{{ asset('images/Retail Partner/23.png') }}" alt="Logo 15" class="max-h-30 w-auto object-contain opacity-0 transition-all duration-500 transform scale-90 logo-item">

  </div>
</section>
<!--------------------------------------------------End Section-------------------------------------------------->

@push('scripts')


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

</div>



@vite('resources/js/consumer_products.js')  
@include('components.footer')
@endsection
