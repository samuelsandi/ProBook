<header>
    <section>
        <h1><span id='pro'>Pro</span>-Book</h1>
        <section>
            <div id='greet-user'>Hi, <?php echo $_COOKIE['user']; ?></div>
            <a href='control/logout.php'><img id='logout' src="assets/logoff.PNG"></a>
        </section>
    </section>
    <nav>
        <a class='navoption' id='browse' href='search-book.php'>BROWSE</a> 
        <a class='navoption' id='history' href='history.php'>HISTORY</a> 
        <a class='navoption' id='profile' href='profile.php'>PROFILE</a>
    </nav>
</header>
