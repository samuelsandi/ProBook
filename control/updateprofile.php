<?php
    $db = new mysqli("localhost", "root", "");
    $db->query("USE probook;");

    $sql = "UPDATE user
            SET nama='".$_POST['name']."', alamat='".$_POST['address']."', telepon='".$_POST['phonenumber']."'
            WHERE username='".$_COOKIE['user']."';";
    $db->query($sql);
    if ($db->error) {
        die("Profile update failed. ".$db->error);
    }
    header("Location: ../profile.php");
?>