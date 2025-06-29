<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Espace Étudiant - Mentora</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&family=Poppins:wght@400;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <!-- Uses the EXACT SAME CSS file for a consistent theme -->
    <link rel="stylesheet" href="../assets/css/profileStudent.css">
    <link rel="icon" href="../assets/images/White_Tower_Symbol.webp" type="image/x-icon">
</head>

<body>
    <!-- The header remains the same, but the JS will show a student's info -->
    <header>
        <div class="container nav-container">
            <a href="index.html" class="logo">
                <img src="./images/White_Tower_Symbol.webp" alt="Mentora Logo">
                <span class="logo-text">Mentora</span>
            </a>

            <nav>
                <ul class="nav-links">
                    <li><a href="index.html"><i class="fas fa-home"></i> Accueil</a></li>
                    <li><a href="searchMentor.html"><i class="fas fa-users"></i> Mentors</a></li>
                    <li><a href="searchStudent.html"><i class="fas fa-user-graduate"></i> Étudiants</a></li>
                    <li><a href="sessions.html"><i class="fas fa-tasks"></i> Sessions</a></li>
                </ul>
                <div class="nav-right">
                    <!-- LOGGED IN STATE (for a student) -->
                    <div class="user-logged-in">
                        <div class="profile-dropdown">
                            <button class="profile-menu-trigger">
                                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c7da?auto=format&fit=crop&w=40"
                                    class="nav-profile-img" alt="User Avatar">
                                <span>Karim A.</span> <!-- Student Name -->
                                <i class="fas fa-chevron-down dropdown-arrow"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <!-- Link to this page -->
                                <li><a href="studentDashboard.html"><i class="fas fa-tachometer-alt"></i> Mon Espace</a>
                                </li>
                                <li><a href="#"><i class="fas fa-user-cog"></i> Modifier Profil</a></li>
                                <li><a href="#"><i class="fas fa-envelope"></i> Messagerie <span
                                            class="notification-badge">4</span></a></li>
                                <li class="dropdown-separator"></li>
                                <li><a href="#" class="logout-link"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <button class="mobile-menu-toggle"><i class="fas fa-bars"></i></button>
        </div>
    </header>

    <main class="dashboard-container">
        <!-- Student Profile Sidebar -->
        <aside class="profile-sidebar" data-aos="fade-right">
            <div class="profile-card">
                <div class="card-image-container"><img
                        src="https://images.unsplash.com/photo-1522071820081-009f0129c7da?auto=format&fit=crop&w=300"
                        alt="Karim A."></div>
                <div class="card-body">
                    <h3 class="profile-name">Karim A.</h3>
                    <p class="profile-specialty">Étudiant, Lycée - Sciences Maths</p>

                    <div class="student-stats">
                        <h4>Ma Progression</h4>
                        <ul>
                            <li><i class="fas fa-check-circle"></i> <strong>12</strong> Sessions terminées</li>
                            <li><i class="fas fa-chalkboard-teacher"></i> <strong>4</strong> Mentors contactés</li>
                            <li><i class="fas fa-book-open"></i> <strong>3</strong> Matières étudiées</li>
                        </ul>
                    </div>

                    <div class="badge-showcase">
                        <h4>Mes Badges</h4>
                        <div class="badges-grid">
                            <div class="badge" title="Première Session Complétée"><i class="fas fa-award"></i></div>
                            <div class="badge" title="5 Sessions Complétées"><i class="fas fa-rocket"></i></div>
                            <div class="badge" title="Passionné de Maths"><i class="fas fa-calculator"></i></div>
                            <div class="badge" title="Esprit Curieux"><i class="fas fa-lightbulb"></i></div>
                        </div>
                    </div>

                </div>
                <div class="card-footer"><a href="#" class="btn-edit-profile"><i class="fas fa-pencil-alt"></i> Modifier
                        le profil</a></div>
            </div>
            <a href="searchMentor.html" class="btn btn-primary-full-width"><i class="fas fa-search"></i> Trouver un
                Mentor</a>
        </aside>

        <!-- Main Student Dashboard Content -->
        <div class="dashboard-main-content" data-aos="fade-up" data-aos-delay="100">
            <!-- Student-centric Tab Navigation -->
            <nav class="dashboard-nav">
                <ul>
                    <li><a href="#tableau-de-bord" class="dashboard-tab active" data-tab="tableau-de-bord"><i
                                class="fas fa-tachometer-alt"></i> Tableau de Bord</a></li>
                    <li><a href="#mes-sessions" class="dashboard-tab" data-tab="mes-sessions"><i
                                class="fas fa-tasks"></i> Mes Sessions <span class="notification-badge">1</span></a></li>
                    <li><a href="#messagerie" class="dashboard-tab" data-tab="messagerie"><i
                                class="fas fa-envelope"></i> Messagerie <span class="notification-badge">4</span></a>
                    </li>
                    <li><a href="#mes-mentors" class="dashboard-tab" data-tab="mes-mentors"><i
                                class="fas fa-chalkboard-teacher"></i> Mes Mentors</a></li>
                    <li><a href="#evaluations" class="dashboard-tab" data-tab="evaluations"><i
                                class="fas fa-star"></i> Évaluations à donner</a></li>
                </ul>
            </nav>

            <!-- Tab Content Panels -->
            <div id="tableau-de-bord" class="tab-content active">
                <h3 class="tab-title">Bienvenue, Karim !</h3>
                <div class="summary-grid">
                    <div class="summary-card">
                        <h4>Prochaine Session</h4>
                        <div class="session-info">
                            <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=40"
                                alt="Amina Kettani">
                            <div>
                                <p><strong>Aide en Physique</strong> avec <strong>Amina K.</strong></p>
                                <small>Demain à 16h00</small>
                            </div>
                        </div>
                        <a href="#" class="btn-join">Rejoindre la session</a>
                    </div>
                    <div class="summary-card">
                        <h4>Messages Récents</h4>
                        <div class="message-preview">
                            <p><strong>Amina K.:</strong> "N'oublie pas de revoir l'exercice 5..." <a href="#">Lire</a>
                            </p>
                            <p><strong>Youssef Z.:</strong> "La session de chimie était super, merci !..." <a
                                    href="#">Lire</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="mes-sessions" class="tab-content">
                <h3 class="tab-title">Historique de vos sessions</h3>
                <div class="session-list">
                    <h4>Sessions à venir</h4>
                    <div class="session-request-card">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=50"
                            alt="Amina K.">
                        <div class="request-details">
                            <p><strong>Aide en Physique</strong> avec <strong>Amina K.</strong></p>
                            <small>Demain, 26 Avril 2024 à 16h00</small>
                        </div>
                        <div class="request-actions">
                            <button class="btn-cancel"><i class="fas fa-times"></i> Annuler</button>
                        </div>
                    </div>
                    <h4>Sessions passées</h4>
                    <div class="session-request-card past">
                        <img src="https://images.unsplash.com/photo-1556157382-97eda2d62296?auto=format&fit=crop&w=50"
                            alt="Youssef Z.">
                        <div class="request-details">
                            <p><strong>Préparation au DS de Chimie</strong> avec <strong>Youssef Z.</strong></p>
                            <small>Le 22 Avril 2024</small>
                        </div>
                        <div class="request-actions">
                            <a href="#" class="btn-review">Évaluer</a>
                        </div>
                    </div>
                </div>
            </div>

            <div id="messagerie" class="tab-content">
                <!-- Messagerie component is identical in structure -->
                <div class="chat-container">
                    <div class="conversation-list">
                        <div class="conversation-item active">
                            <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=50"
                                alt="Amina K.">
                            <div class="convo-details">
                                <span class="convo-name">Amina Kettani</span>
                                <p class="convo-preview">N'oublie pas de revoir l'exercice...</p>
                            </div>
                            <span class="convo-time">10:15</span>
                        </div>
                        <!-- more conversations... -->
                    </div>
                    <div class="chat-window">
                        <div class="chat-header">
                            <h5>Amina Kettani</h5>
                            <small>En ligne</small>
                        </div>
                        <div class="message-area">
                            <div class="chat-message message-incoming">
                                <p>Bonjour Karim, comment s'est passé le contrôle ?</p>
                            </div>
                            <div class="chat-message message-outgoing">
                                <p>Bonjour Amina ! Très bien merci, vos conseils m'ont beaucoup aidé.</p>
                            </div>
                        </div>
                        <div class="message-input">
                            <textarea placeholder="Écrire un message..."></textarea>
                            <button class="btn-send"><i class="fas fa-paper-plane"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="mes-mentors" class="tab-content">
                <h3 class="tab-title">Vos Mentors</h3>
                <div class="mentor-grid">
                    <div class="mentor-card">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=80" alt="Amina K.">
                        <h5>Amina Kettani</h5>
                        <p>Spécialiste Mathématiques</p>
                        <a href="#" class="btn-contact">Contacter</a>
                    </div>
                    <div class="mentor-card">
                        <img src="https://images.unsplash.com/photo-1556157382-97eda2d62296?auto=format&fit=crop&w=80" alt="Youssef Z.">
                        <h5>Youssef Z.</h5>
                        <p>Expert en Chimie</p>
                        <a href="#" class="btn-contact">Contacter</a>
                    </div>
                </div>
            </div>

            <div id="evaluations" class="tab-content">
                 <h3 class="tab-title">Évaluations en attente</h3>
                 <div class="evaluation-card-prompt">
                     <p>Vous avez terminé une session de <strong>Préparation au DS de Chimie</strong> avec <strong>Youssef Z.</strong></p>
                     <p>Votre avis est important pour aider les autres étudiants !</p>
                     <button class="btn-review-large"><i class="fas fa-star"></i> Laisser une évaluation</button>
                 </div>
            </div>
        </div>
    </main>
    
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- The exact same script file works here too -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            AOS.init({ duration: 800, once: true, offset: 50 });

            const tabs = document.querySelectorAll('.dashboard-tab');
            const tabContents = document.querySelectorAll('.tab-content');
            if (tabs.length > 0) {
                tabs.forEach(tab => {
                    tab.addEventListener('click', (e) => {
                        e.preventDefault();
                        const targetTab = e.currentTarget;
                        tabs.forEach(item => item.classList.remove('active'));
                        tabContents.forEach(content => content.classList.remove('active'));
                        targetTab.classList.add('active');
                        const activeContent = document.getElementById(targetTab.dataset.tab);
                        if (activeContent) activeContent.classList.add('active');
                    });
                });
            }

            const profileDropdown = document.querySelector('.profile-dropdown');
            if (profileDropdown) {
                const trigger = profileDropdown.querySelector('.profile-menu-trigger');
                const menu = profileDropdown.querySelector('.dropdown-menu');
                trigger.addEventListener('click', (e) => {
                    e.stopPropagation();
                    menu.classList.toggle('show');
                    trigger.classList.toggle('active');
                });
                window.addEventListener('click', (e) => {
                    if (menu && !profileDropdown.contains(e.target)) {
                        menu.classList.remove('show');
                        trigger.classList.remove('active');
                    }
                });
            }

            const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
            const nav = document.querySelector('nav');
            if (mobileMenuToggle && nav) {
                mobileMenuToggle.addEventListener('click', () => {
                    nav.classList.toggle('nav-active');
                });
            }

            document.body.classList.add('logged-in');
        });
    </script>
</body>

</html>