<?php
// ============================================================
// ABOUT PAGE — pages/about.php
// ============================================================
$pageTitle = 'About Us – Empower Zone Consulting';
$pageDesc  = 'Learn about Empower Zone — our mission is to help New York families navigate government benefits with ease, compassion, and expertise.';

$features = [
    ['icon' => 'fa-file-alt',     'title' => 'Stress-Free Process', 'desc' => 'You stay home, we handle everything. No endless forms or confusing paperwork.'],
    ['icon' => 'fa-clock',        'title' => 'We Save Time',        'desc' => 'No more waiting on hold for hours. We handle the bureaucracy so you don\'t have to.'],
    ['icon' => 'fa-times-circle', 'title' => 'We Fix Denials',      'desc' => 'If you\'ve been denied, we review and reapply the right way. Denials are our specialty.'],
    ['icon' => 'fa-star',         'title' => 'We Get Results',      'desc' => 'Clients get approved faster and easier with us on their side. Maximum benefits guaranteed.'],
];

$stats = [
    ['icon' => 'fa-chart-line',  'num' => '98%',  'label' => 'Success Rate'],
    ['icon' => 'fa-users',       'num' => '500+', 'label' => 'Families Helped'],
    ['icon' => 'fa-dollar-sign', 'num' => '$2M+', 'label' => 'Benefits Secured'],
    ['icon' => 'fa-bolt',        'num' => '24h',  'label' => 'Response Time'],
];

$testimonials = [
    ['name' => 'James Wilson',      'role' => 'Medicaid Recipient',      'location' => 'Brooklyn, NY',     'program' => 'Medicaid',          'quote' => 'As a senior on fixed income, I was struggling with medical costs. Empower Zone helped me get Medicaid and even found additional assistance programs I didn\'t know about.'],
    ['name' => 'Maria Rodriguez',   'role' => 'SNAP Benefits',           'location' => 'Queens, NY',       'program' => 'SNAP',              'quote' => 'I had been denied twice before. Empower Zone fixed my case in just two weeks. Amazing service!'],
    ['name' => 'The Johnson Family','role' => 'Cash Assistance & SNAP',  'location' => 'Bronx, NY',        'program' => 'Cash Assistance',   'quote' => 'With three kids and both parents laid off, we didn\'t know where to turn. Empower Zone helped us get Cash Assistance and SNAP benefits.'],
    ['name' => 'Sophia Chen',       'role' => 'WIC Program',             'location' => 'Staten Island, NY','program' => 'WIC',               'quote' => 'They handled everything for my WIC application. My newborn and I are so grateful for their help.'],
];
?>

<!-- ===== ABOUT HERO ===== -->
<div class="page-hero" style="background-image: linear-gradient(rgba(0,0,0,0.55), rgba(0,0,0,0.55)), url('assets/images/food.png');">
    <div class="page-hero-content">
        <h1>About Empower Zone</h1>
        <p>Making benefits simple, so you get the support you deserve</p>
    </div>
</div>

<!-- ===== WHO WE ARE ===== -->
<section class="about-section">
    <div class="container">
        <h2 class="section-title">About Empower Zone</h2>
        <div class="teal-divider"></div>
        <p class="section-subtitle">
            At Empower Zone, we're here to help New Yorkers like you get the benefits you deserve.
            We take care of all the paperwork, applications, and follow-ups so you don't have to stress about it.
        </p>
        <div class="mission-box">
            <h3>Our Mission</h3>
            <p>Our mission is simple: to fight for you, guide you through the process, and make getting government benefits as easy as possible.</p>
        </div>
    </div>
</section>

<!-- ===== WHY CHOOSE US CARDS ===== -->
<section class="why-section-gray">
    <div class="container">
        <h2 class="section-title">Why People Choose Empower Zone</h2>
        <div class="teal-divider"></div>
        <div class="cards-grid-4">
            <?php foreach ($features as $f): ?>
                <div class="feature-card-box">
                    <div class="feature-card-icon">
                        <i class="fas <?php echo $f['icon']; ?>"></i>
                    </div>
                    <h4><?php echo $f['title']; ?></h4>
                    <p><?php echo $f['desc']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ===== WE CARE ===== -->
<section class="care-section">
    <div class="container">
        <div class="care-box">
            <h3>We Care About You</h3>
            <p>You're not a case number, you're a person. We provide personalized support from real humans who understand your situation.</p>
        </div>
    </div>
</section>

<!-- ===== CTA BANNER ===== -->
<section class="cta-banner-section">
    <div class="container">
        <blockquote>"Your benefits, your rights, your advocate. We're here to make it simple for you."</blockquote>
        <div class="cta-buttons">
            <a href="tel:<?php echo SITE_PHONE_RAW; ?>" class="btn-primary">
                <i class="fas fa-phone"></i> Call Now: <?php echo SITE_PHONE; ?>
            </a>
            <a href="mailto:<?php echo SITE_EMAIL_GMAIL; ?>" class="btn-outline">
                <i class="fas fa-envelope"></i> Email Us
            </a>
        </div>
    </div>
</section>

<!-- ===== SUCCESS STORIES ===== -->
<section class="stories-section">
    <div class="container">
        <h2 class="section-title">Success Stories</h2>
        <p class="section-subtitle">Hear from families we've helped secure the benefits they deserve</p>

        <!-- Featured Testimonial -->
        <div class="testimonial-featured">
            <div class="testimonial-body">
                <blockquote>"<?php echo htmlspecialchars($testimonials[0]['quote']); ?>"</blockquote>
                <span class="program-tag">
                    <i class="fas fa-check-circle"></i>
                    Program: <?php echo htmlspecialchars($testimonials[0]['program']); ?>
                </span>
            </div>
            <div class="testimonial-info">
                <h4><?php echo htmlspecialchars($testimonials[0]['name']); ?></h4>
                <div class="t-role"><?php echo htmlspecialchars($testimonials[0]['role']); ?></div>
                <div class="t-location"><?php echo htmlspecialchars($testimonials[0]['location']); ?></div>
                <div class="stars">★★★★★</div>
            </div>
        </div>

        <!-- Thumb Cards -->
        <div class="thumb-grid">
            <?php foreach ($testimonials as $i => $t): ?>
                <div class="thumb-card <?php echo $i === 0 ? 'active' : ''; ?>">
                    <h5><?php echo htmlspecialchars($t['name']); ?></h5>
                    <p><?php echo htmlspecialchars($t['role']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ===== STATS ===== -->
<section class="stats-why-section">
    <div class="container">
        <h2 class="section-title">Why Choose Empower Zone?</h2>
        <p class="section-subtitle">We're different because we truly care about your success and make the process effortless for you</p>

        <div class="stats-grid-4">
            <?php foreach ($stats as $s): ?>
                <div class="stat-card-teal">
                    <div class="stat-icon-box">
                        <i class="fas <?php echo $s['icon']; ?>"></i>
                    </div>
                    <div class="stat-num"><?php echo $s['num']; ?></div>
                    <div class="stat-label"><?php echo $s['label']; ?></div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Repeat feature cards below stats -->
        <div class="cards-grid-4" style="margin-top: 40px;">
            <?php foreach ($features as $f): ?>
                <div class="feature-card-box">
                    <div class="feature-card-icon">
                        <i class="fas <?php echo $f['icon']; ?>"></i>
                    </div>
                    <h4><?php echo $f['title']; ?></h4>
                    <p><?php echo $f['desc']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ===== FINAL CTA ===== -->
<section class="final-cta-section">
    <div class="container">
        <div class="care-box">
            <h3>We Care About You</h3>
            <p>You're not a case number, you're a person. We provide personalized support from real humans who understand your situation.</p>
            <br>
            <div class="cta-buttons">
                <a href="tel:<?php echo SITE_PHONE_RAW; ?>" class="btn-primary">
                    <i class="fas fa-phone"></i> Call Now
                </a>
                <a href="mailto:<?php echo SITE_EMAIL_GMAIL; ?>" class="btn-outline">
                    <i class="fas fa-envelope"></i> Email Us
                </a>
            </div>
        </div>
    </div>
</section>
