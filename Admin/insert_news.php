<?php
// Include your database connection configuration file
include 'php_action/config.php';

// Start the session
session_start();

if (isset($_POST['submit'])) {
    // Form was submitted
    $title = $_POST['title'];
    $meta = $_POST['Metadata'];
    $details = $_POST['details'];
    $news_date = $_POST['news_date'];
    $imageAlt = $_POST['imageAlt'];

    $target_dir = "uploads/";
    $timestamp = time(); // Generate a timestamp
    $original_file_name = basename($_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir . $timestamp . "_" . $original_file_name;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check === false) {
        $_SESSION['error_message'] = "File is not an image.";
        $uploadOk = 0;
    }

        // Check if file already exists
    if (file_exists($target_file)) {
        $_SESSION['error_message'] = "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size (5MB limit)
    if ($_FILES["fileToUpload"]["size"] > 10000000) {
        $_SESSION['error_message'] = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    $allowed_types = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    if (!in_array($imageFileType, $allowed_types)) {
        $_SESSION['error_message'] = "Sorry, only JPG, JPEG, WebP, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        header("Location: news.php");
        exit();
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            // Prepare an insert statement
            $sql = "INSERT INTO `news`(`title`, `metadata`, `news_detail`, `news_image`, `news_date`, `image_alt`) VALUES (?, ?, ?, ?, ?, ?)";
            if ($stmt = mysqli_prepare($conn, $sql)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "ssssss", $title, $meta, $details, $target_file, $news_date, $imageAlt);

                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    // Set a success message in the session
                    $_SESSION['success_message'] = 'News add successfully';

                    // Redirect to the our_team.php page
                    header("Location: news.php");
                    exit();
                } else {
                    // Error handling if execution fails
                    $_SESSION['error_message'] = 'Oops! Something went wrong. Please try again later.';
                }

                // Close the statement
                mysqli_stmt_close($stmt);
            } else {
                // Error handling for prepare statement failure
                $_SESSION['error_message'] = 'Oops! Something went wrong. Please try again later.';
            }
        } else {
            $_SESSION['error_message'] = "Sorry, there was an error uploading your file.";
        }
        header("Location: add_news.php");
        exit();
    }

    // Close the connection
    mysqli_close($conn);
} else {
    // Redirect to the add_news.php page if form wasn't submitted
    header("Location: add_news.php");
    exit();
}
?>
