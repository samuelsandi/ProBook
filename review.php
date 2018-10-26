<?php
    include('control/redirect.php');
    $db = new mysqli("localhost", "root", "", "probook");
    $res = $db->query("SELECT username FROM transaksi WHERE id_transaksi=".$_GET['id_transaksi'].";");  
    if ($res->fetch_assoc()['username'] != $_COOKIE['user']) {
        header('Location:history.php');
        die();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Book Detail</title>
    <link rel="stylesheet" href="styles/header.css" />
    <link rel="stylesheet" href="styles/page.css" />
    <link rel="stylesheet" href="styles/history.css"/>
    <link rel="stylesheet" href="styles/alertbox.css"/>
    <script src='scripts/rating.js'></script>
</head>
<body>
    <?php
        include('header.php');
        echo "<article>";
        $server = 'localhost';
        $db = new mysqli($server, 'root', '');
        if ($db->connect_error) {
            die($db->connect_error);
        }
        $sql = "SELECT * FROM buku NATURAL JOIN transaksi WHERE id_transaksi=".$_GET['id_transaksi'].";";
        $db->query('USE probook');
        $result = $db->query($sql);
        if ($db->error) die($db->error);
        $row = $result->fetch_assoc();
        
        echo "<section id='bookdetail'>";
        //information
        echo "<div>";
        echo "  <h1 class='pagetitle'>".$row['judul']."</h1>";
        echo "  <h3 class='itemsubtitle'>".$row['penulis']."</h2>";
        echo "  </div><div id='imgdetail' class='rightitem'> ";
        echo "      <img class='thumbnail' src='data:image/jpeg;base64,".base64_encode($row['cover'])."'/>";
        echo "  </div>";
        echo "</section>";

        // input rating
        echo "<section>";
        echo "<h2 class='sectiontitle'>Add Rating</h2>";
        echo "<div class='ratingstarset'>";
        for ($i = 1; $i <= 5; $i++)
            echo "      <img id='star$i' value='$i' class='ratingstaricon' src='assets/star-empty.png' onclick='setRating($i);'>";
        echo "</div></section>";

        // input comment
        echo "<section>";
        echo "<h2 class='sectiontitle'>Add Comment</h2>";
        
        echo "<form name='reviewform'>";
        echo "  <input type='hidden' name='rating' value=''>";
        echo "  <input type='hidden' name='id_transaksi' value='".$_GET['id_transaksi']."'>";
        echo "  <textarea rows='5' name='comment' placeholder='Insert comment here'></textarea>";
        echo "  <div class='navbuttons'><a class='leftbutton' href='history.php'>Back</a>";
        echo "  <input class='rightbutton' type='submit' value='Submit' onclick='validateAndSend()'></div>";
        echo "</form>";

        
        echo "</section>";
        echo "</article>";
    ?>
</body>
</html>