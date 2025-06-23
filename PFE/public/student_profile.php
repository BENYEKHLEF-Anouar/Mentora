<?php
require '../config/config.php';
require '../config/helpers.php';

// --- DATA FETCHING ---
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: students.php");
    exit();
}
$studentId = (int)$_GET['id'];

// Main student data
$stmt = $pdo->prepare("
    SELECT u.idUtilisateur, u.prenomUtilisateur, u.nomUtilisateur, u.ville, u.photoUrl, e.idEtudiant, e.niveau, e.sujetRecherche
    FROM Etudiant e 
    JOIN Utilisateur u ON e.idUtilisateur = u.idUtilisateur
    WHERE e.idEtudiant = :student_id");
$stmt->execute([':student_id' => $studentId]);
$student = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$student) { header("Location: students.php"); exit(); }

// --- NEW: Fetch all student's sessions for the calendar ---
$stmtCalendarSessions = $pdo->prepare("
    SELECT s.titreSession, s.dateSession, s.idSession
    FROM Participation p
    JOIN Session s ON p.idSession = s.idSession
    WHERE p.idEtudiant = :student_id AND s.statutSession IN ('validee', 'terminee')
    ORDER BY s.dateSession, s.heureSession
");
$stmtCalendarSessions->execute([':student_id' => $studentId]);
$calendar_sessions_raw = $stmtCalendarSessions->fetchAll(PDO::FETCH_ASSOC);

// Group sessions by date for easy use in JavaScript
$sessions_for_calendar = [];
foreach ($calendar_sessions_raw as $session) {
    $sessions_for_calendar[$session['dateSession']][] = [
        'title' => $session['titreSession'],
        'id' => $session['idSession']
    ];
}

// --- NEW: Fetch badges earned by the student ---
$stmtBadges = $pdo->prepare("
    SELECT b.nomBadge, b.descriptionBadge FROM Attribution a
    JOIN Badge b ON a.idBadge = b.idBadge
    WHERE a.idUtilisateur = :user_id
    ORDER BY a.dateAttribution DESC LIMIT 6
");
$stmtBadges->execute([':user_id' => $student['idUtilisateur']]);
$badges = $stmtBadges->fetchAll(PDO::FETCH_ASSOC);

// Fetch latest reviews written BY the student
$stmtMyReviews = $pdo->prepare("
    SELECT p.notation, p.commentaire, s.titreSession, u_mentor.prenomUtilisateur AS mentor_prenom
    FROM Participation p
    JOIN Session s ON p.idSession = s.idSession
    JOIN Mentor m ON s.idMentorAnimateur = m.idMentor
    JOIN Utilisateur u_mentor ON m.idUtilisateur = u_mentor.idUtilisateur
    WHERE p.idEtudiant = :student_id AND p.commentaire IS NOT NULL AND p.commentaire != ''
    ORDER BY s.dateSession DESC
    LIMIT 4
");
$stmtMyReviews->execute([':student_id' => $studentId]);
$my_reviews = $stmtMyReviews->fetchAll(PDO::FETCH_ASSOC);


require_once '../includes/header.php';
?>
<link rel="stylesheet" href="../assets/css/profile.css?v=<?php echo time(); ?>">

<main class="profile-page-main">
    <div class="container">
       <div class="profile-container">

            <!-- Main Content (Left Column) -->
            <div class="profile-main-content">
                <div class="profile-header-card">
                    <img src="<?= get_profile_image_path($student['photoUrl']) ?>" alt="Photo de <?= htmlspecialchars($student['prenomUtilisateur']) ?>" class="profile-header-avatar">
                    <div class="profile-header-info">
                        <h1><?= htmlspecialchars($student['prenomUtilisateur'] . ' ' . $student['nomUtilisateur']) ?></h1>
                        <div class="profile-header-meta">
                             <?php if (!empty($student['ville'])): ?>
                                <div class="location"><i class="fas fa-map-marker-alt"></i> <?= htmlspecialchars($student['ville']) ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="content-card">
                    <h2>Objectifs d'apprentissage</h2>
                    <p>Cet étudiant cherche à développer ses compétences et connaissances dans les domaines suivants :</p>
                    <div class="tags-list">
                        <?php foreach (explode(',', $student['sujetRecherche']) as $sujet): ?>
                            <span class="tag"><?= htmlspecialchars(trim($sujet)) ?></span>
                        <?php endforeach; ?>
                    </div>
                    <br>
                    <span class="tag" style="background-color: var(--slate-100); color: var(--slate-600);">Niveau actuel: <?= htmlspecialchars($student['niveau']) ?></span>
                </div>
                
                <?php if (!empty($my_reviews)): ?>
                <div class="content-card">
                    <h2>Mes derniers avis</h2>
                    <div class="reviews-list">
                        <?php foreach($my_reviews as $review): ?>
                        <div class="review-card">
                             <div class="review-header">
                                <div class="review-rating">
                                    <?php for($i = 1; $i <= 5; $i++): ?>
                                        <i class="fas fa-star <?= ($i <= $review['notation']) ? 'filled' : '' ?>"></i>
                                    <?php endfor; ?>
                                </div>
                                <span class="review-author">pour <strong><?= htmlspecialchars($review['mentor_prenom']) ?></strong></span>
                            </div>
                            <div class="review-body">
                                <p>"<?= htmlspecialchars($review['commentaire']) ?>"</p>
                                <small>Pour la session : <?= htmlspecialchars($review['titreSession']) ?></small>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>

            </div>

            <!-- Sidebar (Right Column) -->
            <aside class="profile-sidebar">
                <div class="sidebar-card">
                     <a href="#" class="btn btn-primary"><i class="fas fa-hands-helping"></i>  Proposer mon aide</a>
                </div>

                <?php if (!empty($sessions_for_calendar)): ?>
                <div class="sidebar-card" id="student-calendar-widget">
                    <h2>Mon activité</h2>
                    <div id="student-calendar">
                        <div class="calendar-header">
                            <button id="prev-month-btn" aria-label="Mois précédent"><i class="fas fa-chevron-left"></i></button>
                            <h3 id="month-year-header"></h3>
                            <button id="next-month-btn" aria-label="Mois suivant"><i class="fas fa-chevron-right"></i></button>
                        </div>
                        <div class="calendar-grid">
                           <div class="day-name">Lun</div> <div class="day-name">Mar</div> <div class="day-name">Mer</div> <div class="day-name">Jeu</div> <div class="day-name">Ven</div> <div class="day-name">Sam</div> <div class="day-name">Dim</div>
                        </div>
                        <div class="calendar-grid" id="calendar-days-grid"></div>
                    </div>
                     <div id="session-popover" class="availability-popover">
                        <div id="popover-header" class="popover-header"></div>
                        <div id="popover-sessions" class="popover-slots"></div>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($badges)): ?>
                <div class="sidebar-card">
                    <h2>Badges & Récompenses</h2>
                    <div class="badges-list-sidebar">
                        <?php foreach ($badges as $badge): ?>
                            <div class="badge-item" data-tooltip="<?= htmlspecialchars($badge['descriptionBadge']) ?>">
                                <div class="badge-icon"><i class="fas fa-medal"></i></div>
                                <div class="badge-info"><span><?= htmlspecialchars($badge['nomBadge']) ?></span></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>
            </aside>

        </div>
    </div>
</main>

<script>
// Student Activity Calendar Script
document.addEventListener('DOMContentLoaded', function() {
    // Data passed from PHP
    const sessionData = <?= json_encode($sessions_for_calendar ?? []); ?>;
    const calendarWidget = document.getElementById('student-calendar-widget');
    if (!calendarWidget) return;

    // DOM Elements
    const monthYearHeader = document.getElementById('month-year-header');
    const daysGrid = document.getElementById('calendar-days-grid');
    const prevMonthBtn = document.getElementById('prev-month-btn');
    const nextMonthBtn = document.getElementById('next-month-btn');
    const popover = document.getElementById('session-popover');
    const popoverHeader = document.getElementById('popover-header');
    const popoverSessions = document.getElementById('popover-sessions');
    
    let currentDate = new Date();
    let selectedDayElement = null;

    function renderStudentCalendar() {
        popover.classList.remove('show');
        selectedDayElement?.classList.remove('selected');
        selectedDayElement = null;

        const year = currentDate.getFullYear();
        const month = currentDate.getMonth();
        monthYearHeader.textContent = new Date(year, month).toLocaleDateString('fr-FR', { month: 'long', year: 'numeric' });
        daysGrid.innerHTML = '';

        const firstDayOfMonth = new Date(year, month, 1);
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        let startingDay = firstDayOfMonth.getDay();
        if (startingDay === 0) startingDay = 6; else startingDay -= 1; // Adjust to make Monday the first day (0)

        for (let i = 0; i < startingDay; i++) { daysGrid.appendChild(document.createElement('div')); }

        for (let day = 1; day <= daysInMonth; day++) {
            const dayEl = document.createElement('div');
            dayEl.classList.add('calendar-day');
            dayEl.textContent = day;
            const today = new Date();
            if (day === today.getDate() && month === today.getMonth() && year === today.getFullYear()) {
                dayEl.classList.add('today');
            }

            // Check if this date has a session using YYYY-MM-DD format
            const dateString = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
            if (sessionData[dateString]) {
                dayEl.classList.add('has-session');
                dayEl.dataset.date = new Date(year, month, day).toLocaleDateString('fr-FR', { weekday: 'long', day: 'numeric', month: 'long' });
                dayEl.dataset.sessions = JSON.stringify(sessionData[dateString]);
                dayEl.addEventListener('click', handleSessionDayClick);
            }
            daysGrid.appendChild(dayEl);
        }
    }

    function handleSessionDayClick(event) {
        const target = event.currentTarget;
        if (selectedDayElement) { selectedDayElement.classList.remove('selected'); }
        if (selectedDayElement === target) {
            popover.classList.remove('show');
            selectedDayElement = null;
            return;
        }
        target.classList.add('selected');
        selectedDayElement = target;
        const sessions = JSON.parse(target.dataset.sessions);
        popoverHeader.textContent = target.dataset.date;
        popoverSessions.innerHTML = '';
        sessions.forEach(session => {
            const sessionEl = document.createElement('a');
            sessionEl.href = `session_details.php?id=${session.id}`;
            sessionEl.classList.add('popover-session-item'); // New class for styling
            sessionEl.textContent = session.title;
            popoverSessions.appendChild(sessionEl);
        });
        popover.classList.add('show');
        positionPopover(target);
    }
    
    function positionPopover(target) {
        const widgetRect = calendarWidget.getBoundingClientRect();
        const dayRect = target.getBoundingClientRect();
        popover.style.top = `${dayRect.bottom - widgetRect.top + 5}px`;
        let leftPosition = (dayRect.left - widgetRect.left + dayRect.width / 2) - popover.offsetWidth / 2;
        if (leftPosition < 0) leftPosition = 0;
        if (leftPosition + popover.offsetWidth > calendarWidget.offsetWidth) {
            leftPosition = calendarWidget.offsetWidth - popover.offsetWidth;
        }
        popover.style.left = `${leftPosition}px`;
    }

    prevMonthBtn.addEventListener('click', () => { currentDate.setMonth(currentDate.getMonth() - 1); renderStudentCalendar(); });
    nextMonthBtn.addEventListener('click', () => { currentDate.setMonth(currentDate.getMonth() + 1); renderStudentCalendar(); });

    document.addEventListener('click', (event) => {
        if (!calendarWidget.contains(event.target)) {
            popover.classList.remove('show');
            if (selectedDayElement) { selectedDayElement.classList.remove('selected'); selectedDayElement = null; }
        }
    });

    renderStudentCalendar();
});
</script>

<?php require_once '../includes/footer.php'; ?>