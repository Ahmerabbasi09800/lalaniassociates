<footer class="footer-section footer-bg">
    <div class="container">
        <div class="footer-widgets-wrapper">
            <div class="row">
                <div class="col-5 wow fadeInUp" data-wow-delay=".2s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <a href="index.php">
                                <img src="https://lalaniassociates.com/assets/images/lalani-Logo2.webp" height="95"
                                    alt="logo-img">
                            </a>
                        </div>
                        <div class="footer-content">
                            <p>
                                Our mission is to provide the best consultancy service at a reasonable price without
                                sacrificing our norms. You will be satisfied with our work , knowing we take good care
                                of our customers.
                            </p>
                            <a href="mailto:info@example.com" class="link">info@example.com</a>
                            <div class="social-icon d-flex align-items-center">
                                <a style="display:flex;justify-content:center;align-items:center;"
                                    href="https://www.facebook.com/LalaniAssociates"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a style="display:flex;justify-content:center;align-items:center;"
                                    href="https://twitter.com/LalaniAssoc"><i class="fab fa-twitter"></i></a>
                                <a style="display:flex;justify-content:center;align-items:center;"
                                    href="https://www.youtube.com/LalaniassociatesPk"><i class="fab fa-youtube"></i></a>
                                <a style="display:flex;justify-content:center;align-items:center;"
                                    href="https://www.linkedin.com/company/lalaniassociates/"><i
                                        class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-2 wow fadeInUp" data-wow-delay=".4s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h5>Explore</h5>
                        </div>
                        <ul class="list-items">
                            <li>
                                <a href="about.php">
                                    About
                                </a>
                            </li>
                            <li>
                                <a href="team.php">
                                    Meet our Experts
                                </a>
                            </li>
                            <li>
                                <a href="news-details.php">
                                    News
                                </a>
                            </li>
                            <li>
                                <a href="services.php">
                                    Our Services
                                </a>
                            </li>
                            <li>
                                <a href="contact.php">
                                    Contact
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-2 wow fadeInUp" data-wow-delay=".6s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h5>Countries</h5>
                        </div>
                        <ul class="list-items">
                            <li>
                                <a href="#">
                                    USA
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Europe
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Turkey
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Australia
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Canada
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-3 wow fadeInUp" data-wow-delay=".8s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h5>Services</h5>
                        </div>
                        <ul class="list-items">
                            <?php
                            include 'php_action/config.php'; // Include your database connection
                            
                            // Fetch services from the database
                            $sql = "SELECT service_id, title FROM services ORDER BY title ASC LIMIT 6";
                            $result = mysqli_query($conn, $sql);

                            // Check if services exist
                            if ($result && mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $service_id = $row['service_id'];
                                    $service_name = $row['title'];
                                    echo '<li>
                            <a href="service-category.php?id=' . $service_id . '">
                                
                                ' . htmlspecialchars($service_name) . '
                            </a>
                          </li>';
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
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-wrapper d-flex align-items-center justify-content-between">
                <p class="wow fadeInLeft color-2" data-wow-delay=".3s">
                    Copyright © 2024 <a href="index.php">Modinatheme</a>. All Rights Reserved.
                </p>
                <ul class="footer-menu wow fadeInRight" data-wow-delay=".5s">
                    <li>
                        <a href="about.php">
                            Company
                        </a>
                    </li>
                    <li>
                        <a href="contact.php">
                            Support
                        </a>
                    </li>
                    <li>
                        <a href="contact.php">
                            Privacy
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
</footer>