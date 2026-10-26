<?php

require_once "config.php";

$scope = "email,public_profile";

$login_url =

"&client_id=" . $facebook_app_id .
"&redirect_uri=" . urlencode($redirect_url) .
"&scope=" . urlencode($scope);

header("Location: " . $login_url);

exit();

?>