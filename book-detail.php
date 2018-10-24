<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Search Result</title>
    <link rel="stylesheet" href="styles/header.css" />
    <link rel="stylesheet" href="styles/page.css" />
    <link rel="stylesheet" href="styles/browse.css"/>
    <script src='book-detail.js'></script>
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
        
        echo "<div>";
        echo "  <h1 class='pagetitle'>".$row['judul']."</h1>";
        echo "  <h3 class='itemsubtitle'>".$row['penulis']."</h2>";
        echo "  <div>".$row['synopsis']."</div>";
        echo "</div>";
        echo "<div id='imgdetail' class='rightitem'> ";
        echo "  <img class='thumbnail' src='data:image/jpeg;base64,".base64_encode($row['cover'])."'/>";
        echo "  <br>rating";
        echo "</div>";

        echo "</section>";

        
        // input order
        echo "<section>";
        echo "<h2 class='sectiontitle'>Order</h2>";
        echo "<form onsubmit='postOrder();return false' method='POST'>";
        echo "  <select name='amount'>";
        for ($i = 1; $i <= 20; $i++)
            echo "  <option value='$i'>$i</option>";
        echo "  </select>";
        echo "  <input class='rightbutton' type='submit' value='Order'>";
        echo "</form>";
        echo "</section>";
        //get reviews
        echo "<section>";
        echo "<h2 class='sectiontitle'>Reviews</h2>";
        /*
        $sql = "SELECT * FROM reviews WHERE id_buku = $idbuku;";
        $results = $db->query($sql);
        for ($i = 0; $i < $results->num_rows; $i++){
            $row = $results->fetch_assoc();
            echo "reviews"
        }
        */
        echo "</section>";
        echo "</article>";
    ?>
</body>
</html>