<?php
require '../vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

if (isset($_GET['code'])) {
    try {
        $client = new Client();
        $response = $client->request('POST', 'https://www.linkedin.com/oauth/v2/accessToken', [
            'form_params' => [
                'grant_type' => 'authorization_code',
                'code' => $_GET['code'],
                'redirect_uri' => 'http://localhost/linkedin-auth/callback.php',
                'client_id' => '7745oa7244cqlf',
                'client_secret' => 'WPL_AP1.jU7U2ymlA0nkMd6H.d0E/QA=='
            ]
        ]);

        $data = json_decode($response->getBody()->getContents(), true);
        $accessToken = $data['AQU94tG5IWqdUh21-TSxbAHtSifyo7249ibU6LSVAmXbBBm5NoboIG332yiK-69EB0VUneZjK5QgJV_q4597kFXMm-wCXwgnsEw13DlrJz33UADP0VTFNhuw1piPxR_4T9KXnoj-9Bzsjkm8b5tgSq0nid1G7h0gSl7OC8HS8zgAXiuawzG_201EtBqdFM1M5PkFCxGrB5Qv-6MWZFWwnlwP_hdvC5sCs-WYvlnKTKehl-gZ-lmRKfI8As0nHRLKlawxlvS5HMCHKPdj39N01ozF4hqqOypMXpte5dkkrC8qDCS8c2nceiLDdNA4OIRhRrlG9yI7vkeDqjBTc0b9su2YwM0OxQ'];

        // Now use the access token to get the LinkedIn person URN
        $personURN = getLinkedInPersonURN($accessToken);
        echo "Your LinkedIn person URN is: " . $personURN;

    } catch (RequestException $e) {
        echo 'Request failed: ' . $e->getMessage();
    }
}

function getLinkedInPersonURN($accessToken) {
    $client = new Client();

    try {
        $response = $client->request('GET', 'https://api.linkedin.com/v2/me', [
            'headers' => [
                'Authorization' => "Bearer $accessToken",
                'Content-Type'  => 'application/json'
            ]
        ]);

        $data = json_decode($response->getBody()->getContents(), true);
        return $data['id']; // The 'id' field contains your LinkedIn person URN

    } catch (RequestException $e) {
        echo 'Request failed: ' . $e->getMessage();
    }
}
?>
<a href="https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id=7745oa7244cqlf&redirect_uri=http://localhost/linkedin-auth/callback.php&scope=w_member_social">
  Authorize LinkedIn
</a>
