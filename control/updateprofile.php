<?php
    $db = new mysqli("localhost", "root", "");
    $db->query("USE probook;");
        
    if (is_uploaded_file($_FILES["imgupload"]["tmp_name"])) {
        $image = $_FILES["imgupload"]["tmp_name"];
        $imgContent = addslashes(file_get_contents($image));
        $sql = "UPDATE user
            SET nama='".$_POST['name']."', alamat='".$_POST['address']."', telepon='".$_POST['phonenumber']."', picture='$imgContent'
            WHERE username='".$_COOKIE['user']."';";
    } 
    else {    
        $sql = "UPDATE user
                SET nama='".$_POST['name']."', alamat='".$_POST['address']."', telepon='".$_POST['phonenumber']."'
                WHERE username='".$_COOKIE['user']."';";
    }
    
    $db->query($sql);
    if ($db->error) {
        die("Profile update failed. ".$db->error);
    }

    header("Location: ../profile.php");
?>