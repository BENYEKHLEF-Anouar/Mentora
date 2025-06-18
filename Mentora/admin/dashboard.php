<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - Mentora</title>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="home.css">
    <link rel="icon" href="../assets/images/White_Tower_Symbol.webp" type="image/x-icon">
</head>

<body>
    <!-- Header with Admin Info -->
    <header>
        <div class="container nav-container">
            <a href="index.html" class="logo">
                <img src="./images/White_Tower_Symbol.webp" alt="Mentora Logo">
                <span class="logo-text">Mentora</span>
            </a>
            <nav>
                <div class="nav-right">
                    <div class="user-logged-in">
                        <div class="profile-dropdown">
                            <button class="profile-menu-trigger">
                                <img src="https://i.pravatar.cc/40?u=admin" class="nav-profile-img" alt="Admin Avatar">
                                <span>Admin</span>
                                <i class="fas fa-chevron-down dropdown-arrow"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="adminDashboard.html"><i class="fas fa-user-shield"></i> Panneau Admin</a></li>
                                <li class="dropdown-separator"></li>
                                <li><a href="#" class="logout-link"><i class="fas fa-sign-out-alt"></i> Déconnexion</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <button class="mobile-menu-toggle"><i class="fas fa-bars"></i></button>
        </div>
    </header>

    <main class="dashboard-container">
        <!-- Admin Profile Sidebar -->
        <aside class="profile-sidebar" data-aos="fade-right">
            <div class="profile-card">
                <div class="card-image-container">
                    <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?auto=format&fit=crop&w=300" alt="Admin Background">
                </div>
                <div class="card-body">
                    <h3 class="profile-name">Admin Mentora</h3>
                    <p class="profile-specialty">Administrateur de la Plateforme</p>
                    <div class="admin-quick-stats">
                        <h4>Statistiques Clés</h4>
                        <ul>
                            <li><i class="fas fa-users"></i> <strong>1,245</strong> Utilisateurs</li>
                            <li><i class="fas fa-chalkboard-teacher"></i> <strong>210</strong> Mentors Actifs</li>
                            <li><i class="fas fa-check-circle"></i> <strong>3,450</strong> Sessions Terminées</li>
                        </ul>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn-edit-profile"><i class="fas fa-bullhorn"></i> Envoyer une annonce</a>
                </div>
            </div>
        </aside>

        <!-- Main Admin Content -->
        <div class="dashboard-main-content" data-aos="fade-up" data-aos-delay="100">
            <!-- Admin-centric Tab Navigation -->
            <nav class="dashboard-nav">
                <ul>
                    <li><a href="#tableau-de-bord" class="dashboard-tab active" data-tab="tableau-de-bord"><i class="fas fa-chart-pie"></i> Tableau de Bord</a></li>
                    <li><a href="#utilisateurs" class="dashboard-tab" data-tab="utilisateurs"><i class="fas fa-users-cog"></i> Gérer les Utilisateurs</a></li>
                    <li><a href="#contenu" class="dashboard-tab" data-tab="contenu"><i class="fas fa-file-alt"></i> Gérer le Contenu</a></li>
                    <li><a href="#badges" class="dashboard-tab" data-tab="badges"><i class="fas fa-award"></i> Gérer les Badges</a></li>
                </ul>
            </nav>

            <!-- Tab Content Panels -->
            <div id="tableau-de-bord" class="tab-content active">
                <h3 class="tab-title">Statistiques de la Plateforme</h3>
                <div class="stats-grid">
                    <div class="stat-card">
                        <i class="fas fa-wallet stat-icon"></i>
                        <span class="stat-value">120,500 MAD</span>
                        <p class="stat-label">Revenus (Total)</p>
                    </div>
                    <div class="stat-card">
                        <i class="fas fa-user-plus stat-icon"></i>
                        <span class="stat-value">+ 56</span>
                        <p class="stat-label">Nouveaux utilisateurs (Mois)</p>
                    </div>
                    <div class="stat-card">
                        <i class="fas fa-tasks stat-icon"></i>
                        <span class="stat-value">412</span>
                        <p class="stat-label">Sessions ce mois-ci</p>
                    </div>
                    <div class="stat-card">
                        <i class="fas fa-star stat-icon"></i>
                        <span class="stat-value">4.8 / 5</span>
                        <p class="stat-label">Note moyenne globale</p>
                    </div>
                </div>
                <div class="chart-container">
                    <h4>Croissance des inscriptions (Année)</h4>
                    <img src="https://i.imgur.com/vI4G846.png" alt="Graphique de croissance" style="width: 100%; border-radius: 8px; margin-top: 1rem;">
                </div>
            </div>

            <div id="utilisateurs" class="tab-content">
                <h3 class="tab-title">Gestion des Utilisateurs</h3>
                <div class="admin-table-container">
                    <div class="admin-controls">
                        <input type="search" placeholder="Rechercher par nom ou email...">
                        <div class="filter-buttons">
                            <button class="filter-btn active">Tous</button>
                            <button class="filter-btn">Mentors</button>
                            <button class="filter-btn">Étudiants</button>
                        </div>
                    </div>
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Utilisateur</th>
                                <th>Rôle</th>
                                <th>Date d'inscription</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="user-info-cell"><img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=40" alt="Avatar"> Amina Kettani</div>
                                </td>
                                <td>Mentor</td>
                                <td>15/01/2023</td>
                                <td><button class="action-btn edit">Modifier</button><button class="action-btn suspend">Suspendre</button></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="user-info-cell"><img src="https://images.unsplash.com/photo-1522071820081-009f0129c7da?auto=format&fit=crop&w=40" alt="Avatar"> Karim A.</div>
                                </td>
                                <td>Étudiant</td>
                                <td>03/09/2023</td>
                                <td><button class="action-btn edit">Modifier</button><button class="action-btn suspend">Suspendre</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="contenu" class="tab-content">
                <h3 class="tab-title">Contenu signalé</h3>
                <div class="session-list">
                    <div class="session-request-card reported">
                        <div class="request-details">
                            <p><strong>Session "Aide en Physique"</strong> signalée par Karim A.</p>
                            <small>Motif : Le mentor n'était pas présent.</small>
                        </div>
                        <div class="request-actions">
                            <button class="btn-accept"><i class="fas fa-check"></i> Marquer comme résolu</button>
                            <button class="btn-decline"><i class="fas fa-gavel"></i> Sanctionner</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="badges" class="tab-content">
                <h3 class="tab-title">Gestion des Badges</h3>
                <div class="badge-management-grid">
                    <div class="badge-creation-form">
                        <h4>Créer un nouveau Badge</h4>
                        <div class="form-group">
                            <label for="badge-name">Nom du Badge</label>
                            <input type="text" id="badge-name" placeholder="Ex: Expert en Mathématiques">
                        </div>
                        <div class="form-group">
                            <label for="badge-icon">Icône (Font Awesome)</label>
                            <input type="text" id="badge-icon" placeholder="Ex: fas fa-calculator">
                        </div>
                        <div class="form-group">
                            <label for="badge-desc">Description</label>
                            <textarea id="badge-desc" rows="3" placeholder="Décrivez la condition d'obtention..."></textarea>
                        </div>
                        <button class="btn-create">Créer le Badge</button>
                    </div>
                    <div class="badge-list">
                        <h4>Badges Existants</h4>
                        <div class="badge-item-card">
                            <i class="fas fa-rocket badge-icon-large"></i>
                            <div>
                                <h5>Top Mentor</h5>
                                <p>Plus de 100 sessions complétées.</p>
                            </div>
                            <button class="action-btn edit small">Modifier</button>
                        </div>
                        <div class="badge-item-card">
                            <i class="fas fa-bolt badge-icon-large"></i>
                            <div>
                                <h5>Réponse Rapide</h5>
                                <p>Répond aux messages en moins de 2h.</p>
                            </div>
                            <button class="action-btn edit small">Modifier</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            AOS.init({ duration: 800, once: true, offset: 50 });

            const tabs = document.querySelectorAll('.dashboard-tab');
            const tabContents = document.querySelectorAll('.tab-content');

            tabs.forEach(tab => {
                tab.addEventListener('click', e => {
                    e.preventDefault();
                    tabs.forEach(t => t.classList.remove('active'));
                    tabContents.forEach(tc => tc.classList.remove('active'));

                    tab.classList.add('active');
                    const activeTab = document.getElementById(tab.dataset.tab);
                    if (activeTab) activeTab.classList.add('active');
                });
            });

            const profileDropdown = document.querySelector('.profile-dropdown');
            if (profileDropdown) {
                const trigger = profileDropdown.querySelector('.profile-menu-trigger');
                const menu = profileDropdown.querySelector('.dropdown-menu');
                trigger.addEventListener('click', e => {
                    e.stopPropagation();
                    menu.classList.toggle('show');
                    trigger.classList.toggle('active');
                });
                window.addEventListener('click', e => {
                    if (!profileDropdown.contains(e.target)) {
                        menu.classList.remove('show');
                        trigger.classList.remove('active');
                    }
                });
            }

            const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
            const nav = document.querySelector('nav');
            mobileMenuToggle?.addEventListener('click', () => {
                nav.classList.toggle('nav-active');
            });

            document.body.classList.add('logged-in');
        });
    </script>
</body>

</html>
