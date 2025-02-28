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
@media (max-width: 991px) {
    .marginset{
        margin-top:40px !important;
    }
    .bot{
        margin-bottom:40px;
    }
}
</style>
    <!-- <style>
    .hero-item {
    position: relative;
    height: 450px;
}

.hero-item .overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0); /* Adjust the opacity as needed */
    z-index: 1;
}

.hero-item .container {
    position: relative;
    z-index: 2;
}

</style> -->

    <body>

         <!-- Back To Top Start -->
         <div class="scroll-up">
            <svg class="scroll-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>

        <?php include 'loader.php'; ?>
        <?php include 'header.php'; ?>




            <!--<< Breadcrumb Section Start >>-->
            <div class="breadcrumb-wrapper section-padding bg-cover" style="background-image: url('assets/images/service/Homeusa.jpg');">
            
                <div class="container">
                    <div class="page-heading">
                        <h1 class="wow fadeInUp" data-wow-delay=".3s">Career Opportunities</h1>

                    </div>
                </div>
            </div>
            <!-- style="background-image: url('assets/images/service/Homeusa.jpg');" -->
            
<!-- Career Opportunities Section -->
<div class="service-intro-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50">
    <div class="container" style="margin-bottom:50px;">
        <div class="row gradient-bg align-items-center">
            <div class="col-12 text-center marginset" style="margin-top:100px;">
                <p class="bot">Join Lalani Associates and unlock your potential.<br><br><br></p>
            </div>
            <?php
            include 'php_action/config.php';

            $sql = "SELECT * FROM `career_opportunities` ORDER BY id DESC";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    // Safeguard against missing keys
                    $link = isset($row['link']) ? $row['link'] : '#';
                    $image = isset($row['image']) ? "Admin/" . $row['image'] : "assets/img/default-job.jpg"; // Provide a default image
                    $title = isset($row['title']) ? $row['title'] : "Job Opportunity";
            ?>
                    <div class="col-md-6 wow fadeInUp" data-wow-delay=".3s">
                        <div class="service-intro-image">
                            <a href="<?php echo htmlspecialchars($link); ?>">
                                <img src="<?php echo htmlspecialchars($image); ?>" alt="<?php echo htmlspecialchars($title); ?>" class="img-fluid bot" style="margin-bottom:20px;">
                            </a>
                        </div>
                    </div>
            <?php 
                } 
            } else {
                echo "<p class='text-center'>No job openings available at the moment.</p>";
            }
            ?>
        </div>
    </div>
</div>

    



    
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
     <!--<< Main.js >>-->
     <script src="assets/js/main.js"></script>
    </body>
</html>


        
        <!-- Service Intro Section End -->
