<?php
// ============================================================
// SERVICES PAGE — pages/services.php
// ============================================================
$pageTitle = 'Our Services – Empower Zone Consulting';
$pageDesc  = 'Empower Zone helps you apply for SNAP, Cash Assistance, Medicaid, WIC and more. Full-service benefits consulting in New York.';

$services = [
    [
        'icon'  => 'fa-utensils',
        'color' => '#e8f5f6',
        'title' => 'SNAP (Food Stamps)',
        'desc'  => 'Get maximum nutrition benefits for you and your family. We handle the entire SNAP application process from start to finish.',
        'tags'  => ['Grocery Assistance', 'Monthly Benefits', 'Fast Approval'],
    ],
    [
        'icon'  => 'fa-dollar-sign',
        'color' => '#f0f7e8',
        'title' => 'Cash Assistance',
        'desc'  => 'Financial help for everyday living expenses. We ensure you receive every dollar you\'re entitled to, quickly and correctly.',
        'tags'  => ['Monthly Payments', 'Emergency Aid', 'Family Support'],
    ],
    [
        'icon'  => 'fa-heartbeat',
        'color' => '#fdecea',
        'title' => 'Medicaid',
        'desc'  => 'Healthcare coverage for you and your children. We navigate the complex Medicaid system so you get full coverage fast.',
        'tags'  => ['Doctor Visits', 'Prescriptions', 'Full Coverage'],
    ],
    [
        'icon'  => 'fa-baby',
        'color' => '#fef9e7',
        'title' => 'WIC Program',
        'desc'  => 'Special nutrition support for pregnant women, new mothers, infants, and children under 5. We simplify the WIC process.',
        'tags'  => ['Pregnant Women', 'Infants & Children', 'Nutrition Support'],
    ],
    [
        'icon'  => 'fa-file-alt',
        'color' => '#f0eafb',
        'title' => 'Application Assistance',
        'desc'  => 'Struggling with the paperwork? We handle every form, every document, every online submission — you just provide the info.',
        'tags'  => ['All Programs', 'Document Help', 'Online Filing'],
    ],
    [
        'icon'  => 'fa-gavel',
        'color' => '#e8f0fb',
        'title' => 'Denial Appeals',
        'desc'  => 'Been denied? Don\'t give up. Our team reviews your case, identifies errors, and files appeals to win you the benefits you deserve.',
        'tags'  => ['Appeal Filing', 'Case Review', 'Error Correction'],
    ],
];

$process = [
    ['step' => '01', 'title' => 'Free Consultation',    'desc' => 'Call or message us. Tell us your situation — we listen and explain exactly what you qualify for.'],
    ['step' => '02', 'title' => 'Document Collection',  'desc' => 'We tell you exactly what documents you need and walk you through gathering them — no guesswork.'],
    ['step' => '03', 'title' => 'We Submit for You',    'desc' => 'We handle all the online applications, forms, and submissions. You don\'t have to do a thing.'],
    ['step' => '04', 'title' => 'Follow-Up & Approval', 'desc' => 'We monitor your case, respond to agency requests, and keep pushing until you\'re approved.'],
];
?>

<!-- ===== SERVICES HERO ===== -->
<div class="page-hero page-hero--light">
    <div class="page-hero-content">
        <span class="page-hero-badge">What We Do</span>
        <h1>Our <span class="teal-text">Services</span></h1>
        <p>Complete benefits consulting — from first application to final approval. We handle it all.</p>
    </div>
</div>

<!-- ===== SERVICES GRID ===== -->
<section class="services-section">
    <div class="container">
        <h2 class="section-title">Everything We Offer</h2>
        <p class="section-subtitle">From SNAP to Medicaid, Cash Assistance to WIC — we cover every major benefit program available to New York families.</p>

        <div class="services-grid">
            <!-- Loop through the $services array defined at the top of the file to render each service card dynamically -->
            <?php foreach ($services as $svc): ?>
                <div class="service-card">
                    <div class="service-icon" style="background: <?php echo $svc['color']; ?>">
                        <i class="fas <?php echo $svc['icon']; ?>"></i>
                    </div>
                    <h3><?php echo $svc['title']; ?></h3>
                    <p><?php echo $svc['desc']; ?></p>
                    <div class="service-tags">
                        <?php foreach ($svc['tags'] as $tag): ?>
                            <span class="service-tag"><?php echo $tag; ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ===== HOW IT WORKS ===== -->
<section class="process-section">
    <div class="container">
        <h2 class="section-title">How It Works</h2>
        <p class="section-subtitle">Our simple 4-step process takes the stress out of getting your benefits</p>

        <div class="process-grid">
            <!-- Loop through the $process array to render each step dynamically -->
            <?php foreach ($process as $step): ?>
                <div class="process-step">
                    <div class="process-number"><?php echo $step['step']; ?></div>
                    <h4><?php echo $step['title']; ?></h4>
                    <p><?php echo $step['desc']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ===== SERVICES CTA ===== -->
<section class="services-cta-section">
    <div class="container">
        <div class="services-cta-box">
            <h2>Ready to Get Your Benefits?</h2>
            <p>Don't wait. Contact us today for a free consultation. We'll review your case and tell you exactly what you qualify for — at no cost to you.</p>
            <div class="cta-buttons">
                <a href="tel:<?php echo SITE_PHONE_RAW; ?>" class="btn-primary">
                    <i class="fas fa-phone"></i> Call Now: <?php echo SITE_PHONE; ?>
                </a>
                <a href="index.php?page=contact" class="btn-outline">
                    <i class="fas fa-paper-plane"></i> Send a Message
                </a>
            </div>
        </div>
    </div>
</section>
