<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freelance Brayen</title>
    <link rel="stylesheet" href="style/project.css">
</head>

<body>
    <header>
        <nav class="navbar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="project.php">Project</a></li>
                <li><a href="about.php">About</a></li>
                <!-- Menampilkan login atau logout berdasarkan status sesi -->
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                <?php endif; ?>
                <li><button id="mode-toggle">Dark</button></li>
            </ul>
        </nav>
    </header>

    <section id="home">
        <h1 style="color: white;">Freelance Services</h1>
        <p style="color: white;">We Have Expert Freelancers</p>

        <div class="container">
            <div class="image-card">
                <img src="foto/2.jpg" alt="Freelancer 1">
                <p style="color: white;">Our Expert Freelancer</p>
            </div>
            <div class="image-card">
                <img src="foto/6c24f4c7a181d856854a05da1fddefd0.jpg" alt="Freelancer 2">
                <p style="color: white;">Our Dedicated Team</p>
            </div>
        </div>

        <div class="video-background">
            <video autoplay muted loop>
                <source src="foto/videobck.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    </section>

    <script src="java/script.js"></script>
</body>

</html>
