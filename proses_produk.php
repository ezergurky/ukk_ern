<?php
    include 'koneksi.php';

    $nama = $_POST["nama"];
    $harga = $_POST["harga"];
    $stok = $_POST["stok"];

    if($koneksi->query("INSERT INTO produk (NamaProduk, Harga, Stok) VALUES ('$nama', $harga, $stok)"))
    {
        echo '<script>confirm("Berhasil menambahkan produk!"); window.location = "index.php";</script>';
    } else {
        echo '<script>confirm("Gagal menambahkan produk!"); window.location = "tambah_produk.php";</script>';
    }
?>