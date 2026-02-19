document.addEventListener('DOMContentLoaded', () => {
    const elements = document.querySelectorAll('[data-animate]');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if(entry.isIntersecting){
                entry.target.classList.add('animate-in');
            }
        });
    }, { threshold: 0.5 }); // trigger when 50% visible

    elements.forEach(el => observer.observe(el));
});
