<?php
// Include your database connection configuration file
include 'php_action/config.php';

// Start the session
session_start();

if (isset($_POST['submit'])) {
    // Form was submitted
    $title = $_POST['title'];
    $meta = $_POST['Metadata'];
    $p_country = $_POST['p_country'];
    $p_form = $_POST['p_form'];
    $details = $_POST['details'];
    $imageAlt = $_POST['imageAlt'];
    $detailImageAlt = $_POST['detailImageAlt'];

    // File 1 Upload
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

    // Check file size (10MB limit)
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

    // File 2 Upload
    $target_dir2 = "uploads/";
    $timestamp2 = time(); // Generate a timestamp
    $original_file_name2 = basename($_FILES["fileToUpload2"]["name"]);
    $target_file2 = $target_dir2 . $timestamp2 . "_" . $original_file_name2;
    $uploadOk2 = 1;
    $imageFileType2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    $check2 = getimagesize($_FILES["fileToUpload2"]["tmp_name"]);
    if ($check2 === false) {
        $_SESSION['error_message'] = "File 2 is not an image.";
        $uploadOk2 = 0;
    }

    // Check if file already exists
    if (file_exists($target_file2)) {
        $_SESSION['error_message'] = "Sorry, Detail image already exists.";
        $uploadOk2 = 0;
    }

    // Check file size (10MB limit)
    if ($_FILES["fileToUpload2"]["size"] > 10000000) {
        $_SESSION['error_message'] = "Sorry, yDetail image is too large.";
        $uploadOk2 = 0;
    }

    // Allow certain file formats
    if (!in_array($imageFileType2, $allowed_types)) {
        $_SESSION['error_message'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed for file 2.";
        $uploadOk2 = 0;
    }

    // Check if any upload failed
    if ($uploadOk == 0 || $uploadOk2 == 0) {
        header("Location: add_program.php");
        exit();
    } else {
        // If uploads are okay, attempt to move files and insert into database
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file) && move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file2)) {
            // Prepare an insert statement
            $sql = "INSERT INTO `program`(`title`, `metadata`, `program_detail`, `Image`, `deatil_image`, `country`, `program_form`, `image_alt`, `detail_image_alt`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            if ($stmt = mysqli_prepare($conn, $sql)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "sssssssss", $title, $meta, $details, $target_file, $target_file2, $p_country, $p_form, $imageAlt, $detailImageAlt);

                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    // Set a success message in the session
                    $_SESSION['success_message'] = 'Program added successfully';

                    // Redirect to the our_team.php page
                    header("Location: program.php");
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
            $_SESSION['error_message'] = "Sorry, there was an error uploading your files.";
        }
        header("Location: add_program.php");
        exit();
    }
    // Close the connection
    mysqli_close($conn);
} else {
    // Redirect to the add_team.php page if form wasn't submitted
    header("Location: add_program.php");
    exit();
}
?>
