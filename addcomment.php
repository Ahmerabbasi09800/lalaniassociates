<?php
session_start();
include 'php_action/config.php'; // Ensure database connection

header('Content-Type: application/json'); // Set JSON response header

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize Input
    $news_id = isset($_POST['news_id']) ? intval($_POST['news_id']) : 0;
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $comment_text = filter_var($_POST['comment_text'], FILTER_SANITIZE_STRING);
    $created_at = date("Y-m-d H:i:s");

    // Validate Inputs
    if (empty($news_id) || empty($name) || empty($email) || empty($comment_text)) {
        echo json_encode(["success" => false, "message" => "All fields are required."]);
        exit();
    }

    // Insert Comment into Database
    $stmt = $conn->prepare("INSERT INTO comment (news_id, name, email, your_message, created_at) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $news_id, $name, $email, $comment_text, $created_at);

    if ($stmt->execute()) {
        $stmt->close();
        
        // Return JSON response for AJAX success
        echo json_encode([
            "success" => true,
            "name" => htmlspecialchars($name),
            "email" => htmlspecialchars($email),
            "comment_text" => nl2br(htmlspecialchars($comment_text)),
            "created_at" => $created_at
        ]);
    } else {
        echo json_encode(["success" => false, "message" => "Failed to add comment."]);
    }

    $conn->close();
} else {
    echo json_encode(["success" => false, "message" => "Invalid request."]);
}
?>
