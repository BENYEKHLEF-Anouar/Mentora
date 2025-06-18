<?php
require '../config/config.php';




?>

<?php require_once '../includes/header.php'; ?>

    <main>
        <!-- Hero Section -->
        <section class="hero-section" id="home">
            <div class="container hero-container">
                <div class="hero-text" data-aos="fade-right">
                    <div class="decorative-circle"></div>
                    <h1 class="heading-main">Le mentorat nouvelle génération vous attend</h1>
                    <p class="hero-description">Trouvez le mentor parfait pour débloquer votre plein potentiel académique et professionnel.</p>
                    <!-- <div class="hero-search-container">
                        <div class="hero-search-bar">
                        &nbsp;&nbsp;<input type="text" class="hero-search-input" placeholder="Rechercher une matière, une compétence...">
                        <button class="hero-search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                        <div class="hero-popular-searches">
                            <span class="hero-popular-label">Populaire:</span>
                            <a href="#" class="hero-popular-link">Mathématiques</a>
                            <a href="#" class="hero-popular-link">Physique</a>
                            <a href="#" class="hero-popular-link">Orientation</a>
                        </div>
                    </div> -->
                </div>
                <div class="hero-image-container" data-aos="fade-left">
                    <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Students studying together" class="hero-image">
                    <div class="stats-overlay">
                        <div class="stat-item">
                            <span class="stat-value">1K+</span>
                            <p class="stat-label">Mentors</p>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value">5K+</span>
                            <p class="stat-label">Étudiants</p>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value">150+</span>
                            <p class="stat-label">Compétences</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="features-section" id="features">
            <div class="container features-container" data-aos="fade-up">
                <h2 class="section-title heading-features">Un écosystème d'apprentissage complet</h2>
                <p class="section-subtitle features-subtitle">Découvrez les fonctionnalités qui rendent Mentora unique et efficace pour tous les apprenants.</p>
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="icon-background" style="background-color: #E6F4EA; color: #5DC689;">
                            <i class="fa-solid fa-lightbulb"></i>
                        </div>
                        <h3 class="feature-title">Matching Intelligent</h3>
                        <p class="feature-description">Notre algorithme vous connecte au mentor idéal selon vos objectifs et disponibilités.</p>
                        <ul class="feature-list">
                            <li class="feature-list-item">Objectifs académiques</li>
                            <li class="feature-list-item">Compétences ciblées</li>
                            <li class="feature-list-item">Affinités personnelles</li>
                        </ul>
                    </div>
                    <div class="feature-card">
                        <div class="icon-background" style="background-color: #FEEEEE; color: #F47174;">
                            <i class="fa-solid fa-shield-halved"></i>
                        </div>
                        <h3 class="feature-title">Espace Sécurisé</h3>
                        <p class="feature-description">Échangez en toute confiance grâce à notre messagerie et nos profils vérifiés.</p>
                        <ul class="feature-list">
                            <li class="feature-list-item">Messagerie intégrée</li>
                            <li class="feature-list-item">Partage de fichiers</li>
                            <li class="feature-list-item">Profils 100% vérifiés</li>
                        </ul>
                    </div>
                    <div class="feature-card">
                        <div class="icon-background" style="background-color: #FFF9E6; color: #F8B400;">
                            <i class="fa-solid fa-chart-line"></i>
                        </div>
                        <h3 class="feature-title">Suivi de Progrès</h3>
                        <p class="feature-description">Visualisez votre évolution avec des tableaux de bord et des objectifs clairs.</p>
                        <ul class="feature-list">
                            <li class="feature-list-item">Statistiques détaillées</li>
                            <li class="feature-list-item">Badges et récompenses</li>
                            <li class="feature-list-item">Historique des sessions</li>
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
            <div class="container">
        <div class="steps steps--reverse">
            <div class="step" data-aos="fade-up" data-aos-delay="100">
                <div class="step-number">4</div>
                <h3 class="step-title">Définissez votre expertise</h3>
                <p class="step-description">Créez un profil attractif en listant vos compétences, vos disponibilités et votre approche.</p>
            </div>
            <div class="step" data-aos="fade-up" data-aos-delay="200">
                <div class="step-number">3</div>
                <h3 class="step-title">Recevez des demandes</h3>
                <p class="step-description">Les étudiants intéressés par votre profil vous contactent directement via la plateforme.</p>
            </div>
            <div class="step" data-aos="fade-up" data-aos-delay="300">
                <div class="step-number">2</div>
                <h3 class="step-title">Organisez vos sessions</h3>
                <p class="step-description">Acceptez les demandes et planifiez des sessions de mentorat en ligne selon vos créneaux.</p>
            </div>
            <div class="step" data-aos="fade-up" data-aos-delay="400">
                <div class="step-number">1</div>
                <h3 class="step-title">Faites la différence</h3>
                <p class="step-description">Partagez votre expérience, guidez vos étudiants vers la réussite et recevez des avis positifs.</p>
            </div>
        </div>
    </div>
        </section>



        <!-- Mentors Section -->
        <section class="section" id="profiles">
            <div class="container">
                <h2 class="section-title" data-aos="fade-up">Trouvez votre expert</h2>
                <p class="section-subtitle" data-aos="fade-up">Filtrez parmi nos meilleurs talents et choisissez le
                    mentor qui vous inspire.</p>
                <div class="profile-grid">
                    <div class="profile-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="card-image-container">
                            <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=388&q=80" alt="Amina Kettani">
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
                            <img src="https://images.unsplash.com/photo-1556157382-97eda2d62296?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Mohammed Benali">
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
                            <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=461&q=80" alt="Sara Idrissi">
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
                <div class="section-view-more" data-aos="fade-up">
                    <a href="#" class="btn btn-outline">
                        Voir tous les mentors <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </section>

        <!-- Etudiants Section -->
        <!-- <section class="section" id="etudiants"> -->
            <!-- <div class="container">
                <h2 class="section-title" data-aos="fade-up">Nos étudiants talentueux</h2>
                <p class="section-subtitle" data-aos="fade-up">Découvrez les parcours et les réussites de nos étudiants.</p> -->
                <!-- Placeholder for student profiles -->
                <!-- <div class="profiles-grid" data-aos="fade-up" data-aos-delay="200">
                     <p style="text-align:center; font-style:italic; color:var(--slate-500);">La section des étudiants est en cours de construction. Revenez bientôt !</p>
                </div>
            </div>
        </section> -->

                <!-- Missions Section -->
                <section class="missions-section" id="missions">
            <div class="container">
                <h2 class="section-title">Sessions Disponibles</h2>
                <p class="section-subtitle">Réservez une session de tutorat ou de mentorat selon vos besoins et disponibilités.</p>
                <div class="missions-list">
                    <!-- Added mission-card--math class -->
                    <div class="mission-card mission-card--math" data-aos="fade-up" data-aos-delay="100">
                        <div class="mission-header">
                            <h3 class="mission-title">Session de Mathématiques - Terminale</h3>
                        </div>
                        <div class="mission-body">
                            <div class="mission-client">
                                <div class="client-avatar"
                                     style="background: url('https://images.unsplash.com/photo-1610088441520-4352457e7095?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80') center/cover;"></div>
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
                                <div class="mission-detail">
                                    <span class="detail-icon"><i class="fas fa-tag"></i></span>
                                    <span class="mission-price">Gratuit</span>
                                </div>
                            </div>
                        </div>
                        <div class="mission-actions">
                            <div class="mission-action-buttons">
                                <a href="#" class="btn btn-primary"><i class="fa-solid fa-check"></i>&nbsp;&nbsp;Réserver</a>
                                <a href="#" class="mission-details-link">Voir détails <i class="fa-solid fa-arrow-right mission-details-icon"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Added mission-card--orientation class -->
                    <div class="mission-card mission-card--orientation" data-aos="fade-up" data-aos-delay="200">
                        <div class="mission-header">
                            <h3 class="mission-title">Session d'Orientation - Parcoursup</h3>
                        </div>
                        <div class="mission-body">
                            <div class="mission-client">
                                <div class="client-avatar"
                                     style="background: url('https://images.unsplash.com/photo-1541534401786-2077ed804832?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=387&q=80') center/cover;"></div>
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
                                <div class="mission-detail">
                                    <span class="detail-icon"><i class="fas fa-tag"></i></span>
                                    <span class="mission-price">Gratuit</span>
                                </div>
                            </div>
                        </div>
                        <div class="mission-actions">
                            <div class="mission-action-buttons">
                                <a href="#" class="btn btn-primary"><i class="fa-solid fa-check"></i>&nbsp;&nbsp;Réserver</a>
                                <a href="#" class="mission-details-link">Voir détails <i class="fa-solid fa-arrow-right mission-details-icon"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section-view-more" data-aos="fade-up">
                    <a href="#" class="btn btn-outline">
                        Voir toutes les sessions <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </section>

       <!-- Testimonials Section -->
        <section class="testimonials-section" id="testimonials">
            <div class="container">
                <h2 class="section-title" data-aos="fade-up">Ils nous font confiance</h2>
                <p class="section-subtitle" data-aos="fade-up">Découvrez comment Mentora a transformé le parcours de nos étudiants et mentors.</p>
                
                <div class="testimonial-slider-container" data-aos="fade-up" data-aos-delay="200">
                    <div class="testimonial-slider-track">
                        <!-- Testimonial Card 1 -->
                        <div class="testimonial-card">
                            <i class="fa-solid fa-quote-left testimonial-quote-icon"></i>
                            <p class="testimonial-text">
                                "Grâce à mon mentor, j'ai non seulement compris les chapitres de physique qui me bloquaient, mais j'ai aussi gagné une confiance en moi incroyable pour les examens. Une expérience qui a changé ma scolarité."
                            </p>
                            <div class="testimonial-author">
                                <img src="https://images.unsplash.com/photo-1599566150163-29194dcaad36?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=387&q=80" alt="Léa Dubois" class="author-image">
                                <div class="author-info">
                                    <h4 class="author-name">Léa Dubois</h4>
                                    <p class="author-role">Étudiante en Terminale S</p>
                                </div>
                            </div>
                        </div>

                        <!-- Testimonial Card 2 -->
                        <div class="testimonial-card">
                            <i class="fa-solid fa-quote-left testimonial-quote-icon"></i>
                            <p class="testimonial-text">
                                "En tant que jeune retraité, Mentora m'a donné l'opportunité de transmettre ma passion pour l'histoire. C'est extrêmement gratifiant de voir la curiosité s'éveiller chez les plus jeunes. La plateforme est simple et efficace."
                            </p>
                            <div class="testimonial-author">
                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=387&q=80" alt="Karim Alami" class="author-image">
                                <div class="author-info">
                                    <h4 class="author-name">Karim Alami</h4>
                                    <p class="author-role">Mentor en Histoire-Géographie</p>
                                </div>
                            </div>
                        </div>

                        <!-- Testimonial Card 3 -->
                        <div class="testimonial-card">
                            <i class="fa-solid fa-quote-left testimonial-quote-icon"></i>
                            <p class="testimonial-text">
                                "L'aide pour mon orientation a été décisive. Mon mentor m'a aidé à y voir plus clair dans mes choix post-bac et à préparer mes dossiers. Je me sens beaucoup plus sereine pour l'avenir."
                            </p>
                            <div class="testimonial-author">
                                <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=387&q=80" alt="Sofia Cherkaoui" class="author-image">
                                <div class="author-info">
                                    <h4 class="author-name">Sofia Cherkaoui</h4>
                                    <p class="author-role">Étudiante en 1ère Année</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Testimonial Card 4 (Duplicate for scrolling) -->
                        <div class="testimonial-card">
                            <i class="fa-solid fa-quote-left testimonial-quote-icon"></i>
                            <p class="testimonial-text">
                                "La flexibilité de la plateforme est un vrai plus. J'ai pu trouver un mentor qui correspondait parfaitement à mon emploi du temps chargé. Je recommande vivement !"
                            </p>
                            <div class="testimonial-author">
                                <img src="https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=387&q=80" alt="Adam N." class="author-image">
                                <div class="author-info">
                                    <h4 class="author-name">Adam Naciri</h4>
                                    <p class="author-role">Mentor en Programmation</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Slider Navigation -->
                    <!-- <div class="slider-nav">
                        <button class="slider-btn prev-btn" aria-label="Previous Testimonial"><i class="fas fa-chevron-left"></i></button>
                        <button class="slider-btn next-btn" aria-label="Next Testimonial"><i class="fas fa-chevron-right"></i></button>
                    </div>
                </div> -->
                
                <!-- Slider Pagination -->
                <!-- <div class="slider-dots"></div> -->
            </div>
        </section>


       <!-- CTA Section -->
        <section class="cta-section">
            <div class="container">
                <div class="cta-content">
                    <h2 class="cta-title">Prêt à transformer votre apprentissage ?</h2>
                    <p class="cta-text">Rejoignez des milliers d'étudiants et mentors qui révolutionnent déjà leur façon
                        d'apprendre.</p>
                </div>
                <div class="cta-buttons">
                    <a href="#" class="cta-link cta-link-reverse"><i class="fa-solid fa-arrow-left"></i> Inscription étudiant</a>
                    <a href="#" class="cta-link">Devenir mentor <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </section>
    </main>

<?php require_once '../includes/footer.php'; ?>