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
    <div class="container mt-2">
        <div class="row justify-content-center">
            <form action="proses_pelanggan.php" method="post" class="mt-4 p-4 col-md-6 shadow-lg bg-light">
                <div class="text-center mb-4">
                    <i class="bi bi-person-plus-fill text-primary fs-1"></i>
                    <h4 class="text-primary fw-bold">Tambah Pelanggan</h4>
                    <p class="text-muted small">Isi data pelanggan dengan lengkap</p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Pelanggan</label>
                    <input type="text" name="nama" class="form-control rounded-4" placeholder="Masukkan nama pelanggan" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Alamat</label>
                    <input type="text" name="alamat" class="form-control rounded-4" placeholder="Masukkan alamat pelanggan">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">No Telepon</label>
                    <input type="number" name="notelp" class="form-control rounded-4" placeholder="081234567890">
                </div>
                <div class="form-text text-muted mb-3">
                    <i class="bi bi-info-circle-fill me-1 text-warning"></i>Pastikan data yang anda masukkan sudah benar
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary w-100">
                        <i class="bi bi-send-fill me-2"></i>Submit
                    </button>
                </div>
                <div class="d-flex gap-2">
                    <a href="index.php" class="btn btn-outline-success w-100"><i class="bi bi-house-door-fill me-2"></i>Dashboard</a>
                    <a href="tampil_pelanggan.php" class="btn btn-outline-danger w-100"><i class="bi bi-people-fill me-2"></i>Daftar Pelanggan</a>
                </div>
            </form>
        </div>
    </div>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>