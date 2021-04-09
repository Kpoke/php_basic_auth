<?php
session_start();
if (!empty($_POST['new_password']) and !empty($_POST['confirm_new_password'])) {
    $new_password = $_POST['new_password'];
    $confirm_new_password = $_POST['confirm_new_password'];
    if ($new_password == $confirm_new_password) {
        $filename = "users.txt";
        $file =  fopen("users.txt", 'r');
        $size = filesize($filename);
        $filedata =  fread($file, $size);
        $users = explode("\n", $filedata);
        for ($x = 0; $x < count($users); $x++) {
            $user = json_decode($users[$x], true);
            if (isset($user)) {
                if ($user["username"] ==  $_SESSION["username"]) {
                    $user['password'] = $new_password;
                    $users[$x] = json_encode($user);
                    break;
                }
            }
        }
        fclose($file);
        file_put_contents($filename, implode("\n", $users));
        echo "Password changed successfully <br /> <br />
                            <a href='./homepage.php'>Home</a>";
        print_r($users);
    } else {
        echo "Passwords do not match <br /> <br />
        <a href='./homepage.php'>Home</a>";
    }
} else {
    echo "Fill in all Entries <br /> <br />
    <a href='./homepage.php'>Home</a>";
}
