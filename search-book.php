<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Search Book</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/header.css" />
    <link rel="stylesheet" href="styles/searchpage.css">
    <script src='scripts/search.js'></script>
    <style> 
        #browse {
            background-color: rgb(242,102,0);
        }
    </style>
    <script src="main.js"></script>
</head>
<body>
    <?php
        include('header.php');
    ?>
    <section>
        <h1 class="pagetitle">Search book</h1>

        <form action="search-result.php" method="GET">
            <input type="text" name="query" value="Input search items"><br>
            <input type="submit" value="Search">
        </form>

    </section>

</body>
</html>