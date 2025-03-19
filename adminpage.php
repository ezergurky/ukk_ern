<?php
    include 'koneksi.php';

    session_start();

    $editMode = false;

    $query = "SELECT * FROM produk";
    $result = mysqli_query($koneksi, $query);

    if(isset($_POST["tambah_produk"]))
    {
        $nama = $_POST["nama"];
        $harga = $_POST["harga"];
        $stock = $_POST["stock"];

        $queryproduct = "INSERT INTO produk (NamaProduk, Harga, Stok) VALUES ('$nama', '$harga', '$stock')";
        $resultp = mysqli_query($koneksi, $queryproduct);

        header("Location: adminpage.php");
    }

    if(isset($_GET["edit"]))
    {
        $editMode = true;
        $id = $_GET["edit"];
        $resultE = $koneksi->query("SELECT * FROM produk WHERE ProdukID=$id");
        $editData = $resultE->fetch_assoc();
    }

    if (isset($_GET["delete"]))
    {
        $id = $_GET["delete"];
        $resultD = $koneksi->query("DELETE FROM produk WHERE ProdukID=$id");
        if (!$resultD) {
            echo "<script>return alert('Gagal menghapus produk, coba lagi!');</script>";
        } else {
            header("Location: adminpage.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Kelola Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Admin - Kelola Produk</h2>

        <div class="card p-4 mb-4">
            <h4>Tambah Produk</h4>
            <form method="POST">
                <input type="hidden" name="id" class="form-control">
                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" name="nama" class="form-control" required value="<?= $editMode ? $editData["NamaProduk"] : "" ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" name="harga" class="form-control" required value="<?= $editMode ? $editData["Harga"] : "" ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Stock</label>
                    <input type="number" name="stock" class="form-control" required value="<?= $editMode ? $editData["Stok"] : ""  ?>">
                </div>
                <div class="d-flex gap-2 mb-3">
                    <button type="submit" name="tambah_produk" class="btn btn-primary w-100"><?= $editMode ? "Update" : "Submit" ?></button>
                    <?php if($editMode): ?>
                    <a href="adminpage.php" class="btn btn-danger">Cancel</a>
                    <?php endif; ?>
                </div>
                
            </form>
        </div>

        <div class="card p-4">
            <h4>Daftar Produk</h4>
            <table class="table table-bordered mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Stock</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row['NamaProduk']; ?></td>
                            <td>Rp<?= number_format($row['Harga'], 0, ',', '.'); ?></td>
                            <td><?= $row['Stok']; ?></td>
                            <td>
                                <a href="?edit=<?= $row['ProdukID'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="?delete=<?= $row['ProdukID'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
