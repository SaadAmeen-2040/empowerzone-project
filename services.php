 
<?php
$page = 'services';
require_once 'includes/config.php';
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
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>


<!-- ===== SERVICES PAGE STYLES & SCRIPTS ===== -->
<script src="https://cdn.tailwindcss.com"></script>
<style>
    .slide-fade { transition: opacity 1s ease-in-out; }
    .bg-overlay { background-color: #5E9EA8; opacity: 0.85; mix-blend-mode: multiply; }
</style>

<!-- ===== SERVICES HERO ===== -->
<section class="relative w-full min-h-screen overflow-hidden bg-gray-900">
    <div id="slider-container" class="absolute inset-0">
        <div class="slide absolute inset-0 transition-opacity duration-1000 opacity-100">
            <img src="assets\images\food.png" alt="SNAP Benefits" class="w-full h-full object-cover">
        </div>
        <div class="slide absolute inset-0 transition-opacity duration-1000 opacity-0">
            <img src="assets\images\hands.avif" alt="Cash Assistance" class="w-full h-full object-cover">
        </div>
        <div class="slide absolute inset-0 transition-opacity duration-1000 opacity-0">
            <img src="assets\images\doctor.avif" alt="Medical Benefits" class="w-full h-full object-cover">
        </div>

        <div class="absolute inset-0 bg-overlay"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/60 to-transparent"></div>
    </div>

    <div class="relative z-10 flex items-center justify-center min-h-screen px-4 sm:px-6 lg:px-8 pt-20">
        <div class="max-w-4xl mx-auto text-center">
            
            <div data-aos="fade-down" class="bg-white/20 backdrop-blur-md text-white px-5 py-2 mt-5  rounded-full text-sm font-medium mb-6 inline-flex items-center justify-center">
                <span class="animate-pulse mr-2 text-white">•</span>YOUR BENEFITS ADVOCATE
            </div>

            <div class="mb-8">
                <h1 id="main-title" data-aos="fade-up" data-aos-delay="200" class="text-4xl sm:text-5xl lg:text-7xl font-bold text-white mb-6 leading-tight">
                    Cash Assistance Programs
                </h1>
            </div>

            <div class="mt-6">
                <p id="sub-text-1" data-aos="fade-up" data-aos-delay="300" class="text-xl text-white/95 font-light leading-relaxed max-w-2xl mx-auto mb-8">
                    Emergency financial help for rent, bills, and daily expenses with guaranteed maximum benefits.
                </p>
            </div>

            <div class="mt-4">
                <p data-aos="fade-up" data-aos-delay="400" class="text-lg text-white/90 leading-relaxed max-w-2xl mx-auto mb-10">
                    Sit back, relax, and let us handle everything. No stress, no endless forms, no waiting on hold.
                </p>
            </div>

            <div class="mt-8 flex flex-col sm:flex-row justify-center gap-4">
                <a href="contact.php">
                    <button  class="w-full sm:w-auto bg-white text-[#5E9EA8] px-10 py-4 rounded-lg font-bold hover:bg-gray-100 transition-all transform hover:scale-105 duration-300 shadow-lg">
                        Free Consultation
                    </button>
                </a>
                <a href="#servives-grid">
                    <button class="w-full sm:w-auto border-2 border-white text-white px-10 py-4 rounded-lg font-bold hover:bg-white hover:text-[#5E9EA8] transition-all transform hover:scale-105 duration-300">
                        View All Services
                    </button>
                </a>
            </div>

            <div class="flex justify-center gap-3 mt-12">
                <button onclick="goToSlide(0)" class="dot w-3 h-3 rounded-full bg-white transition-all scale-125" aria-label="Slide 1"></button>
                <button onclick="goToSlide(1)" class="dot w-3 h-3 rounded-full bg-white/40 transition-all hover:bg-white/70" aria-label="Slide 2"></button>
                <button onclick="goToSlide(2)" class="dot w-3 h-3 rounded-full bg-white/40 transition-all hover:bg-white/70" aria-label="Slide 3"></button>
            </div>

            <div data-aos="fade-up" data-aos-delay="500" class="mt-10 text-white/80 text-lg">
                <p>Call today: <a href="tel:+17187576928" class="font-bold text-white hover:underline">+1 (718) 757-6928</a></p>
            </div>
        </div>
    </div>
</section>

<!-- ===== SERVICES GRID ===== -->
<section data-aos="fade-up" class="services-section">
    <div class="container">
        <h2 class="section-title"  id="servives-grid" >Everything We Offer</h2>
        <p class="section-subtitle">From SNAP to Medicaid, Cash Assistance to WIC — we cover every major benefit program available to New York families.</p>

        <div class="services-grid" >
            <!-- Loop through the $services array defined at the top of the file to render each service card dynamically -->
            <?php foreach ($services as $svc): ?>
                <div data-aos="fade-up" class="service-card">
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




<!-- ===== READY CTA ===== -->
<section class="w-full bg-[#5E9EA8] py-20 px-4 sm:px-6 lg:px-8 font-sans">
    <div class="max-w-5xl mx-auto flex flex-col items-center">
        
        <!-- Header -->
        <h2 class="text-3xl md:text-5xl font-bold text-white text-center mb-6 leading-tight" data-aos="fade-up">
            Ready to Get the Benefits You Deserve?
        </h2>
        <p class="text-lg md:text-xl text-white/90 text-center max-w-3xl mb-12" data-aos="fade-up" data-aos-delay="100">
            Stop struggling with confusing applications and denial letters. Let our experts handle everything for you.
        </p>

        <!-- Features Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-full mb-12" data-aos="fade-up" data-aos-delay="200">
            <!-- Box 1 -->
            <div class="border border-white/30 bg-white/10 backdrop-blur-md rounded-xl p-6 text-center shadow-sm">
                <h3 class="text-white font-bold text-lg mb-1">No Upfront Fees</h3>
                <p class="text-white/80 text-sm">Affordable payment options</p>
            </div>
            <!-- Box 2 -->
            <div class="border border-white/30 bg-white/10 backdrop-blur-md rounded-xl p-6 text-center shadow-sm">
                <h3 class="text-white font-bold text-lg mb-1">98% Success Rate</h3>
                <p class="text-white/80 text-sm">Maximum benefits guaranteed</p>
            </div>
            <!-- Box 3 -->
            <div class="border border-white/30 bg-white/10 backdrop-blur-md rounded-xl p-6 text-center shadow-sm">
                <h3 class="text-white font-bold text-lg mb-1">Bilingual Support</h3>
                <p class="text-white/80 text-sm">English and Spanish available</p>
            </div>
        </div>

        <!-- Buttons -->
        <div class="flex flex-col sm:flex-row justify-center items-center gap-4 w-full" data-aos="fade-up" data-aos-delay="300">
            <a href="contact.php" class="w-full sm:w-auto text-center bg-white text-[#5E9EA8] px-8 py-3.5 rounded-lg font-bold hover:bg-gray-100 transition-all shadow-md">
                Free Consultation
            </a>
            <a href="tel:<?php echo SITE_PHONE_RAW; ?>" class="w-full sm:w-auto text-center border-2 border-white text-white px-8 py-3.5 rounded-lg font-bold hover:bg-white hover:text-[#5E9EA8] transition-all">
                Call Now: <?php echo SITE_PHONE; ?>
            </a>
        </div>

        <!-- Footer Note -->
        <div class="mt-10 text-white/80 text-sm md:text-base" data-aos="fade-in" data-aos-delay="400">
            <p>• No obligation • Confidential • Professional service</p>
        </div>

    </div>
</section>




<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    // Initialize Animations
    AOS.init({ duration: 1000, once: true });

    // Slider Logic
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.dot');
    const titles = ["Cash Assistance Programs", "SNAP Benefits Assistance", "Medical Coverage Support"];
    const subTexts = [
        "Emergency financial help for rent, bills, and daily expenses with guaranteed maximum benefits.",
        "We ensure you receive the maximum food stamp benefits you're entitled to with expert assistance.",
        "Navigate complex healthcare applications easily and secure the coverage your family deserves."
    ];
    
    let currentSlide = 0;

    function goToSlide(index) {
        // Reset old slide
        slides[currentSlide].classList.replace('opacity-100', 'opacity-0');
        dots[currentSlide].classList.replace('bg-white', 'bg-white/40');
        dots[currentSlide].classList.remove('scale-125');

        // Set new slide
        currentSlide = index;
        slides[currentSlide].classList.replace('opacity-0', 'opacity-100');
        dots[currentSlide].classList.replace('bg-white/40', 'bg-white');
        dots[currentSlide].classList.add('scale-125');

        // Update Text
        document.getElementById('main-title').innerText = titles[currentSlide];
        document.getElementById('sub-text-1').innerText = subTexts[currentSlide];
    }

    // Auto-play slider
    setInterval(() => {
        let next = (currentSlide + 1) % slides.length;
        goToSlide(next);
    }, 5000);
</script>

<?php include 'includes/footer.php'; ?>
