<?php
/**
 * GLOBAL CONFIGURATION - config.php
 * Centralizes all site-wide constants, database connection, and session start.
 */

// ── Session ────────────────────────────────────────────────────────────────────
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ── 1. Contact Information ─────────────────────────────────────────────────────
define('SITE_PHONE',       '+1 (718) 757-6928');
define('SITE_PHONE_RAW',   '+17187576928');
define('SITE_EMAIL_INFO',  'info@empowerzone.us');
define('SITE_EMAIL_GMAIL', 'EmpowerZoneServices@gmail.com');
define('SITE_ADDRESS',     '<a href="https://maps.app.goo.gl/mXbSvejnnJJq56KD6" target="_blank">
  18, Court Street, Brooklyn, NY
</a>');

// ── 2. Site Branding ───────────────────────────────────────────────────────────
define('SITE_NAME',    'Empower Zone');
define('SITE_TAGLINE', 'Your Benefits. Your Rights. Your Advocate.');

// ── 3. Navigation Links ────────────────────────────────────────────────────────
$navLinks = [
    'Home'     => 'index.php',
    'About Us' => 'about.php',
    'Services' => 'services.php',
    'Contact'  => 'contact.php',
];

// ── 4. Footer Services ─────────────────────────────────────────────────────────
$footerServices = [
    'SNAP (Food Stamps)'     => 'Maximum nutrition benefits',
    'Cash Assistance'        => 'Financial help for expenses',
    'Medicaid'               => 'Healthcare coverage',
    'WIC Program'            => 'Women, infants &amp; children',
    'Application Assistance' => 'Full support from start to finish',
    'Denial Appeals'         => 'Fight for your benefits',
];

// ── 5. Database Configuration ──────────────────────────────────────────────────
define('DB_HOST', 'localhost');
define('DB_NAME', 'empowerzone_db');
define('DB_USER', 'root');
define('DB_PASS', '');   // XAMPP default: empty password

// Create PDO connection — used by login.php and signup.php
try {
    $pdo = new PDO(
        'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4',
        DB_USER,
        DB_PASS,
        [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ]
    );
} catch (PDOException $e) {
    // Friendly error — never expose raw PDO messages in production
    $pdo = null;
    $dbError = 'Database unavailable. Please run setup.php first or check your MySQL server.';
}
?>
