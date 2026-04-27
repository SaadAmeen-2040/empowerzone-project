/**
 * MAIN JAVASCRIPT - app.js
 * This file handles all interactive elements of the website.
 * Sections: Mobile Menu, Testimonial Slider, Contact Form (EmailJS)
 */

document.addEventListener('DOMContentLoaded', function () {

    // ============================================================
    // 1. MOBILE MENU HANDLER
    // Controls the opening and closing of the navigation menu on mobile.
    // ============================================================
    const hamburger = document.getElementById('hamburger');
    const navMobile = document.getElementById('navMobile');

    if (hamburger && navMobile) {
        // Reset state on load
        hamburger.classList.remove('active');
        navMobile.classList.remove('open');

        // Toggle menu visibility and hamburger animation (X shape)
        hamburger.addEventListener('click', function () {
            this.classList.toggle('active');
            navMobile.classList.toggle('open');
        });

        // Auto-close menu when any navigation link is clicked
        navMobile.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () {
                hamburger.classList.remove('active');
                navMobile.classList.remove('open');
            });
        });
    }

    // ============================================================
    // 2. TESTIMONIAL SLIDER (Homepage Only)
    // Manages the text and dot navigation for the testimonials section.
    // ============================================================
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
    const testimonyText = document.getElementById('testimonyText');
    const testimonyAuthor = document.getElementById('testimonyAuthor');
    const testimonyTag = document.getElementById('testimonyTag');
    const dots = document.querySelectorAll('.slider-dots .dot');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');

    /**
     * Updates the testimonial display with new data.
     * @param {number} index - Index of the testimonial in the array.
     */
    function showTestimonial(index) {
        if (!testimonyText) return;
        const t = testimonials[index];
        testimonyText.textContent = t.text;
        testimonyAuthor.textContent = t.author;
        if (testimonyTag) testimonyTag.textContent = t.tag;

        // Update active state of navigation dots
        dots.forEach(function (d, i) {
            d.classList.toggle('active', i === index);
        });
    }

    // Manual Navigation: Previous Button
    if (prevBtn) {
        prevBtn.addEventListener('click', function () {
            currentIndex = (currentIndex - 1 + testimonials.length) % testimonials.length;
            showTestimonial(currentIndex);
        });
    }

    // Manual Navigation: Next Button
    if (nextBtn) {
        nextBtn.addEventListener('click', function () {
            currentIndex = (currentIndex + 1) % testimonials.length;
            showTestimonial(currentIndex);
        });
    }

    // Manual Navigation: Direct click on dots
    dots.forEach(function (dot, i) {
        dot.addEventListener('click', function () {
            currentIndex = i;
            showTestimonial(i);
        });
    });

    // Auto-advance: Moves to the next slide every 5 seconds
    if (testimonyText) {
        setInterval(function () {
            currentIndex = (currentIndex + 1) % testimonials.length;
            showTestimonial(currentIndex);
        }, 5000);
    }

    // ============================================================
    // 3. CONTACT FORM SUBMISSION (EmailJS)
    // Sends form data directly to the owner's email without a backend.
    // ============================================================
    const contactForm = document.getElementById('contactForm');
    const submitBtn = document.getElementById('submitBtn');
    const formAlert = document.getElementById('formAlert');

    /**
     * Displays a success or error alert message to the user.
     * @param {string} message - The text to display.
     * @param {string} type - 'success' or 'error'.
     */
    function showAlert(message, type) {
        if (!formAlert) return;
        const icon = type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle';
        formAlert.className = `form-alert form-alert--${type}`;
        formAlert.innerHTML = `<i class="fa ${icon}"></i> ${message}`;
        formAlert.style.display = 'flex';
        
        // Scroll to alert for visibility on mobile
        formAlert.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }

    if (contactForm && submitBtn) {
        // Initialize the EmailJS client
        if (typeof emailjs !== 'undefined') {
            emailjs.init("eoOO17CwanDcq6_pE"); // Public API Key
        }

        contactForm.addEventListener('submit', function (e) {
            e.preventDefault();

            // 1. SECURITY: Honeypot Check (Prevents bot submissions)
            const honeypot = document.getElementById('honeypot');
            if (honeypot && honeypot.value !== '') {
                console.warn('Bot submission blocked.');
                return;
            }

            // 2. VALIDATION: Ensure email is valid
            const emailField = document.getElementById('emailField');
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (emailField && !emailRegex.test(emailField.value)) {
                showAlert('Please enter a valid email address.', 'error');
                return;
            }

            // Hide any existing alerts
            if (formAlert) formAlert.style.display = 'none';

            // Indicate progress to user
            submitBtn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Sending…';
            submitBtn.disabled = true;

            const now = new Date();
            const dateTimeString = now.toLocaleString();

            // Get selected program label
            const programSelect = document.getElementById('programSelect');
            let programText = 'None Selected';
            if (programSelect && programSelect.selectedIndex > 0) {
                programText = programSelect.options[programSelect.selectedIndex].text;
            }

            // Map form fields to EmailJS template parameters
            const templateParams = {
                user_name: document.getElementById('fullName').value,
                user_email: document.getElementById('emailField').value,
                user_phone: document.getElementById('phoneField') ? document.getElementById('phoneField').value : '',
                program_type: programText,
                message: document.getElementById('message') ? document.getElementById('message').value : '',
                date_time: dateTimeString
            };

            // Execute the send function
            if (typeof emailjs !== 'undefined') {
                // 1. First, try to notify the Owner (Most important)
                emailjs.send('service_zyag6wv', 'template_q3rrevn', templateParams)
                    .then(function (response) {
                        console.log('Owner Notification Sent:', response.status, response.text);
                        
                        // 2. Now try to send the User Confirmation in the background
                        emailjs.send('service_zyag6wv', 'template_1hy1zrv', templateParams)
                            .then(function(userRes) {
                                console.log('User Confirmation Sent:', userRes.status, userRes.text);
                            })
                            .catch(function(userErr) {
                                console.error('User Confirmation FAILED:', userErr);
                                // We don't show an error to the user here because the owner already got the lead
                            });

                        // Show success state to user (since owner got the email)
                        showAlert('Thank you! Your request has been received. We will contact you shortly.', 'success');
                        submitBtn.innerHTML = '<i class="fa fa-check"></i> Message Sent!';
                        submitBtn.style.background = '#27ae60';

                        // Reset button and form after delay
                        setTimeout(function () {
                            submitBtn.innerHTML = '<i class="fa fa-paper-plane"></i> Get Free Consultation';
                            submitBtn.style.background = '';
                            submitBtn.disabled = false;
                            contactForm.reset();
                        }, 3000);
                    })
                    .catch(function (error) {
                        console.error('Owner Notification FAILED:', error);
                        
                        // Show error state only if the owner notification fails
                        showAlert('Unable to send request. Please check your connection or call us directly at ' + (typeof SITE_PHONE !== 'undefined' ? SITE_PHONE : ''), 'error');
                        submitBtn.innerHTML = '<i class="fa fa-times"></i> Failed to send';
                        submitBtn.style.background = '#e74c3c';

                        setTimeout(function () {
                            submitBtn.innerHTML = '<i class="fa fa-paper-plane"></i> Get Free Consultation';
                            submitBtn.style.background = '';
                            submitBtn.disabled = false;
                        }, 3000);
                    });
            } else {
                console.error("EmailJS not loaded");
                showAlert('Service currently unavailable. Please call us instead.', 'error');
                submitBtn.innerHTML = '<i class="fa fa-times"></i> Service Unavailable';
                submitBtn.disabled = false;
            }
        });
    }

});

