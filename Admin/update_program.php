<?php
// Include your database connection configuration file
include 'php_action/config.php';

// Start the session
session_start();

// Check if the form was submitted
if (isset($_POST['submit'])) {
    // Form was submitted
    $id = $_POST['id'];
    $title = $_POST['title'];
    $meta = $_POST['Metadata'];
    $p_country = $_POST['p_country'];
    $p_form = $_POST['p_form'];
    $details = $_POST['details'];
    $imageAlt = $_POST['imageAlt'];
    $detailImageAlt = $_POST['detailImageAlt'];

    // Define allowed file types
    $allowed_types = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

    // File 1 Upload
    $target_dir = "uploads/";
    $timestamp = time(); // Generate a timestamp
    $original_file_name = basename($_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir . $timestamp . "_" . $original_file_name;
    $uploadOk1 = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if a new file was uploaded
    if (!empty($_FILES["fileToUpload"]["tmp_name"])) {
        // Check if image file is an actual image or fake image
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check === false) {
            $_SESSION['error_message'] = "File is not an image.";
            $uploadOk1 = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            $_SESSION['error_message'] = "Sorry, file already exists.";
            $uploadOk1 = 0;
        }

        // Check file size (10MB limit)
        if ($_FILES["fileToUpload"]["size"] > 10000000) {
            $_SESSION['error_message'] = "Sorry, your file is too large.";
            $uploadOk1 = 0;
        }

        // Allow certain file formats
        if (!in_array($imageFileType, $allowed_types)) {
            $_SESSION['error_message'] = "Sorry, only JPG, JPEG, PNG, WebP & GIF files are allowed.";
            $uploadOk1 = 0;
        }
    } else {
        $uploadOk1 = 2; // Indicate no new file upload
    }

    // File 2 Upload
    $target_dir2 = "uploads/";
    $timestamp2 = time(); // Generate a timestamp
    $original_file_name2 = basename($_FILES["fileToUpload2"]["name"]);
    $target_file2 = $target_dir2 . $timestamp2 . "_" . $original_file_name2;
    $uploadOk2 = 1;
    $imageFileType2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));

    // Check if a new file was uploaded
    if (!empty($_FILES["fileToUpload2"]["tmp_name"])) {
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
            $_SESSION['error_message'] = "Sorry, Detail image is too large.";
            $uploadOk2 = 0;
        }

        // Allow certain file formats
        if (!in_array($imageFileType2, $allowed_types)) {
            $_SESSION['error_message'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed for file 2.";
            $uploadOk2 = 0;
        }
    } else {
        $uploadOk2 = 2; // Indicate no new file upload
    }

    // Check if any upload failed
    if ($uploadOk1 == 0 || $uploadOk2 == 0) {
        header("Location: edit_program.php?id=$id");
        exit();
    } else {
        // If uploads are okay, attempt to move files and update the database
        if (($uploadOk1 == 1 && move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) || $uploadOk1 == 2) {
            if (($uploadOk2 == 1 && move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file2)) || $uploadOk2 == 2) {
                // Prepare an update statement
                $sql = "UPDATE `program` SET `title` = ?, `metadata` = ?, `country` = ?, `program_form` = ?, `program_detail` = ?, `image_alt` = ?, `detail_image_alt` = ?";
                $params = [$title, $meta, $p_country, $p_form, $details, $imageAlt, $detailImageAlt];


                if ($uploadOk1 == 1) {
                    $sql .= ", `Image` = ?";
                    $params[] = $target_file;
                }
                if ($uploadOk2 == 1) {
                    $sql .= ", `deatil_image` = ?";
                    $params[] = $target_file2;
                }
                $sql .= " WHERE `id` = ?";
                $params[] = $id;

                if ($stmt = mysqli_prepare($conn, $sql)) {
                    // Generate the type string dynamically based on the number of parameters
                    $types = str_repeat('s', count($params) - 1) . 'i';
                    mysqli_stmt_bind_param($stmt, $types, ...$params);

                    // Attempt to execute the prepared statement
                    if (mysqli_stmt_execute($stmt)) {
                        // Set a success message in the session
                        $_SESSION['success_message'] = 'Program updated successfully';

                        // Redirect to the program.php page
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
        } else {
            $_SESSION['error_message'] = "Sorry, there was an error uploading your files.";
        }
        header("Location: edit_program.php?id=$id");
        exit();
    }

    // Close the connection
    mysqli_close($conn);
} else {
    // Redirect to the edit_program.php page if form wasn't submitted
    header("Location: edit_program.php?id=$id");
    exit();
}
?>
