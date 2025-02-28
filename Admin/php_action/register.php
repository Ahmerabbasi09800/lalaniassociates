<?php
session_start();
include 'config.php';

if (isset($_POST['submit'])) {
    $name = isset($_POST["name"]) ? trim($_POST["name"]) : null;
    $email = isset($_POST["email"]) ? trim($_POST["email"]) : null;
    $password = isset($_POST["password"]) ? trim($_POST["password"]) : null;
    $confirm_password = isset($_POST["confirm_password"]) ? trim($_POST["confirm_password"]) : null;

    // Validate input
    if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
        $_SESSION['message'] = "Please fill out all fields.";
        header("Location: register.php");
        exit;
    } elseif ($password !== $confirm_password) {
        $_SESSION['message'] = "Passwords do not match.";
        header("Location: register.php");
        exit;
    } else {
        // Check if the email already exists
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        if ($stmt === false) {
            $_SESSION['message'] = "Failed to prepare the SQL statement.";
            error_log('Prepare failed: ' . htmlspecialchars($conn->error));
            header("Location: ../register.php");
            exit;
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $_SESSION['message'] = "An account with this email already exists.";
            $stmt->close();
            header("Location: ../register.php");
            exit;
        } else {
            // Email does not exist, proceed to insert new user
            $stmt->close();

            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            if ($stmt === false) {
                $_SESSION['message'] = "Failed to prepare the SQL statement.";
                error_log('Prepare failed: ' . htmlspecialchars($conn->error));
                header("Location: ../register.php");
                exit;
            }

            $stmt->bind_param("sss", $name, $email, $hashed_password);

            if ($stmt->execute()) {
                // Registration successful
                $_SESSION['message'] = "Registration successful. You can now log in.";
                header("Location: ../login.php");
                exit;
            } else {
                $_SESSION['message'] = "Registration failed. Please try again.";
                error_log('Execute failed: ' . htmlspecialchars($stmt->error));
                header("Location: ../register.php");
                exit;
            }

            $stmt->close();
        }
    }
}

$conn->close();
?>
