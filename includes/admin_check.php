<?php
/**
 * ADMIN ACCESS CHECK - admin_check.php
 * Included at the top of every admin page to ensure the user is an administrator.
 */

// config.php already starts the session and provides $pdo
require_once __DIR__ . '/../includes/config.php';

// 1. Check if logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit;
}

// 2. Check if admin role
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    // Optional: Log unauthorized access attempts
    header('Location: ../index.php');
    exit;
}

// Define admin base path for assets if needed
$admin_path = true;
