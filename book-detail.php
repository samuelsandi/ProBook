<?php
    include('control/redirect.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Book Detail</title>
    <link rel="stylesheet" href="styles/header.css" />
    <link rel="stylesheet" href="styles/page.css" />
    <link rel="stylesheet" href="styles/browse.css"/>
    <link rel="stylesheet" href="styles/alertbox.css"/>
    <script src='scripts/book-detail.js'></script>
</head>
<body>
    <?php
        include('header.php');
        echo "<article>";
        $server = 'localhost';
        $idbuku = $_GET['book_id'];
        $db = new mysqli($server, 'root', '');
        if ($db->connect_error) {
            die($db->connect_error);
        }
        $sql = "SELECT * FROM buku WHERE id_buku=".$idbuku.";";
        $db->query('USE probook');
        $result = $db->query($sql);
        if ($db->error) die($db->error);
        $row = $result->fetch_assoc();
        
        echo "<section id='bookdetail'>";
        //information
        echo "<div>";
        echo "  <h1 class='pagetitle'>".$row['judul']."</h1>";
        echo "  <h3 class='itemsubtitle'>".$row['penulis']."</h2>";
        echo "  <div>".$row['synopsis']."</div>";
        echo "</div>";
        
        //picture and rating
        echo "  <div id='imgdetail' class='rightitem'> ";
        echo "      <img class='thumbnail' src='data:image/jpeg;base64,".base64_encode($row['cover'])."'/>";
        echo "      <div class='ratingstarset'>";
        for ($i = 1; $i <= 5; $i++){
            $star = $i <= $row['rating'] ? "star.png" : "star-empty.png";
            echo "      <img class='ratingstarsmall' src='assets/$star'>";
        }
        echo "  </div>";
        echo "  <div style='text-align:center'>".number_format($row['rating'], 1)."/5.0</div>";
        echo "</div>";
        echo "</section>";

        // input order
        echo "<section>";
        echo "<h2 class='sectiontitle'>Order</h2>";
        echo "<form name='orderform' onsubmit='postOrder();return false' method='POST'>";
        echo "  Jumlah: <select id='dropdown' name='amount'>";
        for ($i = 1; $i <= 5; $i++)
            echo "  <option value='$i'>$i</option>";
        echo "  </select>";
        echo "  <input type='hidden' name='book_id' value='".$row['id_buku']."'>";
        echo "  <input class='rightbutton' style='margin-top:4em' type='submit' value='Order'>";
        echo "</form>";
        echo "</section>";

        //get reviews
        echo "<section>";
        echo "<h2 class='sectiontitle'>Reviews</h2>";
        
        $sql = "SELECT username, picture, rating, comment FROM reviews NATURAL JOIN user WHERE id_buku = $idbuku;";
        $results = $db->query($sql);
        for ($i = 0; $i < $results->num_rows; $i++){
            $row = $results->fetch_assoc();
            echo "<section class='item'>";
            echo "      <div class='ratinguser'> <img class='thumbnail' src='data:image/jpeg;base64,".base64_encode($row['picture'])."'/>";
            echo "      <div> <h3 class='itemsubtitle'>@".$row['username']."</h3>";
            echo "            <div>".$row['comment']."</div>";
            echo "      </div> </div>";
            echo "      <div class='reviewrating'>";
            echo "          <img class='ratingstaricon' src='assets/star.png'><br>";
            echo "          ".number_format($row['rating'], 1)."/5.0";
            echo "      </div>";
            echo "</section>";
        }
        
        echo "</section>";
        echo "</article>";
    ?>
</body>
</html>