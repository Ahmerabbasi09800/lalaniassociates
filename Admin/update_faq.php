<?php
// Include your database connection configuration file
include 'php_action/config.php';

// Start the session
session_start();

if (isset($_POST['submit'])) {
    // Form was submitted
    $faq_id = $_POST['fap_id']; // Assuming you have a hidden input for FAQ ID
    $question = $_POST['question'];
    $answer = $_POST['answer'];
    $program = $_POST['program'];

    // Prepare an update statement
    $sql = "UPDATE `faqs` SET `title`=?, `detail`=?, `program_id`=? WHERE `id`=?";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "sssi", $question, $answer, $program, $faq_id);

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Check if any rows were affected
            if (mysqli_stmt_affected_rows($stmt) > 0) {
                // Set a success message in the session
                $_SESSION['success_message'] = 'FAQ updated successfully';
            } else {
                // No rows affected means no update was made
                $_SESSION['error_message'] = 'No changes made to the FAQ';
            }
            // Redirect to the faq.php page after update
            header("Location: our_faq.php");
            exit();
        } else {
            // Error handling if execution fails
            $_SESSION['error_message'] = 'Oops! Something went wrong. Please try again later.';
            header("Location: edit_faq.php?id=" . $faq_id); // Redirect to edit page with ID
            exit();
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // Error handling for prepare statement failure
        $_SESSION['error_message'] = 'Oops! Something went wrong. Please try again later.';
        header("Location: edit_faq.php?id=" . $faq_id); // Redirect to edit page with ID
        exit();
    }

    // Close the connection
    mysqli_close($conn);
} else {
    // Redirect to the edit_faq.php page if form wasn't submitted
    header("Location: edit_faq.php");
    exit();
}
?>
