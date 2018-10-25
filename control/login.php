<?php
    $username = $_POST['user'];
    $password = $_POST['password'];
    $db = new mysqli("localhost", "root", "");
    $db->query("USE probook");
    $result = $db->query("SELECT username, password FROM user WHERE username='$username' AND password='$password';");
    if ($result->num_rows == 1) {
        setcookie("user", $username, time()+3600, '/');
        header('Location:search-book.php');
        die();
    } else {
        header('Location:login.php');
        die();
    }
?>