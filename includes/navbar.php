<?php
// Determine which page is active for nav highlight
$currentPage = $_GET['page'] ?? 'home';
?>

<!-- ===== NAVBAR ===== -->
<nav class="navbar" id="navbar">
    <div class="nav-container">

        <!-- Logo -->
        <div class="logo">
            <a href="index.php">
                <img src="assets/images/logo .png" alt="Empower Zone Logo">
            </a>
        </div>

        <!-- Desktop Nav Links -->
        <ul class="nav-links" id="navLinks">
            <li><a href="index.php"                  <?php echo ($currentPage === 'home')     ? 'class="active"' : ''; ?>>Home</a></li>
            <li><a href="index.php?page=about"        <?php echo ($currentPage === 'about')    ? 'class="active"' : ''; ?>>About Us</a></li>
            <li><a href="index.php?page=services"     <?php echo ($currentPage === 'services') ? 'class="active"' : ''; ?>>Services</a></li>
            <li><a href="index.php?page=contact"      <?php echo ($currentPage === 'contact')  ? 'class="active"' : ''; ?>>Contact</a></li>
        </ul>

        <!-- Call Button -->
        <a href="tel:<?php echo SITE_PHONE_RAW; ?>" class="call-btn">
            <i class="fa fa-phone"></i> Call Now
        </a>

        <!-- Hamburger (mobile) -->
        <button class="hamburger" id="hamburger" aria-label="Toggle mobile menu">
            <span></span>
            <span></span>
            <span></span>
        </button>

    </div>

    <!-- Mobile Dropdown Menu -->
    <div class="nav-mobile" id="navMobile">
        <a href="index.php"               <?php echo ($currentPage === 'home')     ? 'class="active"' : ''; ?>>Home</a>
        <a href="index.php?page=about"    <?php echo ($currentPage === 'about')    ? 'class="active"' : ''; ?>>About Us</a>
        <a href="index.php?page=services" <?php echo ($currentPage === 'services') ? 'class="active"' : ''; ?>>Services</a>
        <a href="index.php?page=contact"  <?php echo ($currentPage === 'contact')  ? 'class="active"' : ''; ?>>Contact</a>
    </div>
</nav>
