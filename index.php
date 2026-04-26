<?php
/**
 * HOME PAGE - index.php
 * This is the primary landing page of the website.
 * It features a hero section, key statistics, core offerings, and client testimonials.
 */

$page = 'home';
require_once 'includes/config.php';

// SEO Meta Data
$pageTitle = 'Empower Zone – Your Benefits Advocate in New York';
$pageDesc  = 'Sit back, relax, and let us handle everything. SNAP, Medicaid, Cash Assistance, WIC — we apply, follow up, and fight for your approval.';

// --- Page Data Arrays ---

// 1. Success metrics shown in the stats section
$statistics = [
    ['icon' => 'fa-solid fa-users',        'count' => '500+', 'title' => 'Families Helped'],
    ['icon' => 'fa-solid fa-chart-column', 'count' => '98%',  'title' => 'Success Rate'],
    ['icon' => 'fa-solid fa-dollar-sign',  'count' => '$2M+', 'title' => 'Benefits Secured'],
    ['icon' => 'fa-solid fa-award',        'count' => '2+',   'title' => 'Years Experience'],
];

// 2. High-level service categories for the core offers section
$coreOffers = [
    ['icon' => 'fa-regular fa-compass',     'title' => '🎯 Clear Guidance',        'desc' => 'We explain the process in simple steps so you always know what\'s happening with your application.'],
    ['icon' => 'fa-solid fa-user-tie',      'title' => '🤝 Personal Support',      'desc' => 'We work with you one-on-one, collect your documents, and make sure nothing is missing.'],
    ['icon' => 'fa-solid fa-laptop',        'title' => '💻 Application Handling',  'desc' => 'From start to finish, we submit your applications online for you.'],
    ['icon' => 'fa-solid fa-shield-halved', 'title' => '🛡️ Case Follow-Up',        'desc' => 'We don\'t stop at filing. We track your case, fix issues, and fight for approvals if you\'ve been denied.'],
    ['icon' => 'fa-regular fa-heart',       'title' => '💖 Care & Trust',           'desc' => 'You\'re more than just a case number. We treat every client with respect, dignity, and dedication.'],
];

// 3. Unique selling points for the "Why Choose Us" section
$whyChooseUs = [
    ['icon' => 'fa-regular fa-clock',      'title' => '⏳ Save Time',          'desc' => 'No more waiting on hold, no office visits, and no piles of paperwork. We handle the entire application process for you.'],
    ['icon' => 'fa-solid fa-location-dot', 'title' => '📍 Local Knowledge',    'desc' => 'We know how the system works and make sure your application is filed correctly the first time.'],
    ['icon' => 'fa-regular fa-file-lines', 'title' => '🤝 End-to-End Support', 'desc' => 'From collecting your documents to submitting applications and following up, we\'re with you until approval.'],
    ['icon' => 'fa-solid fa-arrows-rotate','title' => '💡 Fixing Denials',     'desc' => 'If you\'ve been previously denied, our team reviews your case, fixes errors, and files necessary appeals.'],
    ['icon' => 'fa-solid fa-heart',        'title' => '❤️ We Care About You',   'desc' => 'Your success is our top priority. We offer compassionate, dedicated service to ensure you get the benefits you deserve.'],
];
?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<!-- ===== HERO SECTION ===== -->
<div class="hero-bg">
    <main class="hero-content" data-aos="fade-up">
        <div class="brand-pill">
            <span class="pill-dot"></span> EMPOWER ZONE CONSULTING
        </div>

        <h1 class="hero-heading">
            Your Benefits. Your Peace of Mind.<br>
            Your <span class="highlight">Advocate</span>
        </h1>

        <p class="hero-sub">
            Sit back, relax, and let us do everything. No stress, no endless forms,
            no waiting on hold.
        </p>

        <div class="feature-badges">
            <div class="badge"><i class="fa-regular fa-clock"></i> No waiting on hold</div>
            <div class="badge"><i class="fa-solid fa-shield-halved"></i> No denial worries</div>
            <div class="badge"><i class="fa-solid fa-user-group"></i> Personal representation</div>
            <div class="badge"><i class="fa-regular fa-circle-check"></i> Maximum benefits</div>
        </div>

        <div class="cta-buttons">
            <a href="contact.php" class="btn-primary">
                <i class="fa-solid fa-bolt"></i> Get Started Now
            </a>
            <a href="about.php" class="btn-secondary">How It Works</a>
        </div>
    </main>
</div>

<!-- ===== CONTACT BAR ===== -->
<div class="contact-bar" data-aos="fade-up" data-aos-delay="200">
    <div class="contact-bar-inner">
        <div class="contact-item">
            <div class="contact-icon"><i class="fa-solid fa-phone"></i></div>
            <div class="contact-text">
                <span class="contact-label">Call or WhatsApp</span>
                <a href="contact.php" class="contact-value"><?php echo SITE_PHONE; ?></a>
            </div>
        </div>

        <div class="contact-divider"></div>

        <div class="contact-item">
            <div class="contact-icon"><i class="fa-solid fa-envelope"></i></div>
            <div class="contact-text">
                <span class="contact-label">Email Us</span>
                <a href="mailto:<?php echo SITE_EMAIL_GMAIL; ?>" class="contact-value"><?php echo SITE_EMAIL_GMAIL; ?></a>
            </div>
        </div>

        <a href="contact.php" class="btn-consult">Free Consultation</a>
    </div>
</div>

<!-- ===== STATS SECTION ===== -->
<section class="stats-section">
    <div class="container">
        <div class="stats-grid">
            <!-- Loop through statistics array to generate stat cards -->
            <?php foreach ($statistics as $index => $stat): ?>
                <div class="stat-card" data-aos="zoom-in" data-aos-delay="<?php echo $index * 100; ?>">
                    <i class="<?php echo $stat['icon']; ?> stat-icon"></i>
                    <h3><?php echo $stat['count']; ?></h3>
                    <p><?php echo $stat['title']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ===== CORE OFFERS SECTION ===== -->
<section class="core-section" id="services">
    <div class="container">
        <h2 class="section-title" data-aos="fade-up">Our Core Offer</h2>

        <div class="core-grid">
            <!-- Loop through core offers array to generate service cards -->
            <?php foreach ($coreOffers as $index => $offer): ?>
                <div class="core-card" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>">
                    <div class="core-icon">
                        <i class="<?php echo $offer['icon']; ?>"></i>
                    </div>
                    <h4><?php echo $offer['title']; ?></h4>
                    <p><?php echo $offer['desc']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="core-more-box" data-aos="fade-in">
            <h4>And More…</h4>
            <p>Beyond applications, we stand with you at every stage — providing updates, clarifying doubts, and making sure you never feel alone in the process. Our team's dedication ensures your case gets the attention and persistence it deserves.</p>
        </div>
    </div>
</section>

<!-- ===== WHY CHOOSE US ===== -->
<section class="why-section" id="about">
    <div class="container">
        <h2 class="section-title" data-aos="fade-up">Why People Choose <span class="teal-text">Empower Zone</span></h2>
        <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">We're different from other services because we truly care about your success and make the process effortless for you.</p>

        <div class="why-grid">
            <!-- Loop through reasons array to generate 'why choose us' feature cards -->
            <?php foreach ($whyChooseUs as $index => $reason): ?>
                <div class="why-card" data-aos="fade-right" data-aos-delay="<?php echo $index * 100; ?>">
                    <div class="why-icon">
                        <i class="<?php echo $reason['icon']; ?>"></i>
                    </div>
                    <h4><?php echo $reason['title']; ?></h4>
                    <p><?php echo $reason['desc']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ===== TESTIMONIALS ===== -->
<section class="testimonials-section">
    <div class="container">
        <h2 class="section-title" data-aos="fade-up">Success <span class="teal-text">Stories</span></h2>
        <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">Hear from families we've helped secure the benefits they deserve</p>

        <div class="testimonial-slider" data-aos="zoom-in" data-aos-delay="200">
            <button class="slider-btn" id="prevBtn" aria-label="Previous">
                <i class="fa-solid fa-angle-left"></i>
            </button>

            <div class="testimonial-card" id="testimonialCard">
                <i class="fa-solid fa-quote-right quote-icon"></i>
                <div class="stars">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <p class="testimony-text" id="testimonyText">"After being denied twice for Medicaid, I almost gave up. Empower Zone reviewed my case, fixed the mistakes, and got me approved quickly. I'm so grateful!"</p>
                <p class="testimony-author" id="testimonyAuthor">Michael Johnson, Queens NY</p>
                <div class="testimony-tags">
                    <span class="t-tag tag-label" id="testimonyTag">Medicaid</span>
                    <span class="t-tag tag-approved"><i class="fa-solid fa-check"></i> Approved</span>
                </div>
            </div>

            <button class="slider-btn" id="nextBtn" aria-label="Next">
                <i class="fa-solid fa-angle-right"></i>
            </button>
        </div>

        <div class="slider-dots" id="sliderDots">
            <div class="dot active"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>

        <!-- CTA Box -->
        <div class="ready-cta-box" data-aos="fade-up">
            <h3>Ready to become our next success story?</h3>
            <p>Join hundreds of families who have successfully navigated the benefits system with our help</p>
            <a href="contact.php" class="btn-teal">Start Your Application Today</a>
        </div>
    </div>
</section>

<!-- ===== CONTACT CTA SECTION ===== -->
<section class="journey-section" id="contact" data-aos="fade-up">
    <h2>Your Benefits Journey Starts Here</h2>
    <p>Take one small step — and we'll handle the rest. No stress, no endless forms, no waiting on hold.</p>

    <div class="journey-cards">
        <a href="contact.php" class="journey-card" data-aos="fade-up" data-aos-delay="0">
            <div class="journey-icon"><i class="fa-solid fa-phone"></i></div>
            <h4>Call Us</h4>
            <p><?php echo SITE_PHONE; ?></p>
            <span>Mon–Fri, 9AM–6PM EST</span>
        </a>
        <a href="contact.php" class="journey-card" target="_blank" data-aos="fade-up" data-aos-delay="100">
            <div class="journey-icon"><i class="fa-brands fa-whatsapp"></i></div>
            <h4>WhatsApp</h4>
            <p>Message Us</p>
            <span>Quick responses</span>
        </a>
        <a href="contact.php" class="journey-card" data-aos="fade-up" data-aos-delay="200">
            <div class="journey-icon"><i class="fa-regular fa-envelope"></i></div>
            <h4>Email</h4>
            <p><?php echo SITE_EMAIL_GMAIL; ?></p>
            <span>24/7 availability</span>
        </a>
        <a href="contact.php" class="journey-card" data-aos="fade-up" data-aos-delay="300">
            <div class="journey-icon"><i class="fa-regular fa-clock"></i></div>
            <h4>Free Consultation</h4>
            <p>No obligation</p>
            <span>Get started today</span>
        </a>
    </div>

    <div class="journey-why-box" data-aos="fade-in" data-aos-delay="200">
        <h3>Why Contact Us Today?</h3>
        <div class="journey-why-grid">
            <div><i class="fa-regular fa-circle-check"></i> No upfront fees – affordable payment options</div>
            <div><i class="fa-regular fa-circle-check"></i> Spanish and English assistance available</div>
            <div><i class="fa-regular fa-circle-check"></i> 98% success rate with applications</div>
            <div><i class="fa-regular fa-circle-check"></i> Serving all New York residents</div>
        </div>
    </div>

    <p class="journey-quote">"Your Benefits. Your Rights. Your Advocate. Empower Zone makes it simple."</p>
</section>

<?php include 'includes/footer.php'; ?>