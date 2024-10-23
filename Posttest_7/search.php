<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "freelance";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['search'])) {
    $search_term = $_GET['search'];
    $stmt = $conn->prepare("SELECT * FROM projects WHERE namaprojek LIKE ?");
    $like_search = "%".$search_term."%";
    $stmt->bind_param("s", $like_search);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        echo "Nama Projek: " . $row['namaprojek'] . "<br>";
        echo "Tanggal Projek: " . $row['tanggalproject'] . "<br>";
        echo "Biaya Projek: " . $row['biayaproject'] . "<br><br>";
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<body>
    <form action="search.php" method="GET">
        Cari Project: <input type="text" name="search" required>
        <input type="submit" value="Search">
    </form>
</body>
</html>
