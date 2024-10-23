<?php
include 'db.php'; // Menyertakan koneksi database

// Mengambil data berdasarkan ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM login WHERE id = $id";
    $result = $conn->query($sql);
    $contact = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = htmlspecialchars($_POST['name']);
    $age = htmlspecialchars($_POST['age']);

    // Query untuk mengupdate data
    $sql = "UPDATE login SET name='$name', age='$age' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil diupdate!";
        header('Location: project.php'); // Redirect setelah update
        exit(); // Pastikan exit setelah redirect
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Kontak</title>
</head>

<body>
    <h1>Edit Kontak</h1>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $contact['id']; ?>">
        Nama: <input type="text" name="name" value="<?php echo $contact['name']; ?>" required><br><br>
        Umur: <input type="number" name="age" value="<?php echo $contact['age']; ?>" required><br><br>
        <input type="submit" value="Update">
    </form>
</body>

</html>
