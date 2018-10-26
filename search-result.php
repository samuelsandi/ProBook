<?php
    include('control/redirect.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Search Result</title>
    <link rel="stylesheet" href="styles/header.css" />
    <link rel="stylesheet" href="styles/page.css" />
    <link rel="stylesheet" href="styles/browse.css"/>

</head>
<body>
    <?php   
        $server = "localhost";
        $user = "root";
        $pass = "";

        include('header.php');    
        echo "<article>";
        echo "<section>";
        echo '<h1 class="pagetitle"> Search Result </h1>';
        // GET query
        $searchquery = $_GET['query'];
        // access database
        $db = new mysqli($server, $user, $pass);
        if ($db->connect_error) {
            die("Connection error<br>".$db->connect_error);
        }
        $db->query("USE probook;");
        $sql = "SELECT * FROM buku WHERE judul LIKE '%$searchquery%';";
        $res = $db->query($sql);

        if ($db->error) echo "Error " . $db->error;
        $count = $res->num_rows;
        echo "<div class='rightitem' id='resultcount'>Found <u>$count</u> Result(s) </div>";
        echo "</section>";

        if ($count == 0){
            echo '<section>No result</section>';
        } else {
            for ($i = 1; $i <= $count; $i++){
                $row = $res->fetch_assoc();
                echo "<section class='item'>";
                echo "<img class='thumbnail' src='data:image/jpeg;base64,".base64_encode($row['cover'])."'/>";
                echo "<div style='flex-grow:1'><h2 class='itemtitle'>".$row['judul']." </h2>";
                echo "<h3 class='itemsubtitle'>".$row['penulis']." - ";
                if ($row['rating'] != null) {
                    echo number_format($row['rating'], 1)."/5.0 (".$row['vote']." votes) </h3>";
                } else {
                    echo "not rated </h3>";
                }
                echo "<div>".$row['synopsis']." </div>";
                
                // details button
                echo "<form class='rightitem' action='book-detail.php' method='GET'>";
                echo "  <input type='hidden' name='book_id' value='".$row['id_buku']."'>";
                echo "  <input class='rightbutton' type='submit' value='Details'> ";
                echo "</form></div>";
                echo '</section>';
            }
        }
        echo "</article>";
    ?>
    
</body>
</html>