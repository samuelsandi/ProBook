<?php
    $db = new mysqli("localhost", "root", "");
    $db->query("USE probook;");

    $idtrans = $_POST['id_transaksi'];
    
    $sql = "SELECT * FROM transaksi WHERE id_transaksi='$idtrans';";
    $res = $db->query($sql);
    if ($db->error) die("1".$db->error);

    $idbuku = $res->fetch_assoc()['id_buku'];
    $user = $_COOKIE['user'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    $sql = "INSERT INTO reviews (id_buku, username, rating, comment, id_transaksi)
            VALUE ($idbuku, '$user', $rating, '$comment', $idtrans);";
    $db->query($sql);
    if ($db->error) die("2".$db->error);

    $sql = "SELECT * FROM buku WHERE id_buku=$idbuku;";
    $res = $db->query($sql);
    if ($db->error) die("3".$db->error);

    $buku = $res->fetch_assoc();
    $newvote = $buku['vote'] + 1;
    $newrating = ($buku['rating']*$buku['vote']+$rating)/($newvote);
    $sql = "UPDATE buku
            SET rating=".$newrating.", vote=".$newvote."
            WHERE id_buku = $idbuku;";
    $db->query($sql);

    if ($db->error) die("4".$db->error);
    
    header("Location:../history.php");

?>