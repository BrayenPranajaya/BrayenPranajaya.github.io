<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    // Simpan data input ke dalam session sebelum redirect
    $_SESSION['nama'] = $_POST['nama'] ?? '';
    $_SESSION['umur'] = $_POST['umur'] ?? '';
    $_SESSION['namaprojek'] = $_POST['namaprojek'] ?? '';
    $_SESSION['tanggalproject'] = $_POST['tanggalproject'] ?? '';
    $_SESSION['biayaproject'] = $_POST['biayaproject'] ?? '';

    // Redirect ke halaman register
    header("Location: register.php");
    exit();
}

// Mengisi kembali data dari session jika ada
$nama = $_SESSION['nama'] ?? '';
$umur = $_SESSION['umur'] ?? '';
$namaprojek = $_SESSION['namaprojek'] ?? '';
$tanggalproject = $_SESSION['tanggalproject'] ?? '';
$biayaproject = $_SESSION['biayaproject'] ?? '';

// Hapus data input dari session setelah ditampilkan
unset($_SESSION['nama'], $_SESSION['umur'], $_SESSION['namaprojek'], $_SESSION['tanggalproject'], $_SESSION['biayaproject']);
?>


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

// Handle form submission for Create
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = isset($_POST['action']) ? $_POST['action'] : ''; // Cek apakah 'action' diset

    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $namaprojek = $_POST['namaprojek'];
    $tanggalproject = $_POST['tanggalproject'];
    $biayaproject = $_POST['biayaproject'];

    // File upload logic
    $target_dir = "uploads/";
    $file = isset($_FILES['file']['name']) && !empty($_FILES['file']['name']) ? $target_dir . basename($_FILES["file"]["name"]) : NULL;
    if ($file) {
        move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir . basename($_FILES["file"]["name"]));
    }

    // Create new entry
    if ($action == "Kirim") {
        $stmt = $conn->prepare("INSERT INTO projects (nama, umur, namaprojek, tanggalproject, biayaproject, file) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sissss", $nama, $umur, $namaprojek, $tanggalproject, $biayaproject, $file);
        if ($stmt->execute()) {
            echo "Record added successfully";
            // Tampilkan tombol baru setelah data disimpan
            echo "<br><a href='crud_page.php'><button>Edit</button></a>";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}

// Close connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Page</title>
    <link rel="stylesheet" href="style/project.css">
</head>
<body>
    <header>
        
    </header>
    <h2>Project Form</h2>
    <form action="project.php" method="POST" enctype="multipart/form-data">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($nama); ?>" required><br><br>
        
        <label for="umur">Umur:</label>
        <input type="number" id="umur" name="umur" value="<?php echo htmlspecialchars($umur); ?>" required><br><br>
        
        <label for="namaprojek">Nama Projek:</label>
        <input type="text" id="namaprojek" name="namaprojek" value="<?php echo htmlspecialchars($namaprojek); ?>" required><br><br>
        
        <label for="tanggalproject">Tanggal Projek:</label>
        <input type="date" id="tanggalproject" name="tanggalproject" value="<?php echo htmlspecialchars($tanggalproject); ?>" required><br><br>
        
        <label for="biayaproject">Biaya Project:</label>
        <input type="number" id="biayaproject" name="biayaproject" value="<?php echo htmlspecialchars($biayaproject); ?>" required><br><br>
        
        <label for="file">Upload File:</label>
        <input type="file" id="file" name="file"><br><br>

        <input type="submit" name="action" value="Kirim">
    </form>
    <div class="video-background">
            <video autoplay muted loop>
                <source src="foto/videoplayback.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
</body>
</html>
