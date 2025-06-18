<?php
// Start the session on every page. Must be the very first thing.
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
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
    <!-- Make sure this path is correct from where your pages are located -->
    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="icon" href="../assets/images/White_Tower_Symbol.webp" type="image/x-icon">
</head>

<body>
    <!-- Header -->
    <header>
        <div class="container nav-container">
            <!-- The logo now points to the main index page -->
            <a href="index.php" class="logo">
                <img src="../assets/images/White_Tower_Symbol.webp" alt="Mentora Logo">
                <span class="logo-text">Mentora</span>
            </a>
            <nav>
                <ul class="nav-links">
                    <li><a href="index.php#home" class="active"><i class="fas fa-home"></i> Accueil</a></li>
                    <!-- <li><a href="index.php#features"><i class="fas fa-star"></i> Fonctionnalités</a></li> -->
                    <li><a href="index.php#profiles"><i class="fas fa-users"></i> Mentors</a></li>
                    <li><a href="index.php#etudiants"><i class="fas fa-user-graduate"></i> Étudiants</a></li>
                    <li><a href="index.php#missions"><i class="fas fa-tasks"></i> Sessions</a></li>
                </ul>
            </nav>
            <div class="nav-right">

                <?php if (isset($_SESSION['user'])): ?>
                <!-- LOGGED-IN STATE -->
                <div class="profile-dropdown">
                    <button class="profile-menu-trigger">
                        <img src="../assets/images/default avatar.png" class="nav-profile-img" alt="User Avatar">
                        <!-- Display User's First Name and Last Initial -->
                        <span><?= htmlspecialchars($_SESSION['user']['prenom']) ?> <?= htmlspecialchars(substr($_SESSION['user']['nom'], 0, 1)) ?>.</span>
                        <i class="fas fa-chevron-down dropdown-arrow"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <?php
                            // Dynamic link to the correct dashboard based on user role
                            $dashboard_link = 'profileStudent.php'; // Default for student
                            if ($_SESSION['user']['role'] === 'mentor') {
                                $dashboard_link = 'profileMentor.php';
                            }
                        ?>
                        <li><a href="<?= $dashboard_link ?>"><i class="fas fa-tachometer-alt"></i> Mon Espace</a></li>
                        <li><a href="edit-profile.php"><i class="fas fa-user-cog"></i> Modifier Profil</a></li>
                        <li><a href="messages.php"><i class="fas fa-envelope"></i> Messagerie</a></li>
                        <li class="dropdown-separator"></li>
                        <!-- Link to a logout script -->
                        <li><a href="logout.php" class="logout-link"><i class="fas fa-sign-out-alt"></i> Déconnexion</a></li>
                    </ul>
                </div>

                <?php else: ?>
                <!-- LOGGED-OUT STATE -->
                <a href="login.php" class="login-btn">Login</a>
                <a href="register.php" class="register-btn">
                    <svg height="24" width="24" fill="#FFFFFF" viewBox="0 0 24 24" data-name="Layer 1" id="Layer_1" class="sparkle">
                        <path d="M10,21.236,6.755,14.745.264,11.5,6.755,8.255,10,1.764l3.245,6.491L19.736,11.5l-6.491,3.245ZM18,21l1.5,3L21,21l3-1.5L21,18l-1.5-3L18,18l-3,1.5ZM19.333,4.667,20.5,7l1.167-2.333L24,3.5,21.667,2.333,20.5,0,19.333,2.333,17,3.5Z"></path>
                    </svg>
                    <span class="text">Register</span>
                </a>
                <?php endif; ?>

            </div>
            <button class="mobile-menu-toggle"><i class="fas fa-bars"></i></button>
        </div>
    </header>