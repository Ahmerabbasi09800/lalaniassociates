<!DOCTYPE html>
<html lang="en">
    <!--<< Header Area >>-->
    <head>
        <!-- ========== Meta Tags ========== -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="modinatheme">
        <meta name="description" content="Immigration and Visa Consulting Html Template">
        <!-- ======== Page title ============ -->
        <title>Visaland - Immigration & Visa Consulting HTML Template</title>
        <!--<< Favcion >>-->
        <link rel="shortcut icon" href="assets/img/favicon.svg">
        <!--<< Bootstrap min.css >>-->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!--<< Font Awesome.css >>-->
        <link rel="stylesheet" href="assets/css/font-awesome.css">
        <!--<< Animate.css >>-->
        <link rel="stylesheet" href="assets/css/animate.css">
        <!--<< Magnific Popup.css >>-->
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <!--<< MeanMenu.css >>-->
        <link rel="stylesheet" href="assets/css/meanmenu.css">
        <!--<< Slick.css >>-->
        <link rel="stylesheet" href="assets/css/slick.css">
        <!--<< Swiper Slider.css >>-->
        <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
        <!--<< Nice Select.css >>-->
        <link rel="stylesheet" href="assets/css/nice-select.css">
        <!--<< Main.css >>-->
        <link rel="stylesheet" href="assets/css/main.css">
        <!--<< Style.css >>-->
        <link rel="stylesheet" href="style.css">
    </head>
    <style>
        @media (max-width: 991px){
        .section-padding{
            padding:40px 0 !important;
        }
    }
        </style>

    <body>


<?php 
session_start();
?>
<?php 
include 'php_action/config.php'; // Ensure this path is correct
?>




         <!-- Back To Top Start -->
         <div class="scroll-up">
            <svg class="scroll-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>
        <?php include 'loader.php'; ?>
        <?php include 'header.php'; ?>



        <!--<< Breadcrumb Section Start >>-->
        <div class="breadcrumb-wrapper section-padding bg-cover" style="background-image: url('assets/images/bg/contact_bg.jpg');">
            <div class="container">
                <div class="page-heading">
                    <h1 class="wow fadeInUp" data-wow-delay=".3s">Contact Us</h1>
                    <!-- <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                        <li>
                            <a href="index.html">
                            Home Page
                            </a>
                        </li>
                        <li>
                            <i class="fal fa-minus"></i>
                        </li>
                        <li>
                            Contact Us
                        </li>
                    </ul> -->
                </div>
            </div>
        </div>

        <!--<< Contact Section Start >>-->




<section class="contact-main-area fix section-padding">
    <div class="container">
        <div class="contact-main-wrapper">
            <div class="row g-4">
                <!-- Contact Info Section -->
                <div class="col-lg-6">
                <div class="map-section">
                    <div class="google-map wow fadeInUp" data-wow-delay=".7s">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10878.119913844604!2d74.3357874!3d31.5525849!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3919057626e991c1%3A0x942bed7d812d029c!2sLalani%20Associates!5e0!3m2!1sen!2s!4v1708720001234!5m2!1sen!2s" width="100%" height="400" >
                        </iframe>
                    </div>
                </div>

                    <div class="contact-content" style="margin-top:40px;">
                        <div class="section-title mb-2">
                            <span class="wow fadeInUp">Get In Touch</span>
                            <h2 class="title-anim">Contact Us</h2>
                        </div>
                        <p class="mt-4 mt-md-0 wow fadeInUp" data-wow-delay=".4s">
                            Our mission is to provide the best immigration service at an reasonable price.
                        </p>

                        <div class="row g-4 mt-3">
                            <!-- Karachi Location -->
<div class="col-lg-6 wow fadeInUp" data-wow-delay=".3s">
    <div class="info-items">
        <div class="icon">
            <i class="fas fa-map-marker-alt"></i>
        </div>
        <div class="content">
            <h5>Location (Karachi)</h5>
            <p>
                <a href="https://www.google.com/maps?q=Office+901,+Fortune+Center,+45-A,+P.E.C.H.S.,+Block+6,+Karachi" target="_blank">
                    Office # 901, Fortune Center, <br>
                    45-A, P.E.C.H.S., Block # 6, Karachi
                </a>
            </p>
        </div>
    </div>
</div>

<!-- Lahore Location -->
<div class="col-lg-6 wow fadeInUp" data-wow-delay=".5s">
    <div class="info-items">
        <div class="icon">
            <i class="fas fa-map-marker-alt"></i>
        </div>
        <div class="content">
            <h5>Location (Lahore)</h5>
            <p>
                <a href="https://www.google.com/maps?q=Office+19,+Pearl+Continental+Hotel,+Shahrah-e-Quaide+Azam,+Lahore" target="_blank">
                    Office # 19, Pearl Continental Hotel, <br>
                    Shahrah-e-Quaide Azam, Lahore
                </a>
            </p>
        </div>
    </div>
</div>


                            <!-- Phone -->
                            <div class="col-lg-6 wow fadeInUp" data-wow-delay=".7s">
                                <div class="info-items">
                                    <div class="icon">
                                        <i class="far fa-phone"></i>
                                    </div>
                                    <div class="content">
                                        <h5>Phone</h5>
                                        <a href="tel:+922134389311">(92-21) 3438 9311 - 14 (Karachi)</a> <br>
                                        <a href="tel:+924235714124">(92-42) 3571 4124 - 26 (Lahore)</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-lg-6 wow fadeInUp" data-wow-delay=".9s">
                                <div class="info-items">
                                    <div class="icon">
                                        <i class="fal fa-envelope"></i>
                                    </div>
                                    <div class="content">
                                        <h5>Email</h5>
                                        <a href="mailto:info@lalaniassociates.com">info@lalaniassociates.com</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Timing -->
                            <!-- <div class="col-lg-6 wow fadeInUp" data-wow-delay="1.1s">
                                <div class="info-items">
                                    <div class="icon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                    <div class="content">
                                        <h5>Timing</h5>
                                        <span>9AM - 5:30PM</span>
                                    </div>
                                </div>
                            </div> -->

                            <!-- Social Links -->
                            <div class="col-lg-6 wow fadeInUp" data-wow-delay="1.3s">
                                <div class="info-items">
                                    <div class="icon">
                                        <i class="fas fa-share-alt"></i>
                                    </div>
                                    <div class="content">
                                        <h5>Social</h5>
                                        <div class="social-icon d-flex align-items-center">
                                            <a href="https://www.facebook.com/LalaniAssociates"><i class="fab fa-facebook-f"></i></a>
                                            <a href="https://twitter.com/LalaniAssociates"><i class="fab fa-twitter"></i></a>
                                            <a href="https://www.linkedin.com/company/lalaniassociates/"><i class="fab fa-linkedin-in"></i></a>
                                            <a href="https://www.youtube.com/LalaniassociatesPk"><i class="fab fa-youtube"></i></a>

                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                </div>
                
                <!-- Contact Form Section -->
                <div class="col-lg-6 mt-5 mt-lg-0">
                    <div class="contact-form-items">
                        <div class="contact-title">
                            <h3 class="wow fadeInUp" data-wow-delay=".3s">Fill Up The Form</h3>
                            <p class="wow fadeInUp" data-wow-delay=".5s">Your email address will not be published. Required fields are marked *</p>
                        </div>
                        <?php
                        if (isset($_SESSION['error_message'])) {
                            echo "<div style='text-align:center; color: red; padding: 10px; border: 1px solid red; margin-bottom: 10px;'>" . $_SESSION['error_message'] . "</div>";
                            unset($_SESSION['error_message']);
                        }
                        if (isset($_SESSION['success_message'])) {
                            echo "<div style='text-align:center; color: green; padding: 10px; border: 1px solid green; margin-bottom: 10px;'>" . $_SESSION['success_message'] . "</div>";
                            unset($_SESSION['success_message']);
                        }
                        ?>
                        <form action="addcontact.php" id="contact-form" method="POST">
                            <input type="hidden" name="submit" />
                            <div class="row g-4">
                                <div class="col-lg-12 wow fadeInUp" data-wow-delay=".3s">
                                    <div class="form-clt">
                                        <input type="text" name="name" id="name" placeholder="Your Name*" required>
                                        <div class="icon"><i class="fal fa-user"></i></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 wow fadeInUp" data-wow-delay=".4s">
                                    <div class="form-clt">
                                        <input type="text" name="mobile" id="mobile" placeholder="Your Cell Number*" required>
                                        <div class="icon"><i class="fal fa-phone"></i></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 wow fadeInUp" data-wow-delay=".5s">
                                    <div class="form-clt">
                                        <input type="email" name="email" id="email" placeholder="Email Address*" required>
                                        <div class="icon"><i class="fal fa-envelope"></i></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 wow fadeInUp" data-wow-delay=".6s">
                                    <div class="form-clt">
                                        <input type="text" name="subject" id="subject" placeholder="Subject*" required>
                                        <div class="icon"><i class="fal fa-edit"></i></div>
                                    </div>
                                </div>

                                <!-- Interest Dropdown Styled like FAQ Theme -->
                                <div class="col-lg-12 wow fadeInUp" data-wow-delay=".7s">
    <div class="accordion-item">
        <h4 class="accordion-header">
            <div class="accordion-button" style="margin-top:15px;">
                <select name="interest" class="form-select" style="padding:10px;">
                    <option value="" disabled selected>Select Your Interest</option>
                    <option value="australia">Australia</option>
                    <option value="canada">Canada</option>
                    <option value="usa">USA</option>
                    <option value="europe">Europe</option>
                    <option value="caribbean_islands">Caribbean Islands</option>
                    <option value="turkey">Turkey</option>
                </select>
            </div>
        </h4>
    </div>
</div>

                                <div class="col-lg-12 wow fadeInUp" data-wow-delay=".8s">
                                    <div class="form-clt">
                                        <textarea name="message" id="message" placeholder="Enter Your Message Here*" required></textarea>
                                        <div class="icon"><i class="fal fa-comment"></i></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 wow fadeInUp" data-wow-delay=".9s">
                                    <button type="submit" class="theme-btn">
                                        <span><i class="fal fa-paper-plane"></i> Get In Touch</span>
                                    </button>


                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
 
</section>




        <!--<< Footer Section Start >>-->
        <?php include 'footer.php'; ?>

       

    <!--<< All JS Plugins >>-->
    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <!--<< Viewport Js >>-->
    <script src="assets/js/viewport.jquery.js"></script>
    <!--<< Bootstrap Js >>-->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!--<< Gsap Js >>-->
    <script src="assets/js/gsap/gsap.js"></script>
    <!--<< Gsap Scroll Trigger Js >>-->
    <script src="assets/js/gsap/gsap-scroll-trigger.js"></script>
    <!--<< Gsap Split Text Js >>-->
    <script src="assets/js/gsap/gsap-split-text.js"></script>
    <!--<< Nice Select Js >>-->
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <!--<< Waypoints Js >>-->
    <script src="assets/js/jquery.waypoints.js"></script>
    <!--<< Counterup Js >>-->
    <script src="assets/js/jquery.counterup.min.js"></script>
    <!--<< Slick Js >>-->
    <script src="assets/js/slick.min.js"></script>
    <!--<< Swiper Slider Js >>-->
    <script src="assets/js/swiper-bundle.min.js"></script>
    <!--<< Slick Animation Js >>-->
    <script src="assets/js/slick-animation.min.js"></script>
    <!--<< MeanMenu Js >>-->
    <script src="assets/js/jquery.meanmenu.min.js"></script>
    <!--<< Magnific Popup Js >>-->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!--<< Wow Animation Js >>-->
    <script src="assets/js/wow.min.js"></script>
    <!--<< Circle Progress Js >>-->
    <script src="assets/js/circle-progress.js"></script>
    <!--<< Ajax.js >>-->
    <script src="assets/js/ajax-mail.js"></script>
    <!--<< Main.js >>-->
    <script src="assets/js/main.js"></script>
    </body>
</html>