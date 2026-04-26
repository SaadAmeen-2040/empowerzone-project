<!-- ===== SITE FOOTER COMPONENT ===== -->
<footer class="site-footer">
    <div class="footer-inner">

        <!-- 1. Footer Main Grid: Divided into 4 thematic columns -->
        <div class="footer-grid">

            <!-- Column 1: Brand Identity & Summary -->
            <div class="footer-col footer-brand">
                <img src="assets/images/logo .png" alt="Empower Zone Logo" class="footer-logo">
                <p>We help New York families navigate government benefit programs with ease. No stress, no endless forms, no waiting on hold. Your benefits made simple.</p>
                <div class="footer-badge">
                    <i class="fa fa-heart"></i> 500+ Families Helped
                </div>
            </div>

            <!-- Column 2: Quick Navigation Links -->
            <div class="footer-col">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>

            <!-- Column 3: Dynamic Services List (Pulled from config.php) -->
            <div class="footer-col">
                <h4>Our Services</h4>
                <ul class="footer-services-list">
                    <!-- Loop through services array to build the list dynamically -->
                    <?php foreach ($footerServices as $svcTitle => $svcDesc): ?>
                        <li>
                            <a href="services.php">
                                <span class="svc-name"><?php echo $svcTitle; ?></span>
                                <span class="svc-desc"><?php echo $svcDesc; ?></span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Column 4: Detailed Contact Info & Social Icons -->
            <div class="footer-col footer-contact-col">
                <h4>Contact Us</h4>
                <ul class="footer-contact-list">
                    <li>
                        <i class="fa fa-phone"></i>
                        <a href="contact.php"><?php echo SITE_PHONE; ?></a>
                    </li>
                    <li>
                        <i class="fa fa-envelope"></i>
                        <a href="contact.php"><?php echo SITE_EMAIL_INFO; ?></a>
                    </li>
                    <li>
                        <i class="fa fa-envelope"></i>
                        <a href="contact.php"><?php echo SITE_EMAIL_GMAIL; ?></a>
                    </li>
                    <li>
                        <i class="fa fa-map-marker-alt"></i>
                        <?php echo SITE_ADDRESS; ?>
                    </li>
                </ul>

                <!-- Social Media Presence -->
                <p class="follow-label">Follow Us</p>
                <div class="social-links">
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

        </div><!-- /.footer-grid -->

        <!-- 2. Footer Bottom Bar: Copyright and Legal links -->
        <div class="footer-bottom">
            <div class="copyright">
                &copy; <?php echo date('Y'); ?> <?php echo SITE_NAME; ?>. All rights reserved. <?php echo SITE_TAGLINE; ?>
            </div>
            
            <!-- Quick Achievement Statistics -->
            <div class="footer-stats">
                <div class="footer-stat"><strong>98%</strong><span>Success Rate</span></div>
                <div class="footer-stat"><strong>500+</strong><span>Families Helped</span></div>
                <div class="footer-stat"><strong>$2M+</strong><span>Benefits Secured</span></div>
            </div>
            
            <!-- Legal Documents -->
            <div class="footer-legal">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
                <a href="#">Accessibility</a>
            </div>
        </div><!-- /.footer-bottom -->

    </div><!-- /.footer-inner -->
</footer>

<!-- 3. External Script Dependencies -->

<!-- AOS (Animate On Scroll) Library Initialization -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,  // Animation duration in ms
        once: true,      // Whether animation should happen only once - while scrolling down
        offset: 100      // Offset (in px) from the original trigger point
    });
</script>

<!-- EmailJS Library for handling contact form submissions via client-side JS -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>

<!-- Custom Application Logic (Hamburger menu, Scroll effects, Form handling) -->
<script src="assets/js/app.js"></script>
</body>
</html>

