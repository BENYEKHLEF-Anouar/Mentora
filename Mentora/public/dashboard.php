<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentora - Plateforme de Mentorat</title>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Manrope', sans-serif;
            line-height: 1.6;
            color: #1a202c;
            overflow-x: hidden;
        }

        /* Header */
        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            padding: 1rem 0;
            border-bottom: 1px solid rgba(226, 232, 240, 0.3);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1.2rem;
        }

        .logo-text {
            font-size: 1.5rem;
            font-weight: 800;
            color: #1a202c;
            font-family: 'Poppins', sans-serif;
        }

        .nav-menu {
            display: flex;
            gap: 2rem;
            list-style: none;
        }

        .nav-menu a {
            text-decoration: none;
            color: #4a5568;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .nav-menu a:hover {
            color: #2563eb;
        }

        .nav-buttons {
            display: flex;
            gap: 1rem;
        }

        .btn-secondary {
            padding: 0.5rem 1.5rem;
            border: 2px solid #2563eb;
            background: transparent;
            color: #2563eb;
            border-radius: 25px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background: #2563eb;
            color: white;
            transform: translateY(-2px);
        }

        .btn-primary {
            padding: 0.5rem 1.5rem;
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            color: white;
            border-radius: 25px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.4);
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
            padding: 8rem 0 4rem;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse"><path d="M 40 0 L 0 0 0 40" fill="none" stroke="%23e2e8f0" stroke-width="1" opacity="0.3"/></pattern></defs><rect width="100%" height="100%" fill="url(%23grid)"/></svg>');
            opacity: 0.3;
        }

        .hero-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .hero-content h1 {
            font-size: 3.5rem;
            font-weight: 800;
            font-family: 'Poppins', sans-serif;
            line-height: 1.2;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, #1a202c, #2563eb);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-content p {
            font-size: 1.2rem;
            color: #4a5568;
            margin-bottom: 2rem;
            line-height: 1.8;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .btn-large {
            padding: 1rem 2rem;
            font-size: 1.1rem;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-hero-primary {
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            color: white;
            box-shadow: 0 10px 30px rgba(37, 99, 235, 0.3);
        }

        .btn-hero-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(37, 99, 235, 0.4);
        }

        .btn-hero-secondary {
            border: 2px solid #2563eb;
            color: #2563eb;
            background: white;
        }

        .btn-hero-secondary:hover {
            background: #2563eb;
            color: white;
            transform: translateY(-3px);
        }

        .hero-stats {
            display: flex;
            gap: 2rem;
            margin-top: 2rem;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 800;
            color: #2563eb;
            font-family: 'Poppins', sans-serif;
        }

        .stat-label {
            font-size: 0.9rem;
            color: #718096;
            font-weight: 500;
        }

        .hero-image {
            position: relative;
        }

        .hero-image img {
            width: 100%;
            height: auto;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
        }

        .floating-card {
            position: absolute;
            background: white;
            border-radius: 15px;
            padding: 1rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
        }

        .card-1 {
            top: 20%;
            left: -10%;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .card-2 {
            bottom: 20%;
            right: -10%;
            text-align: center;
        }

        .card-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #10b981, #059669);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }

        /* Services Section */
        .services {
            padding: 6rem 0;
            background: white;
        }

        .services-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 800;
            font-family: 'Poppins', sans-serif;
            margin-bottom: 1rem;
            color: #1a202c;
        }

        .section-subtitle {
            font-size: 1.1rem;
            color: #4a5568;
            max-width: 600px;
            margin: 0 auto;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .service-card {
            background: linear-gradient(135deg, #f8fafc, #ffffff);
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #2563eb, #3b82f6);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .service-card:hover::before {
            transform: scaleX(1);
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .service-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
            color: white;
        }

        .service-card h3 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #1a202c;
        }

        .service-card p {
            color: #4a5568;
            line-height: 1.6;
        }

        /* Features Section */
        .features {
            padding: 6rem 0;
            background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
        }

        .features-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .features-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
            margin-top: 4rem;
        }

        .feature-list {
            list-style: none;
        }

        .feature-item {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            margin-bottom: 2rem;
            padding: 1.5rem;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .feature-item:hover {
            transform: translateX(10px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .feature-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #10b981, #059669);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .feature-content h4 {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #1a202c;
        }

        .feature-content p {
            color: #4a5568;
        }

        .features-image {
            position: relative;
        }

        .features-image img {
            width: 100%;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
        }

        /* CTA Section */
        .cta {
            padding: 6rem 0;
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            color: white;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .cta::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><circle cx="200" cy="200" r="100" fill="rgba(255,255,255,0.1)"/><circle cx="800" cy="300" r="150" fill="rgba(255,255,255,0.05)"/><circle cx="400" cy="700" r="120" fill="rgba(255,255,255,0.08)"/></svg>');
        }

        .cta-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 2rem;
            position: relative;
            z-index: 2;
        }

        .cta h2 {
            font-size: 3rem;
            font-weight: 800;
            font-family: 'Poppins', sans-serif;
            margin-bottom: 1rem;
        }

        .cta p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .cta-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-cta {
            padding: 1rem 2rem;
            font-size: 1.1rem;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-cta-white {
            background: white;
            color: #2563eb;
        }

        .btn-cta-white:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(255, 255, 255, 0.3);
        }

        .btn-cta-outline {
            border: 2px solid white;
            color: white;
            background: transparent;
        }

        .btn-cta-outline:hover {
            background: white;
            color: #2563eb;
            transform: translateY(-3px);
        }

        /* Footer */
        .footer {
            background: #1a202c;
            color: white;
            padding: 4rem 0 2rem;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-section h3 {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #2563eb;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 0.5rem;
        }

        .footer-section ul li a {
            color: #a0aec0;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-section ul li a:hover {
            color: #2563eb;
        }

        .footer-bottom {
            border-top: 1px solid #2d3748;
            padding-top: 2rem;
            text-align: center;
            color: #a0aec0;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-menu {
                display: none;
            }

            .hero-container {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .hero-content h1 {
                font-size: 2.5rem;
            }

            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }

            .hero-stats {
                justify-content: center;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }

            .cta h2 {
                font-size: 2rem;
            }

            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <nav class="nav-container">
            <div class="logo-container">
                <div class="logo-icon">M</div>
                <span class="logo-text">Mentora.</span>
            </div>
            
            <ul class="nav-menu">
                <li><a href="#accueil">Accueil</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#fonctionnalités">Fonctionnalités</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            
            <div class="nav-buttons">
                <a href="#" class="btn-secondary">Connexion</a>
                <a href="#" class="btn-primary">Inscription</a>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="accueil">
        <div class="hero-container">
            <div class="hero-content animate-fade-in-up">
                <h1>Connectez-vous avec des mentors exceptionnels</h1>
                <p>Mentora est la plateforme de mentorat qui connecte les étudiants avec des mentors expérimentés pour un accompagnement personnalisé et un soutien scolaire de qualité.</p>
                
                <div class="hero-buttons">
                    <a href="#" class="btn-large btn-hero-primary">
                        Commencer maintenant
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                    </a>
                    <a href="#" class="btn-large btn-hero-secondary">
                        En savoir plus
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                            <polyline points="14,2 14,8 20,8"/>
                            <line x1="16" y1="13" x2="8" y2="13"/>
                            <line x1="16" y1="17" x2="8" y2="17"/>
                            <polyline points="10,9 9,9 8,9"/>
                        </svg>
                    </a>
                </div>
                
                <div class="hero-stats">
                    <div class="stat-item">
                        <div class="stat-number">500+</div>
                        <div class="stat-label">Mentors actifs</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">2K+</div>
                        <div class="stat-label">Étudiants aidés</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">98%</div>
                        <div class="stat-label">Satisfaction</div>
                    </div>
                </div>
            </div>
            
            <div class="hero-image">
                <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Étudiants en session de mentorat" />
                
                <div class="floating-card card-1 animate-float">
                    <div class="card-icon">✓</div>
                    <div>
                        <div style="font-weight: 600; color: #1a202c;">Session terminée</div>
                        <div style="font-size: 0.9rem; color: #718096;">Mathématiques</div>
                    </div>
                </div>
                
                <div class="floating-card card-2 animate-float" style="animation-delay: 1s;">
                    <div class="card-icon" style="background: linear-gradient(135deg, #f59e0b, #d97706); margin: 0 auto 0.5rem;">🏆</div>
                    <div style="font-weight: 600; color: #1a202c;">Badge obtenu</div>
                    <div style="font-size: 0.9rem; color: #718096;">Étudiant assidu</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services" id="services">
        <div class="services-container">
            <div class="section-header">
                <h2 class="section-title">Services urgents</h2>
                <p class="section-subtitle">Découvrez nos services de mentorat adaptés à tous vos besoins académiques et professionnels</p>
            </div>
            
            <div class="services-grid">
                <div class="service-card animate-fade-in-up">
                    <div class="service-icon">📚</div>
                    <h3>Soutien scolaire</h3>
                    <p>Aide personnalisée dans toutes les matières avec des mentors qualifiés pour améliorer vos résultats scolaires.</p>
                </div>
                
                <div class="service-card animate-fade-in-up" style="animation-delay: 0.2s;">
                    <div class="service-icon">💻</div>
                    <h3>Sessions en ligne</h3>
                    <p>Cours particuliers et sessions de groupe en visioconférence avec des outils interactifs modernes.</p>
                </div>
                
                <div class="service-card animate-fade-in-up" style="animation-delay: 0.4s;">
                    <div class="service-icon">🎯</div>
                    <h3>Coaching professionnel</h3>
                    <p>Accompagnement personnalisé pour votre orientation et développement de carrière avec des professionnels expérimentés.</p>
                </div>
                
                <div class="service-card animate-fade-in-up" style="animation-delay: 0.6s;">
                    <div class="service-icon">📊</div>
                    <h3>Suivi des progrès</h3>
                    <p>Tableaux de bord détaillés pour suivre votre évolution et identifier les axes d'amélioration.</p>
                </div>
                
                <div class="service-card animate-fade-in-up" style="animation-delay: 0.8s;">
                    <div class="service-icon">🏆</div>
                    <h3>Système de badges</h3>
                    <p>Reconnaissance de vos efforts et réalisations à travers un système de gamification motivant.</p>
                </div>
                
                <div class="service-card animate-fade-in-up" style="animation-delay: 1s;">
                    <div class="service-icon">📱</div>
                    <h3>Messagerie intégrée</h3>
                    <p>Communication fluide avec vos mentors et partage de ressources pédagogiques en temps réel.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="fonctionnalités">
        <div class="features-container">
            <div class="section-header">
                <h2 class="section-title">Fonctionnalités avancées</h2>
                <p class="section-subtitle">Une plateforme complète pensée pour maximiser votre réussite</p>
            </div>
            
            <div class="features-grid">
                <div class="features-image">
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Interface Mentora" />
                </div>
                
                <ul class="feature-list">
                    <li class="feature-item animate-fade-in-up">
                        <div class="feature-icon">🔍</div>
                        <div class="feature-content">
                            <h4>Matching intelligent</h4>
                            <p>Algorithme avancé qui vous connecte avec les mentors les plus compatibles selon vos besoins et objectifs.</p>
                        </div>
                    </li>
                    
                    <li class="feature-item animate-fade-in-up" style="animation-delay: 0.2s;">
                        <div class="feature-icon">📅</div>
                        <div class="feature-content">
                            <h4>Réservation flexible</h4>
                            <p>Planifiez vos sessions selon vos disponibilités avec un système de réservation simple et intuitif.</p>
                        </div>
                    </li>
                    
                    <li class="feature-item animate-fade-in-up" style="animation-delay: 0.4s;">
                        <div class="feature-icon">📁</div>
                        <div class="feature-content">
                            <h4>Partage de ressources</h4>
                            <p>Échangez facilement des documents, exercices et supports pédagogiques avec vos mentors.</p>
                        </div>
                    </li>
                    
                    <li class="feature-item animate-fade-in-up" style="animation-delay: 0.6s;">
                        <div class="feature-icon">🔒</div>
                        <div class="feature-content">
                            <h4>Sécurité garantie</h4>
                            <p>Plateforme sécurisée avec protection des données et environnement d'apprentissage sain.</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <div class="cta-container">
            <h2>Prêt à transformer votre parcours d'apprentissage ?</h2>
            <p>Rejoignez des milliers d'étudiants qui ont déjà trouvé leur