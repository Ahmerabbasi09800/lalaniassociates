<?php
// Include your database connection configuration file
include 'php_action/config.php';

// Start the session
session_start();

if (isset($_POST['submit'])) {
    // Form was submitted
    $link = $_POST['link'];

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
    $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($imageFileType, $allowed_types)) {
        $_SESSION['error_message'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        header("Location: add_career.php");
        exit();
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            // Prepare an insert statement
            $sql = "INSERT INTO `career_opportunities`(`link`, `image`) VALUES (?, ?)";
            if ($stmt = mysqli_prepare($conn, $sql)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "ss", $link, $target_file);

                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    // Set a success message in the session
                    $_SESSION['success_message'] = 'Career Opportunities add successfully';

                    // Redirect to the our_team.php page
                    header("Location: career_opportunities.php");
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
        header("Location: add_career.php");
        exit();
    }

    // Close the connection
    mysqli_close($conn);
} else {
    // Redirect to the add_career.php page if form wasn't submitted
    header("Location: add_career.php");
    exit();
}
?>
