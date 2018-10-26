<!DOCTYPE html>
<html>
	<link rel="stylesheet" type="text/css" href="styles/register.css">
    
    <?php 

    $host="localhost";
    $user="root";
    $password="";

    $conn = new mysqli($host, $user, $password, 'probook');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    if (isset($_POST['reg'])) {
        $name=$_POST['name'];
        $uname=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $conpass=$_POST['password2'];
        $address=$_POST['address'];
        $phone_number=$_POST['phone_number'];

        if (($name != "")&&($uname != "")&&($email != "")&&($password != "")&&($conpass != "")&&($address != "")&&($phone_number != "")&&($password == $conpass)) {
            $sql = $conn->query("SELECT * from user where username='".$uname."' OR email='".$email."';");

            if(mysqli_num_rows($sql)==0){
                $sql="INSERT INTO user (username, password, nama, telepon, email, alamat) VALUES ('".$uname."', '".$password."', '".$name."', '".$phone_number."', '".$email."', '".$address."');";
                
                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                
                setcookie('user', $uname, time()+3600, '/');
                header("Location:search-book.php");
                die();
            }
            else{
                echo "<div style='color:red;'> Username or email has already taken.</div>";
            }
        }
        else{
            if (($name == "")||($uname == "")||($email == "")||($password == "")||($conpass == "")||($address == "")||($phone_number == "")) {
                echo "<div style='color:red;'> These forms cannot be empty.</div>";
            }
            else{
                echo "<div style='color:red;'> Wrong password confirmation.</div>";
            }

        }
    }

    ?>
    
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
                
                <input type="submit" value="REGISTER" name="reg" class="button-register"/>
             </form>
        </div>
	</body>
</html>