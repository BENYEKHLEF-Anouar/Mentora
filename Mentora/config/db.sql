CREATE database mentora;

-- ======================================
-- Création des tables principales
-- ======================================
USE mentora;

-- Table Utilisateur
CREATE TABLE Utilisateur (
    idUtilisateur INT AUTO_INCREMENT PRIMARY KEY,
    nomUtilisateur VARCHAR(50) NOT NULL,
    prenomUtilisateur VARCHAR(50) NOT NULL,
    emailUtilisateur VARCHAR(200) NOT NULL UNIQUE,
    motDePasse VARCHAR(255) NOT NULL,
    role ENUM('etudiant', 'mentor') NOT NULL,
    ville VARCHAR(100) NULL,
    photoUrl VARCHAR(255) DEFAULT 'default_avatar.png'
);


-- Table Etudiant
CREATE TABLE Etudiant (
    idEtudiant INT AUTO_INCREMENT PRIMARY KEY,
    niveau VARCHAR(50) NOT NULL,
    idUtilisateur INT NOT NULL UNIQUE,
    FOREIGN KEY (idUtilisateur) REFERENCES Utilisateur(idUtilisateur)
        ON DELETE CASCADE ON UPDATE CASCADE
);

-- Table Mentor
CREATE TABLE Mentor (
    idMentor INT AUTO_INCREMENT PRIMARY KEY,
    competences VARCHAR(255) NOT NULL,
    idUtilisateur INT NOT NULL UNIQUE,
    FOREIGN KEY (idUtilisateur) REFERENCES Utilisateur(idUtilisateur)
        ON DELETE CASCADE ON UPDATE CASCADE
);

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
    
    FOREIGN KEY (idEtudiantDemandeur) REFERENCES Etudiant(idEtudiant) ON DELETE CASCADE,
    FOREIGN KEY (idMentorAnimateur) REFERENCES Mentor(idMentor) ON DELETE CASCADE,

    CONSTRAINT chk_session_creator CHECK (
        (idEtudiantDemandeur IS NOT NULL AND idMentorAnimateur IS NULL) OR 
        (idEtudiantDemandeur IS NULL AND idMentorAnimateur IS NOT NULL)
    )
);

-- Table Participation
CREATE TABLE Participation (
    idEtudiant INT NOT NULL,
    idSession INT NOT NULL,
    notation INT CHECK (notation BETWEEN 1 AND 5),
    commentaire TEXT,
    PRIMARY KEY (idEtudiant, idSession),
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

-- Utilisateurs (Yassine and Fatima are now mentors)
INSERT INTO Utilisateur (idUtilisateur, nomUtilisateur, prenomUtilisateur, emailUtilisateur, motDePasse, role, ville, photoUrl) VALUES
(1, 'El Amrani', 'Yassine', 'yassine.e@example.com', 'hashed_password', 'mentor', 'Casablanca, Maroc', 'https://images.unsplash.com/photo-1568602471122-7832951cc4c5?auto=format&fit=crop&w=387&q=80'),
(2, 'Zahra', 'Fatima', 'fatima.z@example.com', 'hashed_password', 'mentor', 'Rabat, Maroc', 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?auto=format&fit=crop&w=387&q=80'),
(3, 'Kettani', 'Amina', 'amina.k@example.com', 'hashed_password', 'mentor', 'Marrakech, Maroc', 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=388&q=80'),
(4, 'Benali', 'Mohammed', 'mohammed.b@example.com', 'hashed_password', 'etudiant', 'Tanger, Maroc', 'https://images.unsplash.com/photo-1610088441520-4352457e7095?auto=format&fit=crop&w=1170&q=80'),
(5, 'Dupont', 'Marie', 'marie.d@example.com', 'hashed_password', 'etudiant', 'Paris, France', 'https://images.unsplash.com/photo-1541534401786-2077ed804832?auto=format&fit=crop&w=387&q=80');


-- Mentors
INSERT INTO Mentor (idUtilisateur, competences) VALUES
(1, 'Mathématiques, Physique'),
(2, 'Conseiller d''orientation, Parcoursup'),
(3, 'Ingénierie, Spécialiste Mathématiques');


-- Etudiants
INSERT INTO Etudiant (idUtilisateur, niveau) VALUES
(4, 'Terminale'),
(5, 'Première Année Supérieur');


-- NOUVELLES DONNÉES: Disponibilités des mentors
INSERT INTO Disponibilite (idUtilisateur, jourSemaine, heureDebut, heureFin) VALUES
(1, 'lundi', '09:00:00', '12:00:00'),
(1, 'mercredi', '14:00:00', '17:00:00'),
(2, 'mardi', '18:00:00', '20:00:00');


-- Sessions (New sessions matching the image)
INSERT INTO Session (titreSession, sujet, dateSession, heureSession, statutSession, typeSession, tarifSession, duree_minutes, niveau, idMentorAnimateur) VALUES
('Session de Mathématiques - Terminale', 'Mathématiques', '2024-06-15', '10:00:00', 'en_attente', 'en_ligne', 0.00, 60, 'Terminale', (SELECT idMentor FROM Mentor WHERE idUtilisateur = 1)),
('Session d''Orientation - Parcoursup', 'Orientation', '2024-06-16', '14:00:00', 'en_attente', 'en_ligne', 0.00, 45, 'Orientation', (SELECT idMentor FROM Mentor WHERE idUtilisateur = 2));