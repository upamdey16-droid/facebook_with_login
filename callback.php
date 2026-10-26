<?php

require_once "config.php";

if (!isset($_GET['code'])) {
    die("Facebook login failed.");
}

$code = $_GET['code'];

$token_url =
"https://graph.facebook.com/v24.0/oauth/access_token?" .
"client_id=" . $facebook_app_id .
"&redirect_uri=" . urlencode($redirect_url) .
"&client_secret=" . $facebook_app_secret .
"&code=" . urlencode($code);

$response = file_get_contents($token_url);

$data = json_decode($response, true);

if (!isset($data['access_token'])) {
    die("Could not get access token.");
}

$access_token = $data['access_token'];


/* Get Facebook user information */

$user_url =
"https://graph.facebook.com/me?" .
"fields=id,name,email" .
"&access_token=" . urlencode($access_token);

$user_response = file_get_contents($user_url);

$user = json_decode($user_response, true);

if (!isset($user['id'])) {
    die("Could not get user information.");
}


/* Create PHP session */

$_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['name'];

if (isset($user['email'])) {
    $_SESSION['user_email'] = $user['email'];
} else {
    $_SESSION['user_email'] = "Email not available";
}

header("Location: index.php");
exit();

?>