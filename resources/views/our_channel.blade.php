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
<img src="{{ asset('images/HOMEPAGE/3.jpg') }}" 
     alt="Background" 
     class="absolute inset-0 w-full h-full object-cover">

    {{-- Optional overlay --}}
    <div class="absolute inset-0 bg-black/40"></div>


</section>


<!-----------------------------------ABOUT US SECTION--------------------------------------------------------->
<section class="max-w-7xl mx-auto px-4 py-12 space-y-10">

    <!-- Intro Section -->
    <div class="fade-section">
        <h2 class="text-2xl font-bold text-gray-900">Our Channel</h2>
    </div>

    <div class="fade-section">
        <p class="text-gray-600 leading-relaxed text-justify">
        At <span class="font-semibold text-gray-800">McAsia Foodtrade Corporation</span>, we take pride in building strong and lasting partnerships that bring high-quality food products closer to consumers. 
        Our distribution channels are strategically developed to ensure efficiency, consistency, and excellence from sourcing premium goods to delivering them to retail shelves, foodservice establishments, and institutional clients nationwide.        </p>
    </div>

    <!-- Innovation Section -->
    <div class="fade-section">
        <p class="text-gray-600 leading-relaxed text-justify">
        We work hand in hand with leading supermarkets, convenience stores, wholesalers, and food service providers to make our products accessible across the Philippines. 
        Through a well-established logistics and supply network, we maintain the integrity and freshness of every product we deliver.  
    </p>

    </div>

    <!-- Commitment Section -->
    <div class="fade-section">
    <p class="text-gray-600 leading-relaxed text-justify">
    Our goal is not only to distribute but to connect brands with markets and consumers with quality ensuring that every partner, from manufacturer to retailer, shares in the success of sustainable growth and mutual trust.        </p>
    </p>
    </div>


    
    <!-- Commitment Section -->
    <div class="fade-section">
    <p class="text-gray-600 leading-relaxed text-justify">
    At McAsia, our channel is more than a route it’s a partnership built on reliability, innovation, and a shared passion for food excellence.    </p>
    </div>


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



