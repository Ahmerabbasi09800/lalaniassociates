<?php
// Include the autoloader
require '../vendor/autoload.php';

// Your database connection and session code here
include 'php_action/config.php';

use Facebook\Facebook;
// use LinkedIn\Scope;

session_start();

if (isset($_POST['submit'])) {
    // Form was submitted
    $title = $_POST['title'];
    $details = $_POST['details'];
    $news_date = $_POST['news_date'];

    $target_dir = "uploads/";
    $timestamp = time(); // Generate a timestamp
    $original_file_name = basename($_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir . $timestamp . "_" . $original_file_name;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check === false) {
        $_SESSION['error_message'] = "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $_SESSION['error_message'] = "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size (5MB limit)
    if ($_FILES["fileToUpload"]["size"] > 10000000) {
        $_SESSION['error_message'] = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($imageFileType, $allowed_types)) {
        $_SESSION['error_message'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        header("Location: news.php");
        exit();
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            // Prepare an insert statement
            $sql = "INSERT INTO `news`(`title`, `news_detail`, `news_image`, `news_date`) VALUES (?, ?, ?, ?)";
            if ($stmt = mysqli_prepare($conn, $sql)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "ssss", $title, $details, $target_file, $news_date);

                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    // Set a success message in the session
                    $_SESSION['success_message'] = 'News added successfully';

                    // Post to social media
                    postToSocialMedia($title, $details, $target_file);

                    // Redirect to the news.php page
                    header("Location: news.php");
                    exit();
                } else {
                    // Error handling if execution fails
                    $_SESSION['error_message'] = 'Oops! Something went wrong. Please try again later.';
                }

                // Close the statement
                mysqli_stmt_close($stmt);
            } else {
                // Error handling for prepare statement failure
                $_SESSION['error_message'] = 'Oops! Something went wrong. Please try again later.';
            }
        } else {
            $_SESSION['error_message'] = "Sorry, there was an error uploading your file.";
        }
        header("Location: add_news.php");
        exit();
    }

    // Close the connection
    mysqli_close($conn);
} else {
    // Redirect to the add_news.php page if form wasn't submitted
    header("Location: add_news.php");
    exit();
}

// Function to post to social media platforms
function postToSocialMedia($title, $details, $imagePath) {
    // Strip HTML tags from details
    $plainTextDetails = strip_tags($details);
    // $plainTextDetails2 = strip_tags($details);
    postToFacebook($title, $plainTextDetails, $imagePath);
    // postToLinkedIn($title, $plainTextDetails2, $imagePath);
}

function postToFacebook($title, $details, $imagePath, $accessToken = null) {
    // Your Facebook API credentials
    $userAccessToken = $accessToken ?: 'EAARpc3JVZAQwBO70T7WyivTe1ZA0WHpftDx7O8VWCgBOebAoU7JaBsTdzZB4H179V5jvC7CqZBvl8mzFe5FZCzlQilZA5u2z72gemkJJn5qdi3noc0s5zxXf634dHr4cnzMwgUZBwUKWTg9Fld1VdOZClaeQmMPVLxZCpj8THG9WTF05bSasgu5DPMWsEoxjdrwNPM0xRFVEtD4HOenerVQZDZD';
    $appSecret = 'b2c2ab707838adc36d2689aabc5b31d3';
    $appId = '1241844467197196';
    $pageId = '112981160536251';

    $fb = new Facebook([
        'app_id' => $appId,
        'app_secret' => $appSecret,
        'default_graph_version' => 'v10.0',
    ]);

    try {
        // Get the page access token
        $response = $fb->get('/' . $pageId . '?fields=access_token', $userAccessToken);
        $pageAccessToken = $response->getDecodedBody()['access_token'];

        $data = [
            'message' => $title . "\n" . $details,
            'source' => $fb->fileToUpload($imagePath),
        ];
        $response = $fb->post('/' . $pageId . '/photos', $data, $pageAccessToken);
    } catch(\Facebook\Exceptions\FacebookResponseException $e) {
        // Check for expired token error and refresh token if necessary
        if (strpos($e->getMessage(), 'Session has expired') !== false) {
            $newAccessToken = refreshAccessToken($appId, $appSecret, $userAccessToken);
            postToFacebook($title, $details, $imagePath, $newAccessToken);
        } else {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        }
    } catch(\Facebook\Exceptions\FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }
}

function refreshAccessToken($appId, $appSecret, $longLivedAccessToken) {
    $endpoint = "https://graph.facebook.com/oauth/access_token";
    $params = [
        'grant_type' => 'fb_exchange_token',
        'client_id' => $appId,
        'client_secret' => $appSecret,
        'fb_exchange_token' => $longLivedAccessToken,
    ];

    $url = $endpoint . '?' . http_build_query($params);
    $response = file_get_contents($url);
    $responseData = json_decode($response, true);

    if (isset($responseData['access_token'])) {
        return $responseData['access_token'];
    } else {
        throw new Exception("Failed to refresh access token. Response: " . json_encode($responseData));
    }
}

// function postToLinkedIn($title, $details, $imagePath) {
//     // Your LinkedIn API credentials
//     $client = new Client('7745oa7244cqlf', 'WPL_AP1.jU7U2ymlA0nkMd6H.d0E/QA==');
//     $client->setAccessToken('YOUR_ACCESS_TOKEN');

//     $imageContent = file_get_contents($imagePath);
//     $uploadResponse = $client->upload(
//         'ugcPosts',
//         json_encode([
//             'author' => 'urn:li:person:YOUR_PERSON_ID',
//             'lifecycleState' => 'PUBLISHED',
//             'specificContent' => [
//                 'com.linkedin.ugc.ShareContent' => [
//                     'shareCommentary' => [
//                         'text' => $title . "\n" . $details
//                     ],
//                     'shareMediaCategory' => 'IMAGE',
//                     'media' => [
//                         [
//                             'status' => 'READY',
//                             'description' => [
//                                 'text' => $title
//                             ],
//                             'originalUrl' => 'https://example.com/images/' . basename($imagePath),
//                             'title' => [
//                                 'text' => $title
//                             ]
//                         ]
//                     ]
//                 ]
//             ],
//             'visibility' => [
//                 'com.linkedin.ugc.MemberNetworkVisibility' => 'PUBLIC'
//             ]
//         ]),
//         $imageContent
//     );
// }
?>
