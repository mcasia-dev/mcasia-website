// Import GSAP and ScrollTrigger (if using npm modules)
import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

//=========================
// Section Fade-in / Slide Animations
//=========================
gsap.utils.toArray('.animate-fade-in').forEach(el => {
  gsap.from(el, {
    opacity: 0,
    y: 50,
    duration: 1,
    ease: "power2.out",
    scrollTrigger: {
      trigger: el,
      start: "top 80%"
    }
  });
});

gsap.utils.toArray('.animate-slide-up').forEach(el => {
  gsap.from(el, {
    opacity: 0,
    y: 100,
    duration: 1,
    ease: "power2.out",
    scrollTrigger: {
      trigger: el,
      start: "top 90%"
    }
  });
});

gsap.utils.toArray('.animate-slide-left').forEach(el => {
  gsap.from(el, {
    opacity: 0,
    x: -100,
    duration: 1,
    ease: "power2.out",
    scrollTrigger: {
      trigger: el,
      start: "top 90%"
    }
  });
});

gsap.utils.toArray('.animate-slide-right').forEach(el => {
  gsap.from(el, {
    opacity: 0,
    x: 100,
    duration: 1,
    ease: "power2.out",
    scrollTrigger: {
      trigger: el,
      start: "top 90%"
    }
  });
});

//=========================
// Hero Parallax
//=========================
gsap.to('.hero-parallax', {
  yPercent: 20,
  ease: "none",
  scrollTrigger: {
    trigger: '.hero-parallax',
    start: "top bottom",
    end: "bottom top",
    scrub: true
  }
});

//=========================
// Horizontal Timeline Animation (Optional)
//=========================
const timelineContainer = document.querySelector('.timeline-container');
if (timelineContainer) {
  gsap.to(timelineContainer, {
    x: () => -(timelineContainer.scrollWidth - window.innerWidth),
    ease: "none",
    scrollTrigger: {
      trigger: timelineContainer,
      start: "top center",
      end: () => "+=" + timelineContainer.scrollWidth,
      scrub: true,
      pin: true
    }
  });
}

//=========================
// Flip Card Interaction (Optional if you want JS-driven)
//=========================
// If using hover in CSS, this is not required.
// But you can trigger flip on click for mobile:
document.querySelectorAll('.team-card-front').forEach(front => {
  front.addEventListener('click', () => {
    front.parentElement.classList.toggle('rotate-y-180');
  });
});
