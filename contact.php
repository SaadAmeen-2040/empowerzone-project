<?php
$page = 'contact';
require_once 'includes/config.php';
// ============================================================
// CONTACT PAGE — contact.php
// ============================================================
$pageTitle = 'Contact Us – Empower Zone Consulting';
$pageDesc  = 'Get your benefits started with a free consultation. Contact Empower Zone Consulting today — no upfront fees, bilingual support.';
?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<!-- ===== CONTACT HERO ===== -->
<div class="page-hero page-hero--light">
    <div class="page-hero-content">
        <span class="page-hero-badge" data-aos="fade-down">Get In Touch</span>
        <h1 data-aos="fade-up" data-aos-delay="100">Get Your <span class="teal-text">Benefits Started</span></h1>
        <p data-aos="fade-up" data-aos-delay="200">Take one small step — and we'll handle the rest. No stress, no endless forms, no waiting on hold.</p>
    </div>
</div>

<!-- ===== CONTACT SECTION ===== -->
<section class="contact-section">
    <div class="container">
        <div class="contact-wrapper">

            <!-- LEFT: Contact Form -->
            <div class="form-card" data-aos="fade-right">
                <div class="form-card-title">
                    <i class="fa fa-paper-plane"></i> Free Benefits Consultation
                </div>

                <form id="contactForm" action="#" method="POST">
                    <div class="form-group">
                        <input type="text" id="fullName" name="full_name" placeholder="Your Full Name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" id="emailField" name="email" placeholder="Your Email Address" required>
                    </div>
                    <div class="form-group">
                        <input type="tel" id="phoneField" name="phone" placeholder="Your Phone Number">
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

            <!-- RIGHT: Info + Why Choose Us -->
            <div class="contact-right">

                <!-- Info Cards Grid -->
                <div class="info-cards-grid">
                    <div class="info-card" data-aos="zoom-in" data-aos-delay="100">
                        <div class="info-card-icon"><i class="fa fa-phone"></i></div>
                        <div class="info-card-body">
                            <h4>Call Us Now</h4>
                            <p><a href="contact.php"><?php echo SITE_PHONE; ?></a></p>
                        </div>
                    </div>
                    <div class="info-card" data-aos="zoom-in" data-aos-delay="200">
                        <div class="info-card-icon"><i class="fab fa-whatsapp"></i></div>
                        <div class="info-card-body">
                            <h4>WhatsApp</h4>
                            <p><a href="contact.php">Message us directly</a></p>
                        </div>
                    </div>
                    <div class="info-card" data-aos="zoom-in" data-aos-delay="300">
                        <div class="info-card-icon"><i class="fa fa-envelope"></i></div>
                        <div class="info-card-body">
                            <h4>Email Us</h4>
                            <p><a href="contact.php"><?php echo SITE_EMAIL_GMAIL; ?></a></p>
                        </div>
                    </div>
                    <div class="info-card" data-aos="zoom-in" data-aos-delay="400">
                        <div class="info-card-icon"><i class="fa fa-clock"></i></div>
                        <div class="info-card-body">
                            <h4>Working Hours</h4>
                            <p>Mon–Fri: 9AM–6PM EST</p>
                        </div>
                    </div>
                    <div class="info-card" data-aos="zoom-in" data-aos-delay="500">
                        <div class="info-card-icon"><i class="fa fa-users"></i></div>
                        <div class="info-card-body">
                            <h4>Service Area</h4>
                            <p>Serving New York Families</p>
                        </div>
                    </div>
                    <div class="info-card" data-aos="zoom-in" data-aos-delay="600">
                        <div class="info-card-icon"><i class="fa fa-shield-alt"></i></div>
                        <div class="info-card-body">
                            <h4>Confidential</h4>
                            <p>100% Private &amp; Secure</p>
                        </div>
                    </div>
                </div>

                <!-- Why Choose Us Box -->
                <div class="why-box" data-aos="fade-up" data-aos-delay="700">
                    <h3>Why Choose Us?</h3>
                    <ul class="why-list">
                        <li>No upfront fees – pay only when approved</li>
                        <li>98% success rate with applications</li>
                        <li>Bilingual support (English &amp; Spanish)</li>
                        <li>Authorized representation with agencies</li>
                    </ul>
                </div>

            </div><!-- /.contact-right -->
        </div><!-- /.contact-wrapper -->
    </div>
</section>

<?php include 'includes/footer.php'; ?>