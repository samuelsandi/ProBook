<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Search Book</title>
    <link rel="stylesheet" href="styles/header.css" />
    <link rel="stylesheet" href="styles/page.css"/>
    <link rel="stylesheet" href="styles/browse.css"/>
    <!--<script src='scripts/search.js'></script>-->
</head>
<body>
    <?php
        include('header.php');
    ?>
    <section>
        <h1 class="pagetitle">Search book</h1>

        <form id ='search' action="search-result.php" method="GET">
            <input id='searchbar' type="text" name="query" placeholder="Input search items"><br>
            <input type="submit" value="Search">
        </form>

    </section>

</body>
</html>