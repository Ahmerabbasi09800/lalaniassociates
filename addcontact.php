<?php
// Include database configuration file
include 'php_action/config.php';

// Start session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    $interest = filter_var($_POST['interest'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
    $mobile = filter_var($_POST['mobile'], FILTER_SANITIZE_NUMBER_INT);

    // Initialize an errors array
    $errors = [];

    // ✅ Validate Name
    if (empty($name)) {
        $errors[] = "Name is required.";
    } elseif (strlen($name) < 3) {
        $errors[] = "Name must be at least 3 characters.";
    }

    // ✅ Validate Email
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // ✅ Validate Mobile
    if (empty($mobile)) {
        $errors[] = "Mobile number is required.";
    } elseif (!preg_match("/^[0-9]{10,15}$/", $mobile)) {
        $errors[] = "Mobile number must be between 10 to 15 digits.";
    }

    // ✅ Validate Subject
    if (empty($subject)) {
        $errors[] = "Subject is required.";
    }

    // ✅ Validate Interest
    if (empty($interest)) {
        $errors[] = "Please select your interest.";
    }

    // ✅ Validate Message
    if (empty($message)) {
        $errors[] = "Message is required.";
    } elseif (strlen($message) < 1) {
        $errors[] = "Message must be at least 1 character.";
    }

    // ✅ If errors exist, return to the form
    if (!empty($errors)) {
        $_SESSION['error_message'] = implode("<br>", $errors);
        header("Location: contact.php");
        exit();
    }

    // ✅ Debug: Check if database connection is successful
    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // ✅ Insert query
    $sql = "INSERT INTO contact_us (name, email, mobile, subject, interest, message) 
            VALUES (?, ?, ?, ?, ?, ?)";

    // ✅ Prepare statement to prevent SQL injection
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssssss", $name, $email, $mobile, $subject, $interest, $message);

        // ✅ Execute the statement and check if successful
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['success_message'] = 'Form submitted successfully!';
            
            // ✅ Close statement and connection before redirection
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
            
            header("Location: thanku.php");
            exit();
        } else {
            $_SESSION['error_message'] = "Database Error: " . mysqli_error($conn);
            header("Location: contact.php");
            exit();
        }
    } else {
        $_SESSION['error_message'] = "Failed to prepare SQL statement.";
        header("Location: contact.php");
        exit();
    }
} else {
    // ✅ If accessed directly, redirect back
    header("Location: contact.php");
    exit();
}
