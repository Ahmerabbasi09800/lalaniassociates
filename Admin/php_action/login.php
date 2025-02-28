<?php
session_start();
include 'config.php' ;

if (isset($_POST['submit'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($email) || empty($password)) {
        echo "Please fill out all fields.";
    } else {
        $stmt = $conn->prepare("SELECT id, email, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $email, $hashed_password);
            $stmt->fetch();
            
            if (password_verify($password, $hashed_password)) {
                // Password is correct
                $_SESSION['user_id'] = $id;
                $_SESSION['email'] = $email;
                header("Location: ../index.php");
            } else {
                // Password is incorrect
                $_SESSION['message'] = "Invalid email or password.";
                header("Location: ../login.php");
            }
        } else {
            $_SESSION['message'] = "Invalid email or password.";
            header("Location: ../login.php");
        }
        
        $stmt->close();
    }
}

$conn->close();
?>
