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
    <div class="container">
        <div class="row justify-content-center">
            <form action="proses_penjualan.php" method="post" class="bg-light p-4 col-md-6 rounded shadow-lg">
                <div class="text-center">
                    <i class="bi bi-cart text-success fs-1"></i>
                    <h4 class="text-success fw-bold">Penjualan</h4>
                    <p class="text-muted small">Isi data penjualan dengan lengkap</p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Pelanggan</label>
                    <Select class="form-select rounded-4" name="pelanggan_id">
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
                    <label class="form-label fw-semibold">Nama Produk</label>
                    <Select class="form-select rounded-4" name="produk_id">
                        <option value="0">Pilih Produk...</option>
                        <?php
                            include 'koneksi.php';

                            $query2 = "SELECT * FROM produk";
                            $result = mysqli_query($koneksi, $query2);

                            while($row = mysqli_fetch_assoc($result)):
                        ?>
                        <option value="<?= $row["ProdukID"] ?>"><?= $row["NamaProduk"] ?> ( Rp. <?= number_format($row["Harga"], 2, ',', '.') ?> )</option>
                        <?php endwhile; ?>
                    </Select>
                    
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Jumlah</label>
                    <input type="number" class="form-control rounded-4" name="jumlah" placeholder="Masukkan jumlah">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Uang yang diberikan</label>
                    <input type="number" class="form-control rounded-4" name="uang" placeholder="Masukkan uang yang diberikan">
                </div>
                <div class="form-text text-muted mb-3">
                    <i class="bi bi-info-circle-fill text-warning me-1"></i>Pastikan data yang anda masukkan sudah benar
                </div>
                <div id="notifBox" class="alert alert-info d-none mt-2" role="alert"></div>
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

    <script>
    const produkSelect = document.querySelector('[name="produk_id"]');
    const jumlahInput = document.querySelector('[name="jumlah"]');
    const uangInput = document.querySelector('[name="uang"]');
    const notifBox = document.getElementById('notifBox');

    // Simpan harga produk dalam dictionary
    const hargaProduk = {};
    <?php
        include 'koneksi.php';
        $query = "SELECT * FROM produk";
        $result = mysqli_query($koneksi, $query);
        while($row = mysqli_fetch_assoc($result)) {
            echo "hargaProduk[" . $row['ProdukID'] . "] = " . $row['Harga'] . ";\n";
        }
    ?>

    function hitungKembalian() {
        const produkID = produkSelect.value;
        const jumlah = parseInt(jumlahInput.value);
        const uang = parseInt(uangInput.value);

        if (produkID !== "0" && jumlah > 0 && uang > 0 && hargaProduk[produkID]) {
            const totalHarga = hargaProduk[produkID] * jumlah;
            const kembalian = uang - totalHarga;

            if (kembalian >= 0) {
                notifBox.classList.remove('d-none', 'alert-danger');
                notifBox.classList.add('alert-info');
                notifBox.textContent = `Kembalian: Rp. ${kembalian.toLocaleString('id-ID')}`;
            } else {
                notifBox.classList.remove('d-none', 'alert-info');
                notifBox.classList.add('alert-danger');
                notifBox.textContent = `Uang yang diberikan kurang Rp. ${(kembalian * -1).toLocaleString('id-ID')}`;
            }
        } else {
            notifBox.classList.add('d-none');
        }
    }

    produkSelect.addEventListener('change', hitungKembalian);
    jumlahInput.addEventListener('input', hitungKembalian);
    uangInput.addEventListener('input', hitungKembalian);
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>