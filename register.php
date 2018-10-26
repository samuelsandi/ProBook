<!DOCTYPE html>
<html>
	<link rel="stylesheet" type="text/css" href="styles/register.css">
    <script src="scripts/validate.js"></script>
    
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
            if((strlen($phone_number)>=9)&&(strlen($phone_number)<=12)){
                if(strlen($uname)<=20){
                    $sql = $conn->query("SELECT * from user where username='".$uname."' OR email='".$email."';");
                    if(mysqli_num_rows($sql)==0){
                        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
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
                            echo "<div style='color:red;'> Wrong email address.</div>";
                        }
                    }
                    else{
                        echo "<div style='color:red;'> Username or email has already taken.</div>";
                    }  
                }
                else{
                    echo "<div style='color:red;'> Maximum length of username is 20 characters.</div>";
                }
            }
            else{
                echo "<div style='color:red;'> Phone number must be 9-12 numbers.</div>";
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
            <form method="POST" action="#" name="bigform">        
                <div class="row">
                    <div class="leftcolumn">
                        <br>Name &nbsp;&nbsp;  
                    </div>
                    <div class="form-input">
                            <input type="text" name="name"><br>
                    </div>
                </div>

                <div class="row">
                    <div class="leftcolumn">
                        <br>Username &nbsp;&nbsp;  
                    </div>
                    <div class="form-input">
                        <input type="text" name="username" style="width:170px" align="right" onkeyup="validateUsername(this.value)">
                        <div class="check" id="uncon"> 
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="leftcolumn">
                        <br>Email &nbsp;&nbsp;  
                    </div>
                    <div class="form-input">
                        <input type="text" name="email" style="width:170px" align="right" onkeyup="validateEmail(this.value)">
                        <div class="check" id="emcon">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="leftcolumn">
                        <br>Password &nbsp;&nbsp; 
                    </div>
                    <div class="form-input">
                        <input type="password" name="password">
                    </div>
                </div>

                <div class="row">
                    <div class="leftcolumn">
                        <br>Confirm Password &nbsp;&nbsp;  
                    </div>
                    <div class="form-input">
                        <input type="password" name="password2">
                    </div>
                </div>

                <div class="row">
                    <div class="leftcolumn">
                        <br>Address &nbsp;&nbsp;  
                    </div>
                    <div class="form-input">
                        <textarea name="address" 
                        style="width:200px;height:70px;"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="leftcolumn">
                        <br>Phone Number &nbsp;&nbsp; 
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