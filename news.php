<!DOCTYPE html>
<html lang="en">
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

    <!-- Header -->
              <!-- Back To Top Start -->
              <div class="scroll-up">
            <svg class="scroll-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>
        <?php include 'loader.php'; ?>
        <?php include 'header.php'; ?>



    <!-- Breadcrumb Section -->
    <div class="breadcrumb-wrapper section-padding bg-cover" style="background-image: url('assets/images/bg/news_bg.jpg');">
        <div class="container">
            <div class="page-heading">
                <h1 class="wow fadeInUp" data-wow-delay=".3s">Latest News</h1>
                <!-- <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                    <li><a href="index.php">Home</a></li>
                    <li><i class="fal fa-minus"></i></li>
                    <li>News</li>
                </ul> -->
            </div>
        </div>
    </div>

    <!-- News Section -->
    <section class="news-section fix section-padding">
        <div class="container">
            <div class="row g-4">
                <?php
                // Include Database Configuration
                include 'php_action/config.php';

                // Ensure database connection is valid
                if (!$conn) {
                    die("Database connection failed: " . mysqli_connect_error());
                }
                // Define Pagination Variables
                $limit = 6; // Number of items per page
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $offset = ($page - 1) * $limit;

                // Fetch News from Database
                $sql = "SELECT n.*, COUNT(c.id) AS comment_count 
                FROM news n 
                LEFT JOIN comment c ON n.id = c.news_id 
                GROUP BY n.id 
                ORDER BY n.id DESC 
                LIMIT $limit OFFSET $offset";

                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                 
                        $news_id = $row['id'];
                        $formattedDate = date("F j, Y", strtotime($row["news_date"]));
                        ?>
                        <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                            <div class="news-box-items mt-0">
                                <div class="news-image">
                               
                                <img src="Admin/<?php echo $row['news_image']; ?>" alt="News Image">
                                <img src="Admin/<?php echo $row['news_image']; ?>" alt="News Image">
                                   
                                    <h6 class="date"><?php echo date("d", strtotime($row["news_date"])); ?> <span><?php echo date("M", strtotime($row["news_date"])); ?></span></h6>
                                </div>
                                <div class="news-content">
                                    <ul class="post-date">
                                        <li><i class="far fa-user-circle"></i> Admin</li>
                                        <li><i class="fal fa-comments"></i> Comments (<?php echo $row['comment_count']; ?>)</li>
                                    </ul>
                                    <h3><a href="news-details.php?title=<?php echo str_replace(" ","-", $row['title']) ?>"><?php echo strlen($row['title']) > 60 ? substr($row['title'], 0, 60) . '...' : $row['title']; ?></a></h3>
                                    <p><?php echo strlen($row['news_detail']) > 150 ? substr(strip_tags($row['news_detail']), 0, 150) . '...' : strip_tags($row['news_detail']); ?></p>
                                    <a href="news-details.php?title=<?php echo str_replace(" ","-", $row['title']) ?>" class="link-btn">
                                        <span>Read More</span> <i class="fas fa-chevron-right"></i>
                                        
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p class='text-center'>No news available at the moment.</p>";
                }
                ?>
            </div>
            <div class="page-nav-wrap mt-5 text-center">
    <ul>
        <?php
        $total_records = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM news"));
        $total_pages = ceil($total_records / $limit);

        // Previous button
        if ($page > 1) {
            echo "<li><a class='page-numbers' href='news.php?page=" . ($page - 1) . "'><i class='fal fa-long-arrow-left'></i></a></li>";
        } else {
            echo "<li class='disabled'><span class='page-numbers'><i class='fal fa-long-arrow-left'></i></span></li>";
        }

        // Display First Page
        if ($page > 3) {
            echo "<li><a class='page-numbers' href='news.php?page=1'>1</a></li>";
            echo "<li><span class='page-numbers'>...</span></li>";
        }

        // Display Middle Pages (Dynamic)
        for ($i = max(1, $page - 2); $i <= min($total_pages, $page + 2); $i++) {
            if ($i == $page) {
                echo "<li><span class='page-numbers current'>$i</span></li>";
            } else {
                echo "<li><a class='page-numbers' href='news.php?page=$i'>$i</a></li>";
            }
        }

        // Display Last Page
        if ($page < $total_pages - 2) {
            echo "<li><span class='page-numbers'>...</span></li>";
            echo "<li><a class='page-numbers' href='news.php?page=$total_pages'>$total_pages</a></li>";
        }

        // Next button
        if ($page < $total_pages) {
            echo "<li><a class='page-numbers' href='news.php?page=" . ($page + 1) . "'><i class='fal fa-long-arrow-right'></i></a></li>";
        } else {
            echo "<li class='disabled'><span class='page-numbers'><i class='fal fa-long-arrow-right'></i></span></li>";
        }
        ?>
        
    </ul>
</div>

           
        </div>
    </section>
     <!-- Pagination -->
            <!-- <div class="pagination-section">
                <ul class="pagination">
                <?php
                    $total_records = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM news"));
                    $total_pages = ceil($total_records / $limit);

                    if ($page > 1) {
                        echo "<li><a href='news.php?page=" . ($page - 1) . "'>&laquo; Previous</a></li>";
                    } else {
                        echo "<li class='disabled'><span>&laquo; Previous</span></li>";
                    }

                    for ($i = 1; $i <= $total_pages; $i++) {
                        echo ($i == $page) ? "<li class='active'><span>$i</span></li>" : "<li><a href='news.php?page=$i'>$i</a></li>";
                    }

                    if ($page < $total_pages) {
                        echo "<li><a href='news.php?page=" . ($page + 1) . "'>Next &raquo;</a></li>";
                    } else {
                        echo "<li class='disabled'><span>Next &raquo;</span></li>";
                    }
                    ?>
                </ul>
            </div> -->

    <!-- Footer -->
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

    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>
