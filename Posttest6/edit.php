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

// Ambil data berdasarkan ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM projects WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id); // Bind parameter to prevent SQL injection
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
}

// Jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $namaprojek = $_POST['namaprojek'];
    $tanggalproject = $_POST['tanggalproject'];
    $biayaproject = $_POST['biayaproject'];

    // Prepare the update statement
    $sql = "UPDATE projects SET nama=?, umur=?, namaprojek=?, tanggalproject=?, biayaproject=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sisssi", $nama, $umur, $namaprojek, $tanggalproject, $biayaproject, $id);

    if ($stmt->execute()) {
        echo "Record updated successfully.";
        header("Location: crud_page.php"); // Redirect ke halaman CRUD setelah berhasil
        exit();
    } else {
        echo "Error updating record: " . $stmt->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project</title>
    <link rel="stylesheet" href="style/project.css"> <!-- CSS untuk styling -->
</head>
<body>

<h2>Edit Project</h2>

<form action="edit.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    
    <label for="nama">Nama:</label>
    <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($row['nama']); ?>" required><br><br>
    
    <label for="umur">Umur:</label>
    <input type="number" id="umur" name="umur" value="<?php echo htmlspecialchars($row['umur']); ?>" required><br><br>
    
    <label for="namaprojek">Nama Projek:</label>
    <input type="text" id="namaprojek" name="namaprojek" value="<?php echo htmlspecialchars($row['namaprojek']); ?>" required><br><br>
    
    <label for="tanggalproject">Tanggal Projek:</label>
    <input type="date" id="tanggalproject" name="tanggalproject" value="<?php echo htmlspecialchars($row['tanggalproject']); ?>" required><br><br>
    
    <label for="biayaproject">Biaya Project:</label>
    <input type="number" id="biayaproject" name="biayaproject" value="<?php echo htmlspecialchars($row['biayaproject']); ?>" required><br><br>
    
    <input type="submit" value="Update">
</form>
<div class="video-background">
            <video autoplay muted loop>
                <source src="foto/videoplayback.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
</body>
</html>
