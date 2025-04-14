<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page Kalkulator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <form action="proses_penjualan.php" method="post" class="mt-4 bg-light p-4 col-md-6 rounded shadow-lg">
                <h4 class="text-center text-success"><i class="bi bi-cart me-2"></i>Penjualan</h4>
                <div class="mb-3">
                    <label class="form-label">Nama Pelanggan</label>
                    <Select class="form-select" name="pelanggan_id">
                        <option value="0">Pilih Pelanggan...</option>
                        <?php
                            include 'koneksi.php';

                            $query = "SELECT * FROM pelanggan";
                            $result = mysqli_query($koneksi, $query);
                            
                            while($row = mysqli_fetch_assoc($result)):
                        ?>
                        <option value="<?= $row["PelangganID"] ?>"><?= $row["NamaPelanggan"] ?></option>
                        <?php endwhile; ?>
                    </Select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <Select class="form-select" name="produk_id">
                        <option value="0">Pilih Produk...</option>
                        <?php
                            include 'koneksi.php';

                            $query2 = "SELECT * FROM produk";
                            $result = mysqli_query($koneksi, $query2);

                            while($row = mysqli_fetch_assoc($result)):
                        ?>
                        <option value="<?= $row["ProdukID"] ?>"><?= $row["NamaProduk"] ?></option>
                        <?php endwhile; ?>
                    </Select>
                    
                </div>
                <div class="mb-3">
                    <label class="form-label">Jumlah</label>
                    <input type="number" class="form-control" name="jumlah">
                </div>
                <div class="mb-3">
                    <label class="form-label">Uang yang diberikan</label>
                    <input type="number" class="form-control" name="uang">
                </div>
                <div class="form-text text-muted mb-3">
                    <i class="bi bi-info-circle-fill text-warning me-1"></i>Pastikan data yang anda masukkan sudah benar
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary w-100">
                        <i class="bi bi-send-fill me-2"></i>Submit
                    </button>
                </div>
                <div class="d-flex gap-2">
                    <a href="index.php" class="btn btn-outline-success w-100"><i class="bi bi-house-door-fill me-2"></i>Dashboard</a>
                    <a href="index.php" class="btn btn-outline-danger w-100"><i class="bi bi-card-list me-2"></i>Daftar Penjualan</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>