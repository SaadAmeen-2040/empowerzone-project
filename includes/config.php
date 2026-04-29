<?php
/**
 * GLOBAL CONFIGURATION - config.php
 * Centralizes all site-wide constants, database connection, and session start.
 */

// ── Session & Security ────────────────────────────────────────────────────────
// 1. Hardening session cookies
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_use_only_cookies', 1);
// ini_set('session.cookie_secure', 1); // Enable this if your site uses HTTPS

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 2. CSRF Token Generation
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

/**
 * CSRF Validation Helper
 */
function validate_csrf($token) {
    if (!isset($_SESSION['csrf_token']) || $token !== $_SESSION['csrf_token']) {
        header($_SERVER['SERVER_PROTOCOL'] . ' 403 Forbidden');
        exit('CSRF token validation failed.');
    }
    return true;
}

// 3. Security Headers
header("X-Frame-Options: DENY");
header("X-XSS-Protection: 1; mode=block");
header("X-Content-Type-Options: nosniff");
header("Referrer-Policy: strict-origin-when-cross-origin");
("Content-Security-Policy: default-src 'self' https://fonts.googleapis.com https://fonts.gstatic.com https://cdnjs.cloudflare.com https://unpkg.com https://cdn.jsdelivr.net; img-src 'self' data:; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://cdnjs.cloudflare.com https://unpkg.com; script-src 'self' 'unsafe-inline' https://unpkg.com https://cdn.jsdelivr.net; connect-src 'self' https://api.emailjs.com;");

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
define('DB_PASS', ''); // change this
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
