<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Search Result</title>
    
    <link rel="stylesheet" href="styles/page.css" />
    <link rel="stylesheet" href="styles/header.css" />
    <style>
        .thumbnail {
            height: 100pt;
            float:left;
        }
    </style>
</head>
<body>
    <?php   
        $server = "localhost";
        $user = "root";
        $pass = "";

        include('header.php');    
        echo "<article>";
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
        echo "<div class='rightitem' id='resultcount'>Found <u>$count</u> Results </div>";

        if ($count == 0){
            echo '<section>No result</section>';
        } else {
            for ($i = 1; $i <= $count; $i++){
                $row = $res->fetch_assoc();
                echo '<section>';
                echo "<img class='thumbnail' src='data:image/jpeg;base64,".base64_encode($row['cover'])."'/>";
                echo "<h2 class='itemtitle'>".$row['judul']." </h2>";
                echo "<h3 class='itemsubtitle'>".$row['penulis']."</h3>";
                //show data from database
                echo '</section>';
            }
        }
        echo "</article>";
    ?>
    
</body>
</html>