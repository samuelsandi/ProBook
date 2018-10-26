<?php
    $email = $_REQUEST["q"];

    $db = new mysqli('localhost', 'root', '', 'probook');

    $sql = $db->query("SELECT email FROM user WHERE email='".$email."'");

    if ((mysqli_num_rows($sql)==0)&&(filter_var($email, FILTER_VALIDATE_EMAIL))) {
        echo "<br><img src=\"assets/check.png\" width=\"15px\" height=\"15px\">";
        die();
    }
    else{
        echo "<br><img src=\"assets/cross.jpg\" width=\"15px\" height=\"15px\">";
        die();
    }

    mysqli_close($db);
    
/*

    $name=$_POST['name'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $conpass=$_POST['password2'];
    $address=$_POST['address'];
    $phone_number=$_POST['phone_number'];
    $db = new mysqli("localhost", "root", "");
    $db->query("USE probook");

    if (isset($_POST['reg'])){
        
        var_dump($name);
        var_dump($username);
        var_dump($email);
        var_dump($password);
        var_dump($address);
        var_dump($phone_number);
        
        if (($name != "")&&($username != "")&&($email != "")&&($password != "")&&($conpass != "")&&($address != "")&&($phone_number != "")&&($password == $conpass)) {

            $result = $db->query("SELECT * from user where username='".$username."' OR email='".$email."';");

            if ($result->num_rows == 0) {
                $sql="INSERT INTO user ('username', 'password', 'nama', 'telepon', 'email', 'alamat') VALUES ('".$username."', '".$password."', '".$name."', '".$phone_number."', '".$email."', '".$address."';";
                $result=mysqli_query($db,$sql);
                setcookie("username", $username, time()+3600, '/');
                header('Location: ../search-book.php');
                die();
            } else {
                header('Location: ../register.php');
                die();
            }
        }
    }*/
?>