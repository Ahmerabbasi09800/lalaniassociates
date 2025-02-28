<!doctype html>
<html class="no-js" lang="zxx">
<?php
include 'php_action/config.php';

// Check if 'id' is set in the URL and is a valid number
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Error: Program ID is missing or invalid.");
}

$program_id = intval($_GET['id']); // Convert to an integer for security

$sql = "SELECT * FROM `program` WHERE id = $program_id";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    $det_Image = $row['deatil_image'];
    $title = $row['title'];
    $prog_Detail = $row['program_detail'];
    $meta = $row['metadata'];
} else {
    die("No program found with this ID.");
}
?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $title; ?> | LaLani Associates</title>
    <?php echo $meta; ?>
    <meta name="description"
        content="Explore our range of visa service programs, including investor, entrepreneur, citizenship by investment, skilled/semi-skilled, temporary residency, sponsorship, PR renewal, and more. Trust Lalani Associates for your visa needs." />
    <link rel="canonical" href="https://lalaniassociates.com/service/" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Visa Services - Lalani Associates" />
    <meta property="og:description"
        content="Explore our range of visa service programs, including investor, entrepreneur, citizenship by investment, skilled/semi-skilled, temporary residency, sponsorship, PR renewal, and more. Trust Lalani Associates for your visa needs." />
    <meta property="og:url" content="https://lalaniassociates.com/service/" />
    <meta property="og:site_name" content="Lalani Associates" />
    <meta property="article:publisher" content="https://www.facebook.com/LalaniAssociates/" />
    <meta property="article:modified_time" content="2024-04-18T05:23:46+00:00" />
    <meta property="og:image" content="https://lalaniassociates.com/wp-content/uploads/2022/12/our-services.jpg" />
    <meta property="og:image:width" content="1920" />
    <meta property="og:image:height" content="600" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@lalaniassoc" />
    <!-- Place favicon.ico in the root directory -->
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
    <script src="../assets/js/vendor/modernizr-2.8.3.min.js"></script>


    <meta name="trustpilot-one-time-domain-verification-id" content="043d82df-47e6-4f21-afdf-eb8c78b740b3" />
    <meta name="msvalidate.01" content="833A7C374DE83453839979D19180F2FC" />
    <meta name='dmca-site-verification' content='WjRHMGtGYkNJY1piQVZHTVI1WDhlVi9ocGpXSno3c2R1RnZSWi9tOGxoST01' />

    <!-- Google Tag Manager -->
    <script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-T7HPW9R2');
    </script>
    <!-- End Google Tag Manager -->

    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "name": "Lalani & Associates - Best Immigration Consultant in Pakistan",
        "alternateName": "Lalani & Associates - Best Immigration Consultant in Pakistan",
        "description": "Lalani Associates is known as the top visa and best immigration consultant in Pakistan for skilled/semi-skilled work visas, visit visas, USA EB5 investor visas, USA E2 visas, sponsorship programs, citizenship by investment programs, PR renewal, and startup visa programs.",
        "url": "https://lalaniassociates.com",
        "potentialAction": {
            "@type": "SearchAction",
            "target": {
                "@type": "EntryPoint",
                "urlTemplate": "https://lalaniassociates.com/?s={search_term_string}"
            },
            "query-input": "required name=search_term_string"
        },
        "mainEntity": {
            "@type": "Organization",
            "name": "Lalani & Associates",
            "url": "https://lalaniassociates.com",
            "sameAs": [
                "https://www.facebook.com/lalaniassociates",
                "https://www.linkedin.com/company/lalani-associates/"
            ]
        },
        "offers": [{
                "@type": "Service",
                "name": "Canadian Immigration Services",
                "url": "https://lalaniassociates.com/service/canadian-immigration-services/",
                "description": "Explore Canadian immigration services offered by Lalani Associates. Trust us to assist you in navigating the Canadian immigration process smoothly."
            },
            {
                "@type": "Service",
                "name": "Australian Immigration Services",
                "url": "https://lalaniassociates.com/service/australian-immigration-services/",
                "description": "Explore Australian immigration services by Lalani Associates. Trust us to guide you through skilled worker visas and citizenship applications."
            },
            {
                "@type": "Service",
                "name": "US Immigration Services",
                "url": "https://lalaniassociates.com/service/us-immigration-services/",
                "description": "Need a visa for the United States? Our services cover EB5, EB2-NIW, E2, EB3, Visit, and Sponsorship visas. Simplify your immigration with us."
            },
            {
                "@type": "Service",
                "name": "European Immigration Services",
                "url": "https://lalaniassociates.com/service/european-immigration-services/",
                "description": "Explore European immigration services by Lalani Associates. Trust us to guide you through skilled worker visas and citizenship applications."
            }
        ]
    }
    </script>


    <!-- Meta Pixel Code -->
    <script>
    ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
        'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '3275231905924841');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=3275231905924841&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-10936671189">
    </script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'AW-10936671189');
    </script>
</head>

<body>
<?php include 'loader.php'; ?>
    <?php include 'header.php'; ?>
    <div id="main-wrapper">

        <style>
        .hero-item {
            position: relative;
        }

        .hero-item .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0);
            /* Adjust the opacity as needed */
            z-index: 1;
        }

        .hero-item .container {
            position: relative;
            z-index: 2;
        }
        </style>
        <!-- Breadcrumb Section Start -->
        <!--<< Breadcrumb Section Start >>-->
        <div class="breadcrumb-wrapper section-padding bg-cover"
            style="background-image: url('Admin/<?php echo $det_Image; ?>');">
            <div class="container">
                <div class="page-heading">


                    <h1 class="wow fadeInUp" data-wow-delay=".3s"><?php echo $title; ?></h1>

                </div>
            </div>
        </div>
        <br> <?php echo $prog_Detail; ?><br>

        <?php /* }} */ ?>
        <!-- Demo Text Section End -->

        <!--Service section start-->
        <!--CTA section start-->
        <div class="cta-section section bg-gray-two">
            <div class="container">
                <div class="row no-gutters align-items-center">
                    <div class="col-md-1">
                        <div class="pentagon-icon cta-icon">
                            
                        </div>
                    </div>
                    <?php
                    $sql = "SELECT * FROM `program` WHERE id = $program_id";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        // Fetch the row
                        $row = mysqli_fetch_assoc($result);
                        $program_form = $row['program_form'];
                        $redirect_url = '';

                        // Determine the redirect URL based on program_form
                        if ($program_form === 'sample_form') {
                            //$redirect_url = "first_form.php?id=$program_id";
                            $redirect_url = "form.php?id=$program_id";
                        } elseif ($program_form === 'detail_form') {
                            //$redirect_url = "second_form.php?id=$program_id";
                            $redirect_url = "second_form.php?id=$program_id";
                        } else {
                            echo "Invalid program form value.";
                            exit();
                        }
                    } else {
                        echo "No program found with the given ID.";
                        exit();
                    }
                    ?>

                </div>
            </div>
        </div>

        <!--<< Cta Chat Section Start >>-->
        <section class="cta-chat-section section-padding pt-0">
            <div class="container">
                <div class="cta-chat-wrapper">
                    <div class="chat-items wow fadeInUp" data-wow-delay=".3s">

                        <div class="content">
                            <h3>START YOUR JOURNEY NOW</h3>
                            <p>Get free assessment to find out your eligibility</p>
                        </div>
                    </div>
                    <a href="<?php echo $redirect_url; ?>" class="theme-btn bg-white wow fadeInUp" data-wow-delay=".5s">
                        <span>
                            APPLY NOW
                            <i class="fas fa-chevron-right"></i>
                        </span>
                    </a>
                </div>
            </div>
        </section>
        <?php include 'footer.php' ?>
        <!-- Placed js at the end of the document so the pages load faster -->

        <!-- All jquery file included here -->
        <script src="../assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfmCVTjRI007pC1Yk2o2d_EhgkjTsFVN8&callback">
        </script>
        <script src="../assets/js/vendor/popper.min.js"></script>
        <script src="../assets/js/vendor/bootstrap.min.js"></script>
        <script src="../assets/js/plugins/plugins.js"></script>
        <script src="../assets/js/main.js"></script>

        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T7HPW9R2" height="0" width="0"
                style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
</body>

</html>