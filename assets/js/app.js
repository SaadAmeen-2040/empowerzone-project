// ============================================================
// EMPOWER ZONE — app.js
// All site-wide JavaScript. No inline scripts in HTML.
// ============================================================

document.addEventListener('DOMContentLoaded', function () {

    // --------------------------------------------------------
    // 1. HAMBURGER MOBILE MENU
    // --------------------------------------------------------
    const hamburger = document.getElementById('hamburger');
    const navMobile = document.getElementById('navMobile');

    if (hamburger && navMobile) {
        hamburger.addEventListener('click', function () {
            this.classList.toggle('active');
            navMobile.classList.toggle('open');
        });

        // Close menu when a link is clicked
        navMobile.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () {
                hamburger.classList.remove('active');
                navMobile.classList.remove('open');
            });
        });
    }

    // --------------------------------------------------------
    // 2. TESTIMONIAL SLIDER (Home page)
    // --------------------------------------------------------
    const testimonials = [
        {
            text: '"After being denied twice for Medicaid, I almost gave up. Empower Zone reviewed my case, fixed the mistakes, and got me approved quickly. I\'m so grateful!"',
            author: 'Michael Johnson, Queens NY',
            tag: 'Medicaid'
        },
        {
            text: '"I had been denied twice before. Empower Zone fixed my case in just two weeks. Amazing service!"',
            author: 'Maria Rodriguez, Queens NY',
            tag: 'SNAP'
        },
        {
            text: '"With three kids and both parents laid off, we didn\'t know where to turn. Empower Zone helped us get Cash Assistance and SNAP benefits."',
            author: 'The Johnson Family, Bronx NY',
            tag: 'Cash Assistance'
        }
    ];

    let currentIndex = 0;

    const testimonyText   = document.getElementById('testimonyText');
    const testimonyAuthor = document.getElementById('testimonyAuthor');
    const testimonyTag    = document.getElementById('testimonyTag');
    const dots            = document.querySelectorAll('.slider-dots .dot');
    const prevBtn         = document.getElementById('prevBtn');
    const nextBtn         = document.getElementById('nextBtn');

    function showTestimonial(index) {
        if (!testimonyText) return;
        const t = testimonials[index];
        testimonyText.textContent   = t.text;
        testimonyAuthor.textContent = t.author;
        if (testimonyTag) testimonyTag.textContent = t.tag;
        dots.forEach(function (d, i) {
            d.classList.toggle('active', i === index);
        });
    }

    if (prevBtn) {
        prevBtn.addEventListener('click', function () {
            currentIndex = (currentIndex - 1 + testimonials.length) % testimonials.length;
            showTestimonial(currentIndex);
        });
    }

    if (nextBtn) {
        nextBtn.addEventListener('click', function () {
            currentIndex = (currentIndex + 1) % testimonials.length;
            showTestimonial(currentIndex);
        });
    }

    dots.forEach(function (dot, i) {
        dot.addEventListener('click', function () {
            currentIndex = i;
            showTestimonial(i);
        });
    });

    // Auto-advance slider every 5 seconds
    if (testimonyText) {
        setInterval(function () {
            currentIndex = (currentIndex + 1) % testimonials.length;
            showTestimonial(currentIndex);
        }, 5000);
    }

    // --------------------------------------------------------
    // 3. CONTACT FORM HANDLER (Contact page)
    // --------------------------------------------------------
    const contactForm = document.getElementById('contactForm');
    const submitBtn   = document.getElementById('submitBtn');

    if (contactForm && submitBtn) {
        contactForm.addEventListener('submit', function (e) {
            e.preventDefault();

            // Show loading state
            submitBtn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Sending…';
            submitBtn.disabled  = true;

            // Simulate submission (replace with real AJAX/fetch if needed)
            setTimeout(function () {
                submitBtn.innerHTML = '<i class="fa fa-check"></i> Message Sent!';
                submitBtn.style.background = '#27ae60';

                setTimeout(function () {
                    submitBtn.innerHTML        = '<i class="fa fa-paper-plane"></i> Get Free Consultation';
                    submitBtn.style.background = '';
                    submitBtn.disabled         = false;
                    contactForm.reset();
                }, 3000);
            }, 1000);
        });
    }

});
