<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Contact Us – Empower Zone Consulting</title>
  <meta name="description" content="Get your benefits started with a free consultation. Contact Empower Zone Consulting today.">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --teal:       #3a9fa8;
      --teal-dark:  #2c7d85;
      --teal-light: #e8f5f6;
      --teal-mid:   #4db8c2;
      --white:      #fff;
      --text:       #1a2a2a;
      --text-light: #8da3a3ff;
      --gray-bg:    #f4f7f8;
      --border:     #e2eaea;
      --font:       'Inter', sans-serif;
    }

    html { scroll-behavior: smooth; }

    body {
      font-family: var(--font);
      color: var(--text);
      background: var(--white);
      line-height: 1.6;
      overflow-x: hidden;
    }

    a { text-decoration: none; color: inherit; }
    img { max-width: 100%; display: block; }

    /* ===== NAVBAR ===== */
    .navbar {
      position: fixed;
      top: 16px;
      left: 50%;
      transform: translateX(-50%);
      width: calc(100% - 48px);
      max-width: 1100px;
      background: rgba(255,255,255,0.97);
      border-radius: 14px;
      box-shadow: 0 4px 32px rgba(0,0,0,0.13);
      z-index: 1000;
      backdrop-filter: blur(10px);
    }
    .nav-container {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 10px 24px;
      gap: 16px;
    }
    .logo img { height: 52px; width: auto; object-fit: contain; }
    .nav-links { display: flex; list-style: none; gap: 8px; }
    .nav-links a {
      color: #1a2a2a; font-size: 15px; font-weight: 500;
      padding: 6px 14px; border-radius: 8px;
      transition: color 0.2s;
    }
    .nav-links a:hover, .nav-links a.active { color: var(--teal); }
    .call-btn {
      display: flex; align-items: center; gap: 8px;
      padding: 10px 22px; background: transparent;
      border: 2px solid var(--teal); color: var(--teal);
      border-radius: 10px; font-size: 15px; font-weight: 600;
      font-family: var(--font); cursor: pointer;
      transition: background 0.2s, color 0.2s; white-space: nowrap;
    }
    .call-btn:hover { background: var(--teal); color: var(--white); }
    .hamburger {
      display: none; flex-direction: column; gap: 5px;
      background: none; border: none; cursor: pointer; padding: 4px;
    }
    .hamburger span {
      display: block; width: 24px; height: 2px;
      background: #1a2a2a; border-radius: 2px;
      transition: transform 0.3s, opacity 0.3s;
    }
    .hamburger.active span:nth-child(1) { transform: translateY(7px) rotate(45deg); }
    .hamburger.active span:nth-child(2) { opacity: 0; }
    .hamburger.active span:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }

    /* ===== PAGE HEADER ===== */
    .page-header {
      background: var(--gray-bg);
      padding: 130px 24px 60px;
      text-align: center;
    }
    .page-header h1 {
      font-size: clamp(28px, 4vw, 48px);
      font-weight: 900;
      color: var(--text);
      margin-bottom: 16px;
    }
    .page-header h1 span { color: var(--teal); }
    .page-header p {
      font-size: 16px;
      color: var(--text-light);
      max-width: 560px;
      margin: 0 auto;
      line-height: 1.75;
    }
    .page-header p span { color: var(--teal); font-style: italic; }

    /* ===== MAIN CONTACT SECTION ===== */
    .contact-section {
      background: var(--gray-bg);
      padding: 0 24px 70px;
    }
    .contact-wrapper {
      max-width: 1100px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 32px;
      align-items: start;
    }

    /* ===== FORM CARD ===== */
    .form-card {
      background: var(--white);
      border-radius: 16px;
      padding: 36px 32px;
      box-shadow: 0 2px 24px rgba(0,0,0,0.07);
    }
    .form-card-title {
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 18px;
      font-weight: 700;
      color: var(--text);
      margin-bottom: 24px;
    }
    .form-card-title i { color: var(--teal); font-size: 18px; }

    .form-group { margin-bottom: 16px; }
    .form-group input,
    .form-group select,
    .form-group textarea {
      width: 100%;
      border: 1.5px solid var(--border);
      border-radius: 8px;
      padding: 13px 16px;
      font-size: 14px;
      font-family: var(--font);
      color: var(--text);
      background: var(--white);
      outline: none;
      transition: border-color 0.2s;
      appearance: none;
    }
    .form-group input::placeholder,
    .form-group textarea::placeholder { color: #3f4949ff; }
    .form-group select { color: #090a0aff; cursor: pointer; }
    .form-group select:focus,
    .form-group input:focus,
    .form-group textarea:focus { border-color: var(--teal); }
    .form-group textarea { resize: vertical; min-height: 110px; }

    .btn-submit {
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      background: var(--teal-dark);
      color: var(--white);
      font-size: 15px;
      font-weight: 700;
      padding: 15px 28px;
      border-radius: 10px;
      border: none;
      cursor: pointer;
      font-family: var(--font);
      transition: background 0.2s, transform 0.2s, box-shadow 0.2s;
      box-shadow: 0 4px 18px rgba(44,125,133,0.25);
      margin-top: 6px;
    }
    .btn-submit:hover {
      background: var(--teal);
      transform: translateY(-2px);
      box-shadow: 0 8px 26px rgba(44,125,133,0.35);
    }

    /* ===== RIGHT COLUMN ===== */
    .contact-right { display: flex; flex-direction: column; gap: 14px; }

    /* Info cards grid */
    .info-cards-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 14px;
    }
    .info-card {
      background: var(--white);
      border-radius: 14px;
      padding: 20px 18px;
      box-shadow: 0 2px 14px rgba(0,0,0,0.06);
      display: flex;
      align-items: flex-start;
      gap: 14px;
      transition: transform 0.2s, box-shadow 0.2s;
    }
    .info-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 6px 22px rgba(0,0,0,0.10);
    }
    .info-card-icon {
      width: 42px; height: 42px;
      background: var(--teal-light);
      border-radius: 10px;
      display: flex; align-items: center; justify-content: center;
      flex-shrink: 0;
      color: var(--teal);
      font-size: 17px;
    }
    .info-card-body h4 {
      font-size: 14px;
      font-weight: 700;
      color: var(--text);
      margin-bottom: 3px;
    }
    .info-card-body p {
      font-size: 13px;
      color: var(--text-light);
      line-height: 1.5;
    }
    .info-card-body a { color: var(--text-light); transition: color 0.2s; }
    .info-card-body a:hover { color: var(--teal); }

    /* Why choose us box */
    .why-box {
      background: var(--white);
      border-radius: 14px;
      padding: 24px 22px;
      box-shadow: 0 2px 14px rgba(0,0,0,0.06);
    }
    .why-box h3 {
      font-size: 16px;
      font-weight: 700;
      color: var(--text);
      margin-bottom: 16px;
    }
    .why-list { list-style: none; display: flex; flex-direction: column; gap: 10px; }
    .why-list li {
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 14px;
      color: var(--text);
    }
    .why-list li::before {
      content: '';
      width: 8px; height: 8px;
      background: var(--teal);
      border-radius: 50%;
      flex-shrink: 0;
    }

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
    .footer-badge i { color: var(--teal); }
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
    }
    footer ul li a::before {
      content: '›';
      color: var(--teal);
      font-size: 1rem;
    }
    footer ul li a:hover { color: var(--teal); }

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
    .footer-contact-list li i { color: var(--teal); margin-top: 3px; flex-shrink: 0; }

    .social-links { display: flex; gap: 10px; margin-top: 14px; }
    .social-links a {
      width: 34px; height: 34px;
      background: rgba(255,255,255,0.1);
      border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      color: rgba(255,255,255,0.7);
      font-size: 0.85rem;
      transition: background 0.2s, color 0.2s;
    }
    .social-links a:hover { background: var(--teal); color: white; }

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
    .footer-legal a { color: rgba(255,255,255,0.4); transition: color 0.2s; font-size: 0.82rem; }
    .footer-legal a:hover { color: var(--teal); }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 900px) {
      .navbar { width: calc(100% - 24px); top: 10px; }
      .nav-links {
        display: none;
        position: absolute;
        top: calc(100% + 8px);
        left: 0; right: 0;
        background: rgba(255,255,255,0.97);
        border-radius: 12px;
        flex-direction: column;
        gap: 4px;
        padding: 12px 16px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.15);
      }
      .nav-links.open { display: flex; }
      .hamburger { display: flex; }
      .contact-wrapper { grid-template-columns: 1fr; }
      .footer-grid { grid-template-columns: 1fr 1fr; }
    }
    @media (max-width: 600px) {
      .page-header { padding: 110px 16px 40px; }
      .form-card { padding: 24px 18px; }
      .info-cards-grid { grid-template-columns: 1fr; }
      .footer-grid { grid-template-columns: 1fr; }
      .footer-bottom { flex-direction: column; align-items: flex-start; }
      .footer-stats { gap: 16px; }
      .call-btn { display: none; }
    }
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
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#" class="active">Contact</a></li>
      </ul>
      <button class="call-btn" onclick="window.location.href='tel:+17187576928'">
        <i class="fa fa-phone"></i> Call Now
      </button>
      <button class="hamburger" id="hamburger" aria-label="Toggle mobile menu">
        <span></span><span></span><span></span>
      </button>
    </div>
  </nav>

  <!-- ===== PAGE HEADER ===== -->
  <div class="page-header">
    <h1>Get Your <span>Benefits Started</span></h1>
    <p>Take one small step — and we'll <span>handle the rest.</span> No stress, no endless forms, no waiting on hold.</p>
  </div>

  <!-- ===== MAIN CONTACT SECTION ===== -->
  <section class="contact-section">
    <div class="contact-wrapper">

      <!-- LEFT: Form -->
      <div class="form-card">
        <div class="form-card-title">
          <i class="fa fa-paper-plane"></i>
          Free Benefits Consultation
        </div>

        <form id="contactForm" action="#" method="POST">
          <div class="form-group">
            <input type="text" id="fullName" name="full_name" placeholder="Your Full Name" required>
          </div>
          <div class="form-group">
            <input type="email" id="emailAddress" name="email" placeholder="Your Email Address" required>
          </div>
          <div class="form-group">
            <input type="tel" id="phoneNumber" name="phone" placeholder="Your Phone Number">
          </div>
          <div class="form-group">
            <select id="programSelect" name="program">
              <option value="" disabled selected>Select Program You Need Help With</option>
              <option value="snap">SNAP (Food Stamps)</option>
              <option value="cash">Cash Assistance</option>
              <option value="medicaid">Medicaid</option>
              <option value="wic">WIC Program</option>
              <option value="application">Application Assistance</option>
              <option value="denial">Denial Appeals</option>
              <option value="other">Other</option>
            </select>
          </div>
          <div class="form-group">
            <textarea id="message" name="message" placeholder="Tell us about your situation or any questions you have..."></textarea>
          </div>
          <button type="submit" class="btn-submit" id="submitBtn">
            <i class="fa fa-paper-plane"></i> Get Free Consultation
          </button>
        </form>
      </div>

      <!-- RIGHT: Info Cards + Why Choose Us -->
      <div class="contact-right">
        <div class="info-cards-grid">

          <div class="info-card">
            <div class="info-card-icon"><i class="fa fa-phone"></i></div>
            <div class="info-card-body">
              <h4>Call Us Now</h4>
              <p><a href="tel:+17187576928">+1 (718) 757-6928</a></p>
            </div>
          </div>

          <div class="info-card">
            <div class="info-card-icon"><i class="fab fa-whatsapp"></i></div>
            <div class="info-card-body">
              <h4>WhatsApp</h4>
              <p><a href="https://wa.me/17187576928" target="_blank">Message us directly</a></p>
            </div>
          </div>

          <div class="info-card">
            <div class="info-card-icon"><i class="fa fa-envelope"></i></div>
            <div class="info-card-body">
              <h4>Email Us</h4>
              <p><a href="mailto:EmpowerZoneServices@gmail.com">EmpowerZoneServices@gmail.com</a></p>
            </div>
          </div>

          <div class="info-card">
            <div class="info-card-icon"><i class="fa fa-clock"></i></div>
            <div class="info-card-body">
              <h4>Working Hours</h4>
              <p>Mon–Fri: 9AM–6PM EST</p>
            </div>
          </div>

          <div class="info-card">
            <div class="info-card-icon"><i class="fa fa-users"></i></div>
            <div class="info-card-body">
              <h4>Service Area</h4>
              <p>Serving New York Families</p>
            </div>
          </div>

          <div class="info-card">
            <div class="info-card-icon"><i class="fa fa-shield-alt"></i></div>
            <div class="info-card-body">
              <h4>Confidential</h4>
              <p>100% Private &amp; Secure</p>
            </div>
          </div>

        </div>

        <div class="why-box">
          <h3>Why Choose Us?</h3>
          <ul class="why-list">
            <li>No upfront fees – pay only when approved</li>
            <li>98% success rate with applications</li>
            <li>Bilingual support (English &amp; Spanish)</li>
            <li>Authorized representation with agencies</li>
          </ul>
        </div>
      </div>

    </div>
  </section>

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
          <li><a href="#">Services</a></li>
          <li><a href="#">Why Choose Us</a></li>
          <li><a href="#">Success Stories</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
      </div>

      <!-- Our Services -->
      <div>
        <h4>Our Services</h4>
        <ul class="services-list">
          <li><a href="#"><span class="svc-name">SNAP (Food Stamps)</span><span class="svc-sub">Maximum nutrition benefits</span></a></li>
          <li><a href="#"><span class="svc-name">Cash Assistance</span><span class="svc-sub">Financial help for expenses</span></a></li>
          <li><a href="#"><span class="svc-name">Medicaid</span><span class="svc-sub">Healthcare coverage</span></a></li>
          <li><a href="#"><span class="svc-name">WIC Program</span><span class="svc-sub">Women, infants &amp; children</span></a></li>
          <li><a href="#"><span class="svc-name">Application Assistance</span><span class="svc-sub">Full support from start to finish</span></a></li>
          <li><a href="#"><span class="svc-name">Denial Appeals</span><span class="svc-sub">Fight for your benefits</span></a></li>
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
      <div>© 2026 Empower Zone. All rights reserved. Your Benefits. Your Rights. Your Advocate.</div>
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

  <script>
    // Hamburger toggle
    const hamburger = document.getElementById('hamburger');
    const navLinks  = document.getElementById('navLinks');
    hamburger.addEventListener('click', () => {
      navLinks.classList.toggle('open');
      hamburger.classList.toggle('active');
    });

    // Form submit handler
    document.getElementById('contactForm').addEventListener('submit', function(e) {
      e.preventDefault();
      const btn = document.getElementById('submitBtn');
      btn.innerHTML = '<i class="fa fa-check"></i> Message Sent!';
      btn.style.background = '#2c7d85';
      setTimeout(() => {
        btn.innerHTML = '<i class="fa fa-paper-plane"></i> Get Free Consultation';
        btn.style.background = '';
        this.reset();
      }, 3000);
    });
  </script>
</body>
</html>
