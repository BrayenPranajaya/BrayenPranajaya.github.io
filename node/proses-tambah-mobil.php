<?php
$host = "localhost"; // ganti sesuai dengan host database kamu
$user = "root"; // ganti sesuai dengan username database kamu
$password = ""; // ganti sesuai dengan password database kamu
$dbname = "showroom"; // ganti dengan nama database kamu

// Buat koneksi
$conn = new mysqli($host, $user, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$nama_kendaraan = $_POST['nama_kendaraan'];
$jenis = $_POST['jenis'];
$detail_mobil = $_POST['detail_mobil']; // Input detail mobil
$harga_sewa = $_POST['harga_sewa']; // Pastikan ini ada di form jika diperlukan
$tahun_kendaraan = $_POST['tahun_kendaraan'];

// Upload file gambar
$target_dir = "uploads/"; // Pastikan folder ini ada dan dapat ditulis
$target_file = $target_dir . basename($_FILES["foto"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Validasi tipe file
$valid_extensions = ['png', 'jpg', 'jpeg'];
if (!in_array($imageFileType, $valid_extensions)) {
    die("Hanya file PNG, JPG, dan JPEG yang diizinkan.");
}

// Cek ukuran file (maksimal 2MB)
if ($_FILES["foto"]["size"] > 2000000) {
    die("File terlalu besar. Maksimal ukuran file adalah 2MB.");
}

// Coba untuk meng-upload file
if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
    // Jika berhasil, simpan informasi mobil ke database
    $sql = "INSERT INTO kendaraan (nama_kendaraan, jenis, detail_mobil, foto, tahun_kendaraan) 
            VALUES ('$nama_kendaraan', '$jenis', $detail_mobil, '$target_file', $tahun_kendaraan)";

    if ($conn->query($sql) === TRUE) {
        echo "Mobil berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Maaf, terjadi kesalahan saat meng-upload file.";
}

// Tutup koneksi
$conn->close();
?>
