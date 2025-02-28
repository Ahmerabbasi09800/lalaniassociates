<style>
    /* Active state for mobile menu */
.mean__menu-wrapper.active {
    display: block;
}

/* Offcanvas menu styles */
.offcanvas__info {
    position: fixed;
    top: 0;
    right: -100%;
    width: 300px;
    height: 100%;
    background: #fff;
    transition: right 0.3s ease;
    z-index: 1000;
}

.offcanvas__info.info-open {
    right: 0;
}

.offcanvas__overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 999;
    display: none;
}

.offcanvas__overlay.overlay-open {
    display: block;
}

/* Dropdown menu styles */
.submenu {
    display: none;
}

.has-dropdown.active .submenu {
    display: block;
}
</style>


<div class="fix-area">
            <div class="offcanvas__info">
                <div class="offcanvas__wrapper">
                    <div class="offcanvas__content">
                        <div class="offcanvas__top mb-5 d-flex justify-content-between align-items-center">
                            <div class="offcanvas__logo">
                                <a href="index.php">
                                    <img src="assets/img/logo/logo.svg" alt="logo-img">
                                </a>
                            </div>
                            <div class="offcanvas__close">
                                <button>
                                <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>

                        <div class="mobile-menu fix mb-3"></div>
                        <div class="offcanvas__contact">
                            <h4>Contact Info</h4>
                            <ul>
                                <li class="d-flex align-items-center">
                                    <div class="offcanvas__contact-icon">
                                        <i class="fal fa-map-marker-alt"></i>
                                    </div>
                                    <div class="offcanvas__contact-text">
                                        <a target="_blank" href="https://www.google.com/maps/search/?api=1&query=Office+%23+901,+Fortune+Center,+45-A,+P.E.C.H.S,+Block+%23+6">Office # 901, Fortune Center, 45-A, P.E.C.H.S, Block # 6</a>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center">
                                    <div class="offcanvas__contact-icon mr-15">
                                        <i class="fal fa-envelope"></i>
                                    </div>
                                    <div class="offcanvas__contact-text">
                                         <a href="mailto:info@lalaniassociates.com"><span class="mailto:info@lalaniassociates.com">info@lalaniassociates.com</span></a>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center">
                                    <div class="offcanvas__contact-icon mr-15">
                                        <i class="fal fa-clock"></i>
                                    </div>
                                    <div class="offcanvas__contact-text">
                                        <a target="_blank" href="#">Mon – Sat: 9AM – 5:30PM</a>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center">
                                    <div class="offcanvas__contact-icon mr-15">
                                        <i class="far fa-phone"></i>
                                    </div>
                                    <div class="offcanvas__contact-text">
                                        <a href="tel:+922134389311">(92-21) 3438 9311</a>
                                    </div>
                                </li>
                            </ul>
                            <div class="header-button mt-4">
                                <a href="contact.php" class="theme-btn text-center">
                                    <span>Contact Us<i class="fas fa-chevron-right"></i></span>
                                </a>
                            </div>
                            <div class="social-icon d-flex align-items-center">
                            <a href="https://www.facebook.com/LalaniAssociates"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://twitter.com/LalaniAssoc"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.youtube.com/LalaniassociatesPk"><i class="fab fa-youtube"></i></a>
                        <a href="https://www.linkedin.com/company/lalaniassociates/"><i
                                class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="offcanvas__overlay"></div>

        <!-- Header Top Start -->
        <div class="header-top-section fix">
            <div class="container">
                <div class="header-top-wrapper">
                    <ul class="contact-list">
                        <li>
                            <i class="far fa-envelope"></i>
                            <a href="mailto:info@lalaniassociates.com" class="link">info@lalaniassociates.com</a>
                        </li>
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            Office # 901, Fortune Center, 45-A, P.E.C.H.S, Block # 6
                        </li>
                    </ul>
                    <div class="top-right">
                        <div class="social-icon d-flex align-items-center">
                        <a href="https://www.facebook.com/LalaniAssociates"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://twitter.com/LalaniAssoc"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.youtube.com/LalaniassociatesPk"><i class="fab fa-youtube"></i></a>
                        <a href="https://www.linkedin.com/company/lalaniassociates/"><i
                                class="fab fa-linkedin-in"></i></a>
                        </div>
                        <ul class="header-menu">
                            <li>
                                <a href="contact.php">
                                    Help
                                </a>
                            </li>
                            <li>
                                <a href="contact.php">
                                    Support
                                </a>
                            </li>
                            <li>
                                <a href="faq.php">
                                Faqs
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <style>
/* Base Styles */
.header-section-1 {
    height: auto; /* Let the header adjust its height based on content */
    position: relative; /* Ensure child elements are positioned relative to this container */
    overflow: visible; /* Prevent content from overflowing */
    background-color: #fff;
}

.header-main {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.header-left {
    display: flex;
    align-items: center;
}

.header-right {
    display: flex;
    align-items: center;
    gap: 20px; /* Spacing between elements */
}

/* Hamburger Menu */
.header__hamburger {
    cursor: pointer;
    font-size: 24px;
}

/* Offcanvas Menu */
.offcanvas-start {
    width: 250px; /* Adjust width as needed */
}

/* Media Queries for Smaller Screens */
@media (max-width: 992px) {
    .mean__menu-wrapper {
        display: none; /* Hide navigation menu on small screens */
    }

    .header-right {
        display: none; /* Hide header-right on small screens */
    }

    .header__hamburger {
        display: block; /* Show hamburger menu on small screens */
    }
}/* Dropdown Menu Styles */
.has-dropdown {
    position: relative;
}

.has-dropdown .dropdown-menu {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background-color: #fff;
    border: 1px solid #ddd;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    z-index: 1000;
    min-width: 200px;
}

.has-dropdown:hover .dropdown-menu {
    display: block;
}

.dropdown-menu li {
    padding: 10px;
}

.dropdown-menu li a {
    color: #333;
    text-decoration: none;
    display: block;
}

.dropdown-menu li a:hover {
    background-color: #f8f9fa;
}

.submenu {
    display: none;
    list-style: none;
    padding: 0;
    margin: 0;
    position: absolute;
    background: #fff;
    border: 1px solid #ddd;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    min-width: 200px;
}

.submenu li {
    padding: 10px;
}

.submenu li a {
    display: block;
    color: #333;
    text-decoration: none;
}

.submenu li a:hover {
    background-color: #f8f9fa;
}

.offcanvas-header{
    justify-content: end !important;
}

.offcanvas-body ul li {
    margin-bottom: 20px; /* Adjust as needed */
}






</style>

        <!-- Header Area Start -->
        <header class="header-section-1">
    <div id="header-sticky" class="header-1">
        <div class="container-fluid">
            <div class="mega-menu-wrapper">
                <div class="header-main">
                    <!-- Logo -->
                    <div class="header-left">
                        <div class="logo">
                            <a href="https://lalaniassociates.com" class="header-logo">
                                <img src="https://lalaniassociates.com/assets/images/lalani-Logo2.webp" style="margin: 15px 4px" height="80" alt="logo-img">
                            </a>
                        </div>
                    </div>

                    <!-- Hamburger Menu (Visible on Small Screens) -->
                    <div class="header__hamburger d-lg-none my-auto">
                        <div class="sidebar__toggle" id="hamburger-menu">
                            <i class="fa fa-bars"></i>
                        </div>
                    </div>
                    <?php
                        // Include your database connection file
                        include 'php_action/config.php';

                        // Fetch services from the database
                        $sql = "SELECT service_id, title, url_link FROM services ORDER BY title ASC";
                        $result = mysqli_query($conn, $sql);

                        // Check if services exist
                        $services = [];
                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $services[] = $row;
                            }
                        }
                    ?>
                    <!-- Navigation Menu (Hidden on Small Screens) -->
                    <div class="mean__menu-wrapper d-none d-lg-block">
                        <div class="main-menu">
                            <nav id="mobile-menu">
                                <ul>
                                    <li class="has-dropdown active menu-thumb">
                                        <a href="https://lalaniassociates.com">Home </a>
                                    </li>
                                    <li><a href="/about/">About</a></li>
                                    <li class="has-dropdown"><a href="/service/">Our Services <i class="fas fa-angle-down"></i></a>
                                        <ul class="submenu">
                                            <?php if (!empty($services)): ?>
                                                <?php foreach ($services as $service): ?>
                                                    <li>
                                                        <a href="<?php echo $service['url_link']; ?>">
                                                            <?php echo htmlspecialchars($service['title']); ?>
                                                        </a>
                                                    </li>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <li><a href="#">No services found</a></li>
                                            <?php endif; ?>
                                        </ul>
                                    </li>
                                    <li><a href="/news/">News</a></li>
                                    <li><a href="/faq/">FAQ</a></li>
                                    <li><a href="/contact/">Contact Us</a></li>
                                    <li><a href="/career_opportunities/">Career Opportunities</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <!-- Header Right (Hidden on Small Screens) -->
                    <div class="header-right d-none d-lg-flex justify-content-end align-items-center">
                        <div class="contact-info">
                            <div class="icon">
                                <img src="assets/img/call.png" alt="img">
                            </div>
                            <div class="content">
                                <p>Phone:</p>
                                <h6><a href="tel:+922134389311">+(92-21) 3438 9311</a></h6>
                            </div>
                        </div>
                        <div class="header-button">
                            <a href="contact.php" class="link-btn">
                                <span>Get A Quote</span>
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                        <a href="#0" class="search-trigger search-icon"><i class="fal fa-search"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- ////////////////////// -->
<div class="fix-area">
            <div class="offcanvas__info ">
                <div class="offcanvas__wrapper">
                    <div class="offcanvas__content">
                        <div class="offcanvas__top mb-5 d-flex justify-content-between align-items-center">
                            <div class="offcanvas__logo">
                                <a href="index.html">
                                    <img src="assets/img/lalani-Logo2.webp" alt="logo-img">
                                </a>
                            </div>
                            <div class="offcanvas__close">
                                <button>
                                <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>

                        <div class="mobile-menu fix mb-3 mean-container"><div class="mean-bar"><a href="#nav" class="meanmenu-reveal" ></a><nav class="mean-nav">
                                            <ul>
                                                                                                <li>
                                                    <a href="#blog">Blog</a>
                                                </li>
                                                <li class="mean-last">
                                                    <a href="#contact">Contact</a>
                                                </li>
                                            </ul>
                                        </nav></div></div>
                        <div class="offcanvas__contact">
                            <h4>Contact Info</h4>
                            <ul>
                                <li class="d-flex align-items-center">
                                    <div class="offcanvas__contact-icon">
                                        <i class="fal fa-map-marker-alt"></i>
                                    </div>
                                    <div class="offcanvas__contact-text">
                                        <a target="_blank" href="https://www.google.com/maps/search/?api=1&query=Office+%23+901,+Fortune+Center,+45-A,+P.E.C.H.S,+Block+%23+6">Office # 901, Fortune Center, 45-A, P.E.C.H.S, Block # 6</a>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center">
                                    <div class="offcanvas__contact-icon mr-15">
                                        <i class="fal fa-envelope"></i>
                                    </div>
                                    <div class="offcanvas__contact-text">
                                         <a href="mailto:info@lalaniassociates.com"><span class="info@lalaniassociates.com">info@lalaniassociates.com</span></a>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center">
                                    <div class="offcanvas__contact-icon mr-15">
                                        <i class="fal fa-clock"></i>
                                    </div>
                                    <div class="offcanvas__contact-text">
                                        <a target="_blank" href="#">Mod-friday, 09am -05pm</a>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center">
                                    <div class="offcanvas__contact-icon mr-15">
                                        <i class="far fa-phone"></i>
                                    </div>
                                    <div class="offcanvas__contact-text">
                                        <a href="tel:+922134389311">(92-21) 3438 9311</a>
                                    </div>
                                </li>
                            </ul>
                            <div class="header-button mt-4">
                                <a href="/contact/" class="theme-btn text-center">
                                    <span>Contact Us<i class="fas fa-chevron-right"></i></span>
                                </a>
                            </div>
                            <div class="social-icon d-flex align-items-center">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-youtube"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="offcanvas__overlay "></div>


        