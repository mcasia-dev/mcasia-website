    @extends('layouts.app')
    @section('title', 'McAsia')
    @section('content')

<style>
        body.fade-in {
            opacity: 1;
        }

        /* Fade-in animation for sections */
        .fade-section {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 1s ease-out, transform 1s ease-out;
        }
        .fade-section.visible {
            opacity: 1;
            transform: translateY(0);
        }
</style>



  <div class="h-26"></div>

    <div class="relative overflow-hidden min-h-screen">

  {{-- Hero Section --}}
<section class="relative h-screen md:h-[550px] overflow-hidden"> {{-- Reduced height --}}
<img src="{{ asset('images/Everyday Moments/2.png') }}" 
     alt="Background" 
     class="absolute inset-0 w-full h-full object-cover">

    {{-- Optional overlay --}}
    <div class="absolute inset-0 bg-black/40"></div>


</section>


<!-----------------------------------ABOUT US SECTION--------------------------------------------------------->
<section class="max-w-7xl mx-auto px-4 py-12 space-y-10">

    <!-- Intro Section -->
    <div class="fade-section">
    <h2 class="text-2xl font-bold text-gray-900">Our Impact</h2>
    </div>
{{--
    <div class="fade-section">
    <p class="text-gray-600 leading-relaxed text-justify">
    At <span class="font-semibold text-gray-800">McAsia Foodtrade Corporation</span>, our impact extends far beyond the products we deliver it is defined by our purpose to nourish communities, empower partners, and build a sustainable food ecosystem founded on trust, quality, and innovation.  
    </p>
    </div>
--}}
    <div class="fade-section">
    <p class="text-gray-600 leading-relaxed text-justify">
    At <span class="font-semibold text-gray-800">McAsia Foodtrade Corporation</span>, our impact goes beyond distribution. We connect world-class brands with Filipino consumers through a reliable nationwide network, delivering safe, high-quality food and beverage products that enrich everyday living.  
    </p>
    </div>

    <div class="fade-section">
    <p class="text-gray-600 leading-relaxed text-justify">
    Guided by integrity, sustainability, and innovation, we create long-term value for our partners, support local industries, and contribute to economic growth. 
    We measure success not only by performance, but by the lasting relationships we build and the positive impact we create across the food ecosystem.        
    </p>
    </div>


{{--
        <div class="fade-section">
        <p class="text-gray-600 leading-relaxed text-justify">
        Our commitment goes beyond business. We uphold responsible and sustainable practices  from reducing operational waste and improving efficiency to fostering community development and ethical sourcing. 
        Every decision we make reflects our dedication to sustainability, integrity, and shared progress.
        </p>
        </div>


        <div class="fade-section">
        <p class="text-gray-600 leading-relaxed text-justify">
        At McAsia, we measure our success not only in performance, but in the relationships we build, the livelihoods we sustain, and the positive change we inspire one product, one partnership, and one purpose at a time.        
        </p>
        </div>
--}}

        <br>

    <a href="#" onclick="history.back(); return false;"
   class="btn btn-outline-light d-inline-flex align-items-center gap-2 -px-6 py-2"
   style="font-size: 16px;">

    <i class="fa-solid fa-arrow-left"></i>
    <span>Back</span>
</a>


</section>
<!------------------------------------------------------------------------------------------------------------------------------->







@include('components.footer')





    <script>
        // Fade-in for entire page
        window.addEventListener("load", () => {
            document.body.classList.add("fade-in");
        });

        // Fade-in each section on scroll
        const fadeSections = document.querySelectorAll('.fade-section');

        const fadeInOnScroll = () => {
            const triggerBottom = window.innerHeight * 0.85;
            fadeSections.forEach(section => {
                const sectionTop = section.getBoundingClientRect().top;
                if (sectionTop < triggerBottom) {
                    section.classList.add('visible');
                }
            });
        };

        window.addEventListener('scroll', fadeInOnScroll);
        window.addEventListener('load', fadeInOnScroll);
    </script>



    
<script>
  AOS.init({
    duration: 1000,
    once: true,
  });
</script>



