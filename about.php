<?php
/**
 * ABOUT PAGE - about.php
 * This page introduces the team, explains the mission, and showcases success stories.
 */

$page = 'about';
require_once 'includes/config.php';

// SEO Meta Data
$pageTitle = 'About Us – Empower Zone Consulting';
$pageDesc  = 'Learn about Empower Zone — our mission is to help New York families navigate government benefits with ease, compassion, and expertise.';

// Feature cards data array
$features = [
    ['icon' => 'fa-file-alt',     'title' => 'Stress-Free Process', 'desc' => 'You stay home, we handle everything. No endless forms or confusing paperwork.'],
    ['icon' => 'fa-clock',        'title' => 'We Save Time',        'desc' => 'No more waiting on hold for hours. We handle the bureaucracy so you don\'t have to.'],
    ['icon' => 'fa-times-circle', 'title' => 'We Fix Denials',      'desc' => 'If you\'ve been denied, we review and reapply the right way. Denials are our specialty.'],
    ['icon' => 'fa-star',         'title' => 'We Get Results',      'desc' => 'Clients get approved faster and easier with us on their side. Maximum benefits guaranteed.'],
];

// Success metrics data array
$stats = [
    ['icon' => 'fa-chart-line',  'num' => '98%',  'label' => 'Success Rate'],
    ['icon' => 'fa-users',       'num' => '500+', 'label' => 'Families Helped'],
    ['icon' => 'fa-dollar-sign', 'num' => '$2M+', 'label' => 'Benefits Secured'],
    ['icon' => 'fa-bolt',        'num' => '24h',  'label' => 'Response Time'],
];

// Testimonials data array for the custom slider
$testimonials = [
    ['name' => 'James Wilson',      'role' => 'Medicaid Recipient',      'location' => 'Brooklyn, NY',     'program' => 'Medicaid',          'quote' => 'As a senior on fixed income, I was struggling with medical costs. Empower Zone helped me get Medicaid and even found additional assistance programs I didn\'t know about.', 'img' => 'https://randomuser.me/api/portraits/men/45.jpg'],
    ['name' => 'Maria Rodriguez',   'role' => 'SNAP Benefits',           'location' => 'Queens, NY',       'program' => 'SNAP',              'quote' => 'I had been denied twice before. Empower Zone fixed my case in just two weeks. Amazing service!', 'img' => 'https://randomuser.me/api/portraits/women/32.jpg'],
    ['name' => 'The Johnson Family','role' => 'Cash Assistance & SNAP',  'location' => 'Bronx, NY',        'program' => 'Cash Assistance',   'quote' => 'After my husband lost his job, we didn\'t know how we\'d pay rent. Empower Zone got us emergency cash assistance and food stamps within 2 weeks. They were a lifesaver!', 'img' => 'https://randomuser.me/api/portraits/women/68.jpg'],
    ['name' => 'Sophia Chen',       'role' => 'WIC Program',             'location' => 'Staten Island, NY','program' => 'WIC',               'quote' => 'They handled everything for my WIC application. My newborn and I are so grateful for their help.', 'img' => 'https://randomuser.me/api/portraits/women/22.jpg'],
];
?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<!-- ===== ABOUT HERO ===== -->
<section class="about-custom-hero">
    <div class="about-custom-hero-bg">
        <img src="assets/images/food.png" alt="Family Background">
        <div class="about-custom-overlay-teal"></div>
        <div class="about-custom-overlay-gradient"></div>
    </div>
    
    <div class="about-custom-hero-content">
        <div data-aos="fade-up">
            <h1>About Empower Zone</h1>
        </div>
        
        <div class="about-custom-hero-sub">
            <div class="about-custom-line" data-aos="zoom-in" data-aos-delay="300"></div>
            <p data-aos="fade-up" data-aos-delay="200">Making benefits simple, so you get the support you deserve</p>
            <div class="about-custom-line" data-aos="zoom-in" data-aos-delay="400"></div>
        </div>
    </div>
</section>

<!-- ===== WHO WE ARE ===== -->
<section class="about-section" data-aos="fade-up">
    <div class="container">
        <h2 class="section-title">About Empower Zone</h2>
        <div class="teal-divider"></div>
        <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
            At Empower Zone, we're here to help New Yorkers like you get the benefits you deserve.
            We take care of all the paperwork, applications, and follow-ups so you don't have to stress about it.
        </p>
        <div class="mission-box" data-aos="zoom-in" data-aos-delay="200">
            <h3>Our Mission</h3>
            <p>Our mission is simple: to fight for you, guide you through the process, and make getting government benefits as easy as possible.</p>
        </div>
    </div>
</section>

<!-- ===== WHY CHOOSE US CARDS ===== -->
<section class="why-section-gray" data-aos="fade-up">
    <div class="container">
        <h2 class="section-title">Why People Choose Empower Zone</h2>
        <div class="teal-divider"></div>
        <div class="cards-grid-4">
            <!-- Render each feature card using the $features array -->
            <?php foreach ($features as $index => $f): ?>
                <div class="feature-card-box" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>">
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
<section class="care-section" data-aos="fade-in">
    <div class="container">
        <div class="care-box" data-aos="zoom-in">
            <h3>We Care About You</h3>
            <p>You're not a case number, you're a person. We provide personalized support from real humans who understand your situation.</p>
        </div>
    </div>
</section>

<!-- ===== CTA BANNER ===== -->
<section class="cta-banner-section" data-aos="fade-up">
    <div class="container">
        <blockquote data-aos="fade-right">"Your benefits, your rights, your advocate. We're here to make it simple for you."</blockquote>
        <div class="cta-buttons" data-aos="fade-left">
            <a href="contact.php" class="btn-primary">
                <i class="fas fa-phone"></i> Call Now: <?php echo SITE_PHONE; ?>
            </a>
            <a href="contact.php" class="btn-outline">
                <i class="fas fa-envelope"></i> Email Us
            </a>
        </div>
    </div>
</section>

<!-- ===== SUCCESS STORIES (CUSTOM) ===== -->
<section class="custom-stories-section">
    <div class="container">
        <div class="custom-header" data-aos="fade-up">
            <h2>Success Stories</h2>
            <p>Hear from families we've helped secure the benefits they deserve</p>
        </div>

        <div class="custom-featured-wrapper" data-aos="fade-up" data-aos-delay="200">
            <!-- Featured Card -->
            <div class="custom-featured-grid">
                <div class="custom-featured-left">
                    <div class="custom-profile-img-wrap">
                        <img id="about-slider-img" src="<?php echo htmlspecialchars($testimonials[0]['img']); ?>" alt="<?php echo htmlspecialchars($testimonials[0]['name']); ?>">
                        <div class="custom-profile-badge">
                            <i class="fa-solid fa-check"></i>
                        </div>
                    </div>
                    <h3 id="about-slider-name"><?php echo htmlspecialchars($testimonials[0]['name']); ?></h3>
                    <p class="program" id="about-slider-role"><?php echo htmlspecialchars($testimonials[0]['role']); ?></p>
                    <p class="location" id="about-slider-location"><?php echo htmlspecialchars($testimonials[0]['location']); ?></p>
                    <div class="custom-stars">
                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    </div>
                </div>
                
                <div class="custom-featured-right">
                    <div class="custom-quote-icon">
                        <i class="fa-solid fa-quote-left"></i>
                    </div>
                    <blockquote id="about-slider-quote">"<?php echo htmlspecialchars($testimonials[0]['quote']); ?>"</blockquote>
                    <div class="custom-program-tag">
                        <div class="icon-box"><i class="fa-solid fa-check"></i></div>
                        <span id="about-slider-program">Program: <?php echo htmlspecialchars($testimonials[0]['program']); ?></span>
                    </div>
                </div>
            </div>

            <!-- Navigation Buttons -->
            <div class="custom-nav-btns">
                <button id="about-prev-btn"><i class="fa-solid fa-chevron-left"></i></button>
                <button id="about-next-btn"><i class="fa-solid fa-chevron-right"></i></button>
            </div>
        </div>

        <!-- Thumbnail Grid -->
        <div class="custom-thumb-container" data-aos="fade-up" data-aos-delay="300">
            <?php foreach ($testimonials as $i => $t): ?>
                <div class="custom-thumb-card <?php echo $i === 0 ? 'active' : ''; ?>">
                    <img src="<?php echo htmlspecialchars($t['img']); ?>" alt="<?php echo htmlspecialchars($t['name']); ?>">
                    <h4><?php echo htmlspecialchars($t['name']); ?></h4>
                    <p><?php echo htmlspecialchars($t['role']); ?></p>
                    <?php if ($i === 0): ?>
                        <div class="custom-active-dot"></div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Dots -->
        <div class="custom-dots" data-aos="fade-up" data-aos-delay="400">
            <?php foreach ($testimonials as $i => $t): ?>
                <button class="<?php echo $i === 0 ? 'active' : ''; ?>"></button>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script>
/**
 * Testimonial Slider Logic
 * Handles the custom featured testimonial section with thumbnails and auto-rotation.
 */
document.addEventListener("DOMContentLoaded", function() {
    // 1. Data Initialization
    const aboutTestimonials = <?php echo json_encode($testimonials); ?>;
    let currentIndex = 0;
    
    // 2. DOM Element Selection
    const imgEl = document.getElementById("about-slider-img");
    const nameEl = document.getElementById("about-slider-name");
    const roleEl = document.getElementById("about-slider-role");
    const locationEl = document.getElementById("about-slider-location");
    const quoteEl = document.getElementById("about-slider-quote");
    const programEl = document.getElementById("about-slider-program");
    
    const thumbCards = document.querySelectorAll(".custom-thumb-card");
    const dots = document.querySelectorAll(".custom-dots button");
    const prevBtn = document.getElementById("about-prev-btn");
    const nextBtn = document.getElementById("about-next-btn");
    
    /**
     * Updates the slider UI with data from the specified index.
     * @param {number} index - The index of the testimonial to display.
     */
    function updateSlider(index) {
        currentIndex = index;
        const t = aboutTestimonials[index];
        
        // 3. Fade Animation: Briefly hide content before updating
        const leftPanel = document.querySelector('.custom-featured-left');
        const rightPanel = document.querySelector('.custom-featured-right');
        
        leftPanel.style.opacity = 0;
        rightPanel.style.opacity = 0;
        
        setTimeout(() => {
            // 4. Update Content: Injects new data into the DOM
            imgEl.src = t.img;
            imgEl.alt = t.name;
            nameEl.textContent = t.name;
            roleEl.textContent = t.role;
            locationEl.textContent = t.location;
            quoteEl.textContent = '"' + t.quote + '"';
            programEl.textContent = 'Program: ' + t.program;
            
            // 5. Update Thumbnails: Highlight the active thumb
            thumbCards.forEach((card, i) => {
                if (i === index) {
                    card.classList.add("active");
                    if (!card.querySelector('.custom-active-dot')) {
                        card.insertAdjacentHTML('beforeend', '<div class="custom-active-dot"></div>');
                    }
                } else {
                    card.classList.remove("active");
                    const dot = card.querySelector('.custom-active-dot');
                    if (dot) dot.remove();
                }
            });
            
            // 6. Update Dots: Highlight the active navigation dot
            dots.forEach((dot, i) => {
                dot.classList.toggle("active", i === index);
            });
            
            // 7. Reveal Content: Fade back in
            leftPanel.style.opacity = 1;
            rightPanel.style.opacity = 1;
        }, 300); // 300ms matches the CSS transition time
    }
    
    // 8. Event Listeners: Handle user interactions
    if (prevBtn) {
        prevBtn.addEventListener("click", () => {
            let nextIdx = (currentIndex - 1 + aboutTestimonials.length) % aboutTestimonials.length;
            updateSlider(nextIdx);
            resetAutoMove(); // Stop and restart auto-rotation on manual click
        });
    }
    
    if (nextBtn) {
        nextBtn.addEventListener("click", () => {
            let nextIdx = (currentIndex + 1) % aboutTestimonials.length;
            updateSlider(nextIdx);
            resetAutoMove();
        });
    }
    
    // Click events for thumbnails
    thumbCards.forEach((card, i) => {
        card.addEventListener("click", () => {
            updateSlider(i);
            resetAutoMove();
        });
    });
    
    // Click events for dots
    dots.forEach((dot, i) => {
        dot.addEventListener("click", () => {
            updateSlider(i);
            resetAutoMove();
        });
    });
    
    // 9. Auto-Rotation: Automatically move to the next slide every 5 seconds
    let autoMoveInterval = setInterval(() => {
        let nextIdx = (currentIndex + 1) % aboutTestimonials.length;
        updateSlider(nextIdx);
    }, 5000);
    
    /**
     * Resets the auto-rotation timer to prevent awkward jumps after manual clicks.
     */
    function resetAutoMove() {
        clearInterval(autoMoveInterval);
        autoMoveInterval = setInterval(() => {
            let nextIdx = (currentIndex + 1) % aboutTestimonials.length;
            updateSlider(nextIdx);
        }, 5000);
    }
    
    // 10. Smooth CSS Transitions: Ensure panels have transition property set
    const leftPanel = document.querySelector('.custom-featured-left');
    const rightPanel = document.querySelector('.custom-featured-right');
    if (leftPanel && rightPanel) {
        leftPanel.style.transition = 'opacity 0.3s ease';
        rightPanel.style.transition = 'opacity 0.3s ease';
    }
});
</script>


<!-- ===== STATS ===== -->
<section class="stats-why-section" data-aos="fade-up">
    <div class="container">
        <h2 class="section-title">Why Choose Empower Zone?</h2>
        <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">We're different because we truly care about your success and make the process effortless for you</p>

        <div class="stats-grid-4">
            <!-- Loop through stats array to show success numbers -->
            <?php foreach ($stats as $index => $s): ?>
                <div class="stat-card-teal" data-aos="zoom-in" data-aos-delay="<?php echo $index * 100; ?>">
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
            <!-- Re-use the $features array here -->
            <?php foreach ($features as $index => $f): ?>
                <div class="feature-card-box" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>">
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
<section class="final-cta-section" data-aos="fade-up">
    <div class="container">
        <div class="care-box" data-aos="zoom-in">
            <h3>We Care About You</h3>
            <p>You're not a case number, you're a person. We provide personalized support from real humans who understand your situation.</p>
            <br>
            <div class="cta-buttons">
                <a href="contact.php" class="btn-primary">
                    <i class="fas fa-phone"></i> Call Now
                </a>
                <a href="contact.php" class="btn-outline">
                    <i class="fas fa-envelope"></i> Email Us
                </a>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>