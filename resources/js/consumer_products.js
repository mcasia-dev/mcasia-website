document.addEventListener('DOMContentLoaded', () => {

    // ---------------- Slideshow ----------------
    const slides = document.querySelectorAll('#slideshow img');
    let current = 0;
    if (slides.length > 0) {
        setInterval(() => {
            slides[current].classList.remove('opacity-100');
            slides[current].classList.add('opacity-0');
            current = (current + 1) % slides.length;
            slides[current].classList.remove('opacity-0');
            slides[current].classList.add('opacity-100');
        }, 5000);
    }

    // ---------------- Carousel Setup ----------------
    function setupCarousel(carouselId, prevId, nextId) {
        const carousel = document.getElementById(carouselId);
        const prevBtn = document.getElementById(prevId);
        const nextBtn = document.getElementById(nextId);

        if (!carousel) return; // Stop if carousel not found

        let scrollPos = 0;

        function getVisibleItems() {
            const width = window.innerWidth;
            if (width >= 1024) return 3; // lg
            if (width >= 640) return 2;  // sm
            return 1;                     // mobile
        }

        function getItemWidth() {
            const firstItem = carousel.querySelector('div');
            return firstItem ? firstItem.offsetWidth : 0;
        }

        function scrollAmount() {
            return getItemWidth() * getVisibleItems();
        }

        if (prevBtn) {
            prevBtn.addEventListener('click', () => {
                scrollPos -= scrollAmount();
                if (scrollPos < 0) scrollPos = 0;
                carousel.scrollTo({ left: scrollPos, behavior: 'smooth' });
            });
        }

        if (nextBtn) {
            nextBtn.addEventListener('click', () => {
                const maxScroll = carousel.scrollWidth - carousel.clientWidth;
                scrollPos += scrollAmount();
                if (scrollPos > maxScroll) scrollPos = maxScroll;
                carousel.scrollTo({ left: scrollPos, behavior: 'smooth' });
            });
        }

        // Optional: update scrollPos on resize to prevent overflow
        window.addEventListener('resize', () => {
            const maxScroll = carousel.scrollWidth - carousel.clientWidth;
            if (scrollPos > maxScroll) scrollPos = maxScroll;
        });
    }

    //-------------------- CAROUSELS -------------------
    setupCarousel('carouselFeatured', 'prevFeatured', 'nextFeatured');
    setupCarousel('carouselFeatured2', 'prevFeatured2', 'nextFeatured2');
    setupCarousel('carouselFeatured3', 'prevFeatured3', 'nextFeatured3');
    setupCarousel('carouselFeatured4', 'prevFeatured4', 'nextFeatured4');
    setupCarousel('carouselFeatured5', 'prevFeatured5', 'nextFeatured5');
    setupCarousel('carouselFeatured6', 'prevFeatured6', 'nextFeatured6');
    setupCarousel('carouselFeatured7', 'prevFeatured7', 'nextFeatured7');

    setupCarousel('carouselNew', 'prevNew', 'nextNew');
    //-------------------------------------------------

    // ---------------- Toggle Products / Recipes ----------------
    const toggleBtn = document.getElementById('toggleContent');
    const products = document.getElementById('productsSection');
    const recipes = document.getElementById('recipesSection');

    if (toggleBtn && products && recipes) {
        let showingRecipes = false;

        toggleBtn.addEventListener('click', () => {
            if (showingRecipes) {
                products.classList.remove('hidden');
                recipes.classList.add('hidden');
                toggleBtn.textContent = 'View Recipes';
            } else {
                products.classList.add('hidden');
                recipes.classList.remove('hidden');
                toggleBtn.textContent = 'View Products';
            }
            showingRecipes = !showingRecipes;
        });
    }
    // -------------------------------------------------

});
