<?php
    include('control/redirect.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="styles/header.css" />
    <link rel="stylesheet" href="styles/profile.css"/>
</head>
<body>
    <?php
        include('header.php');
    
        $host="localhost";
        $user="root";
        $password="";
        
        $con = new mysqli($host, $user, $password);
        $con->query("USE probook;");

        $uname = $_COOKIE['user'];
        $result = $con->query("SELECT * from user where username='".$uname."' ;");
        $row = $result->fetch_assoc();
    ?>

    <div class="container">
        <?php   
            echo '<img class="profilepict" src="data:picture/jpeg;base64,'.base64_encode( $row['picture'] ).'"/><br/>';
            echo $row["nama"];
        ?>
        <br/>
        <a href="editprofile.php"> <img id="editIcon" src="assets/edit.png"> </a>
    </div>
    

    <h1 id="pagetitle">My Profile</h1>

    <div class="container2">
        <img class="icon" src="assets/username.png"> Username 
        <div class="content">
            <?php
                echo $row["username"];
            ?>
        </div><br/>
        <img class="icon" src="assets/email.png"> Email 
        <div class="content">
            <?php
                echo $row["email"];
            ?>
        </div><br/>
        <img class="icon" src="assets/address.png"> Address 
        <div class="content">
            <?php
                echo $row["alamat"];
            ?>
        </div><br/>
        <img class="icon" src="assets/phone.png"> Phone Number
        <div class="content">
            <?php
                echo $row["telepon"];
            ?>
        </div><br/>
    </div>


</body>
</html>