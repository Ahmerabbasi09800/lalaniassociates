<?php
// Include your database connection configuration file
include 'php_action/config.php';

// Start the session
session_start();

if (isset($_POST['submit'])) {
    // Form was submitted
    $question = $_POST['question'];
    $answer = $_POST['answer'];
    $program = $_POST['program'];

    // Prepare an insert statement
    $sql = "INSERT INTO `faqs`(`title`, `detail`, `program_id`) 
            VALUES (?, ?, ?)";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "sss", $question, $answer, $program);

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Set a success message in the session
            $_SESSION['success_message'] = 'Faq add successfully';

            // Redirect to the contact.php page with success flag
            header("Location: our_faq.php");
            exit();
        } else {
            // Error handling if execution fails
            $_SESSION['error_message'] = 'Oops! Something went wrong. Please try again later.';
            header("Location: add_faq.php");
            exit();
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // Error handling for prepare statement failure
        $_SESSION['error_message'] = 'Oops! Something went wrong. Please try again later.';
        header("Location: add_faq.php");
        exit();
    }

    // Close the connection
    mysqli_close($conn);
} else {
    // Redirect to the add_faq.php page if form wasn't submitted
    header("Location: add_faq.php");
    exit();
}
?>
