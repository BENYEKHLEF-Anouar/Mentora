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

-- Index sur les disponibilités
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
    lienReunion VARCHAR(255) NOT NULL,
    idEtudiantDemandeur INT NOT NULL,
    FOREIGN KEY (idEtudiantDemandeur) REFERENCES Etudiant(idEtudiant)
        ON DELETE CASCADE ON UPDATE CASCADE
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

-- Utilisateurs (2 mentors, 2 étudiants)
INSERT INTO Utilisateur (nomUtilisateur, prenomUtilisateur, emailUtilisateur, motDePasse, role, photoUrl) VALUES
('Kettani', 'Amina', 'amina.k@example.com', 'hashed_password', 'mentor', 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=388&q=80'),
('Benali', 'Mohammed', 'mohammed.b@example.com', 'hashed_password', 'mentor', 'https://images.unsplash.com/photo-1556157382-97eda2d62296?auto=format&fit=crop&w=1170&q=80'),
('El Amrani', 'Yassine', 'yassine.e@example.com', 'hashed_password', 'etudiant', 'https://images.unsplash.com/photo-1610088441520-4352457e7095?auto=format&fit=crop&w=1170&q=80'),
('Zahra', 'Fatima', 'fatima.z@example.com', 'hashed_password', 'etudiant', 'https://images.unsplash.com/photo-1541534401786-2077ed804832?auto=format&fit=crop&w=387&q=80');

-- Liens profils Mentors
INSERT INTO Mentor (idUtilisateur, competences) VALUES
(1, 'Ingénierie, Spécialiste Mathématiques'),
(2, 'Conseiller d''orientation, Coach de vie');

-- Liens profils Étudiants
INSERT INTO Etudiant (idUtilisateur, niveau) VALUES
(3, 'Terminale'),
(4, 'Première Année Supérieur');

-- Sessions créées par les étudiants
INSERT INTO Session (titreSession, sujet, dateSession, heureSession, statutSession, lienReunion, idEtudiantDemandeur) VALUES
('Aide en Analyse de Fonctions', 'Mathématiques', '2023-11-10', '18:00:00', 'en_attente', '#', 1),
('Préparation pour Parcoursup', 'Orientation', '2023-11-12', '16:30:00', 'en_attente', '#', 2),
('Session de rattrapage Algèbre', 'Mathématiques', '2023-10-25', '17:00:00', 'terminee', '#', 2);

-- Animation : mentor anime une session
INSERT INTO Animation (idMentor, idSession, remarque) VALUES
(1, 3, 'Très bonne session.');

-- Participation avec évaluation
INSERT INTO Participation (idEtudiant, idSession, notation, commentaire) VALUES
(2, 3, 5, 'Amina a été très claire, j''ai tout compris !');
