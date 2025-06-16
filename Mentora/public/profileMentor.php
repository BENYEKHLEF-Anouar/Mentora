<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Tableau de Bord - Mentora</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&family=Poppins:wght@400;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="../assets/css/profileMentor.css">
    <link rel="icon" href="../assets/images/White_Tower_Symbol.webp" type="image/x-icon">
</head>

<body>
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
                    <!-- LOGGED OUT STATE -->
                    <div class="user-logged-out">
                        <a href="#" class="login-btn">Login</a>
                        <a href="#" class="register-btn">Register</a>
                    </div>
                    <!-- LOGGED IN STATE -->
                    <div class="user-logged-in">
                        <div class="profile-dropdown">
                            <button class="profile-menu-trigger">
                                <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=40"
                                    class="nav-profile-img" alt="User Avatar">
                                <span>Amina K.</span>
                                <i class="fas fa-chevron-down dropdown-arrow"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="mentorDashboard.html"><i class="fas fa-tachometer-alt"></i> Mon Espace</a>
                                </li>
                                <li><a href="#"><i class="fas fa-user-cog"></i> Modifier Profil</a></li>
                                <li><a href="#"><i class="fas fa-envelope"></i> Messagerie <span
                                            class="notification-badge">2</span></a></li>
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
        <!-- Sticky Profile Sidebar -->
        <aside class="profile-sidebar" data-aos="fade-right">
            <div class="profile-card">
                <div class="card-image-container"><img
                        src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=300"
                        alt="Amina Kettani"></div>
                <div class="card-body">
                    <h3 class="profile-name">Amina Kettani</h3>
                    <p class="profile-specialty">Ingénieure, Spécialiste Mathématiques</p>
                    <div class="profile-rating"><i class="fa-solid fa-star"></i><strong>4.9</strong><span>(112
                            avis)</span></div>

                    <!-- Nicely Displayed Badges -->
                    <div class="badge-showcase">
                        <h4>Mes Badges</h4>
                        <div class="badges-grid">
                            <div class="badge" title="Top Mentor - Plus de 100 sessions"><i class="fas fa-rocket"></i>
                            </div>
                            <div class="badge" title="Expert en Mathématiques"><i class="fas fa-calculator"></i></div>
                            <div class="badge" title="Réponse Rapide"><i class="fas fa-bolt"></i></div>
                            <div class="badge" title="1 an sur Mentora"><i class="fas fa-award"></i></div>
                        </div>
                    </div>
                </div>
                <div class="card-footer"><a href="#" class="btn-edit-profile"><i class="fas fa-pencil-alt"></i> Modifier
                        le profil</a></div>
            </div>
            <a href="#" class="btn btn-primary-full-width"><i class="fas fa-plus"></i> Publier une session</a>
        </aside>

        <!-- Main Dashboard Content -->
        <div class="dashboard-main-content" data-aos="fade-up" data-aos-delay="100">
            <!-- Dashboard Tab Navigation -->
            <nav class="dashboard-nav">
                <ul>
                    <li><a href="#statistiques" class="dashboard-tab active" data-tab="statistiques"><i
                                class="fas fa-chart-line"></i> Statistiques</a></li>
                    <li><a href="#sessions" class="dashboard-tab" data-tab="sessions"><i class="fas fa-tasks"></i>
                            Sessions <span class="notification-badge">3</span></a></li>
                    <!-- ✅ NEW MESSAGERIE TAB -->
                    <li><a href="#messagerie" class="dashboard-tab" data-tab="messagerie"><i
                                class="fas fa-envelope"></i>
                            Messagerie <span class="notification-badge">2</span></a>
                    </li>
                    <li><a href="#disponibilites" class="dashboard-tab" data-tab="disponibilites"><i
                                class="fas fa-calendar-alt"></i> Disponibilités</a></li>
                    <li><a href="#ressources" class="dashboard-tab" data-tab="ressources"><i
                                class="fas fa-file-alt"></i>
                            Ressources</a></li>
                    <li><a href="#evaluations" class="dashboard-tab" data-tab="evaluations"><i
                                class="fas fa-star-half-alt"></i> Évaluations</a></li>
                </ul>
            </nav>

            <!-- Tab Content Panels -->
            <div id="statistiques" class="tab-content active">
                <h3 class="tab-title">Vos Performances</h3>
                <div class="stats-grid">
                    <div class="stat-card">
                        <i class="fas fa-users stat-icon"></i>
                        <span class="stat-value">34</span>
                        <p class="stat-label">Sessions ce mois-ci</p>
                    </div>
                    <div class="stat-card">
                        <i class="fas fa-wallet stat-icon"></i>
                        <span class="stat-value">4,250 MAD</span>
                        <p class="stat-label">Revenus (Avril)</p>
                    </div>
                    <div class="stat-card">
                        <i class="fas fa-star stat-icon"></i>
                        <span class="stat-value">4.9 / 5</span>
                        <p class="stat-label">Note moyenne</p>
                    </div>
                    <div class="stat-card">
                        <i class="fas fa-eye stat-icon"></i>
                        <span class="stat-value">1,280</span>
                        <p class="stat-label">Vues du profil</p>
                    </div>
                </div>
                <div class="chart-container">
                    <h4>Évolution des sessions (6 derniers mois)</h4>
                    <!-- This is a placeholder image. A real implementation would use a JS chart library. -->
                    <img src="https://i.imgur.com/u1sWJxI.png" alt="Graphique de l'évolution des sessions"
                        style="width: 100%; border-radius: 8px; margin-top: 1rem;">
                </div>
            </div>
            <div id="sessions" class="tab-content">
                <h3 class="tab-title">Gérer vos sessions</h3>
                <div class="session-management">
                    <h4>Demandes en attente</h4>
                    <div class="session-request-card">
                        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c7da?auto=format&fit=crop&w=50"
                            alt="Karim A.">
                        <div class="request-details">
                            <p><strong>Karim A.</strong> demande une session : <strong>Aide en Physique</strong></p>
                            <small>Pour le 25 Avril 2024 à 16h00</small>
                        </div>
                        <div class="request-actions">
                            <button class="btn-accept"><i class="fas fa-check"></i> Accepter</button>
                            <button class="btn-decline"><i class="fas fa-times"></i> Refuser</button>
                        </div>
                    </div>
                    <!-- More requests... -->
                </div>
            </div>

            <!-- ✅ NEW MESSAGERIE CONTENT PANEL -->
            <div id="messagerie" class="tab-content">
                <div class="chat-container">
                    <!-- Conversation List -->
                    <div class="conversation-list">
                        <div class="conversation-item active">
                            <img src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=format&fit=crop&w=50"
                                alt="Adam El Fassi">
                            <div class="convo-details">
                                <span class="convo-name">Adam El Fassi</span>
                                <p class="convo-preview">Ok, super ! Merci beaucoup pour...</p>
                            </div>
                            <span class="convo-time">14:32</span>
                        </div>
                        <div class="conversation-item">
                            <img src="https://images.unsplash.com/photo-1576435728678-68d0fbf94e91?auto=format&fit=crop&w=50"
                                alt="Sofia B.">
                            <div class="convo-details">
                                <span class="convo-name">Sofia B.</span>
                                <p class="convo-preview">Bonjour, seriez-vous disponible...</p>
                            </div>
                            <span class="convo-time">Hier</span>
                        </div>
                    </div>
                    <!-- Chat Window -->
                    <div class="chat-window">
                        <div class="chat-header">
                            <h5>Adam El Fassi</h5>
                            <small>En ligne</small>
                        </div>
                        <div class="message-area">
                            <div class="chat-message message-incoming">
                                <p>Bonjour Amina, j'ai une question concernant l'exercice 3.</p>
                            </div>
                            <div class="chat-message message-outgoing">
                                <p>Bonjour Adam, bien sûr. Quelle est ta question ?</p>
                            </div>
                            <div class="chat-message message-incoming">
                                <p>Je ne comprends pas comment appliquer le théorème de Thales à la deuxième partie.</p>
                            </div>
                            <div class="chat-message message-outgoing">
                                <p>Ok, super ! Merci beaucoup pour votre aide !</p>
                            </div>
                        </div>
                        <div class="message-input">
                            <textarea placeholder="Écrire un message..."></textarea>
                            <button class="btn-send"><i class="fas fa-paper-plane"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="disponibilites" class="tab-content">...</div>
            <div id="ressources" class="tab-content">...</div>

            <div id="evaluations" class="tab-content">
                <h3 class="tab-title">Évaluations Récentes</h3>
                <div class="evaluation-card">
                    <div class="evaluation-header">
                        <div class="eval-author">
                            <img src="https://images.unsplash.com/photo-1522071820081-009f0129c7da?auto=format&fit=crop&w=40"
                                alt="Karim A.">
                            <span>Karim A.</span>
                        </div>
                        <div class="eval-rating">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                    </div>
                    <p class="evaluation-comment">"Amina est une mentor exceptionnelle. Ses explications sont claires et
                        elle a su me redonner confiance en physique. Je recommande à 100%!"</p>
                    <small class="evaluation-date">Pour la session "Aide en Physique" du 25/04/2024</small>
                </div>
                <div class="evaluation-card">
                    <div class="evaluation-header">
                        <div class="eval-author">
                            <img src="https://images.unsplash.com/photo-1576435728678-68d0fbf94e91?auto=format&fit=crop&w=40"
                                alt="Sofia B.">
                            <span>Sofia B.</span>
                        </div>
                        <div class="eval-rating">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                class="fas fa-star"></i><i class="far fa-star"></i>
                        </div>
                    </div>
                    <p class="evaluation-comment">"Très bonne session, mais j'aurais aimé avoir plus d'exercices
                        pratiques à la fin."</p>
                    <small class="evaluation-date">Pour la session "Orientation post-bac" du 18/04/2024</small>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <!-- Simple footer for dashboard -->
        <div class="footer-bottom">© 2025 Mentora. Tous droits réservés.</div>
    </footer>





    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // 1. AOS Initialization
            AOS.init({ duration: 800, once: true, offset: 50 });

            // 2. Dashboard Tab Switching Logic
            const tabs = document.querySelectorAll('.dashboard-tab');
            const tabContents = document.querySelectorAll('.tab-content');
            if (tabs.length > 0) {
                tabs.forEach(tab => {
                    tab.addEventListener('click', (e) => {
                        e.preventDefault();
                        tabs.forEach(item => item.classList.remove('active'));
                        tabContents.forEach(content => content.classList.remove('active'));
                        tab.classList.add('active');
                        const activeContent = document.getElementById(tab.dataset.tab);
                        if (activeContent) activeContent.classList.add('active');
                    });
                });
            }

            // 3. Profile Dropdown Logic
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
                    if (!profileDropdown.contains(e.target)) {
                        menu.classList.remove('show');
                        trigger.classList.remove('active');
                    }
                });
            }

            // 4. Mobile Navigation Toggle
            const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
            const nav = document.querySelector('nav');
            if (mobileMenuToggle && nav) {
                mobileMenuToggle.addEventListener('click', () => {
                    nav.classList.toggle('nav-active');
                });
            }

            // 5. Login State Simulation
            window.toggleLogin = function (isLoggedIn) {
                document.body.classList.toggle('logged-in', isLoggedIn);
            };

            // By default, show the logged-in state on the dashboard page
            toggleLogin(true);
        });
    </script>
</body>

</html>