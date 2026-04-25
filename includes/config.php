<?php
// ============================================================
// SITE-WIDE CONFIGURATION
// Edit this file to update contact info, nav links, etc.
// ============================================================

// --- Contact Information ---
define('SITE_PHONE',        '+1 (718) 757-6928');
define('SITE_PHONE_RAW',    '+17187576928');
define('SITE_EMAIL_INFO',   'info@empowerzone.us');
define('SITE_EMAIL_GMAIL',  'EmpowerZoneServices@gmail.com');
define('SITE_ADDRESS',      '16 Court Street, Brooklyn, NY');

// --- Site Meta ---
define('SITE_NAME',         'Empower Zone');
define('SITE_TAGLINE',      'Your Benefits. Your Rights. Your Advocate.');

// --- Navigation Links ---
// Key = Display label, Value = page parameter (used in index.php routing)
$navLinks = [
    'Home'     => 'index.php',
    'About Us' => 'about.php',
    'Services' => 'services.php',
    'Contact'  => 'contact.php',
];

// --- Footer Services List ---
$footerServices = [
    'SNAP (Food Stamps)'      => 'Maximum nutrition benefits',
    'Cash Assistance'         => 'Financial help for expenses',
    'Medicaid'                => 'Healthcare coverage',
    'WIC Program'             => 'Women, infants &amp; children',
    'Application Assistance'  => 'Full support from start to finish',
    'Denial Appeals'          => 'Fight for your benefits',
];
