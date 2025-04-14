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
            <form action="proses_updateproduk.php" method="post" class="mt-4 p-4 col-md-6 shadow-lg bg-light">
                <div class="text-center">
                <i class="bi bi-pencil-square text-primary fs-1"></i>
                <h4 class="text-primary fw-bold mb-3">Update Produk</h4>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jenis Produk</label>
                    <Select class="form-select" name="produk_id">
                        <option value="0">Pilih Produk</option>
                        <?php
                            include 'koneksi.php';

                            $result = $koneksi->query("SELECT * FROM produk");

                            while($dataP = mysqli_fetch_assoc($result)):
                        ?>

                        <option value="<?= $dataP["ProdukID"] ?>"><?= $dataP["NamaProduk"] ?></option>
                        <?php endwhile; ?>
                    </Select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="number" name="harga" class="form-control" placeholder="Masukkan harga" required>
                    </div>
                    
                </div>
                <div class="mb-3">
                    <label class="form-label">Stok</label>
                    <input type="number" name="stok" class="form-control" required>
                </div>

                <div class="mt-4 mb-3">
                    <button class="btn btn-primary w-100"><i class="bi bi-send-fill me-2"></i>Update</button>
                </div>
                <div class="d-flex gap-2">
                    <a href="index.php" class="btn btn-outline-success w-100"><i class="bi bi-house-door-fill me-2"></i>Dashboard</a>
                    <a href="" class="btn btn-outline-danger w-100"><i class="bi bi-card-list me-2"></i>Daftar Produk</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>