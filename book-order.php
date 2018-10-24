<?php
    $amount = $_POST['amount'];
    $book_id = $_POST['book_id'];
    $user = $_POST['user'];

    $db = new mysqli('localhost', 'root', '');
    $db->query("USE probook;");
    // masukkan transaksi ke database
    // ambil id_transaksi dari database

    echo "Pemesanan berhasil!\n";
    echo "Nomor transaksi: $amount";
?>