<?php
// ============================================================
// INDEX.PHP — SINGLE ENTRY POINT (ROUTER)
//
// How it works:
//   - Visit index.php          → shows the Home page
//   - Visit index.php?page=about    → shows About Us
//   - Visit index.php?page=services → shows Services
//   - Visit index.php?page=contact  → shows Contact
//
// All pages share the same navbar and footer via includes/.
// Page content lives in pages/ folder.
// ============================================================

// 1. Load site-wide config (contact info, nav links, etc.)
require_once 'includes/config.php';

// 2. Safely determine which page to load
// Use an allowlist to prevent loading arbitrary files (security)
$allowedPages = ['home', 'about', 'services', 'contact'];
$page = isset($_GET['page']) ? trim($_GET['page']) : 'home';

if (!in_array($page, $allowedPages)) {
    $page = 'home'; // Redirect unknown pages to home
}

$pageFile = "pages/{$page}.php";

// 3. Set default page metadata (can be overridden by page file)
$pageTitle = SITE_NAME;
$pageDesc  = 'Empower Zone helps New York families get the government benefits they deserve — SNAP, Medicaid, Cash Assistance, WIC, and more.';

// 4. Load page-specific metadata from the top of each page file
// Each page file starts with a PHP block that sets $pageTitle / $pageDesc.
// We use output buffering so page HTML is captured and printed after the header.
ob_start();
    include $pageFile;
$pageContent = ob_get_clean();

// 5. Render the full page
include 'includes/header.php';  // <!DOCTYPE html> ... <body>
include 'includes/navbar.php';  // <nav>...</nav>
echo $pageContent;              // Page-specific HTML
include 'includes/footer.php';  // <footer>...</footer> + </body></html>
?>
