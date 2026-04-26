# Empower Zone Consulting – Benefits Advocate Website

A professional, high-performance website built for **Empower Zone Consulting**, a New York-based firm dedicated to helping families navigate government benefit programs such as SNAP, Medicaid, Cash Assistance, and WIC.

## 🚀 Overview

This website is built using a **Modular PHP Architecture**, ensuring code reusability, easy maintenance, and high performance. It features a modern, responsive design with rich animations and interactive components designed to build trust and provide a seamless user experience.

---

## 🛠️ Technology Stack

-   **Frontend**: HTML5, Vanilla CSS, Tailwind CSS (Utility classes for specific layouts).
-   **Backend**: PHP (Modular architecture).
-   **Interactivity**: Vanilla JavaScript.
-   **Animations**: AOS (Animate On Scroll) Library.
-   **Form Handling**: EmailJS (Client-side email submission).
-   **Icons**: Font Awesome 6.

---

## 📁 Project Structure

The project follows a clean and organized directory structure:

```text
empowerzone-project/
├── index.php           # Standalone Home Page
├── about.php           # About Us & Success Stories
├── services.php        # Comprehensive Services Listing
├── contact.php         # Contact Form & Info
├── includes/           # Reusable PHP Components
│   ├── config.php      # Global site-wide variables & arrays
│   ├── header.php      # Meta tags & dynamic CSS loading
│   ├── footer.php      # Site footer & script inclusions
│   └── navbar.php      # Desktop & Mobile navigation
├── assets/             # Static Assets
│   ├── css/            # Modular Stylesheets (base, navbar, footer, etc.)
│   ├── js/             # app.js (Main interactive logic)
│   └── images/         # Optimized site images & logos
└── README.md           # Project Documentation
```

---

## ✨ Key Features

### 1. Modular CSS System
The CSS is split into specific modules (`base.css`, `navbar.css`, `home.css`, etc.). The `header.php` logic automatically detects the current page and loads only the necessary page-specific styles, reducing unused CSS and speeding up load times.

### 2. Dynamic Content Management
Key content (Services, Testimonials, Statistics) is stored in PHP arrays at the top of each page or in `config.php`. This allows for easy updates without touching the HTML structure.

### 3. Interactive UI Components
-   **Custom Testimonial Slider**: An advanced, auto-rotating slider on the About page with thumbnail navigation and fade transitions.
-   **Mobile Menu**: A fully responsive hamburger menu system integrated into the global navbar.
-   **AOS Animations**: Professional scroll-triggered animations implemented site-wide.

### 4. Contact Form with EmailJS
The contact form on the Contact page is integrated with **EmailJS**, allowing users to send messages directly to the firm's email without requiring a complex backend mailing server.

---

## ⚙️ Configuration & Setup

### 1. Global Settings
Update site-wide contact info, navigation links, and service lists in `includes/config.php`:
```php
define('SITE_PHONE', '+1 (718) 757-6928');
define('SITE_EMAIL_GMAIL', 'EmpowerZoneServices@gmail.com');
```

### 2. EmailJS Setup
To enable the contact form, ensure the Public Key and Template IDs are correctly set in `assets/js/app.js`:
```javascript
emailjs.init("YOUR_PUBLIC_KEY");
emailjs.send('YOUR_SERVICE_ID', 'YOUR_TEMPLATE_ID', templateParams);
```

### 3. Local Development
This project requires a PHP server environment (like XAMPP, WAMP, or MAMP).
1. Clone or copy the folder into your server's root (e.g., `htdocs`).
2. Navigate to `http://localhost/empowerzone-project` in your browser.

---

## 📝 Documentation
Every file in this project has been thoroughly commented.
- **PHP files** explain data structures and loops.
- **CSS files** use section headers for easy navigation.
- **JavaScript files** document every function and logic block.

---

## ⚖️ License
© 2026 Empower Zone Consulting. All rights reserved.
