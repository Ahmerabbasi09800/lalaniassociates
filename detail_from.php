<?php
// Include your database connection configuration file
include 'php_action/config.php';

// Start the session
session_start();

$target_dir = "Admin/uploads/";
$uploadOk = 1;
$target_file = null; // Default value if no file is uploaded

if (!empty($_FILES["fileToUpload"]["name"])) {
    // Get the original file name without extension
    $original_file_name = pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_FILENAME);
    // Get the file extension
    $fileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));

    // Append timestamp to the file name
    $new_file_name = $original_file_name . '_' . time() . '.' . $fileType;
    // Set the target file path
    $target_file = $target_dir . basename($new_file_name);

    // Check file type and size
    if (in_array($fileType, ["png", "jpeg", "jpg", "pdf", "doc", "docx"])) {
        if (in_array($fileType, ["png", "jpeg", "jpg"])) {
            // Check if image file is an actual image or fake image
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check === false) {
                $_SESSION['error_message'] = "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 2000000) {
            $_SESSION['error_message'] = "Sorry, your file is too large.";
            $uploadOk = 0;
        }
    } else {
        $_SESSION['error_message'] = "Sorry, only PNG, JPEG, JPG, PDF, DOC, and DOCX files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk && !move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $_SESSION['error_message'] = "Sorry, there was an error uploading your file.";
        $uploadOk = 0;
    }
}
//var_dump($_POST);
// If the form is submitted and $uploadOk is true or file upload is optional
if (isset($_POST["submit"]) && $uploadOk) {
    // Ensure date fields are properly formatted or set to null if empty
    $title = !empty($_POST['title']) ? $_POST['title'] : null;
    $email = !empty($_POST['email']) ? $_POST['email'] : null;
    $city = !empty($_POST['city']) ? $_POST['city'] : null;
    $state = !empty($_POST['state']) ? $_POST['state'] : null;
    $country1 = !empty($_POST['country1']) ? $_POST['country1'] : null;
    $nationality = !empty($_POST['nationality']) ? $_POST['nationality'] : null;
    $p_name = !empty($_POST['p_name']) ? $_POST['p_name'] : null;
    $uni = !empty($_POST['uni']) ? $_POST['uni'] : null;
    $country2 = !empty($_POST['country2']) ? $_POST['country2'] : null;
    $n_of_org = !empty($_POST['n_of_org']) ? $_POST['n_of_org'] : null;
    $job_title = !empty($_POST['job_title']) ? $_POST['job_title'] : null;
    $employment_status = !empty($_POST['employment_status']) ? $_POST['employment_status'] : null;
    $program_complete = !empty($_POST['program_complete']) ? $_POST['program_complete'] : null;
    $test = !empty($_POST['test']) ? $_POST['test'] : null;
    $eng_speaking = !empty($_POST['eng_speaking']) ? $_POST['eng_speaking'] : null;
    $eng_writing = !empty($_POST['eng_writing']) ? $_POST['eng_writing'] : null;
    $eng_reading = !empty($_POST['eng_reading']) ? $_POST['eng_reading'] : null;
    $eng_listening = !empty($_POST['eng_listening']) ? $_POST['eng_listening'] : null;
    $fre_speaking = !empty($_POST['fre_speaking']) ? $_POST['fre_speaking'] : null;
    $fre_writing = !empty($_POST['fre_writing']) ? $_POST['fre_writing'] : null;
    $fre_reading = !empty($_POST['fre_reading']) ? $_POST['fre_reading'] : null;
    $fre_listening = !empty($_POST['fre_listening']) ? $_POST['fre_listening'] : null;
    $relatives = !empty($_POST['relatives']) ? $_POST['relatives'] : null;
    $relationship = !empty($_POST['relationship']) ? $_POST['relationship'] : null;
    $province = !empty($_POST['province']) ? $_POST['province'] : null;
    $legal_status = !empty($_POST['legal_status']) ? $_POST['legal_status'] : null;
    $about_us = !empty($_POST['about_us']) ? $_POST['about_us'] : null;

    $program_Start = !empty($_POST['program_Start']) ? date('Y-m-d', strtotime($_POST['program_Start'])) : null;
    $program_completion = !empty($_POST['program_completion']) ? date('Y-m-d', strtotime($_POST['program_completion'])) : null;
    $job_from = !empty($_POST['job_from']) ? date('Y-m-d', strtotime($_POST['job_from'])) : null;
    $job_to = !empty($_POST['job_to']) ? date('Y-m-d', strtotime($_POST['job_to'])) : null;

    $pro_id = $_POST['pro_id'];
    $referer = $_POST['referrer'];
    $name = $_POST['name'];
    $DOB = $_POST['dob'];
    $number = $_POST['number'];
    $Edu_Level = $_POST['level_of_edu'];
    $prog_duration = isset($_POST['program_duration']) ? $_POST['program_duration'] : "Default Duration";

    $no_of_child = 0;
    $no_of_child_18 = 0;
    $lead_source = $_POST['src'] ?? "Default Source";



    // Addition by SAK - Start

    // Define the URL and data 
    $url = 'https://crm.lalaniassociates.com/API/Create_Lead.php';


    $postdata = json_encode(array(
        'id' => $pro_id,
        'name' => $name,
        'countrycode' => '92',
        'mobile' => $number,
        'occupation' => $job_title,
        'education' => $Edu_Level,
        'city' => $city,
        'relative_canada' => $relatives,
        'relative_canada_residence' => $province,
        'relative_status' => $legal_status,
        'no_of_children' => $no_of_child,
        'no_of_children_adult' => $no_of_child_18,
        'lead_source' => $lead_source,
        'Near_Office' => 'Karachi'

    ));


    // Initialize cURL session 
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    curl_setopt($ch, CURLOPT_POST, true);


    // Set cURL options 
//curl_setopt($ch, CURLOPT_URL, $url); 
//curl_setopt($ch, CURLOPT_POST, 1); 
//curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data)); 
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 

    // Execute cURL session 
    $response = curl_exec($ch);

    // Check for cURL errors 
    if ($response === false) {
        die('Error occurred while fetching the data: '
            . curl_error($ch));
    }

    // Close cURL session 
    curl_close($ch);

    // Display the response 
//echo $response; 


    // Addition by SAK - ENDS



    // Prepare an insert statement
    $sql = "INSERT INTO detail_form (pro_id, user_location, title, name, dob, email, number, city, state, country1, nationality, level_of_edu, p_name, uni, 
        country2, program_Start, program_completion, program_duration, n_of_org, job_title, job_from, job_to, employment_status, 
        program_complete, upload_resume, test, eng_speaking, eng_writing, eng_reading, eng_listening, fre_speaking, fre_writing, fre_reading, fre_listening, 
        relatives, relationship, province, legal_status, about_us) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param(
            $stmt,
            "sssssssssssssssssssssssssssssssssssssss",
            $_POST['pro_id'],
            $_POST['referrer'],
            $title,
            $_POST['name'],
            $_POST['dob'],
            $email,
            $_POST['number'],
            $city,
            $state,
            $country1,
            $nationality,
            $_POST['level_of_edu'],
            $p_name,
            $uni,
            $country2,
            $program_Start,
            $program_completion,
            $prog_duration,
            $n_of_org,
            $job_title,
            $job_from,
            $job_to,
            $employment_status,
            $program_complete,
            $target_file,
            $test,
            $eng_speaking,
            $eng_writing,
            $eng_reading,
            $eng_listening,
            $fre_speaking,
            $fre_writing,
            $fre_reading,
            $fre_listening,
            $relatives,
            $relationship,
            $province,
            $legal_status,
            $about_us
        );

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Set a success message in the session
            $_SESSION['success_message'] = 'Form submitted successfully';
            echo 'form submitted succfessfully';
            // Redirect to the thank you page
            header("Location: thanku.php");
            // exit();
        } else {
            // Error handling if execution fails
            $_SESSION['error_message'] = 'Oops! Something went wrong. Please try again later.';
            header("Location: /form/2/" . $_POST['pro_id']);
            // exit();
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // Error handling for prepare statement failure
        $_SESSION['error_message'] = 'Oops! Something went wrong. Please try again later.';
        header("Location: /form/2/" . $_POST['pro_id']);
        // exit();
    }
}

// Close the connection
mysqli_close($conn);
?>