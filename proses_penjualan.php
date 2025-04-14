<?php
    include 'koneksi.php';

    $pelangganID = $_POST["pelanggan_id"];
    $produkID = $_POST["produk_id"];
    $jumlahProduk = $_POST["jumlah"];
    $totalHarga = $_POST["uang"];

    $query = "SELECT Harga, Stok FROM produk WHERE ProdukID=$produkID";
    $result = mysqli_query($koneksi, $query);

    if($result->num_rows > 0)
    {
        $row = $result->fetch_assoc();
        $harga = $row["Harga"];
        $stok = $row["Stok"];

        if($jumlahProduk <= $stok)
        {
            $subtotal = $harga * $jumlahProduk;

            $koneksi->begin_transaction();
            
            try {
                $query = "INSERT INTO penjualan (TanggalPenjualan, TotalHarga, PelangganID) VALUES (NOW(), '$subtotal', $pelangganID)";
                if($koneksi->query($query) === True)
                {
                    $penjualanID = $koneksi->insert_id;

                    $query = "INSERT INTO detailpenjualan (PenjualanID, ProdukID, JumlahProduk, Subtotal) VALUES ($penjualanID, $produkID, $jumlahProduk, $subtotal)";
                    if($koneksi->query($query) === True)
                    {
                        $query = "UPDATE produk SET Stok=$stok - $jumlahProduk WHERE ProdukID=$produkID";
                        if($koneksi->query($query) === True)
                        {
                            $koneksi->commit();
                            echo "<script>alert('Penjualan Berhasil!'); window.location='tampil_penjualan.php'</script>";
                        } else {
                            echo "<script>alert('Penjualan Gagal!'); window.location='penjualan.php'";
                        }
                    } else {
                        echo "<script>alert('Gagal menambahkan detail penjualan!'); window.location='penjualan.php'</script>";
                    }
                } else {
                    echo "<script>return alert('Gagal menambahkan penjualan!'); window.location='penjualan.php'</script>";
                }
            } catch(Exception $e) {
                $koneksi->rollback();
                echo 'Error: ' . $e->getMessage();
            }
        } else {
            echo "<script>alert('Stok tidak mencukupi, stok tersedia = $stok'); window.location='penjualan.php'</script>";
        }
    } else {
        echo "<script>alert('Product tidak ditemukan!'); window.location='penjualan.php'</script>";
    }
?>