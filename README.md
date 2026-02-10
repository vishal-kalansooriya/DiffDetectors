# DiffDetectors 🎮🧠

DiffDetectors is a web-based *spot-the-difference* puzzle game designed as an academic project for the unit **CIS046-3 – Software For Enterprise**.  
The game combines interactive gameplay with enterprise software concepts such as authentication, event-driven programming, interoperability, and version control.

---

## 📌 Project Overview

Players are presented with two images:
- A **correct image**
- A **modified image** with missing or altered details

The objective is to identify all missing spots within a limited time while avoiding incorrect selections. The game features multiple difficulty levels, a leaderboard system, and an admin panel for puzzle management.

---

## ✨ Key Features

### 🎮 Gameplay
- Level-based *spot-the-difference* puzzles
- Countdown timer based on difficulty (Easy / Normal / Hard)
- Limited wrong attempts displayed as hearts
- Hint system powered by the **Banana API**
- Bonus time challenges via external API integration
- Score calculation based on remaining original time
- Retry and level-map navigation on failure

### 👤 User System
- User login and logout
- Admin login with **email OTP verification**
- Session-based authentication
- Virtual identity used for scoring and leaderboard ranking

### 🗺️ Level Map
- Visual level selection interface
- Preview of puzzles
- Access control for completed and available levels

### 🏆 Leaderboard
- Displays top-scoring players
- Supports ties (multiple users with same score)
- Scores stored and retrieved from a database

### 🛠️ Admin Panel
- Upload puzzle images (original & modified)
- Define missing spot locations using grid points
- Add hint messages
- Set difficulty level and maximum solving time

---

## 🧩 Technologies Used

- **Frontend:** HTML, CSS, JavaScript
- **Backend:** PHP
- **Database:** MySQL
- **External API:** Banana API  
  https://marcconrad.com/uob/banana/doc.php
- **Version Control:** Git & GitHub

---

## 🧠 Software Engineering Concepts Demonstrated

### 1. Version Control
- Git used for tracking changes and feature development
- GitHub used for repository hosting and commit history
- Custom `.gitignore` file created to manage tracked files

### 2. Event-Driven Programming
- User interactions (clicks, timers, button events)
- Real-time UI updates based on player actions
- Countdown timers and dynamic game state changes

### 3. Interoperability
- Integration with the Banana API via HTTP requests
- JSON data exchange between systems
- Communication between frontend, backend, database, and external services

### 4. Virtual Identity
- User accounts and admin roles
- OTP-based admin authentication
- Session handling for identity persistence
- Identity-linked scores and leaderboard positions

---

## 🏗️ System Architecture (High-Level)

- Client (Web Browser)
- Backend Server (PHP)
- Database Server (MySQL)
- External Service (Banana API)

This represents a **distributed software architecture**.

---

## 🚀 How to Run the Project

1. Clone the repository:
   ```bash
   git clone https://github.com/<your-username>/DiffDetectors.git
   ```
2. Place the project in your local server directory
(e.g. htdocs if you are using XAMPP).

3. Import the provided database SQL file into MySQL.

4. Configure database credentials in the configuration file.

5. Run the project in your browser:
   ```bash
   http://localhost/DiffDetectors
   ```
---

### 📄 Academic Declaration

This project was developed as an individual academic assignment.
Any external code, APIs, or references used are acknowledged within the source code comments and documentation.

---

### 👨‍💻 Author

Vishal Kalansooriya
BSc (Hons) Software Engineering
University of Bedfordshire

---

### 📜 License

This project is licensed under the MIT License.
