<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mentora - Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="../assets/css/login.css?v=<?php echo time(); ?>">
</head>

<body>
    <!-- Animated Background Icons -->
    <!-- <div class="bg-icons">
        <div class="floating-icon icon-star-1">
            <svg width="40" height="40" viewBox="0 0 24 24" fill="#2563eb">
                <path
                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
            </svg>
        </div>
        <div class="floating-icon icon-bulb-1">
            <svg width="40" height="40" viewBox="0 0 24 24" fill="#2563eb">
                <path
                    d="M9 21c0 .5.4 1 1 1h4c.6 0 1-.5 1-1v-1H9v1zm3-19C8.1 2 5 5.1 5 9c0 2.4 1.2 4.5 3 5.7V17c0 .5.4 1 1 1h6c.6 0 1-.5 1-1v-2.3c1.8-1.3 3-3.4 3-5.7 0-3.9-3.1-7-7-7z" />
            </svg>
        </div>
        <div class="floating-icon icon-rocket-1">
            <svg width="55" height="55" viewBox="0 0 24 24" fill="#2563eb">
                <path d="M12 2L13.5 8.5L20 7L14 12L20 17L13.5 15.5L12 22L10.5 15.5L4 17L10 12L4 7L10.5 8.5L12 2Z" />
            </svg>
        </div>
        <div class="floating-icon icon-grad-1">
            <svg width="45" height="45" viewBox="0 0 24 24" fill="#2563eb">
                <path
                    d="M12 3L1 9l4 2.18v6L12 21l7-3.82v-6L23 9l-11-6zM18.82 9L12 12.72L5.18 9L12 5.28L18.82 9zM17 15.99L12 18.72L7 15.99v-4.27L12 14.72l5-2.73v4.27z" />
            </svg>
        </div>
        <div class="floating-icon icon-star-2">
            <svg width="40" height="40" viewBox="0 0 24 24" fill="#2563eb">
                <path
                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
            </svg>
        </div>
        <div class="floating-icon icon-bulb-2">
            <svg width="35" height="35" viewBox="0 0 24 24" fill="#2563eb">
                <path
                    d="M9 21c0 .5.4 1 1 1h4c.6 0 1-.5 1-1v-1H9v1zm3-19C8.1 2 5 5.1 5 9c0 2.4 1.2 4.5 3 5.7V17c0 .5.4 1 1 1h6c.6 0 1-.5 1-1v-2.3c1.8-1.3 3-3.4 3-5.7 0-3.9-3.1-7-7-7z" />
            </svg>
        </div>
    </div> -->

    <!-- Fixed Large Student Image -->
    <!-- <div class="fixed-student-image">
        <img src="assets/images/4454-removebg-preview.png" class="student-image" data-aos="fade-up"
            data-aos-duration="1600" alt="College Student Sketch" />
    </div> -->

    <!-- Fixed Large Student Image
    <div class="fixed-student-image2">
        <img src="assets/images/4101-removebg-preview.png" class="student-image" data-aos="fade-up"
            data-aos-duration="1600" alt="College Student Sketch" />
    </div> -->

    <!-- Header with Logo and Social Icons -->
    <div class="header">
        <div class="logo-container">
            <div class="logo-icon"></div>
            <span class="logo-text">Mentora.</span>
        </div>

        <div class="social-icons">
            <a href="#" class="social-icon instagram" aria-label="Instagram">
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path
                        d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                </svg>
            </a>
            <a href="#" class="social-icon telegram" aria-label="Telegram">
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path
                        d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z" />
                </svg>
            </a>
        </div>
    </div>

    <div class="main-content">
        <div class="container" data-aos="fade-down" data-aos-duration="1600">
            <div class="title_container">
                <h2 class="title">Connexion</h2>
                <span class="subtitle">Entrez vos identifiants pour accéder à votre compte.</span>
            </div>

            <form action="login.php" method="post">
                <div class="input-group">
                    <label class="input-label">Email :</label>
                    <div class="relative">
                        <input type="email" placeholder="nom@gmail.com" required />
                        <div>
                            <svg class="left-icon" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                </path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="input-group">
                    <label class="input-label">Mot de passe :</label>
                    <div class="relative">
                        <input type="password" id="passwordInput" placeholder="• • • • • • • •" required />
                        <div>
                            <svg class="left-icon" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <path d="M2 18v3c0 .6.4 1 1 1h4v-3h3v-3h2l1.4-1.4a6.5 6.5 0 1 0-4-4Z"></path>
                                <circle cx="16.5" cy="7.5" r=".5"></circle>
                            </svg>
                        </div>
                        <!-- Eye Toggle Icon -->
                        <svg class="eye-toggle" id="eyeToggle" xmlns="http://www.w3.org/2000/svg" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            viewBox="0 0 24 24">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </div>
                </div>

                <button class="btn">
                    <svg height="24" width="24" fill="#FFFFFF" viewBox="0 0 24 24" data-name="Layer 1" id="Layer_1"
                        class="sparkle">
                        <path
                            d="M10,21.236,6.755,14.745.264,11.5,6.755,8.255,10,1.764l3.245,6.491L19.736,11.5l-6.491,3.245ZM18,21l1.5,3L21,21l3-1.5L21,18l-1.5-3L18,18l-3,1.5ZM19.333,4.667,20.5,7l1.167-2.333L24,3.5,21.667,2.333,20.5,0,19.333,2.333,17,3.5Z">
                        </path>
                    </svg>
                    <span class="text">Se connecter</span>
                </button>
            </form>

            <div class="separator">
                <hr class="line" /><span>Ou</span>
                <hr class="line" />
            </div>

            <p class="switch-form">
                Pas de compte ? <a href="register.php">Inscrivez-vous ici</a>.
            </p>
        </div>
    </div>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();

        // Password eye toggle functionality
        const passwordInput = document.getElementById('passwordInput');
        const eyeToggle = document.getElementById('eyeToggle');

        eyeToggle.addEventListener('click', function () {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                // Change to eye-off icon
                eyeToggle.innerHTML = `
                    <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
                    <line x1="1" y1="1" x2="23" y2="23"></line>
                `;
            } else {
                passwordInput.type = 'password';
                // Change back to eye icon
                eyeToggle.innerHTML = `
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                    <circle cx="12" cy="12" r="3"></circle>
                `;
            }
        });
    </script>
</body>

</html>