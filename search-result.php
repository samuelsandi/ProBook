<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Search Result</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/header.css" />
    <style>
        #resultcount {
            float:right;
        }
    </style>
</head>
<body>
    <?php   
        include('header.php');    
        echo '<h1 class="pagetitle"> Search Result </h1>';
        // GET query
        
        // access database

        $count = 0;
        echo '<div id="resultcount">Found <u>$count</u> Results </div>';
        if ($count == 0){
            echo '<section>No result</section>';
        } else {
            for ($i = 0; $i < $count; $i++){
                echo '<section>';
                //show data from database
                echo '</section>';
            }
        }
    ?>
    
</body>
</html>