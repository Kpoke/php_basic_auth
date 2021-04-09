<?php
session_start();
if (!empty($_POST['username']) and !empty($_POST['email']) and !empty($_POST['password'])) {
    $newUser = ["username" => $_POST['username'], "email" => $_POST['email'], "password" => $_POST['password']];
    $file =  fopen("users.txt", 'a');
    fwrite($file, json_encode($newUser) . "\n");
    fclose($file);
    $_SESSION["username"] = $_POST['username'];
    header("Location: homepage.php");
    exit;
} else {
    echo "Fill in all Entries <br /> <br /> <a href='/php_basic_auth/register.html'>Register</a>";
}
