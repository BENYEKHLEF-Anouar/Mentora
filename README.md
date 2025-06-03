# 📘 Mentora – Plateforme de tutorat et mentorat intergénérationnel

Bienvenue sur le dépôt GitHub de **Mentora**, un projet de plateforme web collaborative de tutorat et de mentorat intergénérationnel. Ce projet a été réalisé dans le cadre d’un projet de fin de formation en Développement Web à [Solicode].

---

## Présentation

**Mentora** a pour objectif de :
- Favoriser l’accès à l’aide scolaire pour tous les élèves.
- Mettre en relation étudiants et mentors (professionnels, enseignants ou étudiants avancés).
- Proposer une plateforme fluide, intuitive, sécurisée et motivante.

---

## Fonctionnalités principales

### Étudiants :
- Création de profil (niveau, matières, disponibilités)
- Recherche de mentors par filtres
- Réservation de sessions (chat ou visioconférence)
- Partage de ressources (PDF, fichiers, liens)
- Suivi de progression, historique des sessions
- Gamification (badges, récompenses)
- Notation des mentors

### Mentors :
- Création de profil professionnel
- Gestion des créneaux horaires
- Réception et gestion des demandes
- Partage de leçons/documents
- Statistiques et suivi des étudiants mentorés
- Réception de badges

### Administrateurs :
- Gestion/modération des utilisateurs et contenus
- Statistiques globales de la plateforme
- Suivi qualité et satisfaction
- Gestion des badges et paramètres généraux

---

## Stack technique

| Côté          | Technologies                      |
|--------------|-----------------------------------|
| Frontend     | HTML, CSS, JavaScript, React, Tailwind CSS |
| Backend      | PHP / Node.js + Express (API REST) |
| Base de données | MySQL                          |
| Authentification | JWT (JSON Web Tokens)         |
| Visioconférence | Intégration Jitsi ou Zoom SDK  |
| Hébergement  | Render / Vercel (dev), AWS (prod) |

---

## Structure du projet

mentora/
├── backend/                # Code du backend (PHP/Node.js, Express)
│   ├── config/             # Configuration de la BDD, tokens, etc.
│   ├── routes/             # Définition des routes API (REST)
│   ├── models/             # Modèles de données (utilisateurs, sessions, etc.)
│   └── controllers/        # Logique métier et gestion des requêtes
│
├── frontend/               # Code du frontend (React + Tailwind CSS)
│   ├── src/                # Composants React, pages, services, hooks
│   ├── public/             # Fichiers statiques (index.html, favicon, images)
│   └── assets/             # Ressources : images, feuilles de style, logos
│
├── docs/                   # Documentation du projet (README, wireframes, specs)
│
└── .gitignore              # Fichiers/dossiers exclus de Git (node_modules, .env, etc.)

---
