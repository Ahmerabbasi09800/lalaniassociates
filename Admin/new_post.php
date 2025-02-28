<?php
require '../vendor/autoload.php';
include 'php_action/config.php';

use Facebook\Facebook;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

session_start();

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $details = $_POST['details'];
    $news_date = $_POST['news_date'];

    $target_dir = "uploads/";
    $timestamp = time();
    $original_file_name = basename($_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir . $timestamp . "_" . $original_file_name;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check === false) {
        $_SESSION['error_message'] = "File is not an image.";
        $uploadOk = 0;
    }

    if (file_exists($target_file)) {
        $_SESSION['error_message'] = "Sorry, file already exists.";
        $uploadOk = 0;
    }

    if ($_FILES["fileToUpload"]["size"] > 10000000) {
        $_SESSION['error_message'] = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($imageFileType, $allowed_types)) {
        $_SESSION['error_message'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        header("Location: news.php");
        exit();
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $sql = "INSERT INTO `news`(`title`, `news_detail`, `news_image`, `news_date`) VALUES (?, ?, ?, ?)";
            if ($stmt = mysqli_prepare($conn, $sql)) {
                mysqli_stmt_bind_param($stmt, "ssss", $title, $details, $target_file, $news_date);

                if (mysqli_stmt_execute($stmt)) {
                    $_SESSION['success_message'] = 'News added successfully';
                    postToSocialMedia($title, $details, $target_file);
                    header("Location: news.php");
                    exit();
                } else {
                    $_SESSION['error_message'] = 'Oops! Something went wrong. Please try again later.';
                }

                mysqli_stmt_close($stmt);
            } else {
                $_SESSION['error_message'] = 'Oops! Something went wrong. Please try again later.';
            }
        } else {
            $_SESSION['error_message'] = "Sorry, there was an error uploading your file.";
        }
        header("Location: add_news.php");
        exit();
    }

    mysqli_close($conn);
} else {
    header("Location: add_news.php");
    exit();
}

function postToSocialMedia($title, $details, $imagePath) {
    $plainTextDetails = strip_tags($details);    
   postToFacebook($title, $plainTextDetails, $imagePath);
//     postToLinkedIn($title, $plainTextDetails, $imagePath);
    // postToInstagram($title, $plainTextDetails, $imagePath);
} 


function postToFacebook($title, $details, $imagePath, $accessToken = null) {
    $userAccessToken = $accessToken ?: 'EAAL5QA1ikcoBO8gMsgEay5FTFq3Jj5TE7zPGosrXVUinKBCerNfIkZC4ZBcUruMt0l3sUMsESHXvh3PMSWj2xKkZB4LS8n39BhfpkV2RlcEzdAwfop82rS4ZCY2m6en7CxBvZBVAqTNj64R8qMnrEKJi4YMIocziTM2P7Dbe5eFQEpRgBOLIGzQZDZD';
    $appSecret = '017a5aa4465ed525289be6f734a49dde';
    $appId = '1701760097230357';
    $pageId = '148867035208543';

    $fb = new Facebook([
        'app_id' => $appId,
        'app_secret' => $appSecret,
        'default_graph_version' => 'v10.0',
    ]);

    try {
        $response = $fb->get('/' . $pageId . '?fields=access_token', $userAccessToken);
        $pageAccessToken = $response->getDecodedBody()['access_token'];

        $data = [
            'message' => $title . "\n" . $details,
            'source' => $fb->fileToUpload($imagePath),
        ];
        $response = $fb->post('/' . $pageId . '/photos', $data, $pageAccessToken);
    } catch(\Facebook\Exceptions\FacebookResponseException $e) {
        if (strpos($e->getMessage(), 'Session has expired') !== false) {
            try {
                $newAccessToken = refreshAccessToken($appId, $appSecret, $userAccessToken);
                postToFacebook($title, $details, $imagePath, $newAccessToken);
            } catch (Exception $e) {
                error_log('Error refreshing access token: ' . $e->getMessage());
                echo 'Error refreshing access token: ' . $e->getMessage();
                exit;
            }
        } else {
            error_log('Graph returned an error: ' . $e->getMessage());
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        }
    } catch(\Facebook\Exceptions\FacebookSDKException $e) {
        error_log('Facebook SDK returned an error: ' . $e->getMessage());
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }
}

// function postToLinkedIn($title, $details, $imagePath) {
//     $client = new Client();
//     $accessToken = 'AQWfw4tUmQ6yER21eHj3UKz2gxS6L4mEXrWzPCBKqyNlPzCAcugv486-ueCxqWDpK4vF5sZAk-9bTYAv9OoqSwmybEnF-h69UwW9S_wznvdJu9x74iGp9mD0BoCKyDLLrwxAqnW-eskhttUzUGT26y4tdefbwiLzEP2IXzkMB0xcoZyRGt85eYZk2r2oNwXCNC8QlICgpdHKVMhk5IRCtA-jB2WykiRrrVP72bcsafdJ45rbVj3_ClLa11PxU9FQLqvASTeeGKyvx2y3kyY6bjYavXTpdyUAHRiOhhl_VeNM0shsCiccSpq1pSnC7FlB_vrmh5_kUJtN0J6wnhP-TI8ZzI07PA'; // Replace with your LinkedIn access token

//     // Upload the image to LinkedIn
//     $imageContent = file_get_contents($imagePath);
//     $uploadUrl = 'https://api.linkedin.com/v2/assets?action=registerUpload';

//     $registerUploadBody = [
//         'registerUploadRequest' => [
//             'recipes' => ['urn:li:digitalmediaRecipe:feedshare-image'],
//             'owner' => 'urn:li:person:8CiERQLfiR', // Replace with your LinkedIn URN
//             'serviceRelationships' => [
//                 [
//                     'relationshipType' => 'OWNER',
//                     'identifier' => 'urn:li:userGeneratedContent',
//                 ],
//             ],
//         ],
//     ];

//     try {
//         $response = $client->post($uploadUrl, [
//             'headers' => [
//                 'Authorization' => 'Bearer ' . $accessToken,
//                 'Content-Type' => 'application/json',
//                 'X-Restli-Protocol-Version' => '2.0.0',
//             ],
//             'json' => $registerUploadBody,
//         ]);

//         $uploadResponse = json_decode($response->getBody(), true);
//         $uploadUrl = $uploadResponse['value']['uploadMechanism']['com.linkedin.digitalmedia.uploading.MediaUploadHttpRequest']['uploadUrl'];
//         $asset = $uploadResponse['value']['asset'];

//         // Upload the image binary data
//         $client->post($uploadUrl, [
//             'headers' => [
//                 'Authorization' => 'Bearer ' . $accessToken,
//                 'Content-Type' => 'application/octet-stream',
//             ],
//             'body' => $imageContent,
//         ]);

//         // Create the post
//         $postUrl = 'https://api.linkedin.com/v2/ugcPosts';
//         $postBody = [
//             'author' => 'urn:li:person:8CiERQLfiR', // Replace with your LinkedIn URN
//             'lifecycleState' => 'PUBLISHED',
//             'specificContent' => [
//                 'com.linkedin.ugc.ShareContent' => [
//                     'shareCommentary' => [
//                         'text' => $title . "\n" . $details,
//                     ],
//                     'shareMediaCategory' => 'IMAGE',
//                     'media' => [
//                         [
//                             'status' => 'READY',
//                             'description' => [
//                                 'text' => $details,
//                             ],
//                             'media' => $asset,
//                             'title' => [
//                                 'text' => $title,
//                             ],
//                         ],
//                     ],
//                 ],
//             ],
//             'visibility' => [
//                 'com.linkedin.ugc.MemberNetworkVisibility' => 'PUBLIC',
//             ],
//         ];

//         $client->post($postUrl, [
//             'headers' => [
//                 'Authorization' => 'Bearer ' . $accessToken,
//                 'Content-Type' => 'application/json',
//                 'X-Restli-Protocol-Version' => '2.0.0',
//             ],
//             'json' => $postBody,
//         ]);
//     } catch (RequestException $e) {
//         error_log('LinkedIn API returned an error: ' . $e->getMessage());
//         echo 'LinkedIn API returned an error: ' . $e->getMessage();
//         exit;
//     }
// }

// function refreshAccessToken($appId, $appSecret, $longLivedAccessToken) {
//     $endpoint = "https://graph.facebook.com/oauth/access_token";
//     $params = [
//         'grant_type' => 'fb_exchange_token',
//         'client_id' => $appId,
//         'client_secret' => $appSecret,
//         'fb_exchange_token' => $longLivedAccessToken,
//     ];

//     $url = $endpoint . '?' . http_build_query($params);
//     $response = file_get_contents($url);
//     $responseData = json_decode($response, true);

//     if (isset($responseData['access_token'])) {
//         return $responseData['access_token'];
//     } else {
//         error_log("Failed to refresh access token. Response: " . json_encode($responseData));
//         throw new Exception("Failed to refresh access token. Response: " . json_encode($responseData));
//     }
// }

// function postToInstagram($title, $details, $imagePath) {
//     $accessToken = 'EAARpc3JVZAQwBOZCCXpvKkJGpD5LXmR221MMw5S8c1J0fB1zlfktqX0i1Ae2mZCqHVh5qqtDVTFAjMo4V4TwLmjThxpuJq8RgZB7Dy3MqOmvlSo8NkHZC4ZAM9lgF2roUb1cZBjCiho6YFJBO3m1RczQwG8ewZCzcUSddbOI3PQzC88mClfA5CGZCuSVtC3G4Ynj84hy43TmC';  // Replace with your new access token
//     $instagramBusinessAccountId = '7961717797184269';
    
//     $client = new Client();

//     try {
//         $response = $client->request('POST', 'https://graph.facebook.com/v12.0/' . $instagramBusinessAccountId . '/media', [
//             'multipart' => [
//                 [
//                     'name' => 'image',
//                     'contents' => fopen($imagePath, 'r'),
//                 ],
//                 [
//                     'name' => 'caption',
//                     'contents' => $title . "\n" . $details,
//                 ],
//                 [
//                     'name' => 'access_token',
//                     'contents' => $accessToken,
//                 ]
//             ],
//             'timeout' => 60, // Increase timeout
//             'connect_timeout' => 30, // Increase connection timeout
//         ]);
    
//         $responseBody = json_decode($response->getBody(), true);
//         $creationId = $responseBody['id'];
        
//         // Optional: Logging the successful post ID
//         error_log('Instagram post created with ID: ' . $creationId);

//         $_SESSION['success_message'] .= ' Instagram post was successful!';
//     } catch (RequestException $e) {
//         $errorMessage = ' Instagram post failed: ' . $e->getMessage();
//         if ($e->hasResponse()) {
//             $errorMessage .= ' Response: ' . $e->getResponse()->getBody();
//         }
        
//         // Optional: Logging the error message
//         error_log($errorMessage);

//         $_SESSION['error_message'] .= $errorMessage;
//     }
// }
?>
