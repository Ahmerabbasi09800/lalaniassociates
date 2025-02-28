<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'php_action/config.php';
session_start();

// Function to sanitize input data
function sanitize_input($data) {
    return htmlspecialchars(trim($data));
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    // Retrieve and sanitize form fields
    $pro_id = isset($_POST['pro_id']) ? intval($_POST['pro_id']) : null;

    $referrer = sanitize_input($_POST['referrer'] ?? 'Direct');
    $name = sanitize_input($_POST['name'] ?? '');
    $age = isset($_POST['age']) ? filter_var($_POST['age'], FILTER_SANITIZE_NUMBER_INT) : null;
    $education = sanitize_input($_POST['education'] ?? '');
    $occupation = sanitize_input($_POST['occupation'] ?? '');
    $number = sanitize_input($_POST['number'] ?? '');
    $city = sanitize_input($_POST['city'] ?? '');
    $no_of_child = isset($_POST['no_of_child']) ? filter_var($_POST['no_of_child'], FILTER_SANITIZE_NUMBER_INT) : null;
    $no_of_child_18 = isset($_POST['no_of_child_18']) ? filter_var($_POST['no_of_child_18'], FILTER_SANITIZE_NUMBER_INT) : null;
    $lead_source = sanitize_input($_POST['src'] ?? 'Website');
    
  // Validate required fields
if (empty($pro_id)) $errors[] = "No ID provided.";
if (empty($name)) $errors[] = "Name is required.";
if (empty($education)) $errors[] = "Education is required.";
if (empty($occupation)) $errors[] = "Occupation is required.";
if (empty($number)) {
    $errors[] = "Contact number is required.";
} elseif (!preg_match("/^\+?[0-9]{10,15}$/", $number)) {
    $errors[] = "Invalid contact number. It must be between 10 to 15 digits and contain only numbers.";
}

if ($age !== null && (!is_numeric($age) || $age < 0)) $errors[] = "Invalid age.";
if ($no_of_child !== null && $no_of_child < 0) $errors[] = "Invalid number of children.";
if ($no_of_child_18 !== null && $no_of_child_18 < 0) $errors[] = "Invalid number of children above 18.";
if ($no_of_child_18 !== null && $no_of_child !== null && $no_of_child_18 > $no_of_child) {
    $errors[] = "Number of children above 18 cannot exceed total number of children.";
}

// If errors exist, redirect back
if (!empty($errors)) {
    $_SESSION['error_message'] = implode("<br>", $errors);
    header("Location: ./form.php?id={$pro_id}");
    exit();
}


    // --- API Call to External CRM ---
    $url = 'https://crm.lalaniassociates.com/API/Create_Lead.php';

    $postdata = json_encode([
        'id' => $pro_id,
        'name' => $name,
        'countrycode' => '92',
        'mobile' => $number,
        'occupation' => $occupation,
        'education' => $education,
        'city' => $city,
        'no_of_children' => $no_of_child,
        'no_of_children_adult' => $no_of_child_18,
        'lead_source' => $lead_source,
        'Near_Office' => 'Karachi'
    ]);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type:application/json']);
    curl_setopt($ch, CURLOPT_POST, true);
    
    $response = curl_exec($ch);

    // Check for cURL errors
    if ($response === false) {
        error_log("cURL Error: " . curl_error($ch));
        $_SESSION['error_message'] = "Error while connecting to API. Please try again.";
        header("Location: ./form.php?id={$pro_id}");
        exit();
    }
    curl_close($ch);

    // --- Insert into Database ---
    $sql = "INSERT INTO sample_form (pro_id, user_location, name, age, eduction, occupation, number, city, no_of_child, no_child_18) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "isssssssss", $pro_id, $referrer, $name, $age, $education, $occupation, $number, $city, $no_of_child, $no_of_child_18);

        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['success_message'] = 'Form submitted successfully.';
            header("Location: thanku.php");
            exit();
        } else {
            error_log("SQL Error: " . mysqli_error($conn));
            $_SESSION['error_message'] = 'Database error. Please try again.';
            header("Location: ./form.php?id={$pro_id}");
            exit();
        }

        mysqli_stmt_close($stmt);
    } else {
        error_log("SQL Prepare Error: " . mysqli_error($conn));
        $_SESSION['error_message'] = 'Database error. Please try again.';
        header("Location: ./form.php?id={$pro_id}");
        exit();
    }

    mysqli_close($conn);
} else {
    header("Location: index.php");
    exit();
}
?>
