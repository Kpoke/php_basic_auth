<?php
session_start();
if (!empty($_POST['username']) and !empty($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $filename = "users.txt";
    $file =  fopen("users.txt", 'r');
    $size = filesize($filename);
    $filedata =  fread($file, $size);
    $users = explode("\n", $filedata);
    for ($x = 0; $x < count($users); $x++) {
        $user = json_decode($users[$x], true);
        if (isset($user)) {
            if ($user["username"] == $username and $user["password"] == $password) {
                $_SESSION["username"] = $username;
                header("Location: homepage.php");
                break;
                exit;
            }
        }
    }
    fclose($file);
    echo "Incorrect Credentials <br /> <br />
    <a href='/php_basic_auth/login.html'>Login</a>";
} else {
    echo "Fill in all Entries <br /> <br />
    <a href='/php_basic_auth/login.html'>Login</a>";
}
