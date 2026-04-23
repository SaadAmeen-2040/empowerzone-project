<?php
// =========================================================================
// PHP LOGIC & DYNAMIC DATA SECTION
// We store data in variables/arrays here, then display it in the HTML below!
// =========================================================================

// Global Information Variables
$phoneNumber = "+1 (718) 757-6928";
$emailAddress = "EmpowerZoneServices@gmail.com";

// Navbar Links Array
// Navbar Links Array
$navLinks =[
    "Home" => "index.php",       // Points to your home page file
    "About Us" => "about.php",   // Points to a separate about page
    "Services" => "services.php",// Points to a separate services page
    "Contact" => "contact.php"   // Points to a separate contact page
];

// Top Stats Section Array
$statistics = [["icon" => "fa-solid fa-award", "count" => "2+", "title" => "Years Experience"],["icon" => "fa-regular fa-face-smile", "count" => "15+", "title" => "Happy Clients"],["icon" => "fa-solid fa-users", "count" => "3+", "title" => "Experts Network"],["icon" => "fa-solid fa-chart-column", "count" => "100%", "title" => "Success Rate"]
];

// Core Offers Data Array
$coreOffers = [["icon" => "fa-regular fa-compass", "title" => "🎯 Clear Guidance", "desc" => "We explain the process in simple steps so you always know what's happening with your application."],["icon" => "fa-solid fa-user-tie", "title" => "🤝 Personal Support", "desc" => "We work with you one-on-one, collect your documents, and make sure nothing is missing."],["icon" => "fa-solid fa-laptop", "title" => "💻 Application Handling", "desc" => "From start to finish, we submit your applications online for you."],["icon" => "fa-solid fa-shield-halved", "title" => "🛡️ Case Follow-Up", "desc" => "We don't stop at filing. We track your case, fix issues, and fight for approvals if you've been denied."],["icon" => "fa-regular fa-heart", "title" => "💖 Care & Trust", "desc" => "You're more than just a case number. We treat every client with respect, dignity, and dedication."]
];

// Why Choose Us Array
$whyChooseUs = [["icon" => "fa-regular fa-clock", "title" => "⏳ Save Time", "desc" => "No more waiting on hold, no office visits, and no piles of paperwork. We handle the entire application process for you, just give us a call."],["icon" => "fa-solid fa-location-dot", "title" => "📍 Local Knowledge", "desc" => "We know how the system works and make sure your application is filed correctly the first time."],["icon" => "fa-regular fa-file-lines", "title" => "🤝 End-to-End Support", "desc" => "From collecting your documents to submitting applications and following up, we're with you until approval."],["icon" => "fa-solid fa-arrows-rotate", "title" => "💡 Fixing Denials", "desc" => "If you've been previously denied, our team reviews your case, fixes errors, and files the necessary appeals to win your benefits."],["icon" => "fa-solid fa-heart", "title" => "❤️ We Care About You", "desc" => "Your success is our top priority. We offer compassionate, dedicated service to ensure you get the benefits you and your family deserve."]
];

// Footer Services Link
$footerServices =[
    "SNAP (Food Stamps)" => "Maximum nutrition benefits",
    "Cash Assistance" => "Financial help for expenses",
    "Medicaid" => "Healthcare coverage",
    "WIC Program" => "Women, infants & children",
    "Application Assistance" => "Full support from start to finish",
    "Denial Appeals" => "Fight for your benefits"
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empower Zone Landing Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        /* --- ADDED SMOOTH SCROLL BEHAVIOR --- */
        html {
            scroll-behavior: smooth;
        }

        body {
            background-color: #ffffff;
            color: #2b2b2b;
            overflow-x: hidden;
        }

        .hero-bg {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.7)), url('https://www.empowerzone.us/home/food.png') no-repeat center/cover;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            padding-bottom: 50px;
        }

        .navbar {
            width: 80%;
            margin: 20px auto;
            background: #afd9cf;
            padding: 15px 30px;
            border-radius: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo img {
            height: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .logo:hover img {
            transform: translateY(-8px) scale(1.05);
        }

        .nav-links {
            list-style: none;
            display: flex;
            gap: 25px;
        }

        .nav-links li {
            transition: all 0.3s ease;
        }

        .nav-links li:hover {
            transform: translateY(-5px);
        }

        .nav-links a {
            text-decoration: none;
            color: #2b2b2b;
            font-weight: 600;
            position: relative;
        }

        .nav-links a:hover {
            color: #f1f1f1be;
        }

        .nav-links a::after {
            content: "";
            position: absolute;
            width: 0%;
            height: 2px;
            background: rgba(252, 249, 249, 0.767);
            left: 0;
            bottom: -5px;
            transition: 0.3s;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .call-btn {
            background: white;
            color: #4a8c7e;
            border: none;
            padding: 10px 18px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .call-btn:hover {
            background: #1e3131;
            color: white;
            transform: scale(1.05);
        }

        .hero-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            flex-grow: 1;
            padding: 0 20px;
            margin-top: 20px;
        }

        .badge {
            background: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 1px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            margin-bottom: 25px;
            backdrop-filter: blur(5px);
        }

        .hero-title {
            color: white;
            font-size: 3.5rem;
            font-weight: bold;
            line-height: 1.2;
            margin-bottom: 20px;
        }

        .hero-title .underline {
            border-bottom: 4px solid #afd9cf;
            padding-bottom: 2px;
        }

        .hero-subtitle {
            color: #e0e0e0;
            font-size: 1.1rem;
            max-width: 650px;
            line-height: 1.5;
            margin-bottom: 40px;
        }

        .features-row {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 40px;
        }

        .feature-card {
            background: rgba(0, 0, 0, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            padding: 12px 20px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
            backdrop-filter: blur(8px);
            transition: 0.3s;
        }

        .feature-card:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-5px);
        }

        .cta-row {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-primary {
            background: white;
            color: #4a8c7e;
            border: none;
            padding: 15px 30px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background: #afd9cf;
            color: #1e3131;
            transform: scale(1.05);
        }

        .btn-secondary {
            background: transparent;
            color: white;
            border: 2px solid white;
            padding: 15px 30px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-secondary:hover {
            background: white;
            color: #1e3131;
            transform: scale(1.05);
        }

        .container {
            width: 85%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .info-bar {
            background: white;
            padding: 20px 40px;
            border-radius: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            margin-top: -40px;
            position: relative;
            z-index: 10;
            flex-wrap: wrap;
            gap: 20px;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .info-icon {
            background: #6eb7aa;
            color: white;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            font-size: 18px;
        }

        .info-text h4 {
            font-size: 12px;
            color: #777;
            text-transform: uppercase;
            margin-bottom: 3px;
        }

        .info-text p {
            font-size: 16px;
            font-weight: bold;
            color: #2b2b2b;
        }

        .btn-teal {
            background: #6eb7aa;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-teal:hover {
            background: #4a8c7e;
        }

        .stats-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-top: 50px;
            margin-bottom: 60px;
        }

        .stat-card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            border: 1px solid #f0f0f0;
        }

        .stat-icon {
            color: #6eb7aa;
            font-size: 24px;
        }

        .stat-card h3 {
            font-size: 2rem;
            font-weight: bold;
            color: #2b2b2b;
        }

        .stat-card p {
            color: #777;
            font-size: 14px;
            font-weight: 600;
        }

        .section-title {
            text-align: center;
            font-size: 2.2rem;
            font-weight: bold;
            color: #1e3131;
            margin-bottom: 40px;
        }

        .section-subtitle {
            text-align: center;
            color: #666;
            max-width: 600px;
            margin: -20px auto 40px auto;
            line-height: 1.5;
        }

        .teal-text {
            color: #6eb7aa;
        }

        .core-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 20px;
        }

        .core-card {
            background: #fbfdfd;
            border: 1px solid #eef5f4;
            padding: 30px 20px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.02);
            transition: 0.3s;
        }

        .core-card:hover {
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.08);
            transform: translateY(-3px);
        }

        .core-icon-circle {
            width: 50px;
            height: 50px;
            background: #e6f2f0;
            color: #6eb7aa;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            margin: 0 auto 15px auto;
        }

        .core-card h4 {
            font-size: 18px;
            color: #1e3131;
            margin-bottom: 10px;
        }

        .core-card p {
            font-size: 14px;
            color: #666;
            line-height: 1.5;
        }

        .core-more {
            background: #fbfdfd;
            border: 1px solid #eef5f4;
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            margin-bottom: 80px;
        }

        .core-more h4 {
            font-size: 18px;
            color: #1e3131;
            margin-bottom: 10px;
        }

        .core-more p {
            font-size: 14px;
            color: #666;
            line-height: 1.6;
            max-width: 800px;
            margin: 0 auto;
        }

        .why-choose-bg {
            background: #f4f8f7;
            padding: 80px 0;
            border-top-left-radius: 100px;
            margin-bottom: 80px;
        }

        .choose-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .choose-card {
            background: white;
            padding: 30px 20px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
            border: 1px solid #f0f0f0;
            transition: 0.3s;
        }

        .choose-card:hover {
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            transform: translateY(-5px);
        }

        .choose-icon-square {
            width: 60px;
            height: 60px;
            background: #6eb7aa;
            color: white;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin: 0 auto 20px auto;
        }

        .choose-card h4 {
            font-size: 18px;
            color: #1e3131;
            margin-bottom: 15px;
        }

        .choose-card p {
            font-size: 14px;
            color: #666;
            line-height: 1.6;
        }

        .success-stories-wrapper {
            position: relative;
            padding: 80px 0;
            overflow: hidden;
        }

        .bg-circle {
            position: absolute;
            background: rgba(110, 183, 170, 0.1);
            border-radius: 50%;
            z-index: -1;
        }

        .circle-top {
            width: 300px;
            height: 300px;
            top: -50px;
            right: -50px;
        }

        .circle-bottom {
            width: 250px;
            height: 250px;
            bottom: 80px;
            left: -100px;
        }

/* Container Layout */
.testimonial-section {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 20px;
  max-width: 900px;
  margin: 40px auto 15px auto;
  font-family: system-ui, -apple-system, sans-serif;
}

/* White Card Box */
.testimonial-card {
  background: #ffffff;
  border-radius: 12px;
  box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.04);
  width: 100%;
  max-width: 700px;
  padding: 40px;
  overflow: hidden; /* Hides the sliding items outside the box */
}

/* Track that slides */
.slider-track {
  display: flex;
  transition: transform 0.4s ease-in-out;
}

/* Individual Slide */
.slide {
  min-width: 100%;
  box-sizing: border-box;
  text-align: center;
  position: relative;
}

/* Large Quote Icon */
.quote-mark {
  position: absolute;
  top: -25px;
  right: 0px;
  font-size: 100px;
  font-family: Georgia, serif;
  color: #f3f4f6;
  line-height: 1;
}

/* Stars */
.stars {
  color: #fbbf24; /* Gold */
  font-size: 24px;
  letter-spacing: 2px;
  margin-bottom: 20px;
}

/* Text & Typography */
.testimonial-text {
  font-style: italic;
  color: #4b5563;
  font-size: 17px;
  line-height: 1.6;
  margin-bottom: 25px;
  position: relative;
  z-index: 2; /* Keeps text above the quote icon */
}

.author-name {
  font-weight: 700;
  color: #1f2937;
  font-size: 16px;
  margin: 0 0 15px 0;
}

/* Bottom Tags */
.tags {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 15px;
}

.tag-text {
  color: #63b3a8;
  font-weight: 600;
  font-size: 13px;
}

.tag-badge {
  background-color: #e6f6f4;
  color: #63b3a8;
  padding: 6px 14px;
  border-radius: 20px;
  font-weight: 600;
  font-size: 13px;
}

/* Navigation Buttons */
.nav-btn {
  background: #ffffff;
  border: 1px solid #f3f4f6;
  border-radius: 50%;
  width: 45px;
  height: 45px;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  box-shadow: 0 2px 8px rgba(0,0,0,0.03);
  color: #63b3a8; /* Teal arrow color */
  transition: all 0.2s;
  flex-shrink: 0;
}

.nav-btn:hover {
  background: #f9fafa;
}

.nav-btn svg {
  width: 20px;
  height: 20px;
}

/* Pagination Dots */
.pagination-dots {
  display: flex;
  justify-content: center;
  gap: 8px;
  margin-bottom: 40px;
}

.dot {
  width: 10px;
  height: 10px;
  background-color: #e5e7eb;
  border-radius: 50%;
  cursor: pointer;
  transition: background-color 0.3s;
}

.dot.active {
  background-color: #63b3a8;
}

/* Responsive adjustment for mobile */
@media (max-width: 600px) {
  .testimonial-section {
    position: relative;
  }
  .nav-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 10;
  }
  .prev-btn { left: 0px; }
  .next-btn { right: 0px; }
  .testimonial-card {
    padding: 30px 20px;
    margin: 0 25px; /* Leaves space for overlapping arrows */
  }
}
        .ready-cta-box {
            background: #f7fbfc;
            border: 1px solid #ecf3f4;
            border-radius: 15px;
            text-align: center;
            padding: 50px 30px;
            max-width: 900px;
            margin: 0 auto;
        }

        .ready-cta-box h3 {
            font-size: 24px;
            color: #1e3131;
            margin-bottom: 15px;
        }

        .ready-cta-box p {
            color: #666;
            font-size: 15px;
            margin-bottom: 25px;
        }

        .ready-cta-box .btn-teal {
            padding: 15px 35px;
            font-size: 16px;
            border-radius: 8px;
            background: #63a99c;
            color: white;
            transition: 0.3s;
            border: none;
            font-weight: bold;
            cursor: pointer;
        }

        .ready-cta-box .btn-teal:hover {
            background: #4a8c7e;
        }

        .journey-footer {
            background-color: #539287;
            padding: 70px 20px 40px 20px;
            text-align: center;
            color: white;
            margin-top: 50px;
        }

        .journey-footer h2 {
            font-size: 2.2rem;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .journey-footer>p {
            max-width: 700px;
            margin: 0 auto 50px auto;
            line-height: 1.5;
            font-size: 16px;
            color: rgba(255, 255, 255, 0.85);
        }

        .contact-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            max-width: 1200px;
            margin: 0 auto 50px auto;
        }

        .contact-action-card {
            background: rgba(255, 255, 255, 0.18);
            padding: 30px 15px;
            border-radius: 10px;
            transition: 0.3s;
            cursor: pointer;
            text-decoration: none;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .contact-action-card:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: translateY(-5px);
        }

        .contact-action-card .circle-icon {
            background: white;
            color: #539287;
            width: 55px;
            height: 55px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            margin-bottom: 20px;
        }

        .contact-action-card h4 {
            font-weight: normal;
            font-size: 15px;
            margin-bottom: 10px;
            opacity: 0.95;
        }

        .contact-action-card p {
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 10px;
            word-wrap: anywhere;
        }

        .contact-action-card span {
            font-size: 12px;
            opacity: 0.8;
        }

        .why-contact-box {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            padding: 35px;
            max-width: 800px;
            margin: 0 auto 50px auto;
            text-align: left;
        }

        .why-contact-box h3 {
            text-align: center;
            font-size: 1.4rem;
            font-weight: bold;
            margin-bottom: 25px;
        }

        .why-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .why-grid div {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.9);
        }

        .why-grid i {
            font-size: 16px;
            opacity: 0.9;
        }

        .motivational-quote {
            font-style: italic;
            color: rgba(255, 255, 255, 0.85);
            font-size: 1.2rem;
            letter-spacing: 0.5px;
            padding-bottom: 30px;
        }

        .site-footer {
            background: linear-gradient(180deg, #99c7bf 0%, #4c7e75 100%);
            color: rgba(255, 255, 255, 0.8);
            padding: 60px 20px 20px 20px;
        }

        .footer-content-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 40px;
            padding-bottom: 60px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
        }

        .footer-col h3 {
            color: white;
            font-size: 1.1rem;
            margin-bottom: 25px;
            font-weight: bold;
            letter-spacing: 0.5px;
        }

        .col-brand img {
            height: 50px;
            margin-bottom: 20px;
        }

        .col-brand p {
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 25px;
            color: rgba(255, 255, 255, 0.9);
        }

        .col-brand .heart-badge {
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            padding: 10px 15px;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-weight: bold;
            font-size: 13px;
            color: white;
        }

        .footer-col ul {
            list-style: none;
        }

        .col-links ul li {
            margin-bottom: 15px;
            font-size: 14px;
        }

        .col-links ul li a {
            color: rgba(255, 255, 255, 0.85);
            text-decoration: none;
            transition: 0.2s;
        }

        .col-links ul li a:hover {
            color: white;
        }

        .col-links ul li i {
            font-size: 10px;
            margin-right: 5px;
            opacity: 0.7;
        }

        .col-services ul li {
            margin-bottom: 20px;
        }

        .col-services ul li div.s-title {
            color: white;
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 3px;
        }

        .col-services ul li div.s-desc {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.7);
        }

        .col-contact ul li {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
            font-size: 13px;
            color: rgba(255, 255, 255, 0.9);
            word-wrap: break-word;
        }

        .col-contact ul li .contact-bg-icon {
            background: rgba(255, 255, 255, 0.15);
            min-width: 30px;
            height: 30px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            color: white;
        }

        .social-follow {
            margin-top: 30px;
        }

        .social-follow h3 {
            font-size: 13px;
            margin-bottom: 15px;
        }

        .social-links {
            display: flex;
            gap: 10px;
        }

        .social-links a {
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.4);
            border-radius: 6px;
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            text-decoration: none;
            transition: 0.3s;
        }

        .social-links a:hover {
            background: white;
            color: #539287;
        }

        .footer-bottom-bar {
            padding-top: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .copyright {
            font-size: 11px;
            opacity: 0.7;
        }

        .footer-stats {
            display: flex;
            gap: 30px;
            text-align: center;
        }

        .footer-stats div h4 {
            font-size: 16px;
            color: white;
            margin-bottom: 3px;
        }

        .footer-stats div span {
            font-size: 10px;
            text-transform: uppercase;
            opacity: 0.7;
            font-weight: bold;
        }

        .footer-policy-links {
            display: flex;
            gap: 15px;
        }

        .footer-policy-links a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            font-size: 11px;
            transition: 0.2s;
        }

        .footer-policy-links a:hover {
            color: white;
        }

        @media(max-width: 1024px) {
            .contact-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .footer-content-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 40px;
            }

            .footer-bottom-bar {
                flex-direction: column;
                text-align: center;
                justify-content: center;
            }

            .why-grid {
                grid-template-columns: 1fr;
            }
        }

        @media(max-width: 768px) {
            .nav-links {
                display: none;
            }

            .navbar {
                width: 95%;
            }

            .hero-title {
                font-size: 2.2rem;
            }

            .features-row {
                flex-direction: column;
                align-items: center;
            }

            .feature-card {
                width: 100%;
                justify-content: center;
            }

            .cta-row {
                flex-direction: column;
                width: 100%;
                max-width: 300px;
            }

            .btn-primary,
            .btn-secondary {
                width: 100%;
                justify-content: center;
            }

            .core-grid,
            .choose-grid,
            .contact-grid {
                grid-template-columns: 1fr;
            }

            .info-bar {
                flex-direction: column;
                align-items: flex-start;
            }

            .ready-cta-box {
                padding: 30px 15px;
            }

            .testimonial-slider-container {
                flex-direction: column;
            }

            .slider-btn {
                display: none;
            }

            .footer-content-grid {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .why-contact-box {
                padding: 25px 15px;
                text-align: center;
            }

            .why-grid div {
                justify-content: center;
            }

            .footer-stats {
                justify-content: center;
                gap: 20px;
                flex-wrap: wrap;
            }
        }
    </style>
</head>

<body>
    <div class="hero-bg">
        <nav class="navbar">
            <div class="logo">
                <img src="https://empowerzone.us/logo.png" alt="Logo">
            </div>

            <!-- RENDER NAV DYNAMICALLY WITH PHP -->
            <ul class="nav-links">
                <?php foreach ($navLinks as $title => $url): ?>
                    <li><a href="<?php echo $url; ?>"><?php echo $title; ?></a></li>
                <?php endforeach; ?>
            </ul>

            <button class="call-btn" onclick="callNow()">
                <i class="fa fa-phone"></i> Call Now
            </button>
        </nav>

        <!-- ADDED id="home" to target 'Home' navigation -->
        <main id="home" class="hero-section">
            <div class="badge">&bull; EMPOWER ZONE CONSULTING</div>
            <h1 class="hero-title">Your Benefits. Your Peace of <br> Mind. Your <span class="underline">Advocate</span></h1>
            <p class="hero-subtitle">Sit back, relax, and let us do everything. No stress, no endless forms, no <br> waiting on hold.</p>

            <div class="features-row">
                <div class="feature-card"><i class="fa-regular fa-clock"></i> No waiting on hold</div>
                <div class="feature-card"><i class="fa-solid fa-shield-halved"></i> No denial worries</div>
                <div class="feature-card"><i class="fa-solid fa-user-group"></i> Personal representation</div>
                <div class="feature-card"><i class="fa-regular fa-circle-check"></i> Maximum benefits</div>
            </div>

            <div class="cta-row">
                <button class="btn-primary" onclick="getStarted()"><i class="fa-solid fa-bolt"></i> Get Started Now</button>
                <button class="btn-secondary" onclick="howItWorks()">How It Works</button>
            </div>
        </main>
    </div>

    <!-- MAIN SCROLL CONTENT -->
    <div class="container">
        <!-- RENDER TOP INFO DYNAMICALLY FROM PHP -->
        <div class="info-bar">
            <div class="info-item">
                <div class="info-icon"><i class="fa-solid fa-phone"></i></div>
                <div class="info-text">
                    <h4>Call Or Whatsapp Now</h4>
                    <p><?php echo $phoneNumber; ?></p>
                </div>
            </div>
            <div class="info-item">
                <div class="info-icon"><i class="fa-solid fa-envelope"></i></div>
                <div class="info-text">
                    <h4>Email Us</h4>
                    <p><?php echo $emailAddress; ?></p>
                </div>
            </div>
            <button class="btn-teal">Free Consultation</button>
        </div>

        <!-- STATS SECTION USING PHP FOREACH LOOP -->
        <div class="stats-section">
            <?php foreach ($statistics as $stat): ?>
                <div class="stat-card">
                    <i class="<?php echo $stat['icon']; ?> stat-icon"></i>
                    <h3><?php echo $stat['count']; ?></h3>
                    <p><?php echo $stat['title']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- ADDED id="services" to target 'Services' navigation -->
        <h2 id="services" class="section-title">Our Core Offer</h2>
        <div class="core-grid">
            <?php foreach ($coreOffers as $offer): ?>
                <div class="core-card">
                    <div class="core-icon-circle"><i class="<?php echo $offer['icon']; ?>"></i></div>
                    <h4><?php echo $offer['title']; ?></h4>
                    <p><?php echo $offer['desc']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="core-more">
            <h4>More</h4>
            <p>Beyond applications, we stand with you at every stage — providing updates, clarifying doubts, and making sure you never feel alone in the process. Our team's dedication ensures your case gets the attention and persistence it deserves.</p>
        </div>
    </div>

    <!-- ADDED id="about" to target 'About Us' navigation -->
    <div id="about" class="why-choose-bg">
        <div class="container">
            <h2 class="section-title">Why People Choose <span class="teal-text">Empower Zone</span></h2>
            <p class="section-subtitle">We're different from other services because we truly care about your success and make the process effortless for you.</p>
            <div class="choose-grid">
                <?php foreach ($whyChooseUs as $reason): ?>
                    <div class="choose-card">
                        <div class="choose-icon-square"><i class="<?php echo $reason['icon']; ?>"></i></div>
                        <h4><?php echo $reason['title']; ?></h4>
                        <p><?php echo $reason['desc']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- SUCCESS STORIES & READY BANNER -->
    <div class="success-stories-wrapper">
        <div class="bg-circle circle-top"></div>
        <div class="bg-circle circle-bottom"></div>
        <div class="container">
            <h2 class="section-title">Success <span class="teal-text">Stories</span></h2>
            <p class="section-subtitle">Hear from families we've helped secure the benefits they deserve</p>

           <div class="testimonial-section">
  <!-- Left Arrow -->
  <button class="nav-btn prev-btn" id="prevBtn" aria-label="Previous">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
  </button>

  <!-- Main Card -->
  <div class="testimonial-card">
    <div class="slider-track" id="sliderTrack">
      
      <!-- Slide 1 -->
      <div class="slide">
        <div class="quote-mark">”</div>
        <div class="stars">★★★★★</div>
        <p class="testimonial-text">
          "After being denied twice for Medicaid, I almost gave up. Empower Zone reviewed my case, fixed the mistakes, and got me approved quickly. I'm so grateful!"
        </p>
        <h4 class="author-name">Michael Johnson, Queens NY</h4>
        <div class="tags">
          <span class="tag-text">Medicaid</span>
          <span class="tag-badge">Approved ✓</span>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="slide">
        <div class="quote-mark">”</div>
        <div class="stars">★★★★★</div>
        <p class="testimonial-text">
          "The process was completely stress-free. The team handled all the paperwork and communicated with me every step of the way. Highly recommended service!"
        </p>
        <h4 class="author-name">Sarah Williams, Brooklyn NY</h4>
        <div class="tags">
          <span class="tag-text">Medicare</span>
          <span class="tag-badge">Approved ✓</span>
        </div>
      </div>

    </div>
  </div>

  <!-- Right Arrow -->
  <button class="nav-btn next-btn" id="nextBtn" aria-label="Next">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
  </button>
</div>

<!-- Pagination Dots -->
<div class="pagination-dots" id="paginationDots">
  <span class="dot active" data-index="0"></span>
  <span class="dot" data-index="1"></span>
</div>

            <!-- READY CTA BOX -->
            <div class="ready-cta-box">
                <h3>Ready to become our next success story?</h3>
                <p>Join hundreds of families who have successfully navigated the benefits system with our help</p>
                <button class="btn-teal" onclick="getStarted()">Start Your Application Today</button>
            </div>
        </div>
    </div>

    <!-- ADDED id="contact" to target 'Contact' navigation -->
    <div id="contact" class="journey-footer">
        <h2>Your Benefits Journey Starts Here</h2>
        <p>Take one small step — and we'll handle the rest. No stress, no endless forms, no waiting on hold.</p>

        <!-- PRINT PHP GLOBALS FOR CONSISTENT PHONE & EMAIL -->
        <div class="contact-grid">
            <a href="tel:+17187576928" class="contact-action-card">
                <div class="circle-icon"><i class="fa-solid fa-phone"></i></div>
                <h4>Call Us</h4>
                <p><?php echo $phoneNumber; ?></p>
                <span>Mon-Fri, 9AM-6PM EST</span>
            </a>
            <a href="#" class="contact-action-card">
                <div class="circle-icon"><i class="fa-brands fa-whatsapp"></i></div>
                <h4>WhatsApp</h4>
                <p>Message Us</p>
                <span>Quick responses</span>
            </a>
            <a href="mailto:<?php echo $emailAddress; ?>" class="contact-action-card">
                <div class="circle-icon"><i class="fa-regular fa-envelope"></i></div>
                <h4>Email</h4>
                <p>EmpowerZoneServices@<br>gmail.com</p>
                <span>24/7 availability</span>
            </a>
            <a href="#" class="contact-action-card">
                <div class="circle-icon"><i class="fa-regular fa-clock"></i></div>
                <h4>Free Consultation</h4>
                <p>No obligation</p>
                <span>Get started today</span>
            </a>
        </div>

        <div class="why-contact-box">
            <h3>Why Contact Us Today?</h3>
            <div class="why-grid">
                <div><i class="fa-regular fa-circle-check"></i> No upfront fees - affordable payment options</div>
                <div><i class="fa-regular fa-circle-check"></i> Spanish and English assistance available</div>
                <div><i class="fa-regular fa-circle-check"></i> 98% success rate with applications</div>
                <div><i class="fa-regular fa-circle-check"></i> Serving all New York residents</div>
            </div>
        </div>

        <p class="motivational-quote">"Your Benefits. Your Rights. Your Advocate. Empower Zone makes it simple."</p>
    </div>


    <!-- WEBSITE FOOTER -->
    <footer class="site-footer">
        <div class="container footer-content-grid">

            <div class="footer-col col-brand">
                <img src="https://empowerzone.us/logo.png" alt="Empower Zone Logo">
                <p>We help New York families navigate government benefit programs with ease. No stress, no endless forms, no waiting on hold. Your benefits made simple.</p>
                <div class="heart-badge"><i class="fa-regular fa-heart"></i> 500+ Families Helped</div>
            </div>

            <!-- Dynamic Quick Links from existing $navLinks PHP array -->
            <div class="footer-col col-links">
                <h3>Quick Links</h3>
                <ul>
                    <?php foreach ($navLinks as $title => $url): ?>
                        <li><a href="<?php echo $url; ?>"><i class="fa-solid fa-chevron-right"></i> <?php echo $title; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Dynamic Footer Services rendered from PHP list -->
            <div class="footer-col col-services">
                <h3>Our Services</h3>
                <ul>
                    <?php foreach ($footerServices as $serviceTitle => $serviceDesc): ?>
                        <li>
                            <div class="s-title"><?php echo $serviceTitle; ?></div>
                            <div class="s-desc"><?php echo $serviceDesc; ?></div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="footer-col col-contact">
                <h3>Contact Us</h3>
                <ul>
                    <li>
                        <div class="contact-bg-icon"><i class="fa-solid fa-phone"></i></div> <?php echo $phoneNumber; ?>
                    </li>
                    <li>
                        <div class="contact-bg-icon"><i class="fa-solid fa-envelope"></i></div> info@empowerzone.us
                    </li>
                    <li>
                        <div class="contact-bg-icon"><i class="fa-solid fa-envelope"></i></div> <?php echo $emailAddress; ?>
                    </li>
                    <li>
                        <div class="contact-bg-icon"><i class="fa-solid fa-location-dot"></i></div> 16 Court Street, Brooklyn, NY
                    </li>
                </ul>
                <div class="social-follow">
                    <h3>Follow Us</h3>
                    <div class="social-links">
                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container footer-bottom-bar">

            <div class="copyright">
                <!-- Using dynamic PHP date here to auto-update the copyright year -->
                © <?php echo date("Y"); ?> Empower Zone. All rights reserved. Your Benefits. Your Rights. Your Advocate.
            </div>

            <div class="footer-stats">
                <div>
                    <h4>98%</h4><span>Success Rate</span>
                </div>
                <div>
                    <h4>500+</h4><span>Families Helped</span>
                </div>
                <div>
                    <h4>$2M+</h4><span>Benefits Secured</span>
                </div>
            </div>

            <div class="footer-policy-links">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
                <a href="#">Accessibility</a>
            </div>

        </div>
    </footer>

    <!-- Frontend interactivity -->
    <script>
        function callNow() {
            window.location.href = "tel:+17187576928";
        }

        function getStarted() {
            window.location.href = "tel:+17187576928";
        }

        function howItWorks() {
            window.scrollBy({
                top: window.innerHeight - 100,
                behavior: 'smooth'
            });
        }

       document.addEventListener("DOMContentLoaded", function() {
  const track = document.getElementById("sliderTrack");
  const dots = document.querySelectorAll(".dot");
  const prevBtn = document.getElementById("prevBtn");
  const nextBtn = document.getElementById("nextBtn");
  
  let currentIndex = 0;
  const totalSlides = dots.length; // Uses the number of dots to know how many slides exist

  function updateSlider() {
    // Slide the track
    const slideWidth = 100; // 100% per slide
    track.style.transform = `translateX(-${currentIndex * slideWidth}%)`;

    // Update active dot
    dots.forEach(dot => dot.classList.remove("active"));
    dots[currentIndex].classList.add("active");
  }

  function nextSlide() {
    currentIndex = (currentIndex === totalSlides - 1) ? 0 : currentIndex + 1;
    updateSlider();
  }

  function prevSlide() {
    currentIndex = (currentIndex === 0) ? totalSlides - 1 : currentIndex - 1;
    updateSlider();
  }

  // Button Clicks
  nextBtn.addEventListener("click", nextSlide);
  prevBtn.addEventListener("click", prevSlide);

  // Dot Clicks
  dots.forEach((dot, index) => {
    dot.addEventListener("click", () => {
      currentIndex = index;
      updateSlider();
    });
  });
});

        function prevTestimonial() {
            document.querySelectorAll('.dot')[0].classList.add('active');
            document.querySelectorAll('.dot')[1].classList.remove('active');
        }
    </script>
</body>

</html>
