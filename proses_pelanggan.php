<?php
    include 'koneksi.php';

    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $notelp = $_POST["notelp"];

    if($koneksi->query("INSERT INTO pelanggan (NamaPelanggan, Alamat, NomorTelepon) VALUES ('$nama', '$alamat', '$notelp')"))
    {
        echo '<script>alert("Berhasil menambahkan pelanggan"); window.location = "index.php";</script>';
    } else {
        echo '<script>alert("Gagal menambahkan pelanggan"); window.location = "tambah_pelanggan.php";</script>';
    }
?>