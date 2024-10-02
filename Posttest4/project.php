<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects - Freelance Brayen</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <header>
        <nav class="navbar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="project.php">Project</a></li>
                <li><a href="about.php">About</a></li>
                <li><button id="mode-toggle">Dark</button></li>
            </ul>
        </nav>
    </header>

    <section id="projects">
        <!-- existing code remains the same -->

        <!-- new form section -->
        <section id="contact">
            <h1 style="color: white;">Get in Touch</h1>
            <form id="contact-form" method="POST" action="">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Your name" required><br><br>

                <label for="age">Age:</label>
                <input type="number" id="age" name="age" min="18" max="100" required><br><br>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Your password" required><br><br>

                <input type="submit" value="Submit">
            </form>

            <!-- display the input values -->
            <div id="output">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $name = htmlspecialchars($_POST['name']);
                    $age = htmlspecialchars($_POST['age']);
                    $password = htmlspecialchars($_POST['password']);
                    echo "<h2>Submitted Information</h2>";
                    echo "Name: $name <br>";
                    echo "Age: $age <br>";
                    echo "Password: (hidden for security)";
                }
                ?>
            </div>
        </section>
    </section>

    <div class="video-background">
        <video autoplay muted loop>
            <source src="foto/videoplayback.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <script src="java/script.js"></script>
    <script src="java/project.js"></script>
</body>

</html>
