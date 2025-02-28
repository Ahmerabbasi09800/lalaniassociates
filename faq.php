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
        .faq-content.style-2 .accordion-item .accordion-header .accordion-button:not(.collapsed)::after{
            background-color: #aa8c5b !important;
        }
    </style>

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
            <div class="breadcrumb-wrapper section-padding bg-cover" style="background-image: url('assets/images/bg/faq_bg.jpg');">
                <div class="container">
                    <div class="page-heading">
                        <h1 class="wow fadeInUp" data-wow-delay=".3s">FAQ's</h1>

                    </div>
                </div>
            </div>
    
    
            <!--<< Faq Section Start >>--> 
            <?php

include 'php_action/config.php';

// Fetch FAQs and group them by program
$sql = "SELECT faqs.id AS faq_id, faqs.title AS faq_title, faqs.detail, 
                program.id AS program_id, program.title AS program_title
        FROM faqs
        JOIN program ON faqs.program_id = program.id
        ORDER BY program.title, faqs.title;";

$result = mysqli_query($conn, $sql);
$faqs_by_program = [];

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $program_id = $row['program_id'];
        $program_title = $row['program_title'];

        if (!isset($faqs_by_program[$program_id])) {
            $faqs_by_program[$program_id] = [
                'title' => $program_title,
                'faqs' => []
            ];
        }
        $faqs_by_program[$program_id]['faqs'][] = $row;
    }
}
?>

<!-- FAQ Section -->
<section class="faq-section section-padding pt-0">
    <div class="container">
        <div class="about-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about-content">
                        <div class="section-title">
                            <span class="wow fadeInUp">Frequently Asked Questions</span>
                            <h2 class="title-anim">
                                Have a question in <br>
                                your mind?
                            </h2>
                        </div>
                        <p class="mt-4 mt-md-0 wow fadeInUp" data-wow-delay=".5s">
                            Get answers to commonly asked questions about immigration, and consulting services.
                        </p>

                    </div>
                </div>

                <!-- FAQ Content -->
                <div class="col-lg-12 mt-5 mt-lg-0">
                    <div class="faq-content style-2 style-color">
                        <div class="faq-accordion">
                            <div class="accordion" id="faqAccordion">

                                <?php
                                $counter = 0;
                                $first = true;

                                foreach ($faqs_by_program as $program_id => $program_data) {
                                    ?>
                                    <div class="program-section">
                                        <h3 class="mt-4 mb-4 fw-bold"><?php echo $program_data['title']; ?></h3>

                                        <?php
                                        foreach ($program_data['faqs'] as $faq) {
                                            $counter++;
                                            $isFirst = $first ? 'show' : '';
                                            $ariaExpanded = $first ? 'true' : 'false';
                                            ?>
                                            <div class="accordion-item wow fadeInUp" data-wow-delay=".3s">
                                                <h4 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq<?php echo $faq['faq_id']; ?>" aria-expanded="<?php echo $ariaExpanded; ?>" aria-controls="faq<?php echo $faq['faq_id']; ?>">
                                                        <?php echo $counter . '. ' . $faq['faq_title']; ?>
                                                    </button>
                                                </h4>
                                                <div id="faq<?php echo $faq['faq_id']; ?>" class="accordion-collapse collapse <?php echo $isFirst; ?>" data-bs-parent="#faqAccordion">
                                                    <div class="accordion-body">
                                                        <?php echo $faq['detail']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            $first = false;
                                        }
                                        ?>
                                    </div>
                                    <?php
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</section>
<!-- End FAQ Section -->

<script>
document.addEventListener('DOMContentLoaded', function() {
    const firstCardHeader = document.querySelector('.accordion-item:first-child .accordion-button');
    if (firstCardHeader) {
        firstCardHeader.classList.remove('collapsed');
    }
});
</script>

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