<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/tambah-mobil.css">
    <title>Tambah Mobil</title>
</head>
<body>
    <div class="container">
        <h2>Formulir Tambah Mobil</h2>
        <form action="proses_tambah_mobil.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama_kendaraan">Nama Kendaraan:</label>
                <input type="text" id="nama_kendaraan" name="nama_kendaraan" required>
            </div>
            <div class="form-group">
                <label for="jenis">Jenis:</label>
                <input type="text" id="jenis" name="jenis" required>
            </div>
            <div class="form-group">
                <label for="detail_mobil">Detail Mobil:</label>
                <input type="number" id="detail_mobil" name="detail_mobil" required>
            </div>
            <div class="form-group">
                <label for="foto">Foto (PNG, JPG, JPEG):</label>
                <input type="file" id="foto" name="foto" accept=".png, .jpg, .jpeg" required>
            </div>
            <div class="form-group">
                <label for="tahun_kendaraan">Tahun Kendaraan:</label>
                <input type="number" id="tahun_kendaraan" name="tahun_kendaraan" required min="1900" max="2100">
            </div>
            <input type="submit" value="Simpan" class="btn-submit">
        </form>
    </div>
</body>
</html>
