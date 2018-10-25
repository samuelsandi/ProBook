<?php
    if (!isset($_COOKIE['user'])) {
            header('Location: login.php', true);
            die();
    }
?>