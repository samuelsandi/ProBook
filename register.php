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