<?php

// Retrieve the content from the request
$requestData = json_decode(file_get_contents('php://input'), true);
$content = $requestData['content'];

// Define the API endpoint
$apiEndpoint = 'https://api.example.com/';

// Set up cURL
$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => $apiEndpoint,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => http_build_query([
        'content' => $content,
        'api_key' => 'v6kkqb5orllxs7493kox9b7wifsiyz1gbgfhz59f1q3glmjm'
    ]),
]);

// Execute the request
$response = curl_exec($curl);
$httpStatus = curl_getinfo($curl, CURLINFO_HTTP_CODE);

// Check for errors
if ($httpStatus !== 200) {
    // Handle error (e.g., log it, return an error response)
    http_response_code($httpStatus);
    echo "Error: " . curl_error($curl);
} else {
    // Return the response from the API
    echo $response;
}

// Close cURL resource
curl_close($curl);
