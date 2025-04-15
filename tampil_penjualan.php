<?php
    include 'koneksi.php';

    if(isset($_GET["delete"]))
    {
        $id = $_GET["delete"];
        $koneksi->query("DELETE FROM detailpenjualan WHERE PenjualanID=$id");
        $koneksi->query("DELETE FROM penjualan WHERE PenjualanID=$id");
    }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page Kalkulator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<style>
    h2 {
        display: none;
    }
    @media print{
        button, a, .btn, .d-grid, #aksi {
            display: none !important;
        }

        h2 {
            display:grid;
            font-size: small;
        }

        th, td, h4 {
            font-size: small;
        }
    }
</style>
<body class="bg-light">
<div class="container mt-4">
        <div class="row p-2 bg-light shadow-lg justify-content-center">
            <div class="text-center">
                <i class="bi bi-receipt-cutoff text-danger fs-1"></i>
                <h4 class="text-danger fw-bold">Daftar Penjualan</h4>
            </div>
            <div class="mt-4 col-md-8">
                <div class="rounded-3 shadow-sm overflow-hidden mb-4">
                    <table class="table table-striped mb-0">
                        <thead class="table-primary">
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Nama Produk</th>
                            <th>Jumlah Produk</th>
                            <th>Total Harga</th>
                            <th id="aksi">Aksi</th>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;

                                $query = "
                                SELECT
                                    p.PenjualanID,
                                    p.TanggalPenjualan,
                                    pl.NamaPelanggan,
                                    pr.NamaProduk,
                                    dp.JumlahProduk,
                                    dp.Subtotal
                                FROM penjualan p
                                JOIN pelanggan pl ON p.PelangganID = pl.PelangganID
                                JOIN detailpenjualan dp ON p.PenjualanID = dp.PenjualanID
                                JOIN produk pr ON dp.ProdukID = pr.ProdukID
                                ORDER BY p.TanggalPenjualan DESC
                                ";

                                $result = $koneksi->query($query);
                                $row2 = $koneksi->query("SELECT * FROM penjualan")->fetch_assoc();

                                if($result->num_rows > 0):
                                    while($row = $result->fetch_assoc()):
                            ?>
                            <tr>
                                <td class="fw-semibold"><?= $no++ ?>.</td>
                                <td><?= $row["NamaPelanggan"] ?></td>
                                <td><?= $row["NamaProduk"] ?></td>
                                <td><?= $row["JumlahProduk"] ?></td>
                                <td>Rp. <?= number_format($row["Subtotal"], 2, ',', '.') ?></td>
                                <td><a href="?delete=<?= $row2["PenjualanID"] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus penjualan ini?');"><i class="bi bi-trash me-2"></i>Delete</a></td>
                            </tr>
                            <?php endwhile; else: ?>
                                <tr>
                                    <td colspan="6" class="text-center text-muted">Tidak ada penjualan yang tersedia</td>
                                </tr>
                            <?php endif; ?>
                            <tr>
                                <td class="table-secondary text-end fw-semibold" colspan="4">Sub Total:</td>
                                <?php 
                                    $query = "SELECT SUM(Subtotal) AS TotalHarga FROM detailpenjualan";
                                    $subTotal = mysqli_query($koneksi, $query);
                                    $row = mysqli_fetch_assoc($subTotal);
                                ?>
                                <td class="fw-semibold">Rp. <?= number_format($row["TotalHarga"], 2, ',', '.') ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h2 class="text-center">&copy UKK RPL 2025</h2>

                <div class="d-grid mb-3">
                    <button class="btn btn-outline-primary" onclick="window.print()"><i class="bi bi-printer-fill me-2"></i>Cetak Daftar</button>
                </div>

                <div class="justify-content-center mb-3">
                    <a href="index.php" class="btn btn-outline-success w-100"><i class="bi bi-house-door-fill me-2"></i>Dashboard</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>