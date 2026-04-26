<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title><?php echo htmlspecialchars($pageTitle ?? SITE_NAME); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($pageDesc ?? 'Empower Zone helps New York families get the government benefits they deserve. SNAP, Medicaid, Cash Assistance, WIC, and more.'); ?>">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="assets/images/logo%20.png">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- AOS Animation Stylesheet -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Global Styles -->
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/components.css">

    <!-- Page Specific Styles -->
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
