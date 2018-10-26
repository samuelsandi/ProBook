<?php 

$host="localhost";
$user="root";
$password="";

$con = new mysqli($host, $user, $password);
$con->query("USE probook;");

if (isset($_POST['username'])) {
    $uname=$_POST['username'];
    $password=$_POST['password'];

    if (($uname != "") && ($password != "")) {
        $sql = $con->query("SELECT * from user where username='".$uname."' AND password='".$password."';");

        if(mysqli_num_rows($sql)==1){
            setcookie('user', $uname, 0, '/');
            header("Location:search-book.php");
            die();
        }
        else{
            echo "<div class='alert' style='text-align:center;background-color:red;color:white;padding:10pt;'> You Have Entered Incorrect Username or Password </div>";
            unset($_POST['username']);
            unset($_POST['password']);
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
    <div class="box">
        <h1>LOGIN</h1>
        <form method="POST" action="login.php">
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
            <input type="submit" value="LOGIN" class="button-login"/>
        </form>
    </div>
</body>
</html>