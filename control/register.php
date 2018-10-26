<?php
    $name=$_POST['name'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $address=$_POST['address'];
    $phone_number=$_POST['phone_number'];
    $db = new mysqli("localhost", "root", "");
    $db->query("USE probook");
    if (($name != "")&&($uname != "")&&($email != "")&&($password != "")&&($conpass != "")&&($address != "")&&($phone_number != "")&&($password == $conpass)) {
        
        $result = $db->query("SELECT * from user where username='".$uname."' OR email='".$email."';");
        
        if ($result->num_rows == 0) {
            $db->query("INSERT INTO user ('username', 'password', 'nama', 'telepon', 'email', 'alamat') VALUES ('".$username."', '".$password."', '".$name."', '".$phone_number."', '".$email."', '".$address."';");
            setcookie("user", $username, time()+3600, '/');
            header('Location:search-book.php');
            die();
        } else {
            header('Location:register.php');
            die();
        }
    }
?>