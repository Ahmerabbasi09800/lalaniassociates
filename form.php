<?php
// Include database connection
include 'php_action/config.php';

// Ensure ID is present in the URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $program_id = intval($_GET['id']);
    $sql = "SELECT * FROM `program` WHERE id = $program_id";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Database Query Failed: " . mysqli_error($conn)); // Debugging output
    }

    $row = mysqli_fetch_assoc($result);
} else {
    die("Invalid Request: No ID provided.");
}

// Check if a valid row was found
if (!$row) {
    die("Program Not Found: No record matches the given ID.");
}

?>

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

    <body>
    <?php  session_start(); ?>
         <!-- Back To Top Start -->
         <div class="scroll-up">
            <svg class="scroll-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>

        <!-- Preloader Start -->
        <div id="preloader" class="preloader">
            <div class="animation-preloader">
                <div class="spinner">                
                </div>
                <div class="txt-loading">
                    <span data-text-preloader="V" class="letters-loading">
                        V
                    </span>
                    <span data-text-preloader="I" class="letters-loading">
                        I
                    </span>
                    <span data-text-preloader="S" class="letters-loading">
                        S
                    </span>
                    <span data-text-preloader="A" class="letters-loading">
                        A
                    </span>
                    <span data-text-preloader="L" class="letters-loading">
                        L
                    </span>
                    <span data-text-preloader="A" class="letters-loading">
                        A
                    </span>
                    <span data-text-preloader="N" class="letters-loading">
                        N
                    </span>
                    <span data-text-preloader="D" class="letters-loading">
                        D
                    </span>
                </div>
                <p class="text-center">Loading</p>
            </div>
            <div class="loader">
                <div class="row">
                    <div class="col-3 loader-section section-left">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-left">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-right">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-right">
                        <div class="bg"></div>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'header.php'; ?>


        <?php
include 'php_action/config.php'; // Database connection

// Default values
$breadcrumb_title = "Application Form";
$breadcrumb_image = "assets/images/bg/default_bg.jpg"; // Default image

// Check if an ID is provided in the URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $program_id = intval($_GET['id']); // Sanitize the input

    // Fetch program details from the database
    $sql = "SELECT id,title, deatil_image FROM `program` WHERE id = $program_id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $breadcrumb_title = $row['title']; // Set dynamic title

        // Check if deatil_image exists and is not empty
        if (!empty($row['deatil_image'])) {
            $breadcrumb_image = "Admin/" . $row['deatil_image']; // Construct image path
        }
    }
}
?>

<!-- Breadcrumb Section -->
<div class="breadcrumb-wrapper section-padding bg-cover" style="background-image: url('<?php echo htmlspecialchars($breadcrumb_image); ?>');">
    <div class="container">
        <div class="page-heading">
            <h1 class="wow fadeInUp" data-wow-delay=".3s"><?php echo htmlspecialchars($breadcrumb_title); ?></h1>
        </div>
    </div>
</div>


<?php if (isset($_SESSION['error_message'])): ?>
    <div class="alert alert-danger text-center">
        <?php echo $_SESSION['error_message']; unset($_SESSION['error_message']); ?>
    </div>
<?php endif; ?>

<?php if (isset($_SESSION['success_message'])): ?>
    <div class="alert alert-success text-center">
        <?php echo $_SESSION['success_message']; unset($_SESSION['success_message']); ?>
    </div>
<?php endif; ?>

<!-- Form Section -->
<section class="contact-main-area fix section-padding">
    <div class="container">
        <div class="contact-main-wrapper">
            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="contact-content text-center">
                        <div class="section-title mb-2">
                            <h2 class="title-anim">Fill Out the Form Below</h2>
                        </div>
                    </div>
                </div>

                <!-- Form -->
                <div class="col-lg-12">
                    <div class="contact-form-items">
                        <form action="simple_form.php" method="post">
                        <input name="pro_id" class="input" value="<?php echo $row['id'] ?>" type="hidden" required>

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="form-clt">
                                        <input type="text" name="name" placeholder="Your Name*" required>
                                        <div class="icon"><i class="fal fa-user"></i></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-clt">
                                        <input type="number" name="age" placeholder="Your Age">
                                        <div class="icon"><i class="fal fa-calendar"></i></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-clt">
                                        <input type="text" name="education" placeholder="Education*" required>
                                        <div class="icon"><i class="fal fa-graduation-cap"></i></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-clt">
                                        <input type="text" name="occupation" placeholder="Occupation*" required>
                                        <div class="icon"><i class="fal fa-briefcase"></i></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-clt">
                                        <input type="number" name="number" placeholder="Contact Number*" required>
                                        <div class="icon"><i class="fal fa-phone"></i></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-clt">
                                        <input type="text" name="city" placeholder="City">
                                        <div class="icon"><i class="fal fa-map-marker-alt"></i></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-clt">
                                        <input type="number" name="no_of_child" placeholder="No. of Children">
                                        <div class="icon"><i class="fal fa-users"></i></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-clt">
                                        <input type="number" name="no_of_child_18" placeholder="Children Above 18">
                                        <div class="icon"><i class="fal fa-child"></i></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center" style="margin-top:50px;">
                                    <button type="submit" class="theme-btn">
                                        <span>Submit Form <i class="fal fa-paper-plane"></i></span>
                                    </button>
                                    <input type="hidden" name="src" value="Website">
                                </div>
                            </div>
                        </form>
                    </div>
                </div> <!-- End Form -->
            </div>
        </div>
    </div>
</section>





    
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