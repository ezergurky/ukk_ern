<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Kasir</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<style>
  .hover-shadow {
    transition: all 0.2s ease;
  }

  .hover-shadow:hover {
    transform: translateY(-5px);
    box-shadow: 0 0.75rem 1.5rem rgba(0, 0, 0, 0.15);
  }
</style>
<body class="bg-light">

  <!-- Header -->
  <div class="py-5 text-white" style="background: linear-gradient(90deg, #0d6efd, #6610f2);">
    <div class="container text-center">
      <h1 class="fw-bold mb-0"><i class="bi bi-calculator-fill me-2"></i>Website Kasir</h1>
      <p class="lead mb-0">Kelola produk, pelanggan, dan penjualan dengan mudah</p>
    </div>
  </div>

  <!-- Menu Cards -->
  <div class="container my-5">
    <div class="row g-4 justify-content-center">
      
    <div class="col-md-4">
        <a href="tambah_pelanggan.php" class="text-decoration-none">
          <div class="card shadow-sm border-0 h-100 hover-shadow">
            <div class="card-body text-center">
              <i class="bi bi-person-plus-fill fs-1 text-primary mb-3"></i>
              <h5 class="card-title fw-bold text-dark">Tambah Pelanggan</h5>
            </div>
          </div>
        </a>
      </div>

      <!-- Tambah Produk -->
      <div class="col-md-4">
        <a href="tambah_produk.php" class="text-decoration-none">
          <div class="card shadow-sm border-0 h-100 hover-shadow">
            <div class="card-body text-center">
              <i class="bi bi-box-seam fs-1 text-success mb-3"></i>
              <h5 class="card-title fw-bold text-dark">Tambah Produk</h5>
            </div>
          </div>
        </a>
      </div>

      <!-- Update Produk -->
      <div class="col-md-4">
        <a href="update_produk.php" class="text-decoration-none">
          <div class="card shadow-sm border-0 h-100 hover-shadow">
            <div class="card-body text-center">
              <i class="bi bi-pencil-square fs-1 text-warning mb-3"></i>
              <h5 class="card-title fw-bold text-dark">Update Produk</h5>
            </div>
          </div>
        </a>
      </div>

      <!-- Penjualan -->
      <div class="col-md-4">
        <a href="penjualan.php" class="text-decoration-none">
          <div class="card shadow-sm border-0 h-100 hover-shadow">
            <div class="card-body text-center">
              <i class="bi bi-cart fs-1 text-danger mb-3"></i>
              <h5 class="card-title fw-bold text-dark">Penjualan</h5>
            </div>
          </div>
        </a>
      </div>

      <!-- Daftar Produk -->
      <div class="col-md-4">
        <a href="tampil_produk.php" class="text-decoration-none">
          <div class="card shadow-sm border-0 h-100 hover-shadow">
            <div class="card-body text-center">
              <i class="bi bi-card-list fs-1 text-info mb-3"></i>
              <h5 class="card-title fw-bold text-dark">Daftar Produk</h5>
            </div>
          </div>
        </a>
      </div>

      <!-- Daftar Pelanggan -->
      <div class="col-md-4">
        <a href="tampil_pelanggan.php" class="text-decoration-none">
          <div class="card shadow-sm border-0 h-100 hover-shadow">
            <div class="card-body text-center">
              <i class="bi bi-people-fill fs-1 text-secondary mb-3"></i>
              <h5 class="card-title fw-bold text-dark">Daftar Pelanggan</h5>
            </div>
          </div>
        </a>
      </div>

      <!-- Daftar Penjualan -->
      <div class="col-md-6">
        <a href="tampil_penjualan.php" class="text-decoration-none">
          <div class="card shadow-sm border-0 h-100 hover-shadow">
            <div class="card-body text-center">
              <i class="bi bi-receipt-cutoff fs-1 text-danger mb-3"></i>
              <h5 class="card-title fw-bold text-dark">Daftar Penjualan</h5>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
