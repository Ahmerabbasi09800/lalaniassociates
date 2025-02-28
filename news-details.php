<?php
session_start();
include 'php_action/config.php';

// Ensure 'title' is set in the URL
if (!isset($_GET['title']) || empty($_GET['title'])) {
    die("Error: News title is missing.");
}

// Get the news title from the URL
$news_title = mysqli_real_escape_string($conn, str_replace("-", " ", $_GET['title']));

// Fetch news details
$sql = "SELECT * FROM news ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $news_id = $row['id'];
    $title = $row['title'];
    $news_image = $row['news_image'];
    $image_alt = $row['image_alt'];
    $news_date = $row['news_date'];
    $news_detail = $row['news_detail'];
    $meta = $row['metadata'];
} else {
    die("Error: News not found.");
}
?>

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
                  <!-- Back To Top Start -->
                  <div class="scroll-up">
            <svg class="scroll-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
            </div>
            <?php include 'loader.php'; ?>
        <?php include 'header.php'; ?>
                        

<!-- Breadcrumb -->
<div class="breadcrumb-wrapper section-padding bg-cover"  style="background-image: url('Admin/<?php echo $news_image; ?>');">
    <div class="container">
        <div class="page-heading">
            <h1><?php echo htmlspecialchars($title); ?></h1>
            <!-- <ul class="breadcrumb-items">
                <li><a href="index.html">Home</a></li>
                <li><i class="fal fa-minus"></i></li>
                <li>News Details</li>
            </ul> -->
        </div>
    </div>
</div>

<!-- Blog Content -->
<section class="blog-wrapper news-wrapper section-padding border-bottom">
    <div class="container">
        <div class="news-area">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="blog-post-details border-wrap">
                        <div class="single-blog-post post-details">
                            <div class="post-content">

                                <h2><?php echo htmlspecialchars($title); ?></h2>
                                <div class="post-meta">
                                    <span><i class="fal fa-user"></i> Admin</span>
                                    <?php
                                    $comment_sql = "SELECT COUNT(*) AS comment_count FROM comment WHERE news_id = '$news_id'";
                                    $comment_result = mysqli_query($conn, $comment_sql);
                                    $comment_row = mysqli_fetch_assoc($comment_result);
                                    $comment_count = $comment_row['comment_count'];
                                     
                                    ?>
                                    <span><i class="fal fa-comments"></i> <span id="meta-comment-count"><?php echo $comment_count ?? "0"; ?> Comments</span>
                                    <span><i class="fal fa-calendar-alt"></i> 
                                        <?php 
                                            // Assuming $news_date is retrieved from the database
                                            if (!empty($news_date)) {
                                                echo date("d F Y", strtotime($news_date)); 
                                            } else {
                                                echo "No Date Available"; // Default text if date is missing
                                            }
                                        ?>
                                    </span>
                                </div>
                                <img src="Admin/<?php echo $news_image; ?>" alt="News Image">

                                    alt="<?php echo htmlspecialchars($image_alt); ?>" 
                                    class="single-post-image">
                                <p><?php echo ($news_detail); ?></p>
                            </div>
                        </div>

                        <!-- Share Buttons -->
                        <div class="row tag-share-wrap">
                            <div class="col-lg-4 col-12 mt-3 mt-lg-0">
                                <h4>Social Share</h4>
                                <div class="social-share">
                                    <?php 
                                        $current_url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                                    ?>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($current_url); ?>" target="_blank">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode($current_url); ?>" target="_blank">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="https://www.instagram.com/?url=<?php echo urlencode($current_url); ?>" target="_blank">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                    <a href="https://www.linkedin.com/shareArticle?url=<?php echo urlencode($current_url); ?>" target="_blank">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Comments Section -->
                        <div class="comments-section-wrap pt-40">
                            <h3><span id="total-comments"><?php echo $comment_count ?? "0"; ?></span> Comments</h3>
                            <ul class="comments-item-list" id="comment-list">
                                <?php 
                                $comment_query = "SELECT * FROM comment WHERE news_id = ? ORDER BY id DESC";
                                $stmt = $conn->prepare($comment_query);
                                $stmt->bind_param("i", $news_id);
                                $stmt->execute();
                                $comments = $stmt->get_result();

                                while ($comment = $comments->fetch_assoc()) {
                                    echo "<li class='single-comment-item'>
                                        <div class='author-info-comment'>
                                            <div class='info'>
                                                <h5><a href='#'>" . htmlspecialchars($comment['name']) . "</a></h5>
                                                <span>" . htmlspecialchars($comment['created_at']) . "</span>
                                            </div>
                                            <div class='comment-text'>
                                                <p>" . nl2br(htmlspecialchars($comment['your_message'])) . "</p>
                                            </div>
                                        </div>
                                    </li>";
                                }
                                ?>
                            </ul>
                        </div>

                        <!-- Comment Form -->
                        <div class="comment-form-wrap d-block pt-5">
                            <h3>Post Comment</h3>
                            <form id="comment-form" class="comment-form">
                                <input type="hidden" name="news_id" id="news_id" value="<?php echo $news_id; ?>">
                                <div class="single-form-input">
                                    <textarea name="comment_text" id="comment_text" placeholder="Type your comment..." required></textarea>
                                </div>
                                <div class="single-form-input">
                                    <input type="text" name="name" id="name" placeholder="Your Name" required>
                                </div>
                                <div class="single-form-input">
                                    <input type="email" name="email" id="email" placeholder="Your Email" required>
                                </div>

                                <button class="theme-btn center" type="submit">
                                    <span><i class="fal fa-comments"></i> Post Comment</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>



<script>
// AJAX Comment Submission
document.getElementById("comment-form").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form from redirecting

    let formData = new FormData(this);

    fetch("addcomment.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json()) // Expect JSON response
    .then(data => {
        if (data.success) {
            // Update comment count in both places
            let totalComments = document.getElementById("total-comments");
            let metaCommentCount = document.getElementById("meta-comment-count");
            let newCount = parseInt(totalComments.innerText) + 1;
            totalComments.innerText = newCount;
            metaCommentCount.innerText = newCount + " Comments";

            let commentList = document.getElementById("comment-list");
            let newComment = document.createElement("li");
            newComment.classList.add("single-comment-item");

            newComment.innerHTML = `
                <div class='author-info-comment'>
                    <div class='info'>
                        <h5><a href='#'>${data.name}</a></h5>
                        <span>${data.created_at}</span>
                    </div>
                    <div class='comment-text'>
                        <p>${data.comment_text}</p>
                    </div>
                </div>
            `;

            commentList.prepend(newComment); // Add new comment to top

            // Clear input fields after successful submission
            document.getElementById("comment_text").value = "";
            document.getElementById("name").value = "";
            document.getElementById("email").value = "";
        } else {
            alert("Error posting comment. Please try again.");
        }
    })
    .catch(error => console.error("Error:", error));
});
</script>

                <!-- Sidebar -->
<div class="col-12 col-lg-4">
    <div class="main-sidebar">

        <!-- Search Widget -->
        <div class="single-sidebar-widget">
            <div class="wid-title">
                <h3>Search</h3>
            </div>
            <div class="search_widget">
                <form action="" method="GET">
                    <input type="hidden" name="title" value="<?php echo isset($_GET['title']) ? htmlspecialchars($_GET['title']) : ''; ?>">
                    <input type="text" name="query" placeholder="Keywords here..." value="<?php echo isset($_GET['query']) ? htmlspecialchars($_GET['query']) : ''; ?>" required>

                    <button type="submit"><i class="fal fa-search"></i></button>
                </form>
            </div>
        </div>

        <?php
        if (isset($_GET['query']) && !empty($_GET['query'])) {
            include 'php_action/config.php';

            $search_term = mysqli_real_escape_string($conn, $_GET['query']);

            $search_query = "SELECT id, title, news_image, news_date FROM news 
                             WHERE title LIKE '%$search_term%' 
                             OR metadata LIKE '%$search_term%' 
                             OR news_detail LIKE '%$search_term%' 
                             ORDER BY id DESC";

            $search_result = mysqli_query($conn, $search_query);

            if (!$search_result) {
                die("Query failed: " . mysqli_error($conn));
            }
        ?>
        <!-- Search Results Widget -->
        <div class="single-sidebar-widget">
            <div class="wid-title">
                <h3>Search Results</h3>
            </div>
            <div class="popular-posts">
                <?php
                if (mysqli_num_rows($search_result) > 0) {
                    while ($post = mysqli_fetch_assoc($search_result)) {
                        // Ensure the title exists before displaying
                        if (!isset($post['title']) || empty($post['title'])) {
                            echo "<p>Error: News title is missing.</p>";
                            continue;
                        }

                        // Format title to match news-grid.php logic
                        $formatted_title = str_replace(" ", "-", $post['title']);

                        echo "<div class='single-post-item'>
                        <div class='thumb bg-cover' style=\"background-image: url('Admin/" . $post['news_image'] . "');\"></div>
                
                        <div class='post-content'>
                            <h5><a href='news-details.php?title={$formatted_title}'>{$post['title']}</a></h5>
                            <div class='post-date'><i class='far fa-calendar-alt'></i> {$post['news_date']}</div>
                        </div>
                      </div>";
                
                    }
                } else {
                    echo "<p>No results found for '<strong>" . htmlspecialchars($search_term) . "</strong>'</p>";
                }
                ?>
            </div>
        </div>
        <?php } ?>

        <!-- Recent Posts Widget -->
        <div class="single-sidebar-widget">
            <div class="wid-title">
                <h3>Recent Posts</h3>
            </div>
            <div class="popular-posts">
                <?php 
                    // Fetch recent posts from the database
                    include 'php_action/config.php'; // Ensure connection
                    $recent_posts = mysqli_query($conn, "SELECT id, title, news_image, news_date FROM news ORDER BY id DESC LIMIT 4");

                    if (mysqli_num_rows($recent_posts) > 0) {
                        while ($post = mysqli_fetch_assoc($recent_posts)) {
                            // Ensure the title exists before displaying
                            if (!isset($post['title']) || empty($post['title'])) {
                                echo "<p>Error: News title is missing.</p>";
                                continue;
                            }

                            // Format title to match news-grid.php logic
                            $formatted_title = str_replace(" ", "-", $post['title']);

                            echo "<div class='single-post-item'>
                            <div class='thumb bg-cover' style='background-image: url(\"Admin/" . $post['news_image'] . "\");'></div>
                            <div class='post-content'>
                                <h5><a href='news-details.php?title={$formatted_title}'>{$post['title']}</a></h5>
                                <div class='post-date'><i class='far fa-calendar-alt'></i> {$post['news_date']}</div>
                            </div>
                          </div>";
                    
                        }
                    } else {
                        echo "<p>No recent posts available.</p>";
                    }
                ?>
            </div>
        </div>

        <!-- Social Share Widget -->
        <div class="single-sidebar-widget">
            <div class="wid-title">
                <h3>Never Miss News</h3>
            </div>
            <div class="social-link">
                <a href="https://www.facebook.com/LalaniAssociates"><i class="fab fa-facebook-f"></i></a>
                <a href="https://twitter.com/LalaniAssociates"><i class="fab fa-twitter"></i></a>
                <!-- <a href="#"><i class="fab fa-instagram"></i></a> -->
                <a href="https://www.linkedin.com/company/lalaniassociates/"><i class="fab fa-linkedin-in"></i></a>
                <a href="https://www.youtube.com/LalaniassociatesPk"><i class="fab fa-youtube"></i></a>
            </div>
        </div>

    </div> <!-- End of main-sidebar -->
</div> <!-- End of col-12 col-lg-4 -->

                </div>
            </div>
        </div>
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

    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>

<!-- Footer -->


</body>
</html>
