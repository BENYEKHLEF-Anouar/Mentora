-- Drop and create the database to ensure a clean slate
DROP DATABASE IF EXISTS mentora;
CREATE DATABASE mentora;
USE mentora;

-- ======================================
-- Création des tables principales
-- ======================================

-- Table Utilisateur
CREATE TABLE Utilisateur (
    idUtilisateur INT AUTO_INCREMENT PRIMARY KEY,
    nomUtilisateur VARCHAR(50) NOT NULL,
    prenomUtilisateur VARCHAR(50) NOT NULL,
    emailUtilisateur VARCHAR(200) NOT NULL UNIQUE,
    motDePasse VARCHAR(255) NOT NULL,
    role ENUM('etudiant', 'mentor') NOT NULL,
    ville VARCHAR(100) NULL,
    photoUrl VARCHAR(255) DEFAULT 'default_avatar.png',
    INDEX idx_email (emailUtilisateur)
);

-- Table Etudiant
CREATE TABLE Etudiant (
    idEtudiant INT AUTO_INCREMENT PRIMARY KEY,
    niveau VARCHAR(50) NULL DEFAULT 'Non spécifié',
    idUtilisateur INT NOT NULL UNIQUE,
    FOREIGN KEY (idUtilisateur) REFERENCES Utilisateur(idUtilisateur)
        ON DELETE CASCADE ON UPDATE CASCADE
);

-- Table Mentor
CREATE TABLE Mentor (
    idMentor INT AUTO_INCREMENT PRIMARY KEY,
    competences TEXT NULL,
    idUtilisateur INT NOT NULL UNIQUE,
    FOREIGN KEY (idUtilisateur) REFERENCES Utilisateur(idUtilisateur)
        ON DELETE CASCADE ON UPDATE CASCADE
);

-- (The rest of your tables: Disponibilite, Administrateur, Session, etc. remain unchanged)
-- Table Disponibilite
CREATE TABLE Disponibilite (
    idDisponibilite INT AUTO_INCREMENT PRIMARY KEY,
    jourSemaine ENUM('lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche') NOT NULL,
    heureDebut TIME NOT NULL,
    heureFin TIME NOT NULL,
    idUtilisateur INT NOT NULL,
    FOREIGN KEY (idUtilisateur) REFERENCES Utilisateur(idUtilisateur)
        ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE INDEX idx_dispo_user_day ON Disponibilite(idUtilisateur, jourSemaine);

-- Table Administrateur
CREATE TABLE Administrateur (
    idAdministrateur INT AUTO_INCREMENT PRIMARY KEY,
    nomAdministrateur VARCHAR(50) NOT NULL,
    prenomAdministrateur VARCHAR(50) NOT NULL,
    emailAdministrateur VARCHAR(200) UNIQUE NOT NULL,
    motDePasse VARCHAR(255) NOT NULL
);

-- Table Session
CREATE TABLE Session (
    idSession INT AUTO_INCREMENT PRIMARY KEY,
    titreSession VARCHAR(150) NOT NULL,
    sujet VARCHAR(100),
    dateSession DATE NOT NULL,
    heureSession TIME NOT NULL,
    statutSession ENUM('en_attente', 'validee', 'annulee', 'terminee') NOT NULL,
    lienReunion VARCHAR(255),
    typeSession ENUM('en_ligne', 'presentiel') NOT NULL DEFAULT 'en_ligne',
    tarifSession DECIMAL(10, 2) DEFAULT 0.00,
    duree_minutes INT,
    niveau VARCHAR(50),
    idEtudiantDemandeur INT NULL,
    idMentorAnimateur INT NULL,
    FOREIGN KEY (idEtudiantDemandeur) REFERENCES Etudiant(idEtudiant) ON DELETE SET NULL,
    FOREIGN KEY (idMentorAnimateur) REFERENCES Mentor(idMentor) ON DELETE SET NULL,
    INDEX idx_date_session (dateSession)
);

-- Table Participation
CREATE TABLE Participation (
    idParticipation INT AUTO_INCREMENT PRIMARY KEY,
    idEtudiant INT NOT NULL,
    idSession INT NOT NULL,
    notation INT CHECK (notation BETWEEN 1 AND 5),
    commentaire TEXT,
    FOREIGN KEY (idEtudiant) REFERENCES Etudiant(idEtudiant)
        ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (idSession) REFERENCES Session(idSession)
        ON DELETE CASCADE ON UPDATE CASCADE
);

-- Table Animation
CREATE TABLE Animation (
    idMentor INT NOT NULL,
    idSession INT NOT NULL,
    remarque TEXT,
    PRIMARY KEY (idMentor, idSession),
    FOREIGN KEY (idMentor) REFERENCES Mentor(idMentor)
        ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (idSession) REFERENCES Session(idSession)
        ON DELETE CASCADE ON UPDATE CASCADE
);

-- Table Message
CREATE TABLE Message (
    idMessage INT AUTO_INCREMENT PRIMARY KEY,
    idExpediteur INT NOT NULL,
    idDestinataire INT NOT NULL,
    contenuMessage TEXT NOT NULL,
    dateEnvoi TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    estLue BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (idExpediteur) REFERENCES Utilisateur(idUtilisateur)
        ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (idDestinataire) REFERENCES Utilisateur(idUtilisateur)
        ON DELETE CASCADE ON UPDATE CASCADE
);

-- Table Badge
CREATE TABLE Badge (
    idBadge INT AUTO_INCREMENT PRIMARY KEY,
    nomBadge VARCHAR(100) NOT NULL,
    descriptionBadge TEXT NOT NULL
);

-- Table Attribution
CREATE TABLE Attribution (
    idAttribution INT AUTO_INCREMENT PRIMARY KEY,
    idBadge INT NOT NULL,
    idUtilisateur INT NOT NULL,
    dateAttribution DATE NOT NULL,
    FOREIGN KEY (idBadge) REFERENCES Badge(idBadge)
        ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (idUtilisateur) REFERENCES Utilisateur(idUtilisateur)
        ON DELETE CASCADE ON UPDATE CASCADE
);

-- Table Ressource
CREATE TABLE Ressource (
    idRessource INT AUTO_INCREMENT PRIMARY KEY,
    titreRessource VARCHAR(100) NOT NULL,
    cheminRessource VARCHAR(255) NOT NULL,
    typeFichier ENUM('pdf', 'docx', 'pptx', 'video', 'audio', 'image') NOT NULL,
    idUtilisateur INT NOT NULL,
    FOREIGN KEY (idUtilisateur) REFERENCES Utilisateur(idUtilisateur)
        ON DELETE CASCADE ON UPDATE CASCADE
);

-- Table Notification
CREATE TABLE Notification (
    idNotification INT AUTO_INCREMENT PRIMARY KEY,
    idUtilisateur INT NOT NULL,
    typeNotification ENUM('session', 'message', 'badge') NOT NULL,
    contenuNotification VARCHAR(200) NOT NULL,
    estParcourue BOOLEAN DEFAULT FALSE,
    dateNotification TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (idUtilisateur) REFERENCES Utilisateur(idUtilisateur)
        ON DELETE CASCADE ON UPDATE CASCADE
);

-- ======================================
-- Données de test / initiales
-- ======================================

-- Utilisateurs
INSERT INTO Utilisateur (idUtilisateur, nomUtilisateur, prenomUtilisateur, emailUtilisateur, motDePasse, role, ville, photoUrl) VALUES
(1, 'Kettani', 'Amina', 'amina.k@example.com', '$2y$10$9.e2LgYm.4gH2K.zJ5.g.O3.Q2y5r4.a6zYg2vJ5bH5eQ8dD/C6u.', 'mentor', 'Casablanca', 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=300'),
(2, 'Benali', 'Mohammed', 'mohammed.b@example.com', '$2y$10$9.e2LgYm.4gH2K.zJ5.g.O3.Q2y5r4.a6zYg2vJ5bH5eQ8dD/C6u.', 'mentor', 'Rabat', 'https://images.unsplash.com/photo-1557862921-37829c790f19?auto=format&fit=crop&w=300'),
(3, 'Idrissi', 'Sara', 'sara.i@example.com', '$2y$10$9.e2LgYm.4gH2K.zJ5.g.O3.Q2y5r4.a6zYg2vJ5bH5eQ8dD/C6u.', 'mentor', 'Tanger', 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=300'),
(4, 'Alami', 'Youssef', 'youssef.a@example.com', '$2y$10$9.e2LgYm.4gH2K.zJ5.g.O3.Q2y5r4.a6zYg2vJ5bH5eQ8dD/C6u.', 'mentor', 'Marrakech', 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=300'),
(5, 'Fassi', 'Leila', 'leila.f@example.com', '$2y$10$9.e2LgYm.4gH2K.zJ5.g.O3.Q2y5r4.a6zYg2vJ5bH5eQ8dD/C6u.', 'mentor', 'Fès', 'https://images.unsplash.com/photo-1544725176-7c40e5a71c5e?auto=format&fit=crop&w=300'),
(6, 'Tazi', 'Karim', 'karim.t@example.com', '$2y$10$9.e2LgYm.4gH2K.zJ5.g.O3.Q2y5r4.a6zYg2vJ5bH5eQ8dD/C6u.', 'mentor', 'Agadir', 'https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=300'),
(7, 'Dupont', 'Marie', 'marie.d@example.com', '$2y$10$9.e2LgYm.4gH2K.zJ5.g.O3.Q2y5r4.a6zYg2vJ5bH5eQ8dD/C6u.', 'etudiant', 'Paris, France', 'https://images.unsplash.com/photo-1541534401786-2077ed804832?auto=format&fit=crop&w=300'),
(8, 'Zahra', 'Fatima', 'fatima.z@example.com', '$2y$10$9.e2LgYm.4gH2K.zJ5.g.O3.Q2y5r4.a6zYg2vJ5bH5eQ8dD/C6u.', 'mentor', 'Meknès', 'https://images.unsplash.com/photo-1516321318423-3b5e2970b092?auto=format&fit=crop&w=300'),
(9, 'El Hajji', 'Omar', 'omar.eh@example.com', '$2y$10$9.e2LgYm.4gH2K.zJ5.g.O3.Q2y5r4.a6zYg2vJ5bH5eQ8dD/C6u.', 'mentor', 'Kenitra', 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=300'),
-- ============== NEW STUDENT DATA ==============
(10, 'Cherkaoui', 'Sofia', 'sofia.c@example.com', '$2y$10$9.e2LgYm.4gH2K.zJ5.g.O3.Q2y5r4.a6zYg2vJ5bH5eQ8dD/C6u.', 'etudiant', 'Casablanca', 'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=300'),
(11, 'Naciri', 'Adam', 'adam.n@example.com', '$2y$10$9.e2LgYm.4gH2K.zJ5.g.O3.Q2y5r4.a6zYg2vJ5bH5eQ8dD/C6u.', 'etudiant', 'Marrakech', 'https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?auto=format&fit=crop&w=300');
-- =============================================

-- Mentors
INSERT INTO Mentor (idMentor, idUtilisateur, competences) VALUES
(1, 1, 'Ingénieure, Spécialiste Mathématiques'),
(2, 2, 'Conseiller d''orientation, Coach'),
(3, 3, 'Traductrice, Experte en Langues'),
(4, 4, 'Physicien, Préparation aux concours'),
(5, 5, 'Chimie & Biologie (Lycée)'),
(6, 6, 'Développeur, Mentor en programmation'),
(7, 8, 'Data Science, Machine Learning'),
(8, 9, 'Business Management, Entrepreneurship');

-- Etudiants
INSERT INTO Etudiant (idEtudiant, idUtilisateur, niveau) VALUES
(1, 7, 'Première Année Supérieur'),
-- ============== NEW STUDENT DATA ==============
(2, 10, 'Terminale S'),
(3, 11, 'Licence Informatique');
-- =============================================

-- Disponibilités
INSERT INTO Disponibilite (idUtilisateur, jourSemaine, heureDebut, heureFin) VALUES
(1, 'lundi', '09:00:00', '18:00:00'),
(2, 'lundi', '10:00:00', '20:00:00'),
(3, 'mardi', '18:00:00', '20:00:00'),
(4, 'lundi', '08:00:00', '16:00:00'),
(5, 'mercredi', '14:00:00', '17:00:00'),
(6, 'lundi', '14:00:00', '22:00:00'),
(8, 'mercredi', '15:00:00', '18:00:00'),
(9, 'jeudi', '09:00:00', '12:00:00');

-- Sessions
INSERT INTO Session (titreSession, sujet, dateSession, heureSession, statutSession, typeSession, tarifSession, duree_minutes, niveau, idMentorAnimateur) VALUES
('Maths Fun', 'Maths', '2025-01-10', '10:00:00', 'terminee', 'en_ligne', 25.00, 60, 'Lycée', 1),
('Langues Pro', 'Langues', '2025-02-15', '14:00:00', 'terminee', 'en_ligne', 30.00, 90, 'Supérieur', 3),
('Code Basics', 'Programmation', '2025-08-20', '18:00:00', 'en_attente', 'en_ligne', 50.00, 120, 'Débutant', 6),
('Intro à la Data Science', 'Data Science', '2025-09-05', '19:00:00', 'en_attente', 'en_ligne', 0.00, 75, 'Tous niveaux', 7),
('Découverte Business Plan', 'Entrepreneuriat', '2025-09-12', '10:00:00', 'en_attente', 'presentiel', 40.00, 90, 'Licence', 8);

-- Participation
INSERT INTO Participation (idEtudiant, idSession, notation, commentaire) VALUES
(1, 1, 5, 'Super session!'),
(1, 2, 4, 'Très bien expliqué.');

-- Step : Add the new column to the Etudiant table
ALTER TABLE Etudiant
ADD COLUMN sujetRecherche VARCHAR(255) NULL DEFAULT 'Besoin d\'aide générale' 
AFTER niveau;

-- Step 2: Update existing students with sample search subjects to match the new design
UPDATE Etudiant SET sujetRecherche = 'Besoin d\'aide en Physique' WHERE idEtudiant = 1;
UPDATE Etudiant SET sujetRecherche = 'Aide à l\'orientation post-bac' WHERE idEtudiant = 2;
UPDATE Etudiant SET sujetRecherche = 'Difficultés en Algèbre' WHERE idEtudiant = 3;