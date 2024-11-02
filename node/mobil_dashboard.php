<?php
// Koneksi ke database
include 'koneksi.php';

$limit = 10; // Jumlah data per halaman
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Query untuk mengambil data kendaraan dengan limit dan offset
$query = "SELECT * FROM kendaraan LIMIT $limit OFFSET $offset";
$result = mysqli_query($conn, $query);

// Menghitung total data untuk menentukan jumlah halaman
$total_query = "SELECT COUNT(*) AS total FROM kendaraan";
$total_result = mysqli_query($conn, $total_query);
$total_data = mysqli_fetch_assoc($total_result)['total'];
$total_pages = ceil($total_data / $limit);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="style/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">
            <img src="asset/NODE.png" alt="Logo" class="logo-img">
        </div>
        <ul class="nav-links">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#" class="active">Mobil</a></li>
            <li><a href="index.html" title="Keluar"><i class="fas fa-sign-out-alt"></i> Keluar</a></li>
        </ul>
        <div class="search-bar">
            <input type="text" placeholder="Cari mobil...">
            <button onclick="showPopup()"><i class="fas fa-search"></i></button>
            <a href="form-tambah-mobil.php"button><button>Tambah Mobil</button></a>

        </div>
    </nav>
    <!-- Tabel Data Mobil -->
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Mobil</th>
                    <th>Deskripsi Mobil</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="table-body">
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['id_kendaraan']; ?></td>
                        <td><?php echo $row['nama_kendaraan']; ?></td>
                        <td><?php echo $row['jenis']; ?></td>
                        <td>
                            <i class="fas fa-eye" title="Lihat"></i>
                            <i class="fas fa-edit" title="Edit"></i>
                            <i class="fas fa-trash-alt" title="Hapus"></i>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="pagination" id="pagination">
            <?php if ($page > 1): ?>
                <a href="?page=<?php echo $page - 1; ?>">« Sebelumnya</a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <a href="?page=<?php echo $i; ?>" <?php if ($i == $page) echo 'class="active"'; ?>>
                    <?php echo $i; ?>
                </a>
            <?php endfor; ?>

            <?php if ($page < $total_pages): ?>
                <a href="?page=<?php echo $page + 1; ?>">Selanjutnya »</a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
