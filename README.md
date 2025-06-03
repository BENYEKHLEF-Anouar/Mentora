Mentora
Mentora is a responsive web application designed to facilitate intergenerational tutoring and mentoring. It connects students seeking academic support with experienced mentors, offering features like session booking, resource sharing, progress tracking, and gamification through badges. The platform aims to combat educational inequalities by providing a collaborative, motivating, and secure environment.
Table of Contents

Project Overview
Features
Technologies
Installation
Usage
Project Structure
Contributing
License

Project Overview
Mentora is a final training project developed as part of a web development program. The platform enables students to connect with mentors for academic and professional guidance, featuring secure authentication, intelligent matching, real-time messaging, and session management. It includes a gamified experience with badges to encourage engagement and a robust admin panel for moderation and analytics.
Features
For Students

Secure registration and login
Personalized profile creation (academic level, subjects, availability)
Mentor search with filters (subjects, level, availability)
Real-time messaging with mentors
Resource sharing (PDFs, images, links)
Session booking for chat or video calls
Progress tracking dashboard
Mentor rating and feedback
Gamification through badges

For Mentors

Secure registration and login
Detailed profile setup (bio, skills, experience)
Student search with filters
Session management (accept/reject requests)
Resource sharing and private notes on students
Interaction history and statistics
Gamified badges for activity

For Administrators

User and content moderation
Platform usage statistics
Quality monitoring (ratings, feedback)
Badge and theme configuration

General Features

Real-time messaging with notifications
File and link sharing
Integration with video conferencing tools (e.g., Jitsi, Zoom)
Content reporting for safety

Technologies

Frontend: HTML, CSS, JavaScript, React, Tailwind CSS
Backend: PHP or Node.js with Express (REST API)
Database: MySQL
Authentication: JWT or session-based
Video Conferencing: Jitsi or Zoom API
Tools: GitHub, Figma, Notion, Trello
Hosting: Render, Vercel, or AWS (production)
Security: HTTPS, input validation, password encryption

Installation

Clone the Repository
git clone https://github.com/your-username/mentora.git
cd mentora


Backend Setup

Navigate to the backend directory:cd backend


Install dependencies (for Node.js):npm install

or for PHP, ensure a server like Apache/Nginx and PHP are installed.
Configure the database:
Create a MySQL database named mentora.
Update the database configuration in backend/config/database.js (Node.js) or equivalent PHP config file.
Run migrations or import the provided SQL schema:node backend/migrate.js




Start the backend server:npm start

or for PHP, configure your server to point to the backend directory.


Frontend Setup

Navigate to the frontend directory:cd frontend


Install dependencies:npm install


Start the development server:npm start




Environment Variables

Create a .env file in the backend directory with the following:DB_HOST=localhost
DB_USER=your_username
DB_PASS=your_password
DB_NAME=mentora
JWT_SECRET=your_jwt_secret


For frontend, create a .env file in the frontend directory:REACT_APP_API_URL=http://localhost:5000/api




Video Conferencing

Configure Jitsi or Zoom API credentials in the backend configuration if used.



Usage

Access the application at http://localhost:3000 (or your production URL).
Register as a student or mentor, complete your profile, and start exploring.
Use the search feature to find compatible mentors/students.
Book sessions, share resources, and communicate via the messaging system.
Track progress and earn badges through active participation.
Admins can access the dashboard at /admin after logging in with admin credentials.

Project Structure
mentora/
├── backend/                # Backend code (PHP/Node.js, Express)
│   ├── config/            # Database and API configurations
│   ├── routes/            # API endpoints
│   ├── models/            # Database models
│   └── controllers/       # Business logic
├── frontend/               # Frontend code (React, Tailwind CSS)
│   ├── src/               # React components, pages, and styles
│   ├── public/            # Static assets (images, HTML)
│   └── assets/            # CSS, images, and other resources
├── docs/                  # Documentation (e.g., this README)
└── .gitignore             # Git ignore file

----------------------
