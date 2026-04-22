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
</head>

<body>

    <!-- ===== NAVBAR ===== -->
    <nav class="navbar" id="navbar">
        <div class="nav-container">
            <div class="logo">
                <img src="images/logo .png" alt="Empower Zone Consulting Logo">
            </div>

            <ul class="nav-links" id="navLinks">
                <li><a href="#" class="active">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
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
