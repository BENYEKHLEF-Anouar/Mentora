<?php
require '../config/config.php';

// --- 1. AUTHENTICATION & SECURITY SETUP ---
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'mentor') {
    header('Location: login.php'); exit;
}
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$csrf_token = $_SESSION['csrf_token'];
$mentor_user_id = $_SESSION['user']['id'];

try {
    // --- 2. DATA FETCHING ---
    $stmt = $pdo->prepare("SELECT idMentor, competences FROM Mentor WHERE idUtilisateur = ?");
    $stmt->execute([$mentor_user_id]);
    $mentor_data = $stmt->fetch();
    if (!$mentor_data) { die("Error: Mentor profile not found."); }
    $mentor_id = $mentor_data['idMentor'];
    $_SESSION['user']['competences'] = $mentor_data['competences'];

    $stmt = $pdo->prepare("SELECT u.nomUtilisateur, u.prenomUtilisateur, u.photoUrl, COALESCE(AVG(p.notation), 0) AS average_rating, COUNT(DISTINCT p.idParticipation) AS review_count FROM Utilisateur u LEFT JOIN Mentor m ON u.idUtilisateur = m.idUtilisateur LEFT JOIN Session s ON m.idMentor = s.idMentorAnimateur LEFT JOIN Participation p ON s.idSession = p.idSession AND p.notation IS NOT NULL WHERE u.idUtilisateur = ? GROUP BY u.idUtilisateur");
    $stmt->execute([$mentor_user_id]);
    $mentor_info = $stmt->fetch();

    $badge_icons = ['Top Mentor' => 'fa-rocket', 'Expert en Mathématiques' => 'fa-calculator', 'Réponse Rapide' => 'fa-bolt', 'Vétéran' => 'fa-user-tie'];
    $stmt = $pdo->prepare("SELECT b.nomBadge, b.descriptionBadge FROM Badge b JOIN Attribution a ON b.idBadge = a.idBadge WHERE a.idUtilisateur = ? LIMIT 4");
    $stmt->execute([$mentor_user_id]);
    $badges = $stmt->fetchAll();

    $stmt = $pdo->prepare("SELECT COUNT(idSession) as sessions_this_month, COALESCE(SUM(tarifSession), 0) as revenue_this_month FROM Session WHERE idMentorAnimateur = ? AND statutSession = 'terminee' AND MONTH(dateSession) = MONTH(CURRENT_DATE()) AND YEAR(dateSession) = YEAR(CURRENT_DATE())");
    $stmt->execute([$mentor_id]);
    $stats_monthly = $stmt->fetch();
    $profile_views = 1280;

    $stmt = $pdo->prepare("SELECT YEAR(dateSession) AS year, MONTH(dateSession) AS month, COUNT(idSession) as count FROM Session WHERE idMentorAnimateur = ? AND statutSession = 'terminee' AND dateSession >= DATE_SUB(NOW(), INTERVAL 6 MONTH) GROUP BY year, month ORDER BY year, month ASC");
    $stmt->execute([$mentor_id]);
    $monthly_counts = $stmt->fetchAll(PDO::FETCH_GROUP | PDO::FETCH_KEY_PAIR);
    $chart_labels = []; $chart_values = [];
    $month_translations = ['January'=>'Janv','February'=>'Févr','March'=>'Mars','April'=>'Avr','May'=>'Mai','June'=>'Juin','July'=>'Juil','August'=>'Août','September'=>'Sept','October'=>'Oct','November'=>'Nov','December'=>'Déc'];
    for ($i = 5; $i >= 0; $i--) {
        $date = new DateTime("first day of -$i month");
        $chart_labels[] = $month_translations[$date->format('F')];
        $chart_values[] = $monthly_counts[$date->format('Y')][$date->format('n')][0] ?? 0;
    }

    $stmt = $pdo->prepare("SELECT s.idSession, s.titreSession, s.dateSession, s.heureSession, u.prenomUtilisateur, u.nomUtilisateur, u.photoUrl FROM Session s JOIN Etudiant e ON s.idEtudiantDemandeur = e.idEtudiant JOIN Utilisateur u ON e.idUtilisateur = u.idUtilisateur WHERE s.idMentorAnimateur = ? AND s.statutSession = 'en_attente' ORDER BY s.dateSession ASC");
    $stmt->execute([$mentor_id]);
    $session_requests_data = $stmt->fetchAll();

    $stmt = $pdo->prepare("SELECT m.contenuMessage, m.dateEnvoi, m.estLue, m.idExpediteur, u.idUtilisateur, u.prenomUtilisateur, u.nomUtilisateur, u.photoUrl FROM Message m JOIN (SELECT GREATEST(idExpediteur, idDestinataire) as u2, LEAST(idExpediteur, idDestinataire) as u1, MAX(idMessage) as max_id FROM Message WHERE ? IN (idExpediteur, idDestinataire) GROUP BY u1, u2) AS last_msg ON m.idMessage = last_msg.max_id JOIN Utilisateur u ON u.idUtilisateur = IF(m.idExpediteur = ?, m.idDestinataire, m.idExpediteur) ORDER BY m.dateEnvoi DESC");
    $stmt->execute([$mentor_user_id, $mentor_user_id]);
    $conversations_data = $stmt->fetchAll();

    $stmt = $pdo->prepare("SELECT p.notation, p.commentaire, s.titreSession, s.dateSession, u.prenomUtilisateur, u.nomUtilisateur, u.photoUrl FROM Participation p JOIN Session s ON p.idSession = s.idSession JOIN Etudiant e ON p.idEtudiant = e.idEtudiant JOIN Utilisateur u ON e.idUtilisateur = u.idUtilisateur WHERE s.idMentorAnimateur = ? AND p.commentaire IS NOT NULL ORDER BY s.dateSession DESC LIMIT 10");
    $stmt->execute([$mentor_id]);
    $evaluations_data = $stmt->fetchAll();

    $stmt = $pdo->prepare("SELECT jourSemaine, heureDebut, heureFin FROM Disponibilite WHERE idUtilisateur = ?");
    $stmt->execute([$mentor_user_id]);
    $availabilities = $stmt->fetchAll(PDO::FETCH_GROUP);
    $availability_map = [];
    foreach($availabilities as $day => $slots) { foreach($slots as $slot) { for ($h = (int)substr($slot['heureDebut'], 0, 2); $h < (int)substr($slot['heureFin'], 0, 2); $h++) { $availability_map[$day][sprintf('%02d:00', $h)] = true; } } }
    $days_of_week = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
    $time_slots = ['09:00', '10:00', '11:00', '14:00'];

    // Query updated to only include existing columns
    $stmt = $pdo->prepare("SELECT idRessource, titreRessource, cheminRessource, typeFichier FROM Ressource WHERE idUtilisateur = ? ORDER BY idRessource DESC");
    $stmt->execute([$mentor_user_id]);
    $resources_data = $stmt->fetchAll();

} catch (PDOException $e) {
    error_log("Dashboard Error: " . $e->getMessage());
    // For debugging, show the actual error message
    die("A database error occurred: " . $e->getMessage() . " (Error Code: " . $e->getCode() . ")");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Espace Mentor - Mentora</title>
    <?php require '../includes/header.php'; ?>
    <link rel="stylesheet" href="../assets/css/dashboard-mentor.css?v=<?= filemtime(__DIR__ . '/../assets/css/dashboard-mentor.css') ?>">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <main class="dashboard-container">
        <aside class="profile-sidebar">
            <!-- MODIFIED: Changed link text to "Retour" and class for styling -->
            <a href="javascript:history.back()" class="sidebar-back-link"><i class="fas fa-arrow-left"></i> Retour</a>
            <div class="profile-card">
                <div class="card-image-container"><img src="<?= get_profile_image_path($mentor_info['photoUrl']) ?>" alt="<?= sanitize($mentor_info['prenomUtilisateur']) ?>"></div>
                <div class="card-body">
                    <h3 class="profile-name"><?= sanitize($mentor_info['prenomUtilisateur'] . ' ' . $mentor_info['nomUtilisateur']) ?></h3>
                    <p class="profile-specialty"><?= sanitize($_SESSION['user']['competences']) ?></p>
                    <div class="profile-rating"><i class="fa-solid fa-star"></i><strong><?= number_format($mentor_info['average_rating'], 1) ?></strong><span>(<?= $mentor_info['review_count'] ?> avis)</span></div>
                    <div class="badge-showcase">
                        <h4>Mes Badges</h4>
                        <div class="badges-grid">
                            <?php if (empty($badges)): ?><p class="no-badges">Aucun badge.</p><?php else: foreach ($badges as $badge): ?>
                            <div class="badge" title="<?= sanitize($badge['descriptionBadge']) ?>"><i class="fas <?= sanitize($badge_icons[$badge['nomBadge']] ?? 'fa-medal') ?>"></i></div>
                            <?php endforeach; endif; ?>
                        </div>
                    </div>
                </div>
                <div class="card-footer"><a href="edit-profile.php" class="btn-edit-profile"><i class="fas fa-pencil-alt"></i> Modifier le profil</a></div>
            </div>
            <a href="publish-session.php" class="btn-primary-full-width"><i class="fas fa-plus"></i> Publier une session</a>
        </aside>
        <div class="dashboard-main-content">
            <nav class="dashboard-nav">
                <ul>
                    <li><a href="#statistiques" class="dashboard-tab" data-tab="statistiques"><i class="fas fa-chart-line"></i> Statistiques</a></li>
                    <li><a href="#sessions" class="dashboard-tab" data-tab="sessions"><i class="fas fa-tasks"></i> Sessions <?php if(count($session_requests_data) > 0): ?><span class="notification-badge"><?= count($session_requests_data) ?></span><?php endif; ?></a></li>
                    <li><a href="#messagerie" class="dashboard-tab" data-tab="messagerie"><i class="fas fa-envelope"></i> Messagerie</a></li>
                    <li><a href="#disponibilites" class="dashboard-tab" data-tab="disponibilites"><i class="fas fa-calendar-alt"></i> Disponibilités</a></li>
                    <li><a href="#ressources" class="dashboard-tab" data-tab="ressources"><i class="fas fa-book-open"></i> Ressources</a></li>
                    <li><a href="#evaluations" class="dashboard-tab" data-tab="evaluations"><i class="fas fa-star-half-alt"></i> Évaluations</a></li>
                </ul>
            </nav>
            <div id="statistiques" class="tab-content"><h3 class="tab-title">Vos Performances</h3><div class="stats-grid"><div class="stat-card"><i class="fas fa-users stat-icon"></i><span class="stat-value"><?= $stats_monthly['sessions_this_month'] ?></span><p class="stat-label">Sessions ce mois-ci</p></div><div class="stat-card"><i class="fas fa-wallet stat-icon"></i><span class="stat-value"><?= number_format($stats_monthly['revenue_this_month'], 0, ',', ' ') ?> MAD</span><p class="stat-label">Revenus (Mois)</p></div><div class="stat-card"><i class="fas fa-star stat-icon"></i><span class="stat-value"><?= number_format($mentor_info['average_rating'], 1) ?> / 5</span><p class="stat-label">Note moyenne</p></div><div class="stat-card"><i class="fas fa-eye stat-icon"></i><span class="stat-value"><?= number_format($profile_views, 0, ',', ' ') ?></span><p class="stat-label">Vues du profil</p></div></div><div class="chart-container"><h4 class="tab-subtitle">Évolution des sessions (6 derniers mois)</h4><canvas id="sessionsChart"></canvas></div></div>
            <div id="sessions" class="tab-content"></div>
            <div id="messagerie" class="tab-content"></div>
            <div id="disponibilites" class="tab-content"><h3 class="tab-title">Gérez vos Disponibilités</h3><div class="availability-card"><div class="availability-header"><h4><i class="far fa-calendar-check"></i> Cette Semaine : <?= date('d M', strtotime('monday this week')) ?> - <?= date('d M', strtotime('saturday this week')) ?></h4><p>Cliquez sur un créneau pour le marquer comme disponible.</p></div><form action="actions/update_availability.php" method="POST"><input type="hidden" name="csrf_token" value="<?= $csrf_token ?>"><div class="availability-grid"><div class="grid-header">Heure</div><?php foreach ($days_of_week as $day): ?><div class="grid-header"><?= sanitize($day) ?></div><?php endforeach; ?><?php foreach ($time_slots as $slot): ?><div class="time-label"><?= sanitize($slot) ?></div><?php foreach ($days_of_week as $day): ?><?php $day_db_format = strtolower(iconv('UTF-8', 'ASCII//TRANSLIT', $day)); $is_available = isset($availability_map[$day_db_format][$slot]); ?><div class="time-slot"><input type="checkbox" name="slots[<?= $day_db_format ?>][]" value="<?= $slot ?>" <?= $is_available ? 'checked' : '' ?> id="slot-<?= $day_db_format ?>-<?= str_replace(':', '', $slot) ?>"><label for="slot-<?= $day_db_format ?>-<?= str_replace(':', '', $slot) ?>"></label></div><?php endforeach; ?><?php endforeach; ?></div><div class="availability-actions"><button type="submit" class="btn-save-availability"><i class="fas fa-save"></i> Enregistrer les modifications</button></div></form></div></div>
            <div id="ressources" class="tab-content"></div>
            <div id="evaluations" class="tab-content"></div>
        </div>
    </main>
    <?php require '../includes/footer.php'; ?>
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const dashboardData = {
            sessionRequests: <?= json_encode($session_requests_data) ?>,
            conversations: <?= json_encode($conversations_data) ?>,
            evaluations: <?= json_encode($evaluations_data) ?>,
            resources: <?= json_encode($resources_data) ?>,
            csrfToken: <?= json_encode($csrf_token) ?>,
            chart: { labels: <?= json_encode($chart_labels) ?>, values: <?= json_encode($chart_values) ?> },
            mentorUserId: <?= json_encode($mentor_user_id) ?>
        };
        const sanitize = (str) => { if(!str) return ''; const t = document.createElement('div'); t.textContent = str; return t.innerHTML; };
        const getImgPath = (url) => (!url || url.startsWith('http')) ? (url || '../assets/images/default_avatar.png') : `../assets/uploads/${url}`;

        const renderers = {
            statistiques: (c) => {
                const canvas = c.querySelector('#sessionsChart');
                if (canvas && typeof Chart!=='undefined' && !Chart.getChart(canvas)) {
                    new Chart(canvas, { type:'bar', data: { labels: dashboardData.chart.labels, datasets: [{ label: 'Sessions', data: dashboardData.chart.values, backgroundColor: '#2563eb', borderRadius: 5, barPercentage: 0.5 }] }, options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } }, x: { grid: { display: false } } } } });
                }
            },
            sessions: (c) => {
                let html = `<div class="form-card"><h4 class="tab-title">Publier une nouvelle session</h4><form action="actions/publish_session.php" method="POST" class="publish-session-form"><input type="hidden" name="csrf_token" value="${dashboardData.csrfToken}"><div class="form-group"><label for="titreSession">Titre de la session</label><input type="text" name="titreSession" required></div><div class="form-group"><label for="dateSession">Date</label><input type="date" name="dateSession" required></div><div class="form-group"><label for="heureSession">Heure</label><input type="time" name="heureSession" required></div><button type="submit" class="btn-publish"><i class="fas fa-plus-circle"></i> Publier</button></form></div>`;
                html += `<div class="session-management"><h4 class="tab-subtitle">Demandes en attente</h4>`;
                if (dashboardData.sessionRequests.length === 0) { html += `<p>Aucune demande de session en attente.</p>`; }
                else { dashboardData.sessionRequests.forEach(req => { const date = new Date(req.dateSession).toLocaleDateString('fr-FR', { day:'2-digit', month:'long' }); html += `<div class="session-request-card" data-id="${req.idSession}"><img src="${getImgPath(req.photoUrl)}"><div class="request-details"><p><strong>${sanitize(req.prenomUtilisateur+' '+req.nomUtilisateur)}</strong> demande : <strong>"${sanitize(req.titreSession)}"</strong></p><small>Pour le ${date} à ${req.heureSession.substring(0,5)}</small></div><div class="request-actions"><button class="btn-accept" data-id="${req.idSession}"><i class="fas fa-check"></i></button><button class="btn-decline" data-id="${req.idSession}"><i class="fas fa-times"></i></button></div></div>`; }); }
                html += `</div>`;
                c.innerHTML = html;
            },
            messagerie: (c) => {
                let convosHTML = '';
                if(dashboardData.conversations.length === 0) { convosHTML = '<p style="padding: 1rem; text-align: center;">Aucune conversation.</p>'; }
                else { dashboardData.conversations.forEach(convo => { convosHTML += `<div class="conversation-item" data-id="${convo.idUtilisateur}"><div class="convo-avatar-wrapper"><img src="${getImgPath(convo.photoUrl)}">${(convo.estLue == 0 && convo.idExpediteur != dashboardData.mentorUserId) ? '<span class="unread-dot"></span>' : ''}</div><div class="convo-details"><span class="convo-name">${sanitize(convo.prenomUtilisateur+' '+convo.nomUtilisateur)}</span><p class="convo-preview">${sanitize(convo.contenuMessage.substring(0,30))}...</p></div><span class="convo-time">${new Date(convo.dateEnvoi).toLocaleTimeString('fr-FR', {hour:'2-digit', minute:'2-digit'})}</span></div>`; }); }
                c.innerHTML = `<div class="chat-container"><div class="conversation-list">${convosHTML}</div><div class="chat-window"><div class="chat-header"><h5>Sélectionnez une conversation</h5></div><div class="message-area"><p class="empty-chat" style="text-align:center; color: #94a3b8; margin: auto;">Vos messages apparaîtront ici.</p></div><div class="message-input"><textarea placeholder="Écrire un message..."></textarea><button class="btn-send"><i class="fas fa-paper-plane"></i></button></div></div></div>`;
            },
            // MODIFIED: This entire function is updated to match the new design.
            ressources: (c) => {
                let resHTML = '';
                if (dashboardData.resources.length === 0) {
                    resHTML = `<p style="text-align: center; color: var(--slate-400); padding: 2rem 0;">Aucune ressource pour le moment.</p>`;
                } else {
                    dashboardData.resources.forEach(res => {
                        const isVideo = (res.typeFichier && res.typeFichier.includes('video')) || (res.cheminRessource && (res.cheminRessource.includes('youtube.com') || res.cheminRessource.includes('youtu.be')));
                        const iconTypeClass = isVideo ? 'video' : 'pdf';
                        const iconFaClass = isVideo ? 'fa-video' : 'fa-file-pdf';
                        const description = isVideo ? 'Lien vers une vidéo explicative' : 'Document PDF';
                        // If you want to add descriptions later, you'll need to add the column to the database
                        // and update the query above to select it

                        resHTML += `<div class="resource-item" data-id="${res.idRessource}">
                            <i class="fas ${iconFaClass} ${iconTypeClass} resource-icon"></i>
                            <div class="resource-details">
                                <p class="resource-title">${sanitize(res.titreRessource)}</p>
                                <p class="resource-info">${sanitize(description)}</p>
                            </div>
                            <div class="resource-actions">
                                <a href="edit-resource.php?id=${res.idRessource}" class="action-btn edit" title="Modifier"><i class="fas fa-pencil-alt"></i></a>
                                <a href="actions/delete_resource.php?id=${res.idRessource}&csrf_token=${dashboardData.csrfToken}" class="action-btn delete" title="Supprimer" onclick="return confirm('Voulez-vous vraiment supprimer cette ressource ?');"><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </div>`;
                    });
                }
                c.innerHTML = `
                    <h3 class="tab-title">Mes Ressources Pédagogiques</h3>
                    <div class="form-card">
                        <h4>Ajouter une nouvelle ressource</h4>
                        <form action="actions/add_resource.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="csrf_token" value="${dashboardData.csrfToken}">
                            <div class="form-group">
                                <label for="titreRessource">Titre de la ressource</label>
                                <input type="text" id="titreRessource" name="titreRessource" placeholder="Ex: Exercices Corrigés de Calcul Différentiel" required>
                            </div>
                            <div class="form-group">
                                <label for="descriptionRessource">Description (optionnel)</label>
                                <textarea id="descriptionRessource" name="descriptionRessource" placeholder="Une brève description du contenu..."></textarea>
                            </div>
                            <div class="form-group">
                                 <label for="fileUpload" class="file-upload-label">
                                    <i class="fas fa-cloud-upload-alt"></i>&nbsp; 
                                    <span>Choisir un fichier ou glisser-déposer</span>
                                </label>
                                <input type="file" id="fileUpload" name="fileUpload" hidden>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn-add-resource"><i class="fa-solid fa-plus"></i>&nbsp; Ajouter la ressource</button>
                            </div>
                        </form>
                    </div>
                    <div class="resource-list">
                        <h4>Ressources existantes</h4>
                        ${resHTML}
                    </div>`;
            },
            evaluations: (c) => {
                 let html = `<h3 class="tab-title">Évaluations de vos sessions</h3>`;
                 if(dashboardData.evaluations.length === 0) { html += `<p>Vous n'avez encore reçu aucune évaluation.</p>`; }
                 else { dashboardData.evaluations.forEach(eval => { let stars = ''; for(let i=0; i<5; i++) stars += `<i class="fa${i < eval.notation ? 's' : 'r'} fa-star"></i>`; html += `<div class="evaluation-card"><div class="evaluation-header"><div class="eval-author"><img src="${getImgPath(eval.photoUrl)}"><span>${sanitize(eval.prenomUtilisateur + ' ' + eval.nomUtilisateur)}</span></div><div class="eval-rating">${stars}</div></div><p class="evaluation-comment">"${sanitize(eval.commentaire)}"</p><small class="evaluation-date">Pour la session "${sanitize(eval.titreSession)}" du ${new Date(eval.dateSession).toLocaleDate-String('fr-FR')}</small></div>`; }); }
                 c.innerHTML = html;
            },
            disponibilites: (c) => { /* Static content, do nothing */ }
        };

        const tabs = document.querySelectorAll('.dashboard-tab');
        const activateTab = (tabLink) => {
            if (!tabLink) return;
            const tabName = tabLink.dataset.tab;
            tabs.forEach(t => t.classList.remove('active'));
            document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
            tabLink.classList.add('active');
            const activePanel = document.getElementById(tabName);
            if(activePanel) activePanel.classList.add('active');
            if(renderers[tabName]) renderers[tabName](activePanel);
            if (window.location.hash !== `#${tabName}`) { history.pushState(null, null, `#${tabName}`); }
        };
        tabs.forEach(tab => tab.addEventListener('click', e => { e.preventDefault(); activateTab(e.currentTarget); }));
        const initialTab = document.querySelector(`.dashboard-tab[data-tab="${window.location.hash.substring(1)}"]`) || tabs[0];
        activateTab(initialTab);
    });
    </script>
</body>
</html>