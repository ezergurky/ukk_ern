<?php 
    include 'koneksi.php';

    session_start();

    if(!isset($_SESSION["email"]))
    {
        header("Location: login.php");
        exit();
    }

    $query = "SELECT * FROM produk";
    $result = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Kelola Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
        .logoutbutton {
            margin-left: 90%;
        }
    </style>
</head>
<body>
    <div class="logoutbutton mt-3">
        <a href="logout.php" class="btn btn-secondary btn-sm">Logout</a>
    </div>
    <div class="container">
        <h2 class="text-center mb-4">User - Pesan Produk</h2>

        <div class="card p-4 mb-4">
            <h4>Produk</h4>
            <form method="POST">
                <input type="hidden" name="id" class="form-control">
                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <select id="produk" class="form-select mb-3">
                        <option value="" data-harga="0" data-stok="0">Pilih Produk</option>
                        <?php
                            while($produkData = mysqli_fetch_assoc($result)) { ?>
                                <option data-stok="<?= $produkData["Stok"] ?>" data-harga="<?= $produkData["Harga"] ?>" value="<?= $produkData["NamaProduk"] ?>"><?= $produkData["NamaProduk"] ?></option>
                            <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jumlah Produk</label>
                    <input type="number" id="jumlah" name="jumlah" class="form-control" min="1" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Stock</label>
                    <input type="number" id="stok" class="form-control" disabled value="<?= $produkData["Stok"] ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Jumlah Harga</label>
                    <input type="number" id="harga" class="form-control" disabled>
                </div>
                <div class="d-flex gap-2 mb-3">
                    <button type="submit" name="tambah_produk" class="btn btn-primary w-100">Submit</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#produk').change(function() {
                let selectedOption = $(this).find(':selected');
                let harga = selectedOption.data('harga');
                let stok = selectedOption.data('stok');
                $('#stok').val(stok);
                $('#jumlah').val(1);
                $('#harga').val(harga);
            });

            $('#jumlah').on('input', function() {
                let jumlah = $(this).val();
                let hargaperUnit = $('#produk').find(':selected').data('harga');
                $('#harga').val(jumlah * hargaperUnit);
            });
        });
    </script>
</body>
</html>
