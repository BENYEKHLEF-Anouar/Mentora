document.addEventListener('DOMContentLoaded', () => {

    // 1. Sticky Header
    const header = document.querySelector('header');
    if (header) {
        window.addEventListener('scroll', () => {
            header.classList.toggle('scrolled', window.scrollY > 10);
        });
    }

    // 2. Mobile Menu Toggle
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const nav = document.querySelector('nav');
    if (mobileMenuToggle && nav) {
        mobileMenuToggle.addEventListener('click', () => {
            nav.classList.toggle('nav-active');
        });
    }

    // 3. AOS (Animate on Scroll) Initialization
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            once: true,
            offset: 50,
        });
    }

    // 4. Testimonial Slider
    const sliderContainer = document.querySelector('.testimonial-slider-container');
    if (sliderContainer) {
        const track = sliderContainer.querySelector('.testimonial-slider-track');
        const slides = Array.from(track.children);
        const nextButton = sliderContainer.querySelector('.next-btn');
        const prevButton = sliderContainer.querySelector('.prev-btn');
        const dotsNav = sliderContainer.querySelector('.slider-dots');

        // Exit if essential elements are missing
        if (!track || !nextButton || !prevButton || !dotsNav || slides.length === 0) {
            return;
        }

        // --- Create Dots ---
        dotsNav.innerHTML = ''; // Clear existing dots
        slides.forEach((_, i) => {
            const dot = document.createElement('button');
            dot.classList.add('slider-dot');
            dot.setAttribute('aria-label', `Go to slide ${i + 1}`);
            dotsNav.appendChild(dot);
        });
        const dots = Array.from(dotsNav.children);

        // --- Core Functions ---
        const updateUI = () => {
            const scrollLeft = track.scrollLeft;
            const scrollWidth = track.scrollWidth;
            const clientWidth = track.clientWidth;

            // Update button states
            prevButton.disabled = scrollLeft < 1;
            nextButton.disabled = scrollLeft >= scrollWidth - clientWidth - 1;

            // Find the slide closest to the left edge to determine the active dot
            let currentSlideIndex = 0;
            let minDistance = Infinity;

            slides.forEach((slide, index) => {
                const slideLeft = slide.offsetLeft;
                const distance = Math.abs(scrollLeft - slideLeft);

                if (distance < minDistance) {
                    minDistance = distance;
                    currentSlideIndex = index;
                }
            });
            
            dots.forEach((dot, index) => {
                dot.classList.toggle('active', index === currentSlideIndex);
            });
        };

        const goToSlide = (index) => {
            if (!slides[index]) return;
            const targetSlide = slides[index];
            track.scrollTo({
                left: targetSlide.offsetLeft,
                behavior: 'smooth'
            });
        };

        // --- Event Listeners ---
        nextButton.addEventListener('click', () => {
            track.scrollBy({ left: track.clientWidth, behavior: 'smooth' });
        });

        prevButton.addEventListener('click', () => {
            track.scrollBy({ left: -track.clientWidth, behavior: 'smooth' });
        });

        dotsNav.addEventListener('click', e => {
            const targetDot = e.target.closest('.slider-dot');
            if (!targetDot) return;
            const targetIndex = dots.findIndex(dot => dot === targetDot);
            goToSlide(targetIndex);
        });

        // Update UI on scroll, using a timeout to avoid excessive calls
        let scrollTimeout;
        track.addEventListener('scroll', () => {
            clearTimeout(scrollTimeout);
            scrollTimeout = setTimeout(updateUI, 50);
        }, { passive: true });

        // Update on window resize for responsiveness
        new ResizeObserver(updateUI).observe(track);
        
        // Initial setup
        updateUI();
    }
});