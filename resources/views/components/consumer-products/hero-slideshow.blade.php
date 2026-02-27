<!-- Slideshow -->
<div class="relative w-full h-64 md:h-[500px] overflow-hidden rounded-lg shadow-lg mb-10 bg-black">
  <div id="slideshow" class="w-full h-full relative">
    <img src="{{ asset('images/EXPLORE NEW RECEIPES/1.png') }}"
         class="absolute top-0 left-0 w-full h-full object-cover opacity-100 transition-opacity duration-1000" />
    <img src="{{ asset('images/EXPLORE NEW RECEIPES/2.png') }}"
         class="absolute top-0 left-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000" />
    <img src="{{ asset('images/EXPLORE NEW RECEIPES/3.png') }}"
         class="absolute top-0 left-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000" />
    <img src="{{ asset('images/EXPLORE NEW RECEIPES/4.png') }}"
         class="absolute top-0 left-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000" />

    <!-- Overlay Content Box -->
    <div class="absolute inset-0 flex items-center justify-center">
        <div class="bg-black/50 p-6 rounded-xl shadow-9xl w-full max-w-xl text-center">
        <h2 class="text-2xl font-bold text-white mb-3">Explore New Recipes</h2>
        <p class="text-white mb-4" >
          Explore, cook, and enjoy the rich flavors of Asia without leaving home. McAsia makes it easy to create dishes that delight every craving. Truly, your Home to your Asian Cravings
        </p>
        <button id="toggleContent"
                class="px-6 py-2 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition">
          Explore
        </button>
      </div>
    </div>
  </div>
</div>
