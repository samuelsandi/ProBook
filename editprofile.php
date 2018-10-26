<?php
    include('control/redirect.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="styles/header.css" />
    <link rel="stylesheet" href="styles/profile.css"/>
    <script src='scripts/search.js'></script>
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
    
    <script 
        src="scripts/preview.js">
    </script>

    <h1 id="pagetitle">Edit Profile</h1>
    <div class="container3">
        <div class="row">
            <div class="column left">
                <?php   
                    echo '<img id="output_image" class="ppEdit" src="data:picture/jpeg;base64,'.base64_encode( $row['picture'] ).'"/>';
                ?>
                Name <br/><br/>
                Address <br/><br/><br/><br/><br/>
                Phone Number <br/><br/><br/><br/>
        
                <a class="button back" href="profile.php" style="text-decoration: none"> Back </a>
            </div>
            <div class="column right"><br/><br/>
                Update profile picture<br/>
                <form name='profile' action="control/updateprofile.php" method="POST" enctype="multipart/form-data" onsubmit="var x = validateForm('profile', ['name', 'address', 'phonenumber']);return x;">
                    <div>
                        <input id='imagename' type="text" name="imgaddress" style="margin-bottom:125px"/>
                        <input id='imageup' type="file" name="imgupload" accept="image/*" onchange="preview_image(event)">
                    </div>
                    <input type="text" name="name" value="<?php echo $row['nama'] ?>" placeholder="Enter your name" style="margin-bottom:15px"/> <br/>
                    <textarea name="address" placeholder="Enter your address" class="address"/><?php echo $row['alamat']?></textarea> <br/>
                    <input type="text" name="phonenumber" value="<?php echo $row['telepon']?>" placeholder="Enter your phone number" style="margin-bottom:60px"/> <br/>

                    <input class="button save" type="submit" style="text-decoration: none" value="Save" name="submit">
                </form>
            </div>
        </div>
    </div>
</body>
</html>