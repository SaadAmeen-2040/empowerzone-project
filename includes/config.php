<?php
/**
 * GLOBAL CONFIGURATION - config.php
 * This file centralizes all site-wide constants and data arrays.
 * Changing a value here will update it across the entire website.
 */

// 1. Contact Information: Used in Header, Footer, and Contact pages
define('SITE_PHONE',        '+1 (718) 757-6928'); // Formatted for display
define('SITE_PHONE_RAW',    '+17187576928');      // Raw for tel: links
define('SITE_EMAIL_INFO',   'info@empowerzone.us');
define('SITE_EMAIL_GMAIL',  'EmpowerZoneServices@gmail.com');
define('SITE_ADDRESS',      '16 Court Street, Brooklyn, NY');

// 2. Site Branding: Global site name and tagline
define('SITE_NAME',         'Empower Zone');
define('SITE_TAGLINE',      'Your Benefits. Your Rights. Your Advocate.');

// 3. Navigation Links: Defines the main menu structure
// Format: 'Label' => 'Filename'
$navLinks = [
    'Home'     => 'index.php',
    'About Us' => 'about.php',
    'Services' => 'services.php',
    'Contact'  => 'contact.php',
];

// 4. Footer Services: Defines the quick links shown in the footer sidebar
// Format: 'Service Name' => 'Short Description'
$footerServices = [
    'SNAP (Food Stamps)'      => 'Maximum nutrition benefits',
    'Cash Assistance'         => 'Financial help for expenses',
    'Medicaid'                => 'Healthcare coverage',
    'WIC Program'             => 'Women, infants &amp; children',
    'Application Assistance'  => 'Full support from start to finish',
    'Denial Appeals'          => 'Fight for your benefits',
];
?>
