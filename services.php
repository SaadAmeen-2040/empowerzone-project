<?php
$page_title = "Our Services – Empower Zone Consulting";
$phone = "+1 (718) 757-6928";
$email = "EmpowerZoneServices@gmail.com";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title><?= htmlspecialchars($page_title) ?></title>
  <meta name="description" content="Empower Zone helps you apply for SNAP, Cash Assistance, Medicaid, WIC and more. Full-service benefits consulting in New York.">
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
      --white:      #fff;
      --text:       #1a2a2a;
      --text-light: #667777;
      --gray-bg:    #f9fbfc;
      --border:     #e2eaea;
      --font:       'Inter', sans-serif;
    }
    html { scroll-behavior: smooth; }
    body { font-family: var(--font); color: var(--text); background: var(--white); line-height: 1.6; overflow-x: hidden; }
    a { text-decoration: none; color: inherit; }
    img { max-width: 100%; display: block; }

    /* NAVBAR */
    .navbar { position: fixed; top: 16px; left: 50%; transform: translateX(-50%); width: calc(100% - 48px); max-width: 1100px; background: rgba(255,255,255,0.97); border-radius: 14px; box-shadow: 0 4px 32px rgba(0,0,0,0.13); z-index: 1000; backdrop-filter: blur(10px); }
    .nav-container { display: flex; align-items: center; justify-content: space-between; padding: 10px 24px; gap: 16px; }
    .logo img { height: 52px; width: auto; object-fit: contain; }
    .nav-links { display: flex; list-style: none; gap: 8px; }
    .nav-links a { color: #1a2a2a; font-size: 15px; font-weight: 500; padding: 6px 14px; border-radius: 8px; transition: color 0.2s; }
    .nav-links a:hover, .nav-links a.active { color: var(--teal); }
    .call-btn { display: flex; align-items: center; gap: 8px; padding: 10px 22px; background: transparent; border: 2px solid var(--teal); color: var(--teal); border-radius: 10px; font-size: 15px; font-weight: 600; font-family: var(--font); cursor: pointer; transition: background 0.2s, color 0.2s; white-space: nowrap; }
    .call-btn:hover { background: var(--teal); color: var(--white); }
    .hamburger { display: none; flex-direction: column; gap: 5px; background: none; border: none; cursor: pointer; padding: 4px; }
    .hamburger span { display: block; width: 24px; height: 2px; background: #1a2a2a; border-radius: 2px; transition: transform 0.3s, opacity 0.3s; }
    .hamburger.active span:nth-child(1) { transform: translateY(7px) rotate(45deg); }
    .hamburger.active span:nth-child(2) { opacity: 0; }
    .hamburger.active span:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }

    /* HERO SECTION */
    .services-hero {
      position: relative;
      width: 100%;
      height: 100vh;
      min-height: 700px;
      overflow: hidden;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .hero-slider {
      position: absolute;
      top: 0; left: 0;
      width: 100%; height: 100%;
      z-index: 1;
      background-color: #000;
    }
    .hero-slide {
      position: absolute;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background-size: cover;
      background-position: center;
      opacity: 0;
      transition: opacity 1s ease-in-out;
    }
    .hero-slide.active {
      opacity: 1;
    }
    .overlay {
      position: absolute;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(14, 38, 43, 0.65); /* dark teal overlay */
    }
    .hero-content {
      position: relative;
      z-index: 10;
      width: 90%;
      max-width: 800px;
      text-align: center;
      margin-top: 80px; 
    }
    .slide-text {
      display: none;
      animation: fadeIn 0.8s;
    }
    .slide-text.active {
      display: block;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .hero-label {
      font-size: 0.85rem;
      letter-spacing: 2px;
      text-transform: uppercase;
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 15px;
      font-weight: 600;
    }
    .hero-label::before, .hero-label::after {
      content: '';
      display: block;
      width: 40px;
      height: 2px;
      background: white;
      opacity: 0.7;
    }
    .hero-title {
      font-size: 3.8rem;
      font-weight: 800;
      margin-bottom: 20px;
      line-height: 1.1;
    }
    .hero-subtitle {
      font-size: 1.2rem;
      margin-bottom: 15px;
      line-height: 1.5;
      font-weight: 500;
    }
    .hero-subtitle-2 {
      font-size: 1.1rem;
      margin-bottom: 35px;
      line-height: 1.5;
      opacity: 0.9;
    }
    .hero-buttons {
      display: flex;
      justify-content: center;
      gap: 15px;
      margin-bottom: 50px;
    }
    .btn {
      padding: 14px 28px;
      border-radius: 8px;
      font-weight: 600;
      font-size: 1rem;
      cursor: pointer;
      transition: all 0.3s ease;
      text-decoration: none;
      display: inline-block;
    }
    .btn-white {
      background: white;
      color: var(--teal);
      border: 2px solid white;
    }
    .btn-white:hover {
      background: transparent;
      color: white;
    }
    .btn-transparent {
      background: transparent;
      color: white;
      border: 2px solid white;
    }
    .btn-transparent:hover {
      background: white;
      color: var(--teal);
    }
    .hero-dots {
      display: flex;
      gap: 10px;
      margin-bottom: 20px;
      justify-content: center;
    }
    .hero-dots span {
      display: block;
      width: 10px;
      height: 10px;
      border-radius: 50%;
      background: white;
      cursor: pointer;
      opacity: 0.4;
      transition: opacity 0.3s, transform 0.3s;
    }
    .hero-dots span.active {
      opacity: 1;
      transform: scale(1.3);
    }
    .hero-call {
      font-size: 0.95rem;
      font-weight: 500;
      opacity: 0.9;
    }

    /* PROGRAMS SECTION */
    .programs-section {
      padding: 100px 24px;
      background: white;
      text-align: center;
    }
    .section-title {
      font-size: 2.5rem;
      font-weight: 800;
      color: var(--text);
      margin-bottom: 15px;
    }
    .section-title span {
      color: var(--teal);
    }
    .section-subtitle {
      color: var(--text-light);
      max-width: 600px;
      margin: 0 auto 50px;
      font-size: 1.05rem;
    }
    .programs-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 24px;
      max-width: 1100px;
      margin: 0 auto;
    }
    .program-card {
      background: var(--gray-bg);
      border-radius: 12px;
      padding: 40px 24px;
      text-align: center;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      display: flex;
      flex-direction: column;
      align-items: center;
      border: 1px solid rgba(0,0,0,0.02);
    }
    .program-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 35px rgba(0,0,0,0.06);
    }
    .program-icon {
      width: 60px;
      height: 60px;
      color: var(--teal);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 2rem;
      margin: 0 auto 20px;
    }
    .program-title {
      font-size: 1.25rem;
      font-weight: 700;
      margin-bottom: 15px;
      color: var(--text);
    }
    .program-desc {
      color: var(--text-light);
      font-size: 0.95rem;
      margin-bottom: 30px;
      line-height: 1.6;
      flex-grow: 1;
    }
    .btn-teal {
      background: var(--teal);
      color: white;
      border: 2px solid var(--teal);
      padding: 10px 24px;
      font-size: 0.95rem;
      width: 100%;
      max-width: 160px;
    }
    .btn-teal:hover {
      background: var(--teal-dark);
      border-color: var(--teal-dark);
      color: white;
    }

    /* CTA LIGHT SECTION */
    .cta-light-wrap {
      padding: 0 24px 100px;
      background: white;
    }
    .cta-light {
      background: var(--gray-bg);
      padding: 60px 40px;
      text-align: center;
      max-width: 1100px;
      margin: 0 auto;
      border-radius: 16px;
      border: 1px solid rgba(0,0,0,0.03);
    }
    .cta-light h2 {
      font-size: 1.8rem;
      font-weight: 700;
      margin-bottom: 15px;
      color: var(--text);
    }
    .cta-light p {
      color: var(--text-light);
      max-width: 800px;
      margin: 0 auto 30px;
      font-size: 1.05rem;
    }
    .cta-light-buttons {
      display: flex;
      justify-content: center;
      gap: 15px;
    }
    .btn-outline-teal {
      background: white;
      color: var(--teal);
      border: 2px solid var(--teal);
      padding: 12px 24px;
    }
    .btn-outline-teal:hover {
      background: var(--teal);
      color: white;
    }

    /* CTA TEAL SECTION */
    .cta-teal {
      background: #56989d; /* Match the exact color from the image */
      padding: 80px 24px;
      text-align: center;
      color: white;
    }
    .cta-teal h2 {
      font-size: 2.2rem;
      font-weight: 700;
      margin-bottom: 15px;
    }
    .cta-teal p {
      max-width: 600px;
      margin: 0 auto 40px;
      font-size: 1.1rem;
      opacity: 0.9;
    }
    .benefits-blocks {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin-bottom: 50px;
      flex-wrap: wrap;
    }
    .benefit-block {
      background: rgba(255,255,255,0.15);
      padding: 25px 30px;
      border-radius: 12px;
      text-align: center;
      flex: 1;
      min-width: 200px;
      max-width: 260px;
      border: 1px solid rgba(255,255,255,0.2);
    }
    .benefit-block strong {
      display: block;
      font-size: 1.15rem;
      margin-bottom: 8px;
    }
    .benefit-block span {
      font-size: 0.95rem;
      opacity: 0.85;
    }
    .cta-teal .btn-white {
      color: #56989d;
    }
    .cta-teal-buttons {
      display: flex;
      justify-content: center;
      gap: 15px;
      margin-bottom: 30px;
    }
    .cta-teal-footer {
      font-size: 0.9rem;
      opacity: 0.8;
      letter-spacing: 0.5px;
    }

    /* FOOTER */
    footer { background: #1a2e35; color: rgba(255,255,255,0.75); padding: 56px 24px 0; }
    .footer-grid { max-width: 1100px; margin: 0 auto; display: grid; grid-template-columns: 1.6fr 1fr 1.2fr 1.2fr; gap: 40px; padding-bottom: 40px; border-bottom: 1px solid rgba(255,255,255,0.1); }
    .footer-logo { width: 52px; height: 52px; object-fit: contain; margin-bottom: 14px; }
    .footer-brand p { font-size: 0.85rem; line-height: 1.7; color: rgba(255,255,255,0.6); margin-bottom: 16px; }
    .footer-badge { background: rgba(255,255,255,0.08); display: inline-flex; align-items: center; gap: 8px; padding: 8px 16px; border-radius: 20px; font-size: 0.82rem; color: rgba(255,255,255,0.75); }
    .footer-badge i { color: var(--teal); }
    footer h4 { font-weight: 800; font-size: 0.95rem; color: white; margin-bottom: 16px; }
    footer ul { list-style: none; }
    footer ul li { margin-bottom: 9px; }
    footer ul li a { font-size: 0.85rem; color: rgba(255,255,255,0.6); transition: color 0.2s; display: flex; align-items: center; gap: 6px; }
    footer ul li a::before { content: '›'; color: var(--teal); font-size: 1rem; }
    footer ul li a:hover { color: var(--teal); }
    .services-list li a { flex-direction: column; align-items: flex-start; gap: 2px; }
    .services-list li a::before { display: none; }
    .services-list li a .svc-name { font-size: 0.86rem; color: rgba(255,255,255,0.75); font-weight: 600; }
    .services-list li a .svc-sub { font-size: 0.78rem; color: rgba(255,255,255,0.45); }
    .footer-contact-list { list-style: none; }
    .footer-contact-list li { display: flex; align-items: flex-start; gap: 10px; font-size: 0.85rem; color: rgba(255,255,255,0.6); margin-bottom: 12px; }
    .footer-contact-list li i { color: var(--teal); margin-top: 3px; flex-shrink: 0; }
    .footer-contact-list a { color: rgba(255,255,255,0.6); transition: color 0.2s; }
    .footer-contact-list a:hover { color: var(--teal); }
    .social-links { display: flex; gap: 10px; margin-top: 14px; }
    .social-links a { width: 34px; height: 34px; background: rgba(255,255,255,0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: rgba(255,255,255,0.7); font-size: 0.85rem; transition: background 0.2s, color 0.2s; }
    .social-links a:hover { background: var(--teal); color: white; }
    .footer-bottom { max-width: 1100px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px; padding: 20px 0; font-size: 0.82rem; color: rgba(255,255,255,0.4); }
    .footer-stats { display: flex; gap: 28px; flex-wrap: wrap; }
    .footer-stat { text-align: center; }
    .footer-stat strong { display: block; font-size: 1rem; color: rgba(255,255,255,0.8); font-weight: 800; }
    .footer-stat span { font-size: 0.75rem; }
    .footer-legal { display: flex; gap: 16px; flex-wrap: wrap; }
    .footer-legal a { color: rgba(255,255,255,0.4); transition: color 0.2s; font-size: 0.82rem; }
    .footer-legal a:hover { color: var(--teal); }

    /* RESPONSIVE */
    @media (max-width: 900px) {
      .navbar { width: calc(100% - 24px); top: 10px; }
      .nav-links { display: none; position: absolute; top: calc(100% + 8px); left: 0; right: 0; background: rgba(255,255,255,0.97); border-radius: 12px; flex-direction: column; gap: 4px; padding: 12px 16px; box-shadow: 0 8px 32px rgba(0,0,0,0.15); }
      .nav-links.open { display: flex; }
      .hamburger { display: flex; }
      .hero-title { font-size: 2.8rem; }
      .programs-grid { grid-template-columns: repeat(2, 1fr); }
      .footer-grid { grid-template-columns: 1fr 1fr; }
    }
    @media (max-width: 600px) {
      .hero-title { font-size: 2.2rem; }
      .hero-buttons { flex-direction: column; width: 100%; max-width: 250px; margin: 0 auto 30px; }
      .cta-light-buttons, .cta-teal-buttons { flex-direction: column; align-items: center; }
      .btn { width: 100%; text-align: center; max-width: 250px; }
      .programs-grid { grid-template-columns: 1fr; }
      .footer-grid { grid-template-columns: 1fr; }
      .footer-bottom { flex-direction: column; align-items: flex-start; }
      .call-btn { display: none; }
    }
  </style>
</head>
<body>

  <!-- NAVBAR -->
  <nav class="navbar" id="navbar">
    <div class="nav-container">
      <div class="logo"><a href="index.php"><img src="images/logo .png" alt="Empower Zone Consulting Logo"></a></div>
      <ul class="nav-links" id="navLinks">
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="services.php" class="active">Services</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
      <button class="call-btn" onclick="window.location.href='tel:+17187576928'"><i class="fa fa-phone"></i> Call Now</button>
      <button class="hamburger" id="hamburger" aria-label="Toggle mobile menu"><span></span><span></span><span></span></button>
    </div>
  </nav>

  <!-- HERO SECTION -->
  <section class="services-hero">
    <div class="hero-slider">
      <div class="hero-slide active" style="background-image: url('images/doctor.avif')"></div>
      <div class="hero-slide" style="background-image: url('assets/images/food.png')"></div>
      <div class="hero-slide" style="background-image: url('images/hands.avif')"></div>
      <div class="overlay"></div>
    </div>

    <div class="hero-content">
      <div class="slide-texts">
        <!-- Slide 1 Text -->
        <div class="slide-text active">
          <div class="hero-label">YOUR BENEFITS ADVOCATE</div>
          <h1 class="hero-title">Medicaid & <span>Healthcare</span></h1>
          <p class="hero-subtitle">Get the healthcare coverage you need without the confusing paperwork and denial headaches.</p>
          <p class="hero-subtitle-2">Sit back, relax, and let us handle everything. No stress, no endless forms, no waiting on hold.</p>
        </div>
        <!-- Slide 2 Text -->
        <div class="slide-text">
          <div class="hero-label">NUTRITION ASSISTANCE</div>
          <h1 class="hero-title">SNAP (Food Stamps)</h1>
          <p class="hero-subtitle">Helping your family access essential nutrition benefits quickly and stress-free.</p>
          <p class="hero-subtitle-2">Don't let your family go hungry. We simplify the application so you can focus on what matters.</p>
        </div>
        <!-- Slide 3 Text -->
        <div class="slide-text">
          <div class="hero-label">FINANCIAL SUPPORT</div>
          <h1 class="hero-title">Cash Assistance</h1>
          <p class="hero-subtitle">Emergency financial help for rent, bills, and daily expenses when times are tough.</p>
          <p class="hero-subtitle-2">Get the financial relief you deserve without the typical red tape.</p>
        </div>
      </div>

      <div class="hero-buttons">
        <a href="contact.php" class="btn btn-white">Free Consultation</a>
        <a href="#programs" class="btn btn-transparent">View All Services</a>
      </div>

      <div class="hero-dots">
        <span class="active" onclick="goSlide(0)"></span>
        <span onclick="goSlide(1)"></span>
        <span onclick="goSlide(2)"></span>
      </div>

      <div class="hero-call">Call today: +1 (718) 757-6928</div>
    </div>
  </section>

  <!-- PROGRAMS WE COVER -->
  <section id="programs" class="programs-section">
    <h2 class="section-title">Programs We <span>Cover</span></h2>
    <p class="section-subtitle">Comprehensive benefit assistance services to help you access the support you deserve</p>

    <div class="programs-grid">
      <!-- Card 1 -->
      <div class="program-card">
        <div class="program-icon"><i class="fa fa-question-circle"></i></div>
        <h3 class="program-title">SNAP (Food Stamps)</h3>
        <p class="program-desc">We help you apply for or renew SNAP benefits so you and your family can access healthy food every month.</p>
        <a href="contact.php" class="btn btn-teal">Get Started</a>
      </div>
      <!-- Card 2 -->
      <div class="program-card">
        <div class="program-icon"><i class="fa fa-money-bill-wave"></i></div>
        <h3 class="program-title">Cash Assistance</h3>
        <p class="program-desc">Support with applications for financial help to cover rent, bills, or daily living expenses when times are tough.</p>
        <a href="contact.php" class="btn btn-teal">Get Started</a>
      </div>
      <!-- Card 3 -->
      <div class="program-card">
        <div class="program-icon"><i class="fa fa-desktop"></i></div>
        <h3 class="program-title">Medicaid</h3>
        <p class="program-desc">Guidance with healthcare coverage applications and renewals, ensuring you and your family stay protected.</p>
        <a href="contact.php" class="btn btn-teal">Get Started</a>
      </div>
      <!-- Card 4 -->
      <div class="program-card">
        <div class="program-icon"><i class="fa fa-check-circle"></i></div>
        <h3 class="program-title">WIC (Women, Infants & Children)</h3>
        <p class="program-desc">Assistance with WIC applications to provide essential nutrition and support for mothers and young children.</p>
        <a href="contact.php" class="btn btn-teal">Get Started</a>
      </div>
    </div>
  </section>

  <!-- CTA LIGHT -->
  <div class="cta-light-wrap">
    <div class="cta-light">
      <h2>Ready to Get Started?</h2>
      <p>If you're unsure where to start or which benefits you qualify for, Empower Zone is here to guide you. Our team listens to your needs, checks your eligibility, and walks you through every step, making the process simple and stress-free.</p>
      <div class="cta-light-buttons">
        <a href="tel:+17187576928" class="btn btn-teal">Call Now: +1 (718) 757-6928</a>
        <a href="mailto:EmpowerZoneServices@gmail.com" class="btn btn-outline-teal">Email Us</a>
      </div>
    </div>
  </div>

  <!-- CTA TEAL -->
  <section class="cta-teal">
    <h2>Ready to Get the Benefits You Deserve?</h2>
    <p>Stop struggling with confusing applications and denial letters. Let our experts handle everything for you</p>
    
    <div class="benefits-blocks">
      <div class="benefit-block">
        <strong>No Upfront Fees</strong>
        <span>Affordable payment plans</span>
      </div>
      <div class="benefit-block">
        <strong>98% Success Rate</strong>
        <span>Maximum benefits secured</span>
      </div>
      <div class="benefit-block">
        <strong>Bilingual Support</strong>
        <span>Hablamos Español available</span>
      </div>
    </div>

    <div class="cta-teal-buttons">
      <a href="contact.php" class="btn btn-white">Free Consultation</a>
      <a href="tel:+17187576928" class="btn btn-transparent">Call Now: +1 (718) 757-6928</a>
    </div>

    <div class="cta-teal-footer">
      • No obligation • Confidential • Professional service
    </div>
  </section>

  <!-- FOOTER -->
  <footer>
    <div class="footer-grid">

      <!-- Brand -->
      <div class="footer-brand">
        <img src="images/logo .png" alt="Empower Zone Logo" class="footer-logo">
        <p>We help New York families navigate government benefit programs with ease. No stress, no endless forms, no waiting on hold. Your benefits made simple.</p>
        <div class="footer-badge"><i class="fa fa-heart"></i> 500+ Families Helped</div>
      </div>

      <!-- Quick Links -->
      <div>
        <h4>Quick Links</h4>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About Us</a></li>
          <li><a href="services.php">Services</a></li>
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
        <p style="font-size:0.85rem;color:rgba(255,255,255,0.6);margin:8px 0 4px;">Follow Us</p>
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

  <script>
    const hamburger = document.getElementById('hamburger');
    const navLinks  = document.getElementById('navLinks');
    hamburger.addEventListener('click', () => {
      navLinks.classList.toggle('open');
      hamburger.classList.toggle('active');
    });

    // Slider Logic
    let current = 0;
    const slides = document.querySelectorAll('.hero-slide');
    const texts = document.querySelectorAll('.slide-text');
    const dots = document.querySelectorAll('.hero-dots span');

    function showSlide(i) {
      slides.forEach(s => s.classList.remove('active'));
      texts.forEach(t => t.classList.remove('active'));
      dots.forEach(d => d.classList.remove('active'));

      slides[i].classList.add('active');
      texts[i].classList.add('active');
      dots[i].classList.add('active');
      current = i;
    }

    function goSlide(i) {
      showSlide(i);
    }

    setInterval(() => {
      let next = (current + 1) % slides.length;
      showSlide(next);
    }, 6000); // 6 seconds for better reading time
  </script>
</body>
</html>
