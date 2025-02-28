<?php
session_start();
include 'php_action/config.php'; // Include your database connection configuration

if (isset($_POST['submit'])) {
    // Fetch form data
    $link = $_POST['link'];
    $id = isset($_POST['id']) ? $_POST['id'] : null;

    // Clear previous error messages
    unset($_SESSION['error_message']);

    // File upload handling
    if (!empty($_FILES["fileToUpload"]["name"])) { // Check if a new file is uploaded
        $target_dir = "uploads/";
        $timestamp = time(); // Generate a timestamp
        $original_file_name = basename($_FILES["fileToUpload"]["name"]);
        $target_file = $target_dir . $timestamp . "_" . $original_file_name;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

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
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        if (!in_array($imageFileType, $allowed_types)) {
            $_SESSION['error_message'] = "Sorry, only JPG, JPEG, WebP, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            header("Location: edit_career.php?id=" . urlencode($id));
            exit();
        } else {
            // Move uploaded file to destination
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                // Update database entry including Icon field
                $sql = "UPDATE `career_opportunities` SET `link` = ?, `image` = ? WHERE `id` = ?";
                if ($stmt = mysqli_prepare($conn, $sql)) {
                    mysqli_stmt_bind_param($stmt, "ssi", $link, $target_file, $id);
                    if (mysqli_stmt_execute($stmt)) {
                        $_SESSION['success_message'] = 'Career Opportunitie updated successfully';
                    } else {
                        $_SESSION['error_message'] = 'Oops! Something went wrong. Please try again later.';
                    }
                    mysqli_stmt_close($stmt);
                } else {
                    $_SESSION['error_message'] = 'Oops! Something went wrong. Please try again later.';
                }
            } else {
                $_SESSION['error_message'] = "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        // If no new file is uploaded, update other fields except Icon
        $sql = "UPDATE `career_opportunities` SET `link` = ? WHERE `id` = ?";
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "si", $link, $id);
            if (mysqli_stmt_execute($stmt)) {
                $_SESSION['success_message'] = 'Career Opportunities updated successfully';
            } else {
                $_SESSION['error_message'] = 'Oops! Something went wrong. Please try again later.';
            }
            mysqli_stmt_close($stmt);
        } else {
            $_SESSION['error_message'] = 'Oops! Something went wrong. Please try again later.';
        }
    }

    header("Location: career_opportunities.php");
    exit();
} else {
    // If form wasn't submitted, redirect
    header("Location: career_opportunities.php");
    exit();
}

mysqli_close($conn);
?>
