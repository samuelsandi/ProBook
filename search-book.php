<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Search Book</title>
    <link rel="stylesheet" href="styles/header.css" />
    <link rel="stylesheet" href="styles/page.css"/>
    <!--<script src='scripts/search.js'></script>-->
    <style> 
        #browse {
            background-color: rgb(242,102,0);
        }
    </style>
</head>
<body>
    <?php
        include('header.php');
    ?>
    <section>
        <h1 class="pagetitle">Search book</h1>

        <form action="search-result.php" method="GET">
            <input class="searchbar" type="text" name="query" value="Input search items"><br>
            <input type="submit" value="Search">
        </form>

    </section>

</body>
</html>