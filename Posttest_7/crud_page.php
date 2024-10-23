<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "freelance"; // Nama database

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil semua data dari tabel projects
$sql = "SELECT * FROM projects";
$result = $conn->query($sql);

echo "<h2>Daftar Projects</h2>";
if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Nama</th><th>Umur</th><th>Nama Projek</th><th>Tanggal Projek</th><th>Biaya Projek</th><th>File</th><th>Action</th></tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['nama']}</td>
                <td>{$row['umur']}</td>
                <td>{$row['namaprojek']}</td>
                <td>{$row['tanggalproject']}</td>
                <td>{$row['biayaproject']}</td>
                <td><a href='{$row['file']}'>Download</a></td>
                <td>
                    <a href='edit.php?id={$row['id']}'>Edit</a>
                    <a href='delete.php?id={$row['id']}'>Delete</a>
                </td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "No data available.";
}

// Tutup koneksi
$conn->close();
?>

<link rel="stylesheet" href="style/project.css">
    <div class="video-background">
            <video autoplay muted loop>
                <source src="foto/video.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>