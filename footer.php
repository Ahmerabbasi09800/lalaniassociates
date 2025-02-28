<style>
    @media (max-width: 768px) {
    .footer-section {
        text-align: center;
    }
    .footer-widgets-wrapper .col-md-6 {
        margin-bottom: 20px;
    }
    .social-icon {
        justify-content: center !important;
    }
    .footer-menu {
        flex-direction: column;
        align-items: center;
    }
}

.footer-widgets-wrapper .single-footer-widget .footer-content .social-icon a {
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
}
</style>

<footer class="footer-section footer-bg">
    <div class="container">
        <div class="footer-widgets-wrapper">
            <div class="row">
                <!-- Logo & Description -->
                <div class="col-md-6 col-lg-5 wow fadeInUp text-center text-md-start" data-wow-delay=".2s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <a href="https://lalaniassociates.com">
                                <img src="assets/images/lalani-Logo2.webp" height="95" alt="logo-img">
                            </a>
                        </div>
                        <div class="footer-content">
                            <p>Our mission is to provide the best consultancy service at a reasonable price...</p>
                            <a href="mailto:info@lalaniassociates.com" class="link">info@lalaniassociates.com</a>
                            <div class="social-icon d-flex justify-content-center justify-content-md-start">
                                <a href="https://www.facebook.com/LalaniAssociates"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://twitter.com/LalaniAssoc"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.youtube.com/LalaniassociatesPk"><i class="fab fa-youtube"></i></a>
                                <a href="https://www.linkedin.com/company/lalaniassociates/"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Explore -->
                <div class="col-md-6 col-lg-2 wow fadeInUp text-center text-md-start" data-wow-delay=".4s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h5>Explore</h5>
                        </div>
                        <ul class="list-items">
                            <li><a href="/about/">About</a></li>
                            <li><a href="/news/">News</a></li>
                            <li><a href="/service/">Our Services</a></li>
                            <li><a href="/faq/">FAQ</a></li>
                            <li><a href="/contact/">Contact</a></li>
                            <li><a href="/career_opportunities/">Career Opportunities</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Countries -->
                <div class="col-md-6 col-lg-2 wow fadeInUp text-center text-md-start" data-wow-delay=".6s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h5>Countries</h5>
                        </div>
                        <ul class="list-items">
                            <li><a href="/service/united-states/usa-eb-5-investor-program/">USA</a></li>
                            <li><a href="/service/europe/hungary-pr-renewal/">Europe</a></li>
                            <li><a href="/service/turkey-immigration-services/turkey-citizenship-by-investment-program/">Turkey</a></li>
                            <li><a href="/service/australian-immigration-services/australian-skilled-worker/">Australia</a></li>
                            <li><a href="/service/canadian-immigration-services/start-up-visa-program">Canada</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Services -->
                <div class="col-md-6 col-lg-3 wow fadeInUp text-center text-md-start" data-wow-delay=".8s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h5>Services</h5>
                        </div>
                        <ul class="list-items">
                            <?php
                            include 'php_action/config.php';
                            $sql = "SELECT service_id, title, url_link FROM services ORDER BY title ASC LIMIT 6";
                            $result = mysqli_query($conn, $sql);
                            if ($result && mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <li><a href="<?php echo $row['url_link'] ?>"><?php echo htmlspecialchars($row['title']) ?></a></li>

                            <?php
                                }
                            } else {
                                echo '<li>No services found.</li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-wrapper d-flex flex-column flex-md-row align-items-center justify-content-between">
                <p class="wow fadeInLeft color-2 text-center text-md-start" data-wow-delay=".3s">
                    Copyright © 2024 <a href="https://lalaniassociates.com">Lalani & Associates</a>. All Rights Reserved.
                </p>
                <ul class="footer-menu d-flex flex-column flex-md-row text-center text-md-start wow fadeInRight" data-wow-delay=".5s">
                    <li><a href="/about/">Company</a></li>
                    <li><a href="/contact/">Support</a></li>
                    <li><a href="/faq/">FAQs</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<script>

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".has-dropdown > a").forEach(function (dropdownToggle) {
        dropdownToggle.addEventListener("click", function (event) {
            let submenu = this.nextElementSibling;

            // If user clicks on the dropdown icon <i>, prevent link navigation and toggle dropdown
            if (event.target.tagName === "I") {
                event.preventDefault(); // Stop navigation only when clicking the icon

                // Close other dropdowns
                document.querySelectorAll(".submenu").forEach(function (menu) {
                    if (menu !== submenu) {
                        menu.style.display = "none";
                    }
                });

                // Toggle the current submenu
                submenu.style.display = submenu.style.display === "block" ? "none" : "block";
            }
        });
    });
});

    document.addEventListener('DOMContentLoaded', function() {
        const hamburgerMenu = document.getElementById('hamburger-menu');
        const offcanvasInfo = document.querySelector('.offcanvas__info');
        const offcanvasOverlay = document.querySelector('.offcanvas__overlay');
        const offcanvasCloseButton = document.querySelector('.offcanvas__close button');

        hamburgerMenu.addEventListener('click', function() {
            offcanvasInfo.classList.toggle('info-open');
            offcanvasOverlay.classList.toggle('overlay-open');
        });

        offcanvasCloseButton.addEventListener('click', function() {
            offcanvasInfo.classList.remove('info-open');
            offcanvasOverlay.classList.remove('overlay-open');
        });

        offcanvasOverlay.addEventListener('click', function() {
            offcanvasInfo.classList.remove('info-open');
            offcanvasOverlay.classList.remove('overlay-open');
        });

        // Dropdown functionality
        const dropdowns = document.querySelectorAll('.has-dropdown');
        dropdowns.forEach(dropdown => {
            dropdown.addEventListener('click', function() {
                this.classList.toggle('active');
            });
        });
    });

</script>