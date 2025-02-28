<?php
// Include your database connection configuration file
include 'php_action/config.php';

// Start the session
session_start();

if (isset($_POST['submit'])) {
    // Form was submitted
    $id = $_POST['id']; // Assuming the form includes an ID field to identify the record
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $interest = $_POST['interest'];
    $message = $_POST['message'];

    // Prepare an update statement
    $sql = "UPDATE `contact_us` SET `name` = ?, `email` = ?, `subject` = ?, `interest` = ?, `message` = ? WHERE `id` = ?";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "sssssi", $name, $email, $subject, $interest, $message, $id);

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Set a success message in the session
            $_SESSION['success_message'] = 'Contact update successfully';

            // Redirect to the contact.php page with success flag
            header("Location: Contact_us.php");
            exit();
        } else {
            // Error handling if execution fails
            $_SESSION['error_message'] = 'Oops! Something went wrong. Please try again later.';
            header("Location: edit_contact.php?php=$id");
            exit();
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // Error handling for prepare statement failure
        $_SESSION['error_message'] = 'Oops! Something went wrong. Please try again later.';
        header("Location: edit_contact.php?php=$id");
        exit();
    }

    // Close the connection
    mysqli_close($conn);
} else {
    // Redirect to the contact.php page if form wasn't submitted
    header("Location: edit_contact.php?php=$id");
    exit();
}
?>
