<!DOCTYPE html>
<html lang="en">
<head>
    <!-- 1. Technical Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    
    <!-- 2. SEO Meta Tags: Dynamic based on page variables -->
    <title><?php echo htmlspecialchars($pageTitle ?? SITE_NAME); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($pageDesc ?? 'Empower Zone helps New York families get the government benefits they deserve. SNAP, Medicaid, Cash Assistance, WIC, and more.'); ?>">
    
    <!-- 3. Branding: Site Favicon -->
    <link rel="icon" type="image/png" href="assets/images/logo%20.png">

    <!-- 4. Typography: Google Fonts (Inter) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- 5. Iconography: Font Awesome for all UI icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- 6. Animations: AOS (Animate On Scroll) library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- 7. Global CSS Modules: Loaded on every page -->
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/components.css">

    <!-- 8. Page-Specific CSS Loading Logic: 
         Detects the current filename and injects the corresponding CSS file. 
         This improves performance by loading only what is needed. -->
    <?php 
    $currentPage = basename($_SERVER['PHP_SELF']);
    if ($currentPage == 'index.php') {
        echo '<link rel="stylesheet" href="assets/css/home.css">';
    } elseif ($currentPage == 'about.php') {
        echo '<link rel="stylesheet" href="assets/css/about.css">';
    } elseif ($currentPage == 'services.php') {
        echo '<link rel="stylesheet" href="assets/css/services.css">';
    } elseif ($currentPage == 'contact.php') {
        echo '<link rel="stylesheet" href="assets/css/contact.css">';
    }
    ?>

</head>
<body>

