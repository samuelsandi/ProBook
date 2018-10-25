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

    <h1 id="pagetitle">Edit Profile</h1>
    <div class="container3">
        <div class="row">
            <div class="column left">
                <img class="ppEdit" src="database-setup/pp1.jpg" > <br/><br/>
                Name <br/><br/>
                Address <br/><br/><br/><br/><br/>
                Phone Number 
        
                <a class="button back" href="profile.php" style="text-decoration: none"> Back </a>
            </div>
            <div class="column right"><br/><br/>
                Update profile picture<br/>
                <input type="text" name="pictLocation" placeholder="Enter file location"/>
                <button id="files" onclick="document.getElementById('file').click(); return false;"> Browse... </button>
                <input type="file" id="file"  style="visibility:hidden; margin-bottom:130px">

                <input type="text" name="name" placeholder="Enter your name" style="margin-bottom:15px"/> <br/>
                <input type="text" name="address" placeholder="Enter your address" style="height:100px; margin-bottom:15px"/> <br/>
                <input type="text" name="phonenumber" placeholder="Enter your phone number"/>

                <a class="button save" href="test.php" style="text-decoration: none"> Save </a>
            </div>
        </div>
    </div>

</body>
</html>