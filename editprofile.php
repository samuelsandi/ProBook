<?php
    include('control/redirect.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="styles/header.css" />
    <link rel="stylesheet" href="styles/profile.css"/>
    <style> 
        #profile {
            background-color: rgb(242,102,0);
        }
    </style>
</head>
<body>
    <?php
        include('header.php');
    ?>

    <?php
        $host="localhost";
        $user="root";
        $password="";
        
        $con = new mysqli($host, $user, $password);
        $con->query("USE probook;");

        $uname = $_COOKIE['user'];
        $result = $con->query("SELECT * from user where username='".$uname."' ;");
        $row = $result->fetch_assoc();
    ?>

    <h1 id="pagetitle">Edit Profile</h1>
    <div class="container3">
        <div class="row">
            <div class="column left">
                <?php   
                    echo '<img class="ppEdit" src="data:picture/jpeg;base64,'.base64_encode( $row['picture'] ).'"/>';
                ?>
                Name <br/><br/>
                Address <br/><br/><br/><br/><br/>
                Phone Number <br/><br/><br/><br/>
        
                <a class="button back" href="profile.php" style="text-decoration: none"> Back </a>
            </div>
            <div class="column right"><br/><br/>
                Update profile picture<br/>
                <form action="control/updateprofile.php" method="POST">
                <input type="text" name="pictLocation" placeholder="Enter file location"/>
                <button id="files" onclick="document.getElementById('file').click(); return false;"> Browse... </button>
                <input type="file" id="file"  style="visibility:hidden; margin-bottom:130px">
                <input type="text" name="name" value="<?php echo $row['nama'] ?>" placeholder="Enter your name" style="margin-bottom:15px"/> <br/>
                <input type="text" name="address" value="<?php echo $row['alamat']?>" placeholder="Enter your address" style="height:100px; margin-bottom:15px"/> <br/>
                <input type="text" name="phonenumber" value="<?php echo $row['telepon']?>" placeholder="Enter your phone number" style="margin-bottom:60px"/> <br/>

                <input class="button save" type="submit" style="text-decoration: none" value="Save">
                </form>
            </div>
        </div>
    </div>

</body>
</html>