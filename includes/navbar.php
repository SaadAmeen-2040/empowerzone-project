<?php
/**
 * NAVIGATION COMPONENT - navbar.php
 * This file renders the main header navigation for both desktop and mobile views.
 */

// active page detection for adding the .active class to links
$currentPage = $page ?? 'home';
?>

<!-- ===== MAIN NAVBAR ===== -->
<nav class="navbar" id="navbar">
    <div class="nav-container">

        <!-- 1. Brand Logo: Links back to home -->
        <div class="logo">
            <a href="index.php">
                <img src="assets/images/logo .png" alt="Empower Zone Logo">
            </a>
        </div>

        <!-- 2. Desktop Navigation: Hidden on mobile screens -->
        <ul class="nav-links" id="navLinks">
            <li><a href="index.php"                  <?php echo ($currentPage === 'home')     ? 'class="active"' : ''; ?>>Home</a></li>
            <li><a href="about.php"        <?php echo ($currentPage === 'about')    ? 'class="active"' : ''; ?>>About Us</a></li>
            <li><a href="services.php"     <?php echo ($currentPage === 'services') ? 'class="active"' : ''; ?>>Services</a></li>
            <li><a href="contact.php"      <?php echo ($currentPage === 'contact')  ? 'class="active"' : ''; ?>>Contact</a></li>
            
            <?php if (isset($_SESSION['user_id'])): ?>
                <?php if ($_SESSION['user_role'] === 'admin'): ?>
                    <li><a href="admin/dashboard.php">Admin Panel</a></li>
                <?php endif; ?>
                <li><a href="logout.php" class="nav-auth-link">Logout</a></li>
            <?php else: ?>
                <li><a href="login.php" <?php echo ($currentPage === 'login') ? 'class="active"' : ''; ?>>Login</a></li>
            <?php endif; ?>
        </ul>

        <!-- 3. Primary Call to Action: Featured button in the navbar -->
        <a href="contact.php" class="call-btn">
            <i class="fa fa-phone"></i> Call Now
        </a>

        <!-- 4. Mobile Hamburger Button: Only visible on small screens -->
        <button class="hamburger" id="hamburger" aria-label="Toggle mobile menu">
            <span></span>
            <span></span>
            <span></span>
        </button>

    </div>

    <!-- 5. Mobile Dropdown Menu: Controlled via JavaScript in app.js -->
    <div class="nav-mobile" id="navMobile">
        <a href="index.php"               <?php echo ($currentPage === 'home')     ? 'class="active"' : ''; ?>>Home</a>
        <a href="about.php"    <?php echo ($currentPage === 'about')    ? 'class="active"' : ''; ?>>About Us</a>
        <a href="services.php" <?php echo ($currentPage === 'services') ? 'class="active"' : ''; ?>>Services</a>
        <a href="contact.php"  <?php echo ($currentPage === 'contact')  ? 'class="active"' : ''; ?>>Contact</a>
        
        <?php if (isset($_SESSION['user_id'])): ?>
            <?php if ($_SESSION['user_role'] === 'admin'): ?>
                <a href="admin/dashboard.php">Admin Panel</a>
            <?php endif; ?>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a>
            <a href="signup.php">Sign Up</a>
        <?php endif; ?>

        <a href="contact.php" class="mobile-call-btn">
            <i class="fa fa-phone"></i> Call Now
        </a>
    </div>
</nav>

