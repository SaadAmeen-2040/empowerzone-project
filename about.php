<?php
$page_title = "About Us - Empower Zone";
$phone = "+1 (718) 757-6928";
$email = "info@empowerzone.us";
$address = "We Care Center, Brooklyn, NY";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title><?= htmlspecialchars($page_title) ?></title>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Open+Sans:wght@400;500;600&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --teal: #3a9fa8;
      --teal-dark: #2c7d85;
      --teal-light: #e8f5f6;
      --gold: #c9a84c;
      --text: #333;
      --text-light: #666;
      --white: #fff;
      --gray-bg: #f7f9fa;
      --border: #e0e0e0;
    }

    body {
      font-family: 'Open Sans', sans-serif;
      color: var(--text);
      font-size: 15px;
      line-height: 1.7;
      overflow-x: hidden;
    }

    a { text-decoration: none; color: inherit; }
    img { max-width: 100%; }

    .hero {
      position: relative;
      width: 100vw;
      height: 100vh;
      background: linear-gradient(rgba(0,0,0,0.52), rgba(0,0,0,0.52)),
                  url('images/food.png') center/cover no-repeat;
      display: flex; align-items: center; justify-content: center;
      text-align: center;
      padding: 80px 24px;
    }
    .hero-content h1 {
      font-family: 'Nunito', sans-serif;
      font-size: 2.8rem;
      font-weight: 900;
      color: white;
      margin-bottom: 14px;
    }
    .hero-content p {
      color: rgba(255,255,255,0.88);
      font-size: 1.05rem;
      font-style: italic;
    }

    section { padding: 64px 24px; }
    .container { max-width: 1100px; margin: 0 auto; }
    .section-label {
      font-family: 'Nunito', sans-serif;
      font-size: 1.75rem;
      font-weight: 800;
      color: var(--teal-dark);
      text-align: center;
      margin-bottom: 14px;
    }
    .section-sub {
      text-align: center;
      color: var(--text-light);
      max-width: 620px;
      margin: 0 auto 36px;
      font-size: 0.97rem;
    }
    .divider {
      width: 50px; height: 3px;
      background: var(--teal);
      margin: 12px auto 32px;
      border-radius: 2px;
    }

    .about-section { background: var(--white); }
    .about-section p.about-desc {
      text-align: center;
      max-width: 680px;
      margin: 0 auto;
      color: var(--text-light);
      font-size: 0.97rem;
    }

    .mission-box {
      background: var(--teal-light);
      border-left: 4px solid var(--teal);
      border-radius: 8px;
      padding: 32px 40px;
      text-align: center;
      max-width: 700px;
      margin: 0 auto;
    }
    .mission-box h3 {
      font-family: 'Nunito', sans-serif;
      font-weight: 800;
      font-size: 1.15rem;
      color: var(--teal-dark);
      margin-bottom: 10px;
    }
    .mission-box p { color: var(--text); font-style: italic; }

    .why-section { background: var(--gray-bg); }
    .cards-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 24px;
    }
    .card {
      background: white;
      border-radius: 12px;
      padding: 28px 20px;
      text-align: center;
      box-shadow: 0 2px 12px rgba(0,0,0,0.06);
      transition: transform .2s, box-shadow .2s;
    }
    .card:hover { transform: translateY(-4px); box-shadow: 0 8px 28px rgba(0,0,0,0.1); }
    .card-icon {
      width: 52px; height: 52px;
      background: var(--teal-light);
      border-radius: 12px;
      display: flex; align-items: center; justify-content: center;
      margin: 0 auto 16px;
      font-size: 1.3rem;
      color: var(--teal);
    }
    .card h4 {
      font-family: 'Nunito', sans-serif;
      font-weight: 800;
      font-size: 0.97rem;
      margin-bottom: 8px;
      color: var(--text);
    }
    .card p { font-size: 0.86rem; color: var(--text-light); }

    .care-section {
      background: var(--white);
      padding: 48px 24px;
    }
    .care-box {
      background: var(--gray-bg);
      border-radius: 12px;
      padding: 36px 40px;
      text-align: center;
      max-width: 820px;
      margin: 0 auto;
    }
    .care-box h3 {
      font-family: 'Nunito', sans-serif;
      font-weight: 800;
      font-size: 1.15rem;
      margin-bottom: 10px;
      color: var(--teal-dark);
    }
    .care-box p { color: var(--text-light); }

    .cta-banner {
      background: var(--white);
      padding: 48px 24px;
      text-align: center;
    }
    .cta-banner blockquote {
      font-size: 1.05rem;
      font-style: italic;
      color: var(--text);
      margin-bottom: 28px;
      max-width: 600px;
      margin-left: auto; margin-right: auto;
    }
    .cta-buttons { display: flex; gap: 14px; justify-content: center; flex-wrap: wrap; }
    .btn-primary {
      background: var(--teal);
      color: white;
      padding: 13px 28px;
      border-radius: 30px;
      font-weight: 700;
      font-size: 0.93rem;
      display: inline-flex; align-items: center; gap: 8px;
      transition: background .2s;
    }
    .btn-primary:hover { background: var(--teal-dark); }
    .btn-outline {
      border: 2px solid var(--teal);
      color: var(--teal);
      padding: 11px 28px;
      border-radius: 30px;
      font-weight: 700;
      font-size: 0.93rem;
      display: inline-flex; align-items: center; gap: 8px;
      transition: all .2s;
    }
    .btn-outline:hover { background: var(--teal); color: white; }

    .stories-section { background: var(--gray-bg); }
    .testimonial-featured {
      background: white;
      border-radius: 14px;
      padding: 36px;
      display: flex;
      gap: 28px;
      align-items: flex-start;
      box-shadow: 0 2px 16px rgba(0,0,0,0.07);
      max-width: 820px;
      margin: 0 auto 32px;
      justify-content: space-between;
    }
    .testimonial-featured .avatar {
      width: 76px; height: 76px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid var(--teal-light);
      flex-shrink: 0;
    }
    .avatar-placeholder {
      width: 76px; height: 76px;
      border-radius: 50%;
      background: linear-gradient(135deg, var(--teal), var(--teal-dark));
      display: flex; align-items: center; justify-content: center;
      font-size: 1.8rem;
      color: white;
      flex-shrink: 0;
    }
    .testimonial-featured .info h4 {
      font-family: 'Nunito', sans-serif;
      font-weight: 800;
      font-size: 1rem;
      color: var(--teal-dark);
    }
    .testimonial-featured .info .role {
      font-size: 0.83rem;
      color: var(--teal);
      margin-bottom: 2px;
    }
    .testimonial-featured .info .location {
      font-size: 0.82rem;
      color: var(--text-light);
      margin-bottom: 6px;
    }
    .stars { color: #f5a623; font-size: 0.9rem; }
    .testimonial-body { flex: 1; }
    .testimonial-body blockquote {
      font-size: 0.97rem;
      color: var(--text);
      font-style: italic;
      margin-bottom: 14px;
      line-height: 1.75;
    }
    .program-tag {
      display: inline-flex; align-items: center; gap: 6px;
      background: var(--teal-light);
      color: var(--teal-dark);
      padding: 5px 14px;
      border-radius: 20px;
      font-size: 0.82rem;
      font-weight: 600;
    }
    .testimonial-thumbs {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 16px;
      max-width: 820px;
      margin: 0 auto;
    }
    .thumb-card {
      background: white;
      border-radius: 10px;
      padding: 16px;
      text-align: center;
      border: 2px solid transparent;
      cursor: pointer;
      transition: border-color .2s;
    }
    .thumb-card.active { border-color: var(--teal); }
    .thumb-avatar {
      width: 48px; height: 48px;
      border-radius: 50%;
      background: linear-gradient(135deg, var(--teal-light), var(--teal));
      display: flex; align-items: center; justify-content: center;
      margin: 0 auto 8px;
      font-size: 1.2rem;
      color: white;
    }
    .thumb-card h5 { font-size: 0.83rem; font-weight: 700; }
    .thumb-card p { font-size: 0.77rem; color: var(--text-light); }
    .dots {
      display: flex; justify-content: center; gap: 8px;
      margin-top: 24px;
    }
    .dot {
      width: 10px; height: 10px;
      border-radius: 50%;
      background: var(--border);
      cursor: pointer;
    }
    .dot.active { background: var(--teal); }

    .why2-section { background: var(--white); }
    .stats-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 24px;
      margin-bottom: 48px;
    }
    .stat-card {
      background: var(--teal-light);
      border-radius: 12px;
      padding: 28px 20px;
      text-align: center;
    }
    .stat-card .stat-icon {
      width: 48px; height: 48px;
      background: var(--teal);
      border-radius: 10px;
      display: flex; align-items: center; justify-content: center;
      margin: 0 auto 12px;
      color: white; font-size: 1.2rem;
    }
    .stat-card .stat-num {
      font-family: 'Nunito', sans-serif;
      font-size: 1.7rem;
      font-weight: 900;
      color: var(--teal-dark);
    }
    .stat-card .stat-label {
      font-size: 0.84rem;
      color: var(--text-light);
      font-weight: 600;
    }

    .final-cta {
      background: var(--gray-bg);
      text-align: center;
      padding: 52px 24px;
    }
    .final-cta h2 {
      font-family: 'Nunito', sans-serif;
      font-size: 1.5rem;
      font-weight: 800;
      margin-bottom: 10px;
      color: var(--text);
    }
    .final-cta p { color: var(--text-light); margin-bottom: 28px; }

    footer {
      background: #1a2e35;
      color: rgba(255,255,255,0.75);
      padding: 56px 24px 24px;
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
    .footer-brand .logo { color: white; margin-bottom: 14px; }
    .footer-brand p { font-size: 0.85rem; line-height: 1.7; color: rgba(255,255,255,0.6); }
    .footer-badge {
      margin-top: 16px;
      background: rgba(255,255,255,0.08);
      display: inline-flex; align-items: center; gap: 8px;
      padding: 8px 16px;
      border-radius: 20px;
      font-size: 0.82rem;
      color: rgba(255,255,255,0.75);
    }
    footer h4 {
      font-family: 'Nunito', sans-serif;
      font-weight: 800;
      font-size: 0.95rem;
      color: white;
      margin-bottom: 16px;
    }
    footer ul { list-style: none; }
    footer ul li { margin-bottom: 9px; }
    footer ul li a { font-size: 0.85rem; color: rgba(255,255,255,0.6); transition: color .2s; }
    footer ul li a:hover { color: var(--teal); }
    .footer-contact li {
      display: flex; align-items: flex-start; gap: 10px;
      font-size: 0.85rem; color: rgba(255,255,255,0.6);
      margin-bottom: 12px;
    }
    .footer-contact li i { color: var(--teal); margin-top: 3px; flex-shrink: 0; }
    .social-links { display: flex; gap: 10px; margin-top: 14px; }
    .social-links a {
      width: 34px; height: 34px;
      background: rgba(255,255,255,0.1);
      border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      color: rgba(255,255,255,0.7);
      font-size: 0.85rem;
      transition: background .2s, color .2s;
    }
    .social-links a:hover { background: var(--teal); color: white; }
    .footer-bottom {
      max-width: 1100px;
      margin: 24px auto 0;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 12px;
      font-size: 0.82rem;
      color: rgba(255,255,255,0.4);
    }
    .footer-stats {
      display: flex; gap: 24px;
    }
    .footer-stats span {
      font-weight: 700;
      color: rgba(255,255,255,0.65);
    }

    @media (max-width: 900px) {
      .cards-grid, .stats-grid { grid-template-columns: repeat(2, 1fr); }
      .testimonial-thumbs { grid-template-columns: repeat(2, 1fr); }
      .footer-grid { grid-template-columns: 1fr 1fr; }
    }
    @media (max-width: 640px) {
      .hero-content h1 { font-size: 1.9rem; }
      .nav-links { display: none; }
      .cards-grid, .stats-grid, .testimonial-thumbs { grid-template-columns: 1fr 1fr; }
      .footer-grid { grid-template-columns: 1fr; }
      .testimonial-featured { flex-direction: column; }
    }
  </style>
  <style>
    /* NAVBAR */
    .ez-nav { position:fixed; top:16px; left:50%; transform:translateX(-50%); width:calc(100% - 48px); max-width:1100px; background:rgba(255,255,255,0.97); border-radius:14px; box-shadow:0 4px 32px rgba(0,0,0,0.13); z-index:1000; backdrop-filter:blur(10px); }
    .ez-nav-inner { display:flex; align-items:center; justify-content:space-between; padding:10px 24px; gap:16px; }
    .ez-nav .logo img { height:52px; width:auto; object-fit:contain; }
    .ez-nav ul { display:flex; list-style:none; gap:8px; }
    .ez-nav ul a { color:#1a2a2a; font-size:15px; font-weight:500; padding:6px 14px; border-radius:8px; text-decoration:none; transition:color .2s; font-family:'Inter',sans-serif; }
    .ez-nav ul a:hover, .ez-nav ul a.active { color:#3a9fa8; }
    .ez-call-btn { display:flex; align-items:center; gap:8px; padding:10px 22px; background:transparent; border:2px solid #3a9fa8; color:#3a9fa8; border-radius:10px; font-size:15px; font-weight:600; cursor:pointer; font-family:'Inter',sans-serif; transition:background .2s,color .2s; white-space:nowrap; }
    .ez-call-btn:hover { background:#3a9fa8; color:#fff; }
    .ez-hamburger { display:none; flex-direction:column; gap:5px; background:none; border:none; cursor:pointer; padding:4px; }
    .ez-hamburger span { display:block; width:24px; height:2px; background:#1a2a2a; border-radius:2px; transition:transform .3s,opacity .3s; }
    .ez-hamburger.active span:nth-child(1) { transform:translateY(7px) rotate(45deg); }
    .ez-hamburger.active span:nth-child(2) { opacity:0; }
    .ez-hamburger.active span:nth-child(3) { transform:translateY(-7px) rotate(-45deg); }
    .ez-nav-mobile { display:none; position:absolute; top:calc(100% + 8px); left:0; right:0; background:rgba(255,255,255,0.97); border-radius:12px; flex-direction:column; gap:4px; padding:12px 16px; box-shadow:0 8px 32px rgba(0,0,0,0.15); }
    .ez-nav-mobile.open { display:flex; }
    @media(max-width:900px){ .ez-nav{width:calc(100% - 24px);top:10px;} .ez-nav ul{display:none;} .ez-hamburger{display:flex;} }
  </style>
</head>
<body>

<nav class="ez-nav" id="ezNav">
  <div class="ez-nav-inner">
    <div class="logo"><a href="index.php"><img src="images/logo .png" alt="Empower Zone Logo"></a></div>
    <ul id="ezLinks">
      <li><a href="index.php">Home</a></li>
      <li><a href="about.php" class="active">About Us</a></li>
      <li><a href="services.php">Services</a></li>
      <li><a href="contact.php">Contact</a></li>
    </ul>
    <button class="ez-call-btn" onclick="window.location.href='tel:+17187576928'"><i class="fa fa-phone"></i> Call Now</button>
    <button class="ez-hamburger" id="ezHam" aria-label="Menu"><span></span><span></span><span></span></button>
  </div>
  <div class="ez-nav-mobile" id="ezMobile">
    <a href="index.php" style="display:block;padding:10px 14px;color:#1a2a2a;text-decoration:none;font-size:15px;font-weight:500;">Home</a>
    <a href="about.php" style="display:block;padding:10px 14px;color:#3a9fa8;text-decoration:none;font-size:15px;font-weight:500;">About Us</a>
    <a href="services.php" style="display:block;padding:10px 14px;color:#1a2a2a;text-decoration:none;font-size:15px;font-weight:500;">Services</a>
    <a href="contact.php" style="display:block;padding:10px 14px;color:#1a2a2a;text-decoration:none;font-size:15px;font-weight:500;">Contact</a>
  </div>
</nav>

<section class="hero">
  <div class="hero-content" data-aos="fade-up" data-aos-delay="100">
    <h1>About Empower Zone</h1>
    <p >Making benefits simple, so you get the support you deserve</p>
  </div>
</section>

<section class="about-section">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <h2 class="section-label">About Empower Zone</h2>
    <div class="divider"></div>
    <p class="about-desc">
      At Empower Zone, we're here to help New Yorkers like you get the benefits you deserve. We take care of all the paperwork, applications, and follow-ups so you don't have to stress about it.
    </p>
    <br/><br/>
    <div class="mission-box">
      <h3>Our Mission</h3>
      <p>Our mission is simple: to fight for you, guide you through the process, and make getting government benefits as easy as possible.</p>
    </div>
  </div>
</section>

<section class="why-section">
  <div class="container">
    <h2 class="section-label">Why People Choose Empower Zone</h2>
    <div class="divider"></div>

    <?php
    $features = [
      ['icon' => 'fa-file-alt',    'title' => 'Stress-Free Process', 'desc' => 'You stay home, we handle everything. No endless forms or confusing paperwork.'],
      ['icon' => 'fa-clock',       'title' => 'We Save Time',        'desc' => 'No more waiting on hold for hours. We handle the bureaucracy so you don\'t have to.'],
      ['icon' => 'fa-times-circle','title' => 'We Fix Denials',      'desc' => 'If you\'ve been denied, we review and reapply the right way. Denials are our specialty.'],
      ['icon' => 'fa-star',        'title' => 'We Get Results',      'desc' => 'Clients get approved faster and easier with us on their side. Maximum benefits guaranteed.'],
    ];
    ?>
    <div class="cards-grid">
      <?php foreach ($features as $f): ?>
      <div class="card">
        <div class="card-icon"><i class="fas <?= $f['icon'] ?>"></i></div>
        <h4><?= $f['title'] ?></h4>
        <p><?= $f['desc'] ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="care-section">
  <div class="container">
    <div class="care-box">
      <h3>We Care About You</h3>
      <p>You're not a case number, you're a person. We provide personalized support from real humans who understand your situation.</p>
    </div>
  </div>
</section>

<section class="cta-banner">
  <div class="container">
    <blockquote>"Your benefits, your rights, your advocate. We're here to make it simple for you."</blockquote>
    <div class="cta-buttons">
      <a href="tel:<?= preg_replace('/[^0-9+]/', '', $phone) ?>" class="btn-primary">
        <i class="fas fa-phone"></i> Call Now: <?= htmlspecialchars($phone) ?>
      </a>
      <a href="mailto:<?= htmlspecialchars($email) ?>" class="btn-outline">
        <i class="fas fa-envelope"></i> Email Us
      </a>
    </div>
  </div>
</section>

<section class="stories-section">
  <div class="container">
    <h2 class="section-label">Success Stories</h2>
    <p class="section-sub">Hear from families we've helped secure the benefits they deserve</p>

    <?php
    $testimonials = [
      [
        'name'    => 'James Wilson',
        'role'    => 'Medicaid Recipient',
        'location'=> 'Brooklyn, NY',
        'program' => 'Medicaid',
        'quote'   => 'As a senior on fixed income, I was struggling with medical costs. Empower Zone helped me get Medicaid and even found additional assistance programs I didn\'t know about.',
        'active'  => true,
      ],
      [
        'name'    => 'Maria Rodriguez',
        'role'    => 'SNAP Benefits',
        'location'=> 'Queens, NY',
        'program' => 'SNAP',
        'quote'   => 'I had been denied twice before. Empower Zone fixed my case in just two weeks. Amazing service!',
        'active'  => false,
      ],
      [
        'name'    => 'The Johnson Family',
        'role'    => 'Cash Assistance & SNAP',
        'location'=> 'Bronx, NY',
        'program' => 'Cash Assistance',
        'quote'   => 'With three kids and both parents laid off, we didn\'t know where to turn. Empower Zone helped us get Cash Assistance and SNAP benefits.',
        'active'  => false,
      ],
      [
        'name'    => 'Sophia Chen',
        'role'    => 'WIC Program',
        'location'=> 'Staten Island, NY',
        'program' => 'WIC',
        'quote'   => 'They handled everything for my WIC application. My newborn and I are so grateful for their help.',
        'active'  => false,
      ],
    ];

    $featured = $testimonials[0];
    ?>
    <div class="testimonial-featured">
      <div class="testimonial-body">
        <blockquote>"<?= htmlspecialchars($featured['quote']) ?>"</blockquote>
        <span class="program-tag"><i class="fas fa-check-circle"></i> Program: <?= htmlspecialchars($featured['program']) ?></span>
      </div>
      <div class="info" style="min-width:120px; text-align:right;">
        <h4><?= htmlspecialchars($featured['name']) ?></h4>
        <div class="role"><?= htmlspecialchars($featured['role']) ?></div>
        <div class="location"><?= htmlspecialchars($featured['location']) ?></div>
        <div class="stars">★★★★★</div>
      </div>
    </div>

    <div class="testimonial-thumbs">
      <?php foreach ($testimonials as $i => $t): ?>
      <div class="thumb-card <?= $t['active'] ? 'active' : '' ?>">
        <h5><?= htmlspecialchars($t['name']) ?></h5>
        <p><?= htmlspecialchars($t['role']) ?></p>
      </div>
      <?php endforeach; ?>
    </div>

    <div class="dots">
      <?php foreach ($testimonials as $i => $t): ?>
      <div class="dot <?= $t['active'] ? 'active' : '' ?>"></div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="why2-section">
  <div class="container">
    <h2 class="section-label">Why Choose Empower Zone?</h2>
    <p class="section-sub">We're different because we truly care about your success and make the process effortless for you</p>

    <?php
    $stats = [
      ['icon' => 'fa-chart-line', 'num' => '98%',  'label' => 'Success Rate'],
      ['icon' => 'fa-users',      'num' => '500+',  'label' => 'Families Helped'],
      ['icon' => 'fa-dollar-sign','num' => '$2M+',  'label' => 'Benefits Secured'],
      ['icon' => 'fa-bolt',       'num' => '24h',   'label' => 'Response Time'],
    ];
    ?>
    <div class="stats-grid">
      <?php foreach ($stats as $s): ?>
      <div class="stat-card">
        <div class="stat-icon"><i class="fas <?= $s['icon'] ?>"></i></div>
        <div class="stat-num"><?= $s['num'] ?></div>
        <div class="stat-label"><?= $s['label'] ?></div>
      </div>
      <?php endforeach; ?>
    </div>

    <div class="cards-grid">
      <?php foreach ($features as $f): ?>
      <div class="card">
        <div class="card-icon"><i class="fas <?= $f['icon'] ?>"></i></div>
        <h4><?= $f['title'] ?></h4>
        <p><?= $f['desc'] ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="final-cta">
  <div class="container">
    <div class="care-box">
      <h3>We Care About You</h3>
      <p>You're not a case number, you're a person. We provide personalized support from real humans who understand your situation.</p>
      <br/>
      <div class="cta-buttons">
        <a href="tel:<?= preg_replace('/[^0-9+]/', '', $phone) ?>" class="btn-primary">
          <i class="fas fa-phone"></i> Call Now
        </a>
        <a href="mailto:<?= htmlspecialchars($email) ?>" class="btn-outline">
          <i class="fas fa-envelope"></i> Email Us
        </a>
      </div>
    </div>
  </div>
</section>
<footer>
  <div class="footer-grid">

    <!-- Brand -->
    <div class="footer-brand">
      <img src="images/logo .png" alt="Empower Zone Logo" style="width:52px;height:52px;object-fit:contain;margin-bottom:14px;">
      <p>We help New York families navigate government benefit programs with ease. No stress, no endless forms, no waiting on hold. Your benefits made simple.</p>
      <div class="footer-badge">
        <i class="fas fa-heart"></i> 500+ Families Helped
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
      <ul class="footer-contact">
        <li><i class="fas fa-phone"></i> <a href="tel:+17187576928">+1 (718) 757-6928</a></li>
        <li><i class="fas fa-envelope"></i> <a href="mailto:info@empowerzone.us">info@empowerzone.us</a></li>
        <li><i class="fas fa-envelope"></i> <a href="mailto:EmpowerZoneServices@gmail.com">EmpowerZoneServices@gmail.com</a></li>
        <li><i class="fas fa-map-marker-alt"></i> 16 Court Street, Brooklyn, NY</li>
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
      <span><strong>98%</strong> Success Rate</span>
      <span><strong>500+</strong> Families Helped</span>
      <span><strong>$2M+</strong> Benefits Secured</span>
    </div>
    <div style="display:flex;gap:16px;flex-wrap:wrap;">
      <a href="#" style="color:rgba(255,255,255,0.4);font-size:0.82rem;transition:color .2s;">Privacy Policy</a>
      <a href="#" style="color:rgba(255,255,255,0.4);font-size:0.82rem;transition:color .2s;">Terms of Service</a>
      <a href="#" style="color:rgba(255,255,255,0.4);font-size:0.82rem;transition:color .2s;">Accessibility</a>
    </div>
  </div>
</footer>

<script>
  document.getElementById('ezHam').addEventListener('click', function() {
    this.classList.toggle('active');
    document.getElementById('ezMobile').classList.toggle('open');
  });
</script>
</body>
</html>