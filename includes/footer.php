<!-- ===== SITE FOOTER ===== -->
<footer class="site-footer">
    <div class="footer-inner">

        <!-- Grid: 4 columns -->
        <div class="footer-grid">

            <!-- Column 1: Brand -->
            <div class="footer-col footer-brand">
                <img src="assets/images/logo .png" alt="Empower Zone Logo" class="footer-logo">
                <p>We help New York families navigate government benefit programs with ease. No stress, no endless forms, no waiting on hold. Your benefits made simple.</p>
                <div class="footer-badge">
                    <i class="fa fa-heart"></i> 500+ Families Helped
                </div>
            </div>

            <!-- Column 2: Quick Links -->
            <div class="footer-col">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>

            <!-- Column 3: Services (dynamic from config) -->
            <div class="footer-col">
                <h4>Our Services</h4>
                <ul class="footer-services-list">
                    <!-- Loop through services array (from config.php) to build the footer list -->
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

            <!-- Column 4: Contact Info -->
            <div class="footer-col footer-contact-col">
                <h4>Contact Us</h4>
                <ul class="footer-contact-list">
                    <li>
                        <i class="fa fa-phone"></i>
                        <a href="tel:<?php echo SITE_PHONE_RAW; ?>"><?php echo SITE_PHONE; ?></a>
                    </li>
                    <li>
                        <i class="fa fa-envelope"></i>
                        <a href="mailto:<?php echo SITE_EMAIL_INFO; ?>"><?php echo SITE_EMAIL_INFO; ?></a>
                    </li>
                    <li>
                        <i class="fa fa-envelope"></i>
                        <a href="mailto:<?php echo SITE_EMAIL_GMAIL; ?>"><?php echo SITE_EMAIL_GMAIL; ?></a>
                    </li>
                    <li>
                        <i class="fa fa-map-marker-alt"></i>
                        <?php echo SITE_ADDRESS; ?>
                    </li>
                </ul>

                <p class="follow-label">Follow Us</p>
                <div class="social-links">
                    
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

        </div><!-- /.footer-grid -->

        <!-- Bottom Bar -->
        <div class="footer-bottom">
            <div class="copyright">
                &copy; <?php echo date('Y'); ?> <?php echo SITE_NAME; ?>. All rights reserved. <?php echo SITE_TAGLINE; ?>
            </div>
            <div class="footer-stats">
                <div class="footer-stat"><strong>98%</strong><span>Success Rate</span></div>
                <div class="footer-stat"><strong>500+</strong><span>Families Helped</span></div>
                <div class="footer-stat"><strong>$2M+</strong><span>Benefits Secured</span></div>
            </div>
            <div class="footer-legal">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
                <a href="#">Accessibility</a>
            </div>
        </div><!-- /.footer-bottom -->

    </div><!-- /.footer-inner -->
</footer>

<!-- AOS JS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true,
        offset: 100
    });
</script>

<!-- EmailJS -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>

<!-- Main JS -->
<script src="assets/js/app.js"></script>
</body>
</html>
