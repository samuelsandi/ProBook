<?php 

$host="localhost";
$user="root";
$password="";

$con = mysqli_connect($host, $user, $password);
mysqli_select_db($con, "wbd");

if (isset($_POST['username'])) {
    $uname=$_POST['username'];
    $password=$_POST['password'];

    if (($uname != "") && ($password != "")) {
        $sql= mysqli_query($con, "select * from loginform where username='".$uname."'AND password='".$password."' limit 1");

        if(mysqli_num_rows($sql)==1){
            echo " You Have Successfully Logged in";
            exit();
        }
        else{
            echo " You Have Entered Incorrect Password";
            exit();
        }
    }
}

?>

<!doctype HTML>
<html>
<head>
    <title> Login</title>
    <link rel="stylesheet" a href="styles/login.css">
</head>
<body>
    <div class="container">
        <h1>LOGIN</h1>
        <form method="POST" action="#">
            <div class="form-input">
                Username
                <input type="text" name="username" placeholder="Enter the User Name"/> 
            </div>
            <div class="form-input">
                Password
                <input type="password" name="password" placeholder="Enter your Password"/>
            </div>
            <div class="register">
                <a href="register.php">Don't have an account?</a><br><br>
            </div>
            <input type="submit" type="submit" value="LOGIN" class="button-login"/>
        </form>
    </div>
</body>
</html>