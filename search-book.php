<?php
    include('control/redirect.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Search Book</title>
    <link rel="stylesheet" href="styles/header.css" />
    <link rel="stylesheet" href="styles/page.css"/>
    <link rel="stylesheet" href="styles/browse.css"/>
    <script src='scripts/search.js'></script>
</head>
<body>
    <?php
        include('header.php');
    ?>
    <article>
        <h1 class="pagetitle">Search book</h1>

        <form name ='search' action="search-result.php" onsubmit="var x = validateForm('search', ['query']);return x;" method="GET">
            <input id='searchbar' type="text" name="query" placeholder="Input search items"><br>
            <input class='rightbutton' type="submit" value="Search">
        </form>

    </article>

</body>
</html>