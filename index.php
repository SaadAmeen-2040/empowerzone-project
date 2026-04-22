<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empower Zone Consulting – Your Benefits. Your Advocate.</title>
    <meta name="description" content="Empower Zone Consulting helps you navigate benefits with ease. No stress, no endless forms, no waiting on hold. Get started today.">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link rel="stylesheet" href="style.css">

    <style>
        /* ===== FOOTER ===== */
        footer {
            background: #1a2e35;
            color: rgba(255,255,255,0.75);
            padding: 56px 24px 0;
        }
        .footer-grid {
            max-width: 1100px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1.6fr 1fr 1.2fr 1.2fr;
            gap: 40px;
            padding-bottom: 40px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .footer-logo {
            width: 52px; height: 52px; object-fit: contain;
            margin-bottom: 14px;
        }
        .footer-brand p {
            font-size: 0.85rem;
            line-height: 1.7;
            color: rgba(255,255,255,0.6);
            margin-bottom: 16px;
        }
        .footer-badge {
            background: rgba(255,255,255,0.08);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.82rem;
            color: rgba(255,255,255,0.75);
        }
        .footer-badge i { color: #3a9fa8; }
        footer h4 {
            font-weight: 800;
            font-size: 0.95rem;
            color: white;
            margin-bottom: 16px;
        }
        footer ul { list-style: none; }
        footer ul li { margin-bottom: 9px; }
        footer ul li a {
            font-size: 0.85rem;
            color: rgba(255,255,255,0.6);
            transition: color 0.2s;
            display: flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
        }
        footer ul li a::before {
            content: '›';
            color: #3a9fa8;
            font-size: 1rem;
        }
        footer ul li a:hover { color: #3a9fa8; }
        .services-list li a { flex-direction: column; align-items: flex-start; gap: 2px; }
        .services-list li a::before { display: none; }
        .services-list li a .svc-name { font-size: 0.86rem; color: rgba(255,255,255,0.75); font-weight: 600; }
        .services-list li a .svc-sub { font-size: 0.78rem; color: rgba(255,255,255,0.45); }
        .footer-contact-list { list-style: none; }
        .footer-contact-list li {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            font-size: 0.85rem;
            color: rgba(255,255,255,0.6);
            margin-bottom: 12px;
        }
        .footer-contact-list li i { color: #3a9fa8; margin-top: 3px; flex-shrink: 0; }
        .footer-contact-list a { color: rgba(255,255,255,0.6); text-decoration: none; transition: color 0.2s; }
        .footer-contact-list a:hover { color: #3a9fa8; }
        .social-links { display: flex; gap: 10px; margin-top: 14px; }
        .social-links a {
            width: 34px; height: 34px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            color: rgba(255,255,255,0.7);
            font-size: 0.85rem;
            text-decoration: none;
            transition: background 0.2s, color 0.2s;
        }
        .social-links a:hover { background: #3a9fa8; color: white; }
        .footer-bottom {
            max-width: 1100px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
            padding: 20px 0;
            font-size: 0.82rem;
            color: rgba(255,255,255,0.4);
        }
        .footer-stats { display: flex; gap: 28px; flex-wrap: wrap; }
        .footer-stat { text-align: center; }
        .footer-stat strong { display: block; font-size: 1rem; color: rgba(255,255,255,0.8); font-weight: 800; }
        .footer-stat span { font-size: 0.75rem; }
        .footer-legal { display: flex; gap: 16px; flex-wrap: wrap; }
        .footer-legal a { color: rgba(255,255,255,0.4); transition: color 0.2s; font-size: 0.82rem; text-decoration: none; }
        .footer-legal a:hover { color: #3a9fa8; }
        @media (max-width: 900px) { .footer-grid { grid-template-columns: 1fr 1fr; } }
        @media (max-width: 600px) { .footer-grid { grid-template-columns: 1fr; } .footer-bottom { flex-direction: column; align-items: flex-start; } .footer-stats { gap: 16px; } }
    </style>
</head>

<body>

    <!-- ===== NAVBAR ===== -->
    <nav class="navbar" id="navbar">
        <div class="nav-container">
            <div class="logo">
                <img src="images/logo .png" alt="Empower Zone Consulting Logo">
            </div>

            <ul class="nav-links" id="navLinks">
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>

            <button class="call-btn" id="callNowBtn" onclick="callNow()">
                <i class="fa fa-phone"></i> Call Now
            </button>

            <!-- Mobile hamburger -->
            <button class="hamburger" id="hamburger" aria-label="Toggle mobile menu">
                <span></span><span></span><span></span>
            </button>
        </div>
    </nav>

    <!-- ===== HERO SECTION ===== -->
    <section class="hero" id="hero">

        <!-- Background image with overlay -->
        <div class="hero-bg">
            <img src="images/food.png" alt="Family shopping for groceries" class="hero-img">
            <div class="hero-overlay"></div>
        </div>

        <div class="hero-content">

            <!-- Brand pill -->
            <div class="brand-pill">
                <span class="pill-dot"></span>
                EMPOWER ZONE CONSULTING
            </div>

            <!-- Main headline -->
            <h1 class="hero-heading">
                Your Benefits. Your Peace of Mind.<br>
                Your <span class="highlight">Advocate</span>
            </h1>

            <!-- Sub-text -->
            <p class="hero-sub">
                Sit back, relax, and let us do everything. No stress, no endless forms, no<br class="br-md">
                waiting on hold.
            </p>

            <!-- Feature badges -->
            <div class="feature-badges">
                <div class="badge" id="badge-wait">
                    <i class="fa-regular fa-clock"></i>
                    <span>No waiting on hold</span>
                </div>
                <div class="badge" id="badge-denial">
                    <i class="fa-regular fa-shield"></i>
                    <span>No denial worries</span>
                </div>
                <div class="badge" id="badge-rep">
                    <i class="fa-regular fa-user-group"></i>
                    <span>Personal representation</span>
                </div>
                <div class="badge" id="badge-max">
                    <i class="fa-regular fa-circle-check"></i>
                    <span>Maximum benefits</span>
                </div>
            </div>

            <!-- CTA Buttons -->
            <div class="cta-buttons">
                <a href="#contact" class="btn-primary" id="getStartedBtn">
                    Get Started Now <i class="fa fa-arrow-right"></i>
                </a>
                <a href="#how-it-works" class="btn-secondary" id="howItWorksBtn">
                    How It Works
                </a>
            </div>

        </div>
    </section>

    <!-- ===== CONTACT BAR ===== -->
    <div class="contact-bar" id="contact">
        <div class="contact-bar-inner">

            <div class="contact-item">
                <div class="contact-icon">
                    <i class="fa fa-phone"></i>
                </div>
                <div class="contact-text">
                    <span class="contact-label">CALL OR WHATSAPP NOW</span>
                    <a href="tel:+17187576928" class="contact-value">+1 (718) 757-6928</a>
                </div>
            </div>

            <div class="contact-divider"></div>

            <div class="contact-item">
                <div class="contact-icon">
                    <i class="fa fa-envelope"></i>
                </div>
                <div class="contact-text">
                    <span class="contact-label">EMAIL US</span>
                    <a href="mailto:EmpowerZoneServices@gmail.com" class="contact-value">EmpowerZoneServices@gmail.com</a>
                </div>
            </div>

            <a href="#" class="btn-consult" id="freeConsultBtn">
                Free Consultation
            </a>

        </div>
    </div>

    <!-- ===== FOOTER ===== -->
    <footer>
        <div class="footer-grid">

            <!-- Brand -->
            <div class="footer-brand">
                <img src="images/logo .png" alt="Empower Zone Logo" class="footer-logo">
                <p>We help New York families navigate government benefit programs with ease. No stress, no endless forms, no waiting on hold. Your benefits made simple.</p>
                <div class="footer-badge">
                    <i class="fa fa-heart"></i> 500+ Families Helped
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="#">Why Choose Us</a></li>
                    <li><a href="#">Success Stories</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>

            <!-- Our Services -->
            <div>
                <h4>Our Services</h4>
                <ul class="services-list">
                    <li><a href="services.php"><span class="svc-name">SNAP (Food Stamps)</span><span class="svc-sub">Maximum nutrition benefits</span></a></li>
                    <li><a href="services.php"><span class="svc-name">Cash Assistance</span><span class="svc-sub">Financial help for expenses</span></a></li>
                    <li><a href="services.php"><span class="svc-name">Medicaid</span><span class="svc-sub">Healthcare coverage</span></a></li>
                    <li><a href="services.php"><span class="svc-name">WIC Program</span><span class="svc-sub">Women, infants &amp; children</span></a></li>
                    <li><a href="services.php"><span class="svc-name">Application Assistance</span><span class="svc-sub">Full support from start to finish</span></a></li>
                    <li><a href="services.php"><span class="svc-name">Denial Appeals</span><span class="svc-sub">Fight for your benefits</span></a></li>
                </ul>
            </div>

            <!-- Contact Us -->
            <div>
                <h4>Contact Us</h4>
                <ul class="footer-contact-list">
                    <li><i class="fa fa-phone"></i> <a href="tel:+17187576928">+1 (718) 757-6928</a></li>
                    <li><i class="fa fa-envelope"></i> <a href="mailto:info@empowerzone.us">info@empowerzone.us</a></li>
                    <li><i class="fa fa-envelope"></i> <a href="mailto:EmpowerZoneServices@gmail.com">EmpowerZoneServices@gmail.com</a></li>
                    <li><i class="fa fa-map-marker-alt"></i> 16 Court Street, Brooklyn, NY</li>
                </ul>
                <p style="font-size:0.85rem; color:rgba(255,255,255,0.6); margin-bottom:8px; margin-top:4px;">Follow Us</p>
                <div class="social-links">
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

        </div>

        <div class="footer-bottom">
            <div>&copy; 2026 Empower Zone. All rights reserved. Your Benefits. Your Rights. Your Advocate.</div>
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
        </div>
    </footer>

    <script src="script.js"></script>
    <script>
        // Mobile hamburger toggle
        const hamburger = document.getElementById('hamburger');
        const navLinks  = document.getElementById('navLinks');
        hamburger.addEventListener('click', () => {
            navLinks.classList.toggle('open');
            hamburger.classList.toggle('active');
        });

        // Call Now function
        function callNow() {
            window.location.href = 'tel:+17187576928';
        }
    </script>

</body>
</html>
