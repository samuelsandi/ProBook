<?php
    $amount = $_POST['amount'];
    $book_id = $_POST['book_id'];
    $user = $_COOKIE['user'];

    $db = new mysqli('localhost', 'root', '');
    $db->query("USE probook;");

    // masukkan transaksi ke database
    $sql = "INSERT INTO transaksi (id_buku, username, jumlah)
            VALUE ($book_id, '$user', $amount);";

    $db->query($sql);
    if ($db->error) {
        die("Transaksi gagal\n".$db->error);
    }

    // ambil id_transaksi dari database
    $transaksi = $db->query('SELECT LAST_INSERT_ID() as id_transaksi;');
    $id_transaksi = $transaksi->fetch_assoc()['id_transaksi'];

    //kembalikan pesan berhasil
    echo "Nomor transaksi: $id_transaksi";
?>