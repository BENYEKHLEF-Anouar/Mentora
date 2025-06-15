// Testimonial Carousel
const testimonialCards = document.querySelectorAll('.testimonial-card');
const carouselDots = document.querySelectorAll('.carousel-dot');
const prevCarouselBtn = document.querySelector('.carousel-btn.prev');
const nextCarouselBtn = document.querySelector('.carousel-btn.next');
let currentTestimonial = 0;

function showTestimonialCard(index) {
    testimonialCards.forEach(card => card.classList.remove('active'));
    carouselDots.forEach(dot => dot.classList.remove('active'));
    testimonialCards[index].classList.add('active');
    carouselDots[index].classList.add('active');
}

if (prevCarouselBtn && nextCarouselBtn) {
    prevCarouselBtn.addEventListener('click', () => {
        currentTestimonial = (currentTestimonial - 1 + testimonialCards.length) % testimonialCards.length;
        showTestimonialCard(currentTestimonial);
    });

    nextCarouselBtn.addEventListener('click', () => {
        currentTestimonial = (currentTestimonial + 1) % testimonialCards.length;
        showTestimonialCard(currentTestimonial);
    });
}

carouselDots.forEach((dot, i) => {
    dot.addEventListener('click', () => {
        currentTestimonial = i;
        showTestimonialCard(currentTestimonial);
    });
});

// Initialize AOS animations
if (window.AOS) {
    AOS.init({
        duration: 800,
        once: true
    });
} 