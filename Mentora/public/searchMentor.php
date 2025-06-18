<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rechercher un Mentor - Mentora</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&family=Poppins:wght@400;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="../assets/css/searchMentor.css">
    <link rel="icon" href="../assets/images/White_Tower_Symbol.webp" type="image/x-icon">
</head>

<body>
    <!-- Header -->
    <header>
        <div class="container nav-container">
            <a href="index.html" class="logo">
                <img src="./images/White_Tower_Symbol.webp" alt="Mentora Logo">
                <span class="logo-text">Mentora</span>
            </a>
            <nav>
                <ul class="nav-links">
                    <!-- Note: The 'active' class has been moved -->
                    <li><a href="index.html"><i class="fas fa-home"></i> Accueil</a></li>
                    <li><a href="index.html#features"><i class="fas fa-star"></i> Fonctionnalités</a></li>
                    <li><a href="search.html" class="active"><i class="fas fa-users"></i> Mentors</a></li>
                    <li><a href="index.html#missions"><i class="fas fa-tasks"></i> Sessions</a></li>
                </ul>
            </nav>
            <div class="nav-right">
                <a href="#" class="login-btn">Login</a>
                <a href="#" class="register-btn">Register</a>
            </div>
            <button class="mobile-menu-toggle"><i class="fas fa-bars"></i></button>
        </div>
    </header>

    <main>
        <!-- Search Page Section -->
        <section class="search-page-section">
            <div class="container">
                <h2 class="section-title" data-aos="fade-up">Trouvez votre mentor idéal</h2>
                <p class="section-subtitle" data-aos="fade-up">Utilisez les filtres pour affiner votre recherche et trouver l'expert qui correspond parfaitement à vos besoins.</p>
                
                <!-- Filters Bar -->
                <div class="filters-bar" data-aos="fade-up" data-aos-delay="100">
                    <button class="filter-btn"><i class="fas fa-book-open"></i> Matière <i class="fas fa-chevron-down"></i></button>
                    <button class="filter-btn"><i class="fas fa-dollar-sign"></i> Tarif <i class="fas fa-chevron-down"></i></button>
                    <button class="filter-btn"><i class="fas fa-calendar-check"></i> Disponibilité <i class="fas fa-chevron-down"></i></button>
                    <button class="filter-btn"><i class="fas fa-star"></i> Note <i class="fas fa-chevron-down"></i></button>
                    <button class="filter-btn clear-filters-btn"><i class="fas fa-times"></i> Réinitialiser</button>
                </div>

                <!-- Profile Grid -->
                <div class="profile-grid">
                    <!-- Profile cards will be populated here -->
                    <div class="profile-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="card-image-container">
                             <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=300" alt="Amina Kettani">
                        </div>
                        <div class="card-body">
                            <h3 class="profile-name">Amina Kettani</h3>
                            <p class="profile-specialty">Ingénieure, Spécialiste Mathématiques</p>
                            <div class="profile-rating">
                                <i class="fa-solid fa-star"></i>
                                <strong>4.9</strong>
                                <span>(112 avis)</span>
                            </div>
                        </div>
                        <div class="card-footer">
                            <span><span class="status-dot available"></span> Disponible</span>
                            <a href="#" class="card-action">Voir Profil <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="profile-card" data-aos="fade-up" data-aos-delay="250">
                        <div class="card-image-container">
                            <img src="https://images.unsplash.com/photo-1557862921-37829c790f19?auto=format&fit=crop&w=300" alt="Mohammed Benali">
                            <span class="card-badge">Top Mentor</span>
                        </div>
                        <div class="card-body">
                            <h3 class="profile-name">Mohammed Benali</h3>
                            <p class="profile-specialty">Conseiller d'orientation, Coach</p>
                            <div class="profile-rating">
                                <i class="fa-solid fa-star"></i>
                                <strong>5.0</strong>
                                <span>(88 avis)</span>
                            </div>
                        </div>
                        <div class="card-footer">
                            <span><span class="status-dot available"></span> Disponible</span>
                            <a href="#" class="card-action">Voir Profil <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="profile-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="card-image-container">
                            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=300" alt="Sara Idrissi">
                        </div>
                        <div class="card-body">
                            <h3 class="profile-name">Sara Idrissi</h3>
                            <p class="profile-specialty">Traductrice, Experte en Langues</p>
                            <div class="profile-rating">
                                <i class="fa-solid fa-star"></i>
                                <strong>4.8</strong>
                                <span>(95 avis)</span>
                            </div>
                        </div>
                        <div class="card-footer">
                            <span><span class="status-dot busy"></span> Occupée</span>
                            <a href="#" class="card-action">Voir Profil <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="profile-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="card-image-container">
                             <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=300" alt="Youssef Alami">
                        </div>
                        <div class="card-body">
                            <h3 class="profile-name">Youssef Alami</h3>
                            <p class="profile-specialty">Physicien, Préparation aux concours</p>
                            <div class="profile-rating">
                                <i class="fa-solid fa-star"></i>
                                <strong>4.9</strong>
                                <span>(76 avis)</span>
                            </div>
                        </div>
                        <div class="card-footer">
                            <span><span class="status-dot available"></span> Disponible</span>
                            <a href="#" class="card-action">Voir Profil <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                     <div class="profile-card" data-aos="fade-up" data-aos-delay="250">
                        <div class="card-image-container">
                             <img src="https://images.unsplash.com/photo-1544725176-7c40e5a71c5e?auto=format&fit=crop&w=300" alt="Leila Fassi">
                        </div>
                        <div class="card-body">
                            <h3 class="profile-name">Leila Fassi</h3>
                            <p class="profile-specialty">Chimie & Biologie (Lycée)</p>
                            <div class="profile-rating">
                                <i class="fa-solid fa-star"></i>
                                <strong>4.7</strong>
                                <span>(61 avis)</span>
                            </div>
                        </div>
                        <div class="card-footer">
                            <span><span class="status-dot busy"></span> Occupée</span>
                            <a href="#" class="card-action">Voir Profil <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                     <div class="profile-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="card-image-container">
                             <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=300" alt="Karim Tazi">
                        </div>
                        <div class="card-body">
                            <h3 class="profile-name">Karim Tazi</h3>
                            <p class="profile-specialty">Développeur, Mentor en programmation</p>
                            <div class="profile-rating">
                                <i class="fa-solid fa-star"></i>
                                <strong>5.0</strong>
                                <span>(102 avis)</span>
                            </div>
                        </div>
                        <div class="card-footer">
                            <span><span class="status-dot available"></span> Disponible</span>
                            <a href="#" class="card-action">Voir Profil <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <nav class="pagination" aria-label="Page navigation" data-aos="fade-up">
                    <a href="#" class="pagination-link prev" aria-label="Previous">
                        <i class="fas fa-chevron-left"></i> Précédent
                    </a>
                    <a href="#" class="pagination-link">1</a>
                    <a href="#" class="pagination-link active" aria-current="page">2</a>
                    <a href="#" class="pagination-link">3</a>
                    <span class="pagination-ellipsis">...</span>
                    <a href="#" class="pagination-link">8</a>
                    <a href="#" class="pagination-link next" aria-label="Next">
                        Suivant <i class="fas fa-chevron-right"></i>
                    </a>
                </nav>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-grid">
                <div>
                    <div class="footer-logo">
                        <img src="./images/White_Tower_Symbol.webp" alt="Mentora Logo">
                        <span class="footerlogo-text">Mentora</span>
                    </div>
                    <p class="footer-about">Mentora est la plateforme de mise en relation entre étudiants et mentors
                        pour un apprentissage personnalisé et efficace.</p>
                    <div class="footer-social">
                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div>
                    <h3 class="footer-heading">Navigation</h3>
                    <ul class="footer-links">
                        <li><a href="index.html">Accueil</a></li>
                        <li><a href="index.html#features">Fonctionnalités</a></li>
                        <li><a href="search.html">Mentors</a></li>
                        <li><a href="index.html#missions">Sessions</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="footer-heading">Support</h3>
                    <ul class="footer-links">
                        <li><a href="#">Centre d'aide</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Nous contacter</a></li>
                        <li><a href="#">Signaler un problème</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="footer-heading">Légal</h3>
                    <ul class="footer-links">
                        <li><a href="#">Conditions d'utilisation</a></li>
                        <li><a href="#">Politique de confidentialité</a></li>
                        <li><a href="#">Mentions légales</a></li>
                        <li><a href="#">RGPD</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            © 2025 Mentora. Tous droits réservés.
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="home.js"></script>
    <script>
        AOS.init({ duration: 800, once: true, offset: 50 });
    </script>
    <script>
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
    </script>
</body>

</html>