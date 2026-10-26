<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Facebook Login</title>
</head>
<body>

<h2>Login System</h2>

<?php

if (isset($_SESSION['user_name'])) {

    echo "<h3>Welcome, " . htmlspecialchars($_SESSION['user_name']) . "</h3>";
    echo "<p>Email: " . htmlspecialchars($_SESSION['user_email']) . "</p>";
    echo "<a href='logout.php'>Logout</a>";

} else {

    echo "<a href='login.php'>
            <button>Login with Facebook</button>
          </a>";
}

?>

</body>
</html>