<?php
    $target_dir = "../database-setup/uploads/";
    $target_file = $target_dir . basename($_FILES["imgupload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["imgupload"]["name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
    }

    if ($uploadOk == 0) {
    // if everything is ok, try to upload file
    } else {
        move_uploaded_file($_FILES["imgupload"]["name"], $target_file);
    }
    
    header("Location: ../editprofile.php");
?>