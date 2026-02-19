// =====================
// AUTO SCROLL SECTION
// =====================

// const sections = document.querySelectorAll(".section");
// let currentSection = 0;
// let isScrolling = false;

// function scrollToSection(index) {
//   if (index < 0 || index >= sections.length) return;
//   isScrolling = true;
//   sections[index].scrollIntoView({ behavior: "smooth" });
//   currentSection = index;

//   setTimeout(() => {
//     isScrolling = false;
//   }, 800); // adjust for scroll speed
// }

// window.addEventListener("keydown", (e) => {
//   if (isScrolling) return;
//   if (e.key === "ArrowDown") scrollToSection(currentSection + 1);
//   if (e.key === "ArrowUp") scrollToSection(currentSection - 1);
// });

// window.addEventListener("wheel", (e) => {
//   if (isScrolling) return;
//   if (e.deltaY > 0) scrollToSection(currentSection + 1);
//   else if (e.deltaY < 0) scrollToSection(currentSection - 1);
// });

// // Start at first section
// scrollToSection(0);

// =====================
// BACKGROUND IMAGE FADE
// =====================

function startBackgroundFade(sectionId, interval = 3500) {
  const slides = document.querySelectorAll(`#${sectionId} .bg-slide`);
  if (!slides.length) return;

  let current = 0;
  setInterval(() => {
    slides[current].classList.remove("active");
    current = (current + 1) % slides.length;
    slides[current].classList.add("active");
  }, interval);
}

// =====================
// SWIPERS
// =====================

new Swiper(".mySwiper", {
  slidesPerView: 3,
  spaceBetween: 20,
  loop: true,
  autoplay: { delay: 2500, disableOnInteraction: false },
});

new Swiper(".productSwiper", {
  slidesPerView: 3,
  spaceBetween: 20,
  loop: true,
  autoplay: { delay: 2500, disableOnInteraction: false },
  pagination: { el: ".swiper-pagination", clickable: true },
  navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
  breakpoints: {
    640: { slidesPerView: 2 },
    1024: { slidesPerView: 3 },
  },
});

//--------------------PRODUCT BRANDS---------------------------------





//--------------------------------------------------------------------

    
// =====================
// MODAL HANDLING
// =====================
const modal = document.getElementById("recipeModal");
const modalContent = document.getElementById("recipeModalContent");
const img = document.getElementById("recipeModalImage");
const title = document.getElementById("recipeModalTitle");
const text = document.getElementById("recipeModalText");

// Open modal
document.querySelectorAll(".swiper-slide").forEach((slide) => {
  slide.addEventListener("click", () => {
    img.src = slide.dataset.image || "";
    title.textContent = slide.dataset.title || "";
    text.textContent = slide.dataset.text || "";

    modal.classList.remove("hidden");
    modal.classList.add("flex");

    requestAnimationFrame(() => {
      modal.classList.remove("opacity-0"); // fade backdrop
      modalContent.classList.remove("opacity-0", "scale-95"); // fade & scale content
      modalContent.classList.add("opacity-100", "scale-100");
    });
  });
});

// // Close modal (button, ESC, click outside)
// document.getElementById("closeRecipeModal").addEventListener("click", closeModal);
// modal.addEventListener("click", (e) => {
//   if (e.target === modal) closeModal();
// });
// document.addEventListener("keydown", (e) => {
//   if (e.key === "Escape") closeModal();
// });

// function closeModal() {
//   modal.classList.add("opacity-0"); // fade out backdrop
//   modalContent.classList.add("opacity-0", "scale-95");
//   modalContent.classList.remove("opacity-100", "scale-100");

//   setTimeout(() => {
//     modal.classList.add("hidden");
//     modal.classList.remove("flex");
//   }, 300); // match duration-300
// }






// =====================
// AOS (Animate on Scroll)
// =====================

AOS.init({
  duration: 1000, // animation speed
  once: true,     // run only once
});


document.addEventListener('DOMContentLoaded', () => {
  // Guard: make sure section exists
  const section = document.getElementById('section1');
  if (!section) {
    console.warn('startBackgroundFade: #section1 not found');
    return;
  }

  const slides = Array.from(section.querySelectorAll('.bg-slide'));
  if (!slides.length) {
    console.warn('startBackgroundFade: no .bg-slide elements found in #section1');
    return;
  }

  // initialize: set only the first slide active if none are active
  let current = slides.findIndex(s => s.classList.contains('active'));
  if (current < 0) {
    current = 0;
    slides.forEach((s, i) => s.classList.toggle('active', i === 0));
  }

  const intervalMs = 4000; // change speed here (ms)
  // clear any previous timer (useful during HMR/dev)
  if (window._section1BgFadeTimer) {
    clearInterval(window._section1BgFadeTimer);
  }

  window._section1BgFadeTimer = setInterval(() => {
    const next = (current + 1) % slides.length;
    slides[current].classList.remove('active');
    slides[next].classList.add('active');
    current = next;
  }, intervalMs);
});






  function slideshow() {
    return {
      currentIndex: 0,
      slides: [
        {
          image: "images/slide1.jpg",
          title: "Event One",
          description: "This is the description for the first event."
        },
        {
          image: "images/slide2.jpg",
          title: "Event Two",
          description: "This is the description for the second event."
        },
        {
          image: "images/slide3.jpg",
          title: "Event Three",
          description: "This is the description for the third event."
        }
      ],
      startSlideshow() {
        setInterval(() => {
          this.currentIndex = (this.currentIndex + 1) % this.slides.length;
        }, 5000); // 5 seconds
      }
    };
  }











    function openEventModal(image, title, date, description) {
    document.getElementById("eventModalImage").src = image;
    document.getElementById("eventModalTitle").textContent = title;
    document.getElementById("eventModalDate").textContent = date;
    document.getElementById("eventModalDesc").textContent = description;
    document.getElementById("eventModal").classList.remove("hidden");
    document.getElementById("eventModal").classList.add("flex");
    document.body.style.overflow = "hidden"; // prevent background scroll
  }

  function closeEventModal() {
    document.getElementById("eventModal").classList.add("hidden");
    document.getElementById("eventModal").classList.remove("flex");
    document.body.style.overflow = ""; // restore scroll
  }



var swiper = new Swiper('.productSwiper', {
  slidesPerView: 1,
  spaceBetween: 24,
  loop: true,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  breakpoints: {
    640: { slidesPerView: 1 },
    768: { slidesPerView: 2 },
    1024: { slidesPerView: 3 },
  },
  on: {
    init: function () {
      createCustomPagination(this);
    },
    slideChange: function () {
      updateCustomPagination(this);
    }
  }
});

// Functions
function createCustomPagination(swiper) {
  const container = document.querySelector('.custom-pagination');
  container.innerHTML = '';
  for (let i = 0; i < swiper.slides.length - swiper.loopedSlides * 2; i++) {
    const bullet = document.createElement('button');
    bullet.className = 'w-4 h-4 rounded-full bg-white opacity-50 hover:opacity-80 transition';
    bullet.addEventListener('click', () => swiper.slideToLoop(i));
    container.appendChild(bullet);
  }
  updateCustomPagination(swiper);
}

function updateCustomPagination(swiper) {
  const bullets = document.querySelectorAll('.custom-pagination button');
  bullets.forEach((b, i) => b.classList.remove('bg-yellow-400', 'opacity-100'));
  const activeIndex = swiper.realIndex;
  if (bullets[activeIndex]) {
    bullets[activeIndex].classList.add('bg-yellow-400', 'opacity-100');
  }
}












