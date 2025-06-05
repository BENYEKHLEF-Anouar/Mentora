// Mentora Home JS
// AOS initialization
AOS.init({
    duration: 800,
    easing: 'ease-in-out',
    once: true
});

// Mobile Menu Toggle
const menuToggle = document.querySelector('.mobile-menu-toggle');
const navUl = document.querySelector('nav ul');
const overlay = document.querySelector('.mobile-menu-overlay');
if (menuToggle && navUl && overlay) {
    menuToggle.addEventListener('click', function() {
        navUl.classList.toggle('nav-active');
        overlay.classList.toggle('active');
    });
    overlay.addEventListener('click', function() {
        navUl.classList.remove('nav-active');
        overlay.classList.remove('active');
    });
}
// Add more interactive effects (tabs, filters, etc.) as needed for Mentora sections 

// Testimonials Carousel Logic
(function() {
    const track = document.querySelector('.carousel-track');
    const cards = Array.from(document.querySelectorAll('.testimonial-card'));
    const prevBtn = document.querySelector('.carousel-btn.prev');
    const nextBtn = document.querySelector('.carousel-btn.next');
    const dots = Array.from(document.querySelectorAll('.carousel-dot'));
    let current = 0;

    function updateCarousel(index) {
        cards.forEach((card, i) => {
            card.classList.toggle('active', i === index);
            card.style.display = i === index ? 'flex' : 'none';
        });
        dots.forEach((dot, i) => {
            dot.classList.toggle('active', i === index);
        });
        current = index;
    }

    prevBtn.addEventListener('click', () => {
        let newIndex = (current - 1 + cards.length) % cards.length;
        updateCarousel(newIndex);
    });
    nextBtn.addEventListener('click', () => {
        let newIndex = (current + 1) % cards.length;
        updateCarousel(newIndex);
    });
    dots.forEach((dot, i) => {
        dot.addEventListener('click', () => updateCarousel(i));
    });
    // Optional: swipe support for mobile
    let startX = null;
    track.addEventListener('touchstart', e => {
        startX = e.touches[0].clientX;
    });
    track.addEventListener('touchend', e => {
        if (startX === null) return;
        let endX = e.changedTouches[0].clientX;
        if (endX - startX > 40) prevBtn.click();
        else if (startX - endX > 40) nextBtn.click();
        startX = null;
    });

    // On load, ensure only the first card is visible
    updateCarousel(0);
})(); 