<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentora - Plateforme de Tutorat Intergénérationnel</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&family=Poppins:wght@400;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="icon" href="../assets/images/White_Tower_Symbol.webp" type="image/x-icon">
</head>

<body>
    <!-- Header -->
    <header>
        <div class="container nav-container">
            <a href="#" class="logo">
                <img src="../assets/images/White_Tower_Symbol.webp" alt="Mentora Logo">
                <span class="logo-text">Mentora</span>
            </a>
            <nav>
                <ul class="nav-links">
                    <li><a href="#home" class="active"><i class="fas fa-home"></i> Accueil</a></li>
                    <li><a href="#features"><i class="fas fa-star"></i> Fonctionnalités</a></li>
                    <li><a href="#profiles"><i class="fas fa-users"></i> Mentors</a></li>
                    <li><a href="#missions"><i class="fas fa-tasks"></i> Sessions</a></li>
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
        <!-- Hero Section (New Talib Style) -->
        <section class="hero-section" id="home">
            <div class="container hero-container">
                <div class="hero-text" data-aos="fade-right">
                    <div class="decorative-circle"></div>
                    <h1>Le mentorat nouvelle génération vous attend</h1>
                    <p>Trouvez le mentor parfait pour débloquer votre plein potentiel académique et professionnel.</p>
                    <div class="hero-search-container">
                        <div class="hero-search-bar">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <input type="text" placeholder="Rechercher une matière, une compétence...">
                            <button class="btn btn-primary"><i class="fa-solid fa-magnifying-glass" style="color: white;"></i></button>
                        </div>
                        <div class="hero-popular-searches">
                            <span>Populaire:</span>
                            <a href="#">Mathématiques</a>
                            <a href="#">Physique</a>
                            <a href="#">Orientation</a>
                        </div>
                    </div>
                </div>
                <div class="hero-image-container" data-aos="fade-left">
                    <img src="https://images.unsplash.com/photo-1543269865-cbf427effbad?auto=format&fit=crop&w=1770&q=80"
                        alt="Students studying together">
                    <div class="stats-overlay">
                        <div class="stat-item">
                            <span>1K+</span>
                            <p>Mentors</p>
                        </div>
                        <div class="stat-item">
                            <span>5K+</span>
                            <p>Étudiants</p>
                        </div>
                        <div class="stat-item">
                            <span>150+</span>
                            <p>Compétences</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="features-section" id="features">
            <div class="container" data-aos="fade-up">
                <h2>Un écosystème d'apprentissage complet</h2>
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="icon-background" style="--bg-color: #E6F4EA; --icon-color: #5DC689;">
                            <i class="fa-solid fa-lightbulb"></i>
                        </div>
                        <h3>Matching Intelligent</h3>
                        <p>Notre algorithme vous connecte au mentor idéal selon vos objectifs et disponibilités.</p>
                        <ul>
                            <li style="--bullet-color: #5DC689;">Objectifs académiques</li>
                            <li style="--bullet-color: #5DC689;">Compétences ciblées</li>
                            <li style="--bullet-color: #5DC689;">Affinités personnelles</li>
                        </ul>
                    </div>
                    <div class="feature-card">
                        <div class="icon-background" style="--bg-color: #FEEEEE; --icon-color: #F47174;">
                            <i class="fa-solid fa-shield-halved"></i>
                        </div>
                        <h3>Espace Sécurisé</h3>
                        <p>Échangez en toute confiance grâce à notre messagerie et nos profils vérifiés.</p>
                        <ul>
                            <li style="--bullet-color: #F47174;">Messagerie intégrée</li>
                            <li style="--bullet-color: #F47174;">Partage de fichiers</li>
                            <li style="--bullet-color: #F47174;">Profils 100% vérifiés</li>
                        </ul>
                    </div>
                    <div class="feature-card">
                        <div class="icon-background" style="--bg-color: #FFF9E6; --icon-color: #F8B400;">
                            <i class="fa-solid fa-chart-line"></i>
                        </div>
                        <h3>Suivi de Progrès</h3>
                        <p>Visualisez votre évolution avec des tableaux de bord et des objectifs clairs.</p>
                        <ul>
                            <li style="--bullet-color: #F8B400;">Statistiques détaillées</li>
                            <li style="--bullet-color: #F8B400;">Badges et récompenses</li>
                            <li style="--bullet-color: #F8B400;">Historique des sessions</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- How It Works Section -->
        <section class="how-it-works">
            <div class="container">
                <h2 class="section-title">Comment ça marche ?</h2>
                <p class="section-subtitle">En quelques étapes simples, rejoignez une communauté d'apprentissage
                    dynamique.</p>
                <div class="steps">
                    <div class="step" data-aos="fade-up" data-aos-delay="100">
                        <div class="step-number">1</div>
                        <h3 class="step-title">Créez votre profil</h3>
                        <p class="step-description">Indiquez vos objectifs, matières et disponibilités pour un matching
                            optimal.</p>
                    </div>
                    <div class="step" data-aos="fade-up" data-aos-delay="200">
                        <div class="step-number">2</div>
                        <h3 class="step-title">Trouvez votre mentor</h3>
                        <p class="step-description">Explorez les profils et choisissez le mentor qui vous correspond.
                        </p>
                    </div>
                    <div class="step" data-aos="fade-up" data-aos-delay="300">
                        <div class="step-number">3</div>
                        <h3 class="step-title">Planifiez vos sessions</h3>
                        <p class="step-description">Réservez des créneaux pour des sessions personnalisées.</p>
                    </div>
                    <div class="step" data-aos="fade-up" data-aos-delay="400">
                        <div class="step-number">4</div>
                        <h3 class="step-title">Progressez ensemble</h3>
                        <p class="step-description">Participez à des sessions enrichissantes et suivez vos progrès.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Mentors Section (UPDATED) -->
        <section class="section" id="profiles">
            <div class="container">
                <h2 class="section-title" data-aos="fade-up">Trouvez votre expert</h2>
                <p class="section-subtitle" data-aos="fade-up">Filtrez parmi nos meilleurs talents et choisissez le
                    mentor qui vous inspire.</p>
                <div class="profile-grid">
                    <!-- Profile cards remain the same -->
                    <div class="profile-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="card-image-container">
                            <img src="assets/images/mentor1.jpg" alt="Amina Kettani">
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
                    <div class="profile-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="card-image-container">
                            <img src="assets/images/mentor2.jpg" alt="Mohammed Benali">
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
                    <div class="profile-card" data-aos="fade-up" data-aos-delay="400">
                        <div class="card-image-container">
                            <img src="assets/images/mentor3.jpg" alt="Sara Idrissi">
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
                </div>

                <!-- ADDED "VIEW MORE" BUTTON FOR MENTORS -->
                <div class="section-view-more" data-aos="fade-up">
                    <a href="#" class="btn btn-outline">
                        Voir tous les mentors <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

            </div>
        </section>

        <!-- Missions Section -->
        <section class="missions-section" id="missions">
            <div class="container">
                <h2 class="section-title">Sessions Disponibles</h2>
                <p class="section-subtitle">Réservez une session de tutorat ou de mentorat selon vos besoins et
                    disponibilités.</p>
                <div class="missions-list">
                    <div class="mission-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="mission-header">
                            <h3 class="mission-title">Session de Mathématiques - Terminale</h3>
                            <span class="mission-price">Gratuit</span>
                        </div>
                        <div class="mission-body">
                            <div class="mission-client">
                                <div class="client-avatar"
                                    style="background: url('assets/images/student1.jpg') center/cover;"></div>
                                <div class="client-info">
                                    <h4>Yassine El Amrani</h4>
                                    <p>Casablanca, Maroc</p>
                                </div>
                            </div>
                            <div class="mission-details">
                                <div class="mission-detail">
                                    <span class="detail-icon"><i class="far fa-calendar-alt"></i></span>
                                    <span>Durée: 1h</span>
                                </div>
                                <div class="mission-detail">
                                    <span class="detail-icon"><i class="fas fa-video"></i></span>
                                    <span>En ligne</span>
                                </div>
                                <div class="mission-detail">
                                    <span class="detail-icon"><i class="fas fa-user-graduate"></i></span>
                                    <span>Niveau: Terminale</span>
                                </div>
                            </div>
                            <div class="mission-actions">
                                <a href="#" class="btn btn-primary">Réserver</a>
                                <a href="#" class="btn btn-outline">Détails</a>
                            </div>
                        </div>
                    </div>
                    <div class="mission-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="mission-header">
                            <h3 class="mission-title">Session d'Orientation - Parcoursup</h3>
                            <span class="mission-price">Gratuit</span>
                        </div>
                        <div class="mission-body">
                            <div class="mission-client">
                                <div class="client-avatar"
                                    style="background: url('assets/images/student2.jpg') center/cover;"></div>
                                <div class="client-info">
                                    <h4>Fatima Zahra</h4>
                                    <p>Rabat, Maroc</p>
                                </div>
                            </div>
                            <div class="mission-details">
                                <div class="mission-detail">
                                    <span class="detail-icon"><i class="far fa-calendar-alt"></i></span>
                                    <span>Durée: 45min</span>
                                </div>
                                <div class="mission-detail">
                                    <span class="detail-icon"><i class="fas fa-video"></i></span>
                                    <span>En ligne</span>
                                </div>
                                <div class="mission-detail">
                                    <span class="detail-icon"><i class="fas fa-user-tie"></i></span>
                                    <span>Orientation</span>
                                </div>
                            </div>
                            <div class="mission-actions">
                                <a href="#" class="btn btn-primary">Réserver</a>
                                <a href="#" class="btn btn-outline">Détails</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ADDED "VIEW MORE" BUTTON FOR MENTORS -->
                <div class="section-view-more" data-aos="fade-up">
                    <a href="#" class="btn btn-outline">
                        Voir tous les mentors <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta-section">
            <div class="container">
                <h2 class="cta-title">Prêt à transformer votre apprentissage ?</h2>
                <p class="cta-text">Rejoignez des milliers d'étudiants et mentors qui révolutionnent déjà leur façon
                    d'apprendre.</p>
                <div class="cta-buttons">
                    <a href="#" class="btn btn-primary">Inscription étudiant</a>
                    <a href="#" class="btn btn-outline">Devenir mentor</a>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-grid">
                <div>
                    <div class="footer-logo">
                        <img src="../assets/images/White_Tower_Symbol.webp" alt="Mentora Logo">
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
                        <li><a href="#home">Accueil</a></li>
                        <li><a href="#features">Fonctionnalités</a></li>
                        <li><a href="#profiles">Mentors</a></li>
                        <li><a href="#missions">Sessions</a></li>
                        <li><a href="#resources">Ressources</a></li>
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
            &copy; 2025 Mentora. Tous droits réservés.
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        // ADD THIS SCRIPT SNIPPET FOR THE SCROLLED HEADER EFFECT
        const header = document.querySelector('header');
        window.addEventListener('scroll', () => {
            header.classList.toggle('scrolled', window.scrollY > 10);
        });

        AOS.init({ duration: 800, once: true, offset: 50 });
        const menuToggle = document.querySelector('.mobile-menu-toggle');
        const nav = document.querySelector('nav');
        menuToggle.addEventListener('click', () => {
            nav.classList.toggle('nav-active');
        });
    </script>
</body>

</html>