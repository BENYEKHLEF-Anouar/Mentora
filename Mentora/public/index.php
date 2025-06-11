<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentora - Plateforme de Tutorat Intergénérationnel</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700&family=Poppins:wght@400;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="../assets/css/index.css" />
    <link rel="icon" href="../assets/images/White_Tower_Symbol.webp" type="image/x-icon">
</head>

<body>
    <!-- Header -->
    <header>
        <div class="header-container">
            <div class="logo">
                <img src="../assets/images/White_Tower_Symbol.webp" alt="Mentora Logo">
                <div class="logo-text">
                    <span class="name">Mentora</span>
                </div>
            </div>
            <nav>
                <ul>
                    <li><a href="#home">Accueil</a></li>
                    <li><a href="#features">Fonctionnalités</a></li>
                    <li><a href="#profiles">Mentors</a></li>
                    <li><a href="#missions">Sessions</a></li>
                    <li><a href="#resources">Ressources</a></li>
                </ul>
            </nav>
            <div class="auth-buttons">
                <a href="#" class="btn btn-outline">Connexion</a>
                <a href="#" class="btn btn-primary">S'inscrire</a>
            </div>
            <div class="mobile-menu-toggle">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container">
            <div class="hero-content" data-aos="fade-up">
                <h1>Connectez-vous avec des mentors d'exception</h1>
                <p>Mentora révolutionne l'apprentissage en créant des liens intergénérationnels authentiques. Trouvez
                    votre mentor idéal ou partagez vos connaissances dans un environnement stimulant et sécurisé.</p>
                <div class="cta-buttons">
                    <a href="#" class="btn btn-primary">Commencer maintenant</a>
                    <a href="#" class="btn btn-outline">Devenir mentor</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Features Section -->
    <section class="section" id="features">
        <div class="container">
            <h2 class="section-title">Pourquoi choisir Mentora ?</h2>
            <p class="section-subtitle">Une plateforme complète qui transforme l'expérience d'apprentissage grâce à des outils innovants et une communauté bienveillante.</p>
            <div class="features-grid">
                <div class="feature-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-icon">
                        <!-- Heroicons: Academic Cap -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:2rem;height:2rem;color:var(--primary-blue)">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14.25v6.375m0 0c-4.28 0-7.5-2.25-7.5-5.25m7.5 5.25c4.28 0 7.5-2.25 7.5-5.25m-15 0V9.75m15 5.625V9.75m-15 0L12 4.5l7.5 5.25m-15 0l7.5 5.25 7.5-5.25" />
                        </svg>
                    </div>
                    <h3 class="feature-title">Matching intelligent</h3>
                    <p class="feature-description">Un algorithme avancé connecte étudiants et mentors selon matières, objectifs et disponibilités.</p>
                </div>
                <div class="feature-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-icon">
                        <!-- Heroicons: Chat Bubble Left Right -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:2rem;height:2rem;color:var(--primary-blue)">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 10.5h9m-9 3h6m-6-6h9m-9 9h6m-6 3h9" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12c0 4.418-4.03 8-9 8a9.77 9.77 0 01-4.5-1.07L3 21l1.07-4.5A8.96 8.96 0 013 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                    </div>
                    <h3 class="feature-title">Messagerie sécurisée</h3>
                    <p class="feature-description">Échangez en toute sécurité via chat intégré, partage de fichiers et notifications en temps réel.</p>
                </div>
                <div class="feature-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-icon">
                        <!-- Heroicons: Chart Bar -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:2rem;height:2rem;color:var(--primary-blue)">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 17.25v-6.75A2.25 2.25 0 015.25 8.25h1.5A2.25 2.25 0 019 10.5v6.75m0 0V10.5A2.25 2.25 0 0111.25 8.25h1.5A2.25 2.25 0 0115 10.5v6.75m0 0V10.5A2.25 2.25 0 0117.25 8.25h1.5A2.25 2.25 0 0121 10.5v6.75" />
                        </svg>
                    </div>
                    <h3 class="feature-title">Suivi de progrès</h3>
                    <p class="feature-description">Tableaux de bord, badges et statistiques pour visualiser l'évolution et l'engagement.</p>
                </div>
                <div class="feature-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="feature-icon">
                        <!-- Heroicons: Shield Check -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:2rem;height:2rem;color:var(--primary-blue)">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3.75l7.5 3.75v5.25c0 5.25-7.5 9-7.5 9s-7.5-3.75-7.5-9V7.5l7.5-3.75z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 12.75l1.5 1.5 3-3" />
                        </svg>
                    </div>
                    <h3 class="feature-title">Sécurité & confidentialité</h3>
                    <p class="feature-description">Authentification forte, modération et outils de signalement pour un environnement sain.</p>
                </div>
                <div class="feature-card" data-aos="fade-up" data-aos-delay="500">
                    <div class="feature-icon">
                        <!-- Heroicons: Sparkles -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:2rem;height:2rem;color:var(--primary-blue)">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m0 13.5V21m8.25-9H21m-13.5 0H3m15.364-6.364l-1.591 1.591m-9.192 9.192l-1.591 1.591m12.728 0l-1.591-1.591m-9.192-9.192l-1.591-1.591" />
                        </svg>
                    </div>
                    <h3 class="feature-title">Gamification</h3>
                    <p class="feature-description">Badges, classements et défis pour motiver et valoriser l'engagement.</p>
                </div>
                <div class="feature-card" data-aos="fade-up" data-aos-delay="600">
                    <div class="feature-icon">
                        <!-- Heroicons: Book Open -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:2rem;height:2rem;color:var(--primary-blue)">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75V17.25M21 6.75v10.5a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 17.25V6.75" />
                        </svg>
                    </div>
                    <h3 class="feature-title">Ressources partagées</h3>
                    <p class="feature-description">Bibliothèque collaborative de documents, exercices et supports pédagogiques.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="how-it-works">
        <div class="container">
            <h2 class="section-title">Comment ça marche ?</h2>
            <p class="section-subtitle">En quelques étapes simples, rejoignez une communauté d'apprentissage dynamique et commencez votre parcours vers le succès.</p>
            <div class="steps">
                <div class="step" data-aos="fade-up" data-aos-delay="100">
                    <div class="step-number">1</div>
                    <h3 class="step-title">Créez votre profil</h3>
                    <p class="step-description">Indiquez vos objectifs, matières et disponibilités pour un matching optimal.</p>
                </div>
                <div class="step" data-aos="fade-up" data-aos-delay="200">
                    <div class="step-number">2</div>
                    <h3 class="step-title">Trouvez votre mentor</h3>
                    <p class="step-description">Explorez les profils et choisissez le mentor qui vous correspond.</p>
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

    <!-- Testimonials Carousel Section -->
    <section class="testimonials-section" id="testimonials">
        <div class="container">
            <h2 class="section-title">Témoignages</h2>
            <p class="section-subtitle">Ils ont transformé leur apprentissage avec Mentora</p>
            <div class="testimonials-carousel">
                <button class="carousel-btn prev" aria-label="Précédent">
                    <!-- Heroicons: Chevron Left -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:2rem;height:2rem;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                </button>
                <div class="carousel-track">
                    <!-- Testimonial 1 -->
                    <div class="testimonial-card active">
                        <div class="testimonial-avatar"><img src="assets/images/4454-removebg-preview.png" alt="Amina Kettani"></div>
                        <div class="testimonial-content">
                            <p>"Grâce à Mentora, j'ai trouvé un mentor qui m'a vraiment aidée à progresser en mathématiques. La plateforme est intuitive et la communauté très bienveillante."</p>
                        </div>
                        <div class="testimonial-author">
                            <span class="testimonial-name">Amina Kettani</span>
                            <span class="testimonial-role">Étudiante, Terminale S</span>
                        </div>
                        <div class="testimonial-rating">
                            <!-- Heroicons: Star -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#FFD700" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFD700" style="width:1.2rem;height:1.2rem;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 17.25l-6.16 3.24 1.18-6.88L2 9.27l6.91-1.01L12 2l3.09 6.26 6.91 1.01-5 4.87 1.18 6.88z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#FFD700" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFD700" style="width:1.2rem;height:1.2rem;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 17.25l-6.16 3.24 1.18-6.88L2 9.27l6.91-1.01L12 2l3.09 6.26 6.91 1.01-5 4.87 1.18 6.88z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#FFD700" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFD700" style="width:1.2rem;height:1.2rem;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 17.25l-6.16 3.24 1.18-6.88L2 9.27l6.91-1.01L12 2l3.09 6.26 6.91 1.01-5 4.87 1.18 6.88z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#FFD700" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFD700" style="width:1.2rem;height:1.2rem;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 17.25l-6.16 3.24 1.18-6.88L2 9.27l6.91-1.01L12 2l3.09 6.26 6.91 1.01-5 4.87 1.18 6.88z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#FFD700" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFD700" style="width:1.2rem;height:1.2rem;opacity:0.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 17.25l-6.16 3.24 1.18-6.88L2 9.27l6.91-1.01L12 2l3.09 6.26 6.91 1.01-5 4.87 1.18 6.88z" />
                            </svg>
                        </div>
                    </div>
                    <!-- Testimonial 2 -->
                    <div class="testimonial-card">
                        <div class="testimonial-avatar"><img src="assets/images/4101-removebg-preview.png" alt="Mohammed Benali"></div>
                        <div class="testimonial-content">
                            <p>"La diversité des mentors et la qualité des ressources m'ont permis de réussir mon orientation. Je recommande Mentora à tous mes amis !"</p>
                        </div>
                        <div class="testimonial-author">
                            <span class="testimonial-name">Mohammed Benali</span>
                            <span class="testimonial-role">Étudiant, Licence Sciences</span>
                        </div>
                        <div class="testimonial-rating">
                            <div class="rating-stars">
                                <i class="fas fa-star" style="color: #FFD700;"></i>
                                <i class="fas fa-star" style="color: #FFD700;"></i>
                                <i class="fas fa-star" style="color: #FFD700;"></i>
                                <i class="fas fa-star" style="color: #FFD700;"></i>
                                <i class="fas fa-star" style="color: #FFD700;"></i>
                            </div>
                            <span>5/5</span>
                        </div>
                    </div>
                    <!-- Testimonial 3 -->
                    <div class="testimonial-card">
                        <div class="testimonial-avatar"><img src="assets/images/2259.jpg" alt="Sara Idrissi"></div>
                        <div class="testimonial-content">
                            <p>"Mentora m'a permis de partager mes connaissances et d'aider d'autres étudiants. L'expérience est enrichissante et valorisante !"</p>
                        </div>
                        <div class="testimonial-author">
                            <span class="testimonial-name">Sara Idrissi</span>
                            <span class="testimonial-role">Mentor, Langues</span>
                        </div>
                        <div class="testimonial-rating">
                            <div class="rating-stars">
                                <i class="fas fa-star" style="color: #FFD700;"></i>
                                <i class="fas fa-star" style="color: #FFD700;"></i>
                                <i class="fas fa-star" style="color: #FFD700;"></i>
                                <i class="fas fa-star" style="color: #FFD700;"></i>
                                <i class="far fa-star" style="color: #FFD700;"></i>
                            </div>
                            <span>4/5</span>
                        </div>
                    </div>
                </div>
                <button class="carousel-btn next" aria-label="Suivant">
                    <!-- Heroicons: Chevron Right -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:2rem;height:2rem;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </button>
            </div>
            <div class="carousel-indicators">
                <span class="carousel-dot active"></span>
                <span class="carousel-dot"></span>
                <span class="carousel-dot"></span>
            </div>
        </div>
    </section>

    <!-- Profiles Section -->
    <section class="profiles-section" id="profiles">
        <div class="container">
            <h2 class="section-title">Nos Mentors</h2>
            <p class="section-subtitle">Découvrez des mentors passionnés et expérimentés prêts à vous accompagner dans votre parcours.</p>
            <div class="profiles-tabs">
                <div class="profile-tab active">Tous</div>
                <div class="profile-tab">Mathématiques</div>
                <div class="profile-tab">Sciences</div>
                <div class="profile-tab">Langues</div>
                <div class="profile-tab">Orientation</div>
            </div>
            <div class="profile-cards">
                <div class="profile-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="profile-image" style="background: url('assets/images/mentor1.jpg') center/cover;"></div>
                    <div class="profile-info">
                        <h3 class="profile-name">Amina Kettani</h3>
                        <p class="profile-type">Mathématiques & Physique</p>
                        <div class="profile-skills">
                            <span class="skill-tag">Maths</span>
                            <span class="skill-tag">Physique</span>
                            <span class="skill-tag">Pédagogie</span>
                        </div>
                        <div class="profile-rating">
                            <div class="rating-stars">
                                <i class="fas fa-star" style="color: #FFD700;"></i>
                                <i class="fas fa-star" style="color: #FFD700;"></i>
                                <i class="fas fa-star" style="color: #FFD700;"></i>
                                <i class="fas fa-star" style="color: #FFD700;"></i>
                                <i class="fas fa-star-half-alt" style="color: #FFD700;"></i>
                            </div>
                            <span>4.5/5</span>
                        </div>
                        <p class="profile-missions">12 sessions réalisées</p>
                        <a href="#" class="profile-action">Voir le profil</a>
                    </div>
                </div>
                <div class="profile-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="profile-image" style="background: url('assets/images/mentor2.jpg') center/cover;"></div>
                    <div class="profile-info">
                        <h3 class="profile-name">Mohammed Benali</h3>
                        <p class="profile-type">Sciences & Orientation</p>
                        <div class="profile-skills">
                            <span class="skill-tag">Sciences</span>
                            <span class="skill-tag">Orientation</span>
                            <span class="skill-tag">Expérience</span>
                        </div>
                        <div class="profile-rating">
                            <div class="rating-stars">
                                <i class="fas fa-star" style="color: #FFD700;"></i>
                                <i class="fas fa-star" style="color: #FFD700;"></i>
                                <i class="fas fa-star" style="color: #FFD700;"></i>
                                <i class="fas fa-star" style="color: #FFD700;"></i>
                                <i class="fas fa-star" style="color: #FFD700;"></i>
                            </div>
                            <span>5/5</span>
                        </div>
                        <p class="profile-missions">8 sessions réalisées</p>
                        <a href="#" class="profile-action">Voir le profil</a>
                    </div>
                </div>
                <div class="profile-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="profile-image" style="background: url('assets/images/mentor3.jpg') center/cover;"></div>
                    <div class="profile-info">
                        <h3 class="profile-name">Sara Idrissi</h3>
                        <p class="profile-type">Langues & Communication</p>
                        <div class="profile-skills">
                            <span class="skill-tag">Français</span>
                            <span class="skill-tag">Anglais</span>
                            <span class="skill-tag">Communication</span>
                        </div>
                        <div class="profile-rating">
                            <div class="rating-stars">
                                <i class="fas fa-star" style="color: #FFD700;"></i>
                                <i class="fas fa-star" style="color: #FFD700;"></i>
                                <i class="fas fa-star" style="color: #FFD700;"></i>
                                <i class="fas fa-star" style="color: #FFD700;"></i>
                                <i class="far fa-star" style="color: #FFD700;"></i>
                            </div>
                            <span>4/5</span>
                        </div>
                        <p class="profile-missions">15 sessions réalisées</p>
                        <a href="#" class="profile-action">Voir le profil</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Missions Section -->
    <section class="missions-section" id="missions">
        <div class="container">
            <h2 class="section-title">Sessions Disponibles</h2>
            <p class="section-subtitle">Réservez une session de tutorat ou de mentorat selon vos besoins et disponibilités.</p>
            <div class="mission-filters">
                <button class="filter-btn active">Toutes</button>
                <button class="filter-btn">Mathématiques</button>
                <button class="filter-btn">Sciences</button>
                <button class="filter-btn">Langues</button>
                <button class="filter-btn">Orientation</button>
            </div>
            <div class="missions-list">
                <div class="mission-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="mission-header">
                        <h3 class="mission-title">Session de Mathématiques - Terminale</h3>
                        <span class="mission-price">Gratuit</span>
                    </div>
                    <div class="mission-body">
                        <div class="mission-client">
                            <div class="client-avatar" style="background: url('assets/images/student1.jpg') center/cover;"></div>
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
                        <div class="mission-tags">
                            <span class="mission-tag">Maths</span>
                            <span class="mission-tag">Tutorat</span>
                        </div>
                        <div class="mission-actions">
                            <a href="#" class="mission-action action-primary">Réserver</a>
                            <a href="#" class="mission-action action-secondary">Détails</a>
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
                            <div class="client-avatar" style="background: url('assets/images/student2.jpg') center/cover;"></div>
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
                        <div class="mission-tags">
                            <span class="mission-tag">Orientation</span>
                            <span class="mission-tag">Conseil</span>
                        </div>
                        <div class="mission-actions">
                            <a href="#" class="mission-action action-primary">Réserver</a>
                            <a href="#" class="mission-action action-secondary">Détails</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- E-Learning Section -->
    <section class="elearning-section" id="resources">
        <div class="container">
            <h2 class="section-title">Ressources & Formations</h2>
            <p class="section-subtitle">Accédez à une bibliothèque de ressources pédagogiques et à des micro-formations pour progresser à votre rythme.</p>
            <div class="course-grid">
                <div class="course-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="course-image" style="background: url('assets/images/ressource1.jpg') center/cover;">
                        <span class="course-level">Débutant</span>
                    </div>
                    <div class="course-content">
                        <h3 class="course-title">Fiches de révision - Mathématiques</h3>
                        <div class="course-details">
                            <span class="course-detail">
                                <i class="far fa-clock"></i> 2h
                            </span>
                            <span class="course-detail">
                                <i class="fas fa-users"></i> 1245 téléchargements
                            </span>
                        </div>
                        <div class="course-footer">
                            <span>PDF</span>
                            <a href="#" class="course-action">Télécharger</a>
                        </div>
                    </div>
                </div>
                <div class="course-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="course-image" style="background: url('assets/images/ressource2.jpg') center/cover;">
                        <span class="course-level">Intermédiaire</span>
                    </div>
                    <div class="course-content">
                        <h3 class="course-title">Atelier - Prise de parole en public</h3>
                        <div class="course-details">
                            <span class="course-detail">
                                <i class="far fa-clock"></i> 1h30
                            </span>
                            <span class="course-detail">
                                <i class="fas fa-users"></i> 876 participants
                            </span>
                        </div>
                        <div class="course-footer">
                            <span>Atelier</span>
                            <a href="#" class="course-action">S'inscrire</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trust & Verification Section -->
    <section class="verification-section" id="verification">
        <div class="container">
            <h2 class="section-title">Un environnement de confiance</h2>
            <p class="section-subtitle">Mentora garantit la sécurité et la qualité des échanges grâce à un processus de
                vérification rigoureux.</p>
            <div class="verification-steps">
                <div class="verification-step" data-aos="fade-up" data-aos-delay="100">
                    <div class="verification-icon">
                        <!-- Heroicons: User -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" style="width:2.2rem;height:2.2rem;color:var(--primary-blue)">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4.5 20.25v-1.5A2.25 2.25 0 016.75 16.5h10.5a2.25 2.25 0 012.25 2.25v1.5" />
                        </svg>
                    </div>
                    <h3>Vérification d'identité</h3>
                    <p>Téléchargez vos documents officiels pour confirmer votre identité.</p>
                </div>
                <div class="verification-step" data-aos="fade-up" data-aos-delay="200">
                    <div class="verification-icon">
                        <!-- Heroicons: Shield Check -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" style="width:2rem;height:2rem;color:var(--primary-blue)">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 3.75l7.5 3.75v5.25c0 5.25-7.5 9-7.5 9s-7.5-3.75-7.5-9V7.5l7.5-3.75z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 12.75l1.5 1.5 3-3" />
                        </svg>
                    </div>
                    <h3>Validation du profil</h3>
                    <p>Un badge de confiance est affiché sur les profils vérifiés.</p>
                </div>
                <div class="verification-step" data-aos="fade-up" data-aos-delay="300">
                    <div class="verification-icon">
                        <!-- Heroicons: Star -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" style="width:2.2rem;height:2.2rem;color:var(--primary-blue)">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 4.75l2.47 5.01 5.53.8-4 3.89.94 5.5L12 16.27l-4.94 2.59.94-5.5-4-3.89 5.53-.8L12 4.75z" />
                        </svg>
                    </div>
                    <h3>Badges d'activité</h3>
                    <p>Obtenez des badges selon votre engagement et vos retours positifs.</p>
                </div>
                <div class="verification-step" data-aos="fade-up" data-aos-delay="400">
                    <div class="verification-icon">
                        <!-- Heroicons: Chat Bubble Left Right -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" style="width:2rem;height:2rem;color:var(--primary-blue)">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M7.5 10.5h9m-9 3h6m-6-6h9m-9 9h6m-6 3h9" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 12c0 4.418-4.03 8-9 8a9.77 9.77 0 01-4.5-1.07L3 21l1.07-4.5A8.96 8.96 0 013 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                    </div>
                    <h3>Système d'avis</h3>
                    <p>Recevez des évaluations après chaque session pour bâtir votre réputation.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2 class="cta-title">Prêt à transformer votre apprentissage ?</h2>
            <p class="cta-text">Rejoignez des milliers d'étudiants et mentors qui révolutionnent déjà leur façon
                d'apprendre et d'enseigner avec Mentora.</p>
            <div class="cta-buttons">
                <a href="#" class="btn btn-primary">Inscription étudiant</a>
                <a href="#" class="btn btn-outline">Devenir mentor</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-grid">
                <div>
                    <div class="footer-logo">
                        <img src="../assets/images/White_Tower_Symbol.webp" alt="Mentora Logo">
                        <span>Mentora</span>
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
    </footer>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="script.js"></script>
    <!-- All custom JS moved to public/script.js -->
</body>

</html>