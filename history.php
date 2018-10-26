<?php
    include("control/redirect.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>History</title>
    <link rel="stylesheet" href="styles/header.css" />
    <link rel="stylesheet" href="styles/page.css" />
    <link rel="stylesheet" href="styles/history.css"/>

</head>
<body>
    <?php   
        $server = "localhost";
        $user = "root";
        $pass = "";

        include('header.php');    
        echo "<article>";
        echo "<section>";
        echo '<h1 class="pagetitle"> History </h1>';

        // access database
        $db = new mysqli($server, $user, $pass);
        if ($db->connect_error) {
            die("Connection error<br>".$db->connect_error);
        }
        $db->query("USE probook;");

        $uname = $_COOKIE['user'];
        $sql = "SELECT * FROM transaksi NATURAL JOIN buku WHERE username='$uname' ORDER BY tanggal DESC;";
        $res = $db->query($sql);
        if ($db->error) echo "Error " . $db->error;
        $count = $res->num_rows;
        if ($count == 0){
            echo '<section>Your history is empty</section>';
        } else {
            for ($i = 1; $i <= $count; $i++){
                $row = $res->fetch_assoc();
                echo "<section class='item'>";
                echo "<div class='transactionbook'>";
                echo "<img class='thumbnail' src='data:image/jpeg;base64,".base64_encode($row['cover'])."'/>";
                
                echo "<div><h2 class='itemtitle'>".$row['judul']." </h2>";
                echo "<div>Jumlah : ".$row['jumlah']."</div>";
                
                $review = $db->query("SELECT * FROM reviews WHERE id_transaksi='".$row['id_transaksi']."';");
                echo($db->error);
                if ($review->num_rows > 0) {
                    echo "<div>Anda sudah memberikan review</div>";
                } else {
                    echo "<div>Belum direview.</div>";
                }
                echo "</div></div>";

                echo "<div class='transactiondetail'>";
                echo date("d F Y", strtotime($row['tanggal']));
                echo "<br> Nomor Order: #".$row['id_transaksi'];
                if ($review->num_rows==0){
                    echo "<br><br><form class='rightitem' action='review.php' method='GET'>";
                    echo "  <input type='hidden' name='id_transaksi' value='".$row['id_transaksi']."'>";
                    echo "  <input class='rightbutton' type='submit' value='Review'> ";
                    echo "</form>";
                }
                echo "</div>";
                echo "</section>";
            }
        }
        echo "</article>";
    ?>
    
    
</body>
</html>
