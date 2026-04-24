# Detailed File Explanation: Empower Zone Project

Here is a deep dive into every file in your project, explaining exactly what it does and how it fits into the overall website.

---

## 1. The Main Engine
### 📄 `index.php`
- **What it is:** The central "router" of your website.
- **How it works:** Whenever someone types your website address, they are actually opening this file. It looks at the URL (like `?page=about`) and decides which content to load. 
- **The Process:**
  1. It loads your settings (`includes/config.php`).
  2. It figures out which page the user wants (home, about, services, or contact).
  3. It loads the top part of the website (`includes/header.php` and `includes/navbar.php`).
  4. It loads the specific middle part of the page from the `pages/` folder.
  5. It loads the bottom part of the website (`includes/footer.php`).

---

## 2. Shared Layout & Settings (`includes/` folder)
These files are the building blocks that are used on *every single page* of your site.

### 📄 `includes/config.php`
- **What it is:** The central settings file.
- **How it works:** This file stores all the important data that changes rarely but is used everywhere: your phone number, email addresses, physical address, and site name. 
- **Why it’s useful:** If your phone number changes, you just change it here once, and it automatically updates in the navbar, the footer, and on the contact page! It also stores the list of links for your navigation menu and the list of services for the footer.

### 📄 `includes/header.php`
- **What it is:** The invisible top of your website.
- **How it works:** It contains the `<html>` and `<head>` tags. This is where you tell the browser what the page title is, load the Google Fonts (Inter and Nunito), load the Font Awesome icons (for the little graphics), and connect your CSS styling file. 

### 📄 `includes/navbar.php`
- **What it is:** The top navigation menu.
- **How it works:** It displays your logo, the links to different pages, and the "Call Now" button. It has a smart feature written in PHP that checks which page you are currently viewing and highlights that specific link in the menu (adding an `active` class). It also holds the hidden mobile menu for when people view the site on their phones.

### 📄 `includes/footer.php`
- **What it is:** The bottom section of your website.
- **How it works:** It displays a 4-column layout containing your brand summary, quick links, a list of services (which it grabs automatically from `config.php`), and contact information. It also closes the HTML document and loads your JavaScript file (`assets/js/app.js`).

---

## 3. The Page Content (`pages/` folder)
These files only contain the specific content for the middle of each page.

### 📄 `pages/home.php`
- **What it is:** The homepage content.
- **How it works:** At the very top, it sets the title and description for the homepage. Then, it uses PHP "arrays" (lists of data) to store information about your statistics, core offers, and "Why Choose Us" points. The HTML code below loops through these lists to create the visual cards. It contains the large Hero background section, the contact bar, statistics grid, testimonials slider, and a final "call to action" journey section.

### 📄 `pages/about.php`
- **What it is:** The "About Us" page.
- **How it works:** Similar to the home page, it sets up its title and descriptions at the top. It uses arrays to store your features, statistics, and success stories. It displays a top banner, a mission statement box, a section explaining why people should choose your services, and a grid showing testimonials from families you've helped.

### 📄 `pages/services.php`
- **What it is:** The "Our Services" page.
- **How it works:** At the top, it holds detailed arrays explaining every single service you offer (SNAP, Cash Assistance, Medicaid, WIC, Application Assistance, and Denial Appeals) along with the specific colors and icons for each card. It also holds the 4-step "How It Works" process. The HTML then generates the beautiful grid layout for these services and process steps.

### 📄 `pages/contact.php`
- **What it is:** The "Contact Us" page.
- **How it works:** It contains a large contact form where users can input their name, email, phone, choose a program from a dropdown, and send a message. Next to the form, it displays a grid of small information cards showing your phone, WhatsApp, email, working hours, and service area.

---

## 4. Styling (`assets/css/` folder)

### 📄 `assets/css/style.css`
- **What it is:** The file that makes everything look beautiful.
- **How it works:** Without this file, your website would just be plain black and white text. This file contains over 1,000 lines of rules that dictate:
  - **Colors:** It sets your main colors (like `--teal: #2aadad`) at the very top.
  - **Layouts:** It tells the browser how to place items side-by-side using "Flexbox" and "Grid".
  - **Typography:** It controls font sizes, boldness, and spacing.
  - **Mobile Responsiveness:** At the bottom of the file (usually called Media Queries), it tells the website how to change shape when someone is viewing it on a smaller mobile phone screen (like shrinking text or stacking columns on top of each other).
