<?php
session_start();
include 'db_connection.php'; // Koneksi ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query untuk mendapatkan user berdasarkan email
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    // Jika user ditemukan
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $hashed_password);
        $stmt->fetch();

        // Verifikasi password
        if (password_verify($password, $hashed_password)) {
            // Set sesi user
            $_SESSION['user_id'] = $user_id;

            // Redirect ke halaman project
            header("Location: project.php");
            exit();
        } else {
            echo "Password salah!";
        }
    } else {
        echo "User tidak ditemukan!";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style/project.css">
</head>
<body>
    <h2>Login</h2>
    <form action="login.php" method="POST">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <a href="register.php">Register?</a><br><br>
        <input type="submit" value="Login">
    </form>
    <div class="video-background">
            <video autoplay muted loop>
                <source src="foto/video.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
</body>
</html>
