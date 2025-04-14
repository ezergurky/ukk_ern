<?php
    include 'koneksi.php';

    $id = $_POST["produk_id"];
    $harga = $_POST["harga"];
    $stok = $_POST["stok"];

    if($id == 0) {
        echo "<script>alert('Pilih produk terlebih dahulu!'); window.history.back();</script>";
        exit;
    }

    if($koneksi->query("UPDATE produk SET Harga = '$harga', Stok = '$stok' WHERE ProdukID='$id'"))
    {
        echo '<script>alert("Berhasil meng-update produk"); window.location = "index.php";</script>';
    } else {
        echo '<script>alert("Gagal meng-update produk"); window.location = "update_produk.php";</script>';
    }
?>