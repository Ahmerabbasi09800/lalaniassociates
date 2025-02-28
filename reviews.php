<!DOCTYPE html>
<html lang="en">
<!--<< Header Area >>-->

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="modinatheme">
    <meta name="description" content="VisaLand - Immigration and Visa Consulting Html Template">
    <!-- ======== Page title ============ -->
    <title>Visaland - Immigration & Visa Consulting HTML Template</title>
    <!--<< Favcion >>-->
    <link rel="shortcut icon" href="assets/img/preloader.svg">
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

<body>

    <!-- Back To Top Start -->
    <div class="scroll-up">
        <svg class="scroll-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>

    <!-- Preloader Start -->

    <?php include 'loader.php'; ?>
    <?php
    
    include 'php_action/config.php';
    include 'header.php';

    // Pagination settings
    $limit = 10;
    $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
    $offset = ($page - 1) * $limit;

    // Fetch total testimonials count
    $total_query = "SELECT COUNT(*) AS total FROM testimonials WHERE ttype = 'T'";
    $total_result = mysqli_query($conn, $total_query);
    $total_row = mysqli_fetch_assoc($total_result);
    $total_pages = ceil($total_row['total'] / $limit);

    // Fetch testimonials with limit and offset
    $sql = "SELECT * FROM testimonials WHERE ttype = 'T' ORDER BY id DESC LIMIT $limit OFFSET $offset";
    $result = mysqli_query($conn, $sql);
    ?>

    <!-- Breadcrumb Section -->
    <div class="breadcrumb-wrapper section-padding bg-cover"
        style="background-image: url('assets/img/hero/testimonial-hero.jpg');">
        <div class="container">
            <div class="page-heading">
                <h1 class="wow fadeInUp" data-wow-delay=".3s">Testimonials</h1>
            </div>
        </div>
    </div>

    <!-- Testimonials Section -->
    <?php
    include 'php_action/config.php';

    // Define how many testimonials to show per page
    $testimonialsPerPage = 6;

    // Get the current page number from the URL, default to 1
    $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
    if ($page < 1) {
        $page = 1;
    }

    // Calculate the starting point
    $start = ($page - 1) * $testimonialsPerPage;

    // Get total testimonials count
    $totalSql = "SELECT COUNT(*) AS total FROM testimonials WHERE ttype = 'T'";
    $totalResult = mysqli_query($conn, $totalSql);
    $totalRow = mysqli_fetch_assoc($totalResult);
    $totalTestimonials = $totalRow['total'];

    // Calculate total pages
    $totalPages = ceil($totalTestimonials / $testimonialsPerPage);

    // Fetch testimonials for current page
    $sql = "SELECT * FROM testimonials WHERE ttype = 'T' ORDER BY id DESC LIMIT $start, $testimonialsPerPage";
    $result = mysqli_query($conn, $sql);
    ?>

    <section class="testimonial-section section-padding">
        <div class="container">
            <div class="section-title text-center">
                <!-- <span class="wow fadeInUp">Our Testimonials</span> -->
                <h2 class="title-anim">
                    What People Say About Our Services
                </h2>
            </div>

            <div class="row">
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                <div class="col-md-6 mb-4">
                    <div class="testimonial-card">
                        <div class="author-items">
                            <div class="author-image bg-cover"
                                style="background-image: url('Admin/<?php echo $row['image'] ?>');">
                            </div>
                            <div class="author-content">
                                <h5><?php echo $row['name'] ?></h5>
                            </div>
                        </div>

                        <blockquote class="testimonials-text">
                            <p>
                                <?php echo strlen($row['detail']) > 90 ? substr($row['detail'], 0, 90) . '...' : $row['detail']; ?>
                            </p>
                        </blockquote>

                        <!-- Star Ratings -->
                        <div class="star-rating">
                            <?php
                                    $rating = $row['rating'];
                                    for ($i = 1; $i <= 5; $i++) {
                                        echo $i <= $rating
                                            ? '<span class="fa fa-star checked"></span>'
                                            : '<span class="fa fa-star"></span>';
                                    }
                                    ?>
                        </div>

                        <ul class="testimonial-date">
                            <li><?php echo $row['date'] ?></li>
                        </ul>
                    </div>
                </div>
                <?php
                    }
                } else {
                    echo "<p class='text-center'>No testimonials found.</p>";
                }
                ?>
            </div>

            <!-- Pagination -->
            <div class="pagination">
                <?php if ($page > 1) { ?>
                <a href="reviews/page/" class="prev">&laquo; Prev</a>
                <?php } ?>

                <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                <a style="backgroung-color:#aa8c5b" href="?page=<?php echo $i; ?>"
                    class="<?php echo ($i == $page) ? 'active' : ''; ?>"><?php echo $i; ?></a>
                <?php } ?>

                <?php if ($page < $totalPages) { ?>
                <a href="reviews/page/" class="next">Next &raquo;</a>
                <?php } ?>
            </div>
        </div>
    </section>

    <!-- CSS Styling -->
    <style>
    .testimonial-card {
        background: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s;
    }

    .testimonial-card:hover {
        transform: translateY(-5px);
    }

    .author-items {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .author-image {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background-size: cover;
        background-position: center;
    }

    .author-content h5 {
        margin: 0;
        font-size: 18px;
    }

    .testimonials-text p {
        font-size: 16px;
        color: #555;
        margin: 10px 0;
    }

    .star-rating .fa-star {
        color: #ddd;
        font-size: 18px;
    }

    .star-rating .checked {
        color: #FFD700;
    }

    .testimonial-date {
        margin-top: 10px;
        font-size: 14px;
        color: #777;
    }

    /* Pagination Styling */
    .pagination {
        text-align: center;
        margin-top: 20px;
    }

    .pagination a {
        display: inline-block;
        padding: 8px 16px;
        margin: 5px;
        background: #f8f9fa;
        color: #333;
        border-radius: 5px;
        text-decoration: none;
        transition: background 0.3s;
    }

    .pagination a.active {
        background: #aa8c5b;
        color: white;
        font-weight: bold;
    }

    .pagination a:hover {
        background: #aa8c5b;
        color: white;
    }

    .pagination .prev,
    .pagination .next {
        font-weight: bold;
    }
    </style>


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