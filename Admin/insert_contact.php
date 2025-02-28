<?php
// Include your database connection configuration file
include 'php_action/config.php';

// Start the session
session_start();

if (isset($_POST['submit'])) {
    // Form was submitted
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $interest = $_POST['interest'];
    $message = $_POST['message'];

    // Prepare an insert statement
    $sql = "INSERT INTO `contact_us`(`name`, `email`, `subject`, `interest`, `message`) 
            VALUES (?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $subject, $interest, $message);

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Set a success message in the session
            $_SESSION['success_message'] = 'Contact Add successfully';

            // Redirect to the contact.php page with success flag
            header("Location: Contact_us.php");
            exit();
        } else {
            // Error handling if execution fails
            $_SESSION['error_message'] = 'Oops! Something went wrong. Please try again later.';
            header("Location: add_contact.php");
            exit();
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // Error handling for prepare statement failure
        $_SESSION['error_message'] = 'Oops! Something went wrong. Please try again later.';
        header("Location: add_contact.php");
        exit();
    }

    // Close the connection
    mysqli_close($conn);
} else {
    // Redirect to the contact.php page if form wasn't submitted
    header("Location: add_contact.php");
    exit();
}
?>
