<?php
session_start()
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>

<body>
    <?php
    if (!empty($_SESSION["username"])) {
        echo "Welcome " . $_SESSION["username"];
        echo "<br/>
                <br/>
                <br/>
                <a href='./logout.php'>Logout</a>
                <a href='./reset.html'>Reset Password</a>";
    } else {
        echo "<br />
                <a href='/php_basic_auth/register.html'>Register</a>
                <br />
                <a href='/php_basic_auth/login.html'>Login</a>";
    }

    ?>

</body>

</html>