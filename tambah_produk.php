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
            <form action="proses_produk.php" method="post" class="mt-4 bg-light p-4 col-md-6 rounded shadow-lg">
                <div class="text-center">
                    <i class="bi bi-box-seam text-primary fs-1"></i>
                    <h4 class="fw-bold text-primary">Tambah Produk</h4>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" name="nama">
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="number" class="form-control" name="harga">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Stok</label>
                    <input type="number" class="form-control" name="stok">
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
                    <a href="index.php" class="btn btn-outline-danger w-100"><i class="bi bi-card-list me-2"></i>Daftar Produk</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>