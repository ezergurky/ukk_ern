<?php
    include 'koneksi.php';

    if(isset($_GET["delete"]))
    {
        $id = $_GET["delete"];

        $koneksi->query("DELETE FROM produk WHERE ProdukID=$id");
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
    @media print {
        .btn, #aksi {
            display: none !important;
        }
    }
</style>
<body class="bg-light">
<div class="container mt-4">
        <div class="row p-2 bg-light shadow-lg justify-content-center">
            <h4 class="text-info text-center"><i class="bi bi-box-seam-fill me-2"></i>Daftar Produk</h4>
            <div class="mt-4 col-md-8">
                <table class="table table-striped table-bordered shadow-sm mb-4 rounded">
                    <thead class="table-primary">
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th id="aksi">Aksi</th>
                    </thead>
                    <tbody>
                        <?php
                            $result = $koneksi->query("SELECT * FROM produk");
                            $no = 1;

                            while($row = mysqli_fetch_assoc($result)):
                        ?>
                        <tr>
                            <td class="fw-semibold"><?= $no++ ?>.</td>
                            <td><?= $row["NamaProduk"] ?></td>
                            <td>Rp. <?= number_format($row["Harga"], 2, ',', '.') ?></td>
                            <td><?= $row["Stok"] ?></td>
                            <td><a href="?delete=<?= $row["ProdukID"] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus produk ini?');"><i class="bi bi-trash me-2"></i>Delete</a></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>

                <div class="justify-content-center mb-3">
                    <a class="btn btn-outline-primary mb-3 w-100" onclick="window.print()"><i class="bi bi-printer-fill me-2"></i>Cetak Daftar</a>
                    <a href="index.php" class="btn btn-outline-success w-100"><i class="bi bi-house-door-fill me-2"></i>Dashboard</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>