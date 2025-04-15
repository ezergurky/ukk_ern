<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Kasir</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    body {
      background: #f8f9fa;
      font-family: 'Segoe UI', sans-serif;
    }

    .header-gradient {
      background: linear-gradient(90deg, #0d6efd, #6610f2);
      color: #fff;
      padding: 4rem 0;
      text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
    }

    .hover-shadow {
      transition: all 0.3s ease;
      border-radius: 1rem;
    }

    .border-primary:hover {
      transform: translateY(-8px);
      box-shadow: 0 1rem 2rem rgba(19, 19, 201, 0.1);
    }

    .border-secondary:hover {
      transform: translateY(-8px);
      box-shadow: 0 1rem 2rem rgba(239, 63, 116, 0.1);
    }

    .border-success:hover {
      transform: translateY(-8px);
      box-shadow: 0 1rem 2rem rgba(99, 155, 16, 0.1);
    }

    .border-warning:hover {
      transform: translateY(-8px);
      box-shadow: 0 1rem 2rem rgba(247, 247, 7, 0.1);
    }

    .border-danger:hover {
      transform: translateY(-8px);
      box-shadow: 0 1rem 2rem rgba(219, 7, 14, 0.07);
    }

    .border-info:hover {
      transform: translateY(-8px);
      box-shadow: 0 1rem 2rem rgba(129, 129, 227, 0.1);
    }

    .card-icon {
      font-size: 3rem;
      margin-bottom: 1rem;
    }

    .card-title {
      font-size: 1.1rem;
      font-weight: 600;
    }

    .card {
      border: none;
      background: #fff;
      padding: 1.5rem;
      height: 100%;
    }

    .container {
      max-width: 1100px;
    }
  </style>
</head>
<body>

  <!-- Header -->
  <header class="header-gradient text-center">
    <div class="container">
      <h1 class="fw-bold"><i class="bi bi-calculator-fill me-2"></i>Website Kasir</h1>
      <p class="lead mb-0">Kelola produk, pelanggan, dan penjualan dengan mudah dan efisien</p>
    </div>
  </header>

  <!-- Menu Cards -->
  <main class="container my-4">
    <div class="row g-4 justify-content-center">

      <!-- Tambah Pelanggan -->
      <div class="col-sm-6 col-md-4 col-lg-3">
        <a href="tambah_pelanggan.php" class="text-decoration-none text-dark">
          <div class="card text-center hover-shadow border border-primary">
            <i class="bi bi-person-plus-fill text-primary card-icon"></i>
            <div class="card-title">Tambah Pelanggan</div>
          </div>
        </a>
      </div>

      <!-- Tambah Produk -->
      <div class="col-sm-6 col-md-4 col-lg-3">
        <a href="tambah_produk.php" class="text-decoration-none text-dark">
          <div class="card text-center hover-shadow border border-success">
            <i class="bi bi-box-seam text-success card-icon"></i>
            <div class="card-title">Tambah Produk</div>
          </div>
        </a>
      </div>

      <!-- Update Produk -->
      <div class="col-sm-6 col-md-4 col-lg-3">
        <a href="update_produk.php" class="text-decoration-none text-dark">
          <div class="card text-center hover-shadow border border-warning">
            <i class="bi bi-pencil-square text-warning card-icon"></i>
            <div class="card-title">Update Produk</div>
          </div>
        </a>
      </div>

      <!-- Penjualan -->
      <div class="col-sm-6 col-md-4 col-lg-3">
        <a href="penjualan.php" class="text-decoration-none text-dark">
          <div class="card text-center hover-shadow border border-danger">
            <i class="bi bi-cart text-danger card-icon"></i>
            <div class="card-title">Penjualan</div>
          </div>
        </a>
      </div>

      <!-- Daftar Produk -->
      <div class="col-sm-6 col-md-4 col-lg-3">
        <a href="tampil_produk.php" class="text-decoration-none text-dark">
          <div class="card text-center hover-shadow border border-info">
            <i class="bi bi-card-list text-info card-icon"></i>
            <div class="card-title">Daftar Produk</div>
          </div>
        </a>
      </div>

      <!-- Daftar Pelanggan -->
      <div class="col-sm-6 col-md-4 col-lg-3">
        <a href="tampil_pelanggan.php" class="text-decoration-none text-dark">
          <div class="card text-center hover-shadow border border-secondary">
            <i class="bi bi-people-fill text-secondary card-icon"></i>
            <div class="card-title">Daftar Pelanggan</div>
          </div>
        </a>
      </div>

      <!-- Daftar Penjualan -->
      <div class="col-sm-6 col-md-4 col-lg-3">
        <a href="tampil_penjualan.php" class="text-decoration-none text-dark">
          <div class="card text-center hover-shadow border border-danger">
            <i class="bi bi-receipt-cutoff text-danger card-icon"></i>
            <div class="card-title">Daftar Penjualan</div>
          </div>
        </a>
      </div>

    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
