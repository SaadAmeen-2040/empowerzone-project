# Empower Zone Consulting – Benefits Advocate Platform

A professional, high-performance web platform built for **Empower Zone Consulting**. This system combines a high-fidelity client-facing website with a powerful administrative backend to manage user registrations and client inquiries for government benefit programs.

## 🚀 Overview

The project is built on a **Modular PHP & MySQL Architecture**, focusing on security, scalability, and premium user experience. It features a complete CRM-style admin panel, secure authentication, and real-time data visualization.

---

## 🛠️ Technology Stack

-   **Frontend**: HTML5, Vanilla CSS, Inter Font.
-   **Backend**: PHP 8.x (Modular architecture).
-   **Database**: MySQL (via PDO for security).
-   **Email Service**: EmailJS (Client-side notifications & automation).
-   **Security**: CSRF Protection, Password Hashing (Bcrypt), Security Headers, Honeypot.
-   **Visuals**: Chart.js (Data visualization), AOS (Animate On Scroll).
-   **Interactivity**: Vanilla JavaScript & AJAX.

---

## ✨ Key Features

### 1. Premium Admin Dashboard
-   **Real-time Stats**: Track total users, new signups, and inquiry volume.
-   **Interactive Charts**: Visual trends of client inquiries over time.
-   **Fully Responsive**: Manage your business from desktop, tablet, or mobile.

### 2. Contact Inquiry Management (CRM)
-   **Hybrid Storage**: Saves inquiries to the local MySQL database while simultaneously triggering email alerts.
-   **Real-time Notifications**: Uses **EmailJS** to notify the business owner instantly of new leads.
-   **User Confirmations**: Automatically sends a professional confirmation email to the client upon submission.
-   **Inquiry Tracker**: Admin panel to view, filter (New, In Progress, Resolved), and manage client requests.
-   **Detail View**: Deep-dive into client messages with a professional modal interface.

### 3. Secure Authentication System
-   **Role-Based Access (RBAC)**: Separate permissions for `Users` and `Admins`.
-   **Secure Login/Signup**: Built-in validation, password hashing, and session hardening.
-   **CSRF Protection**: Every form and action is protected against Cross-Site Request Forgery.

### 4. Modular Design System
-   **Dynamic Navigation**: Context-aware navbar (Login/Logout/Admin links).
-   **Global Config**: Site-wide settings (Phone, Email, Address) are centralized in `config.php`.

---

## 📁 Project Structure

```text
empowerzone-project/
├── admin/              # Administrative Backend
│   ├── dashboard.php   # Visual analytics & overview
│   ├── inquiries.php   # CRM Inquiry management
│   └── users.php       # User & Role management
├── includes/           # Core Logic & Components
│   ├── config.php      # Security settings & constants
│   ├── admin_check.php # RBAC Security middleware
│   ├── db_setup.sql    # Database schema
│   └── ...             # Navbar, Header, Footer
├── assets/             # Static Assets
│   ├── css/            # Premium Admin & Frontend styles
│   └── js/             # Interactive logic (app.js)
├── setup.php           # Auto-installer & Database Seeder
└── index.php           # Main public entry point
```

---

## ⚙️ Configuration & Setup

### 1. Database Initialization
This project features an automated setup script.
1. Create a database named `empowerzone_db` in your MySQL server.
2. Run the setup script in your browser: `http://localhost/empowerzone-project/setup.php`
3. The script will create all tables and seed a default administrator.

### 2. Admin Credentials
- **Default Admin**: `admin@empowerzone.us`
- **Password**: `********` (Change this immediately after login!)

### 3. Security Notes
-   **CSRF**: Forms include a `csrf_token` hidden field validated on the server.
-   **Honeypot**: Contact forms include a hidden "honeypot" field to trap and block automated spam bots.
-   **Headers**: Site includes strict security headers (X-Frame-Options, X-XSS-Protection) and a custom **Content Security Policy (CSP)** that permits trusted external services like EmailJS and Google Fonts.

---

## ⚖️ License
© 2026 Empower Zone Consulting. All rights reserved. Professional Benefits Advocacy and Consulting.
