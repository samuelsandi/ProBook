<?php 

$host="localhost";
$user="root";
$password="";

$con = new mysqli($host, $user, $password);
$con->query("USE probook;");

if (isset($_POST['username'])) {
    $name=$_POST['name'];
    $uname=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $conpass=$_POST['password2'];
    $address=$_POST['address'];
    $phone_number=$_POST['phone_number'];

    if (($name != "")&&($uname != "")&&($email != "")&&($password != "")&&($conpass != "")&&($address != "")&&($phone_number != "")&&($password = $conpass)) {
        $sql = $con->query("SELECT * from user where username='".$uname."' OR email='".$email."';");

        if(mysqli_num_rows($sql)==0){
            $sql = $con->query("INSERT INTO user ('username', 'password', 'nama', 'telepon', 'email', 'alamat') VALUES ('".$uname."', '".$password."', '".$name."', '".$phone_number."', '".$email."', '".$address."';");
            setcookie('user', $uname, 0, '/');
            header("Location:search-book.php");
            die();
        }
        else{
            echo "<div class='alert' style='color:red;'> Username or email has already taken. <div>";
        }
    }
    else{
        if (($name != "")&&($uname != "")&&($email != "")&&($password != "")&&($conpass != "")&&($address != "")&&($phone_number != "")) {
            echo "<div class='alert' style='margin:auto;color:red;'> These forms cannot be empty.   <div>";
        }
        else{
            echo "<div class='alert' style='color:red;'> Wrong password confirmation.   <div>";
        }
        
    }
}

?>

<!DOCTYPE html>
<html>
	<link rel="stylesheet" type="text/css" href="styles/register.css">
	<head>
		<title>Register</title>
	</head>
	
	<body>
        <div class="box">
            <h1>REGISTER</h1>
            <form method="POST" action="#">        
                <div class="row">
                    <div class="leftcolumn">
                        <br>Name
                    </div>
                    <div class="form-input">
                            <input type="text" name="name"><br>
                    </div>
                </div>

                <div class="row">
                    <div class="leftcolumn">
                        <br>Username
                    </div>
                    <div class="form-input">
                        <input type="text" name="username">
                    </div>
                </div>

                <div class="row">
                    <div class="leftcolumn">
                        <br>Email 
                    </div>
                    <div class="form-input">
                        <input type="text" name="email">
                    </div>
                </div>

                <div class="row">
                    <div class="leftcolumn">
                        <br>Password 
                    </div>
                    <div class="form-input">
                        <input type="password" name="password">
                    </div>
                </div>

                <div class="row">
                    <div class="leftcolumn">
                        <br>Confirm Password  
                    </div>
                    <div class="form-input">
                        <input type="password" name="password2">
                    </div>
                </div>

                <div class="row">
                    <div class="leftcolumn">
                        <br>Address  
                    </div>
                    <div class="form-input">
                        <input type="text" name="address">
                    </div>
                </div>

                <div class="row">
                    <div class="leftcolumn">
                        <br>Phone Number 
                    </div>
                    <div class="form-input">
                        <input type="text" name="phone_number">
                    </div>
                </div>
                
                <div class="login">
                    <br>
                    <a href="login.php">
                        Already have an account?
                    </a>
                    <br><br>
                </div>
                
                <input type="submit" type="submit" value="REGISTER" class="button-register"/>
             </form>
        </div>
	</body>
</html>