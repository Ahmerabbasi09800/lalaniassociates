<?php
session_start();
include 'php_action/config.php';

// Validate and sanitize the ID
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    // sql to delete a record
    $sql = "DELETE FROM career_opportunities WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['success_message'] = 'Career Opportunitie deleted successfully';
        header("Location: career_opportunities.php");
        exit();
    } else {
        $_SESSION['error_message'] = 'Oops! Something went wrong. Please try again later.';
    }
} else {
    $_SESSION['error_message'] = 'Invalid ID specified for deletion.';
}

$conn->close();
?>
