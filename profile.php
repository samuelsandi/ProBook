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
    <div class="container">
        <img class="profilepict" src="database-setup/pp1.jpg" ><br/>
        <a href="editprofile.php"> <img id="editIcon" src="assets/edit.png"> </a>
        Username
    </div>
    

    <h1 id="pagetitle">My Profile</h1>
    <div class="container2">
        <img class="icon" src="assets/username.png"> Username 
        <div class="content"> @test </div> <br/>
        <img class="icon" src="assets/email.png"> Email 
        <div class="content"> test@test.com </div> <br/>
        <img class="icon" src="assets/address.png"> Address 
        <div class="content"> X street </div> <br/>
        <img class="icon" src="assets/phone.png"> Phone Number
        <div class="content"> 081234567890 </div> <br/>
    </div>


</body>
</html>