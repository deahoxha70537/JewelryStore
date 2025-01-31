<?php
// Aktivizo shfaqjen e gabimeve
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Përfshije lidhjen me databazën dhe klasat që ne kemi krijuar
require_once 'Database.php';
require_once 'NewsController.php';

// Krijo një instancë të NewsController
$newsController = new NewsController();

// Trajto formularin për shtimin e lajmeve
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Merr të dhënat nga formulari
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Menaxho imazhin e ngarkuar
    $image = null;
    if ($_FILES['image']['name']) {
        $image = 'uploads/' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $image);
    }

    // Shto lajmin në databazë
    $newsController->addNews($title, $content, $image);
}

// Merr lajmet nga databaza për t'i shfaqur
$news = $newsController->getNews();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lajmet - Gleam</title>
    <link rel="stylesheet" href="News.css">
</head>
<body>
    <nav class="navbar">
        <div class="navbar-container">
            <a href="#" class="logo">
                <img src="logo.jpeg" alt="Logo">
                <span>GLEAM</span>
            </a>
            <ul class="navbar-links">
                <li><a href="Home.html">Home</a></li>
                <li><a href="About us.html">About</a></li>
                <li><a href="Product.html">Product</a></li>
                <li><a href="News.php">News</a></li>
                <li><a href="Contact us.html">Contact us</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1><label>BREAKING: LATEST NEWS</label></h1>

        <!-- Form për shtimin e lajmit -->
        <h2>Add News</h2>
        <form action="index.php" method="POST" enctype="multipart/form-data">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required><br><br>

            <label for="content">Content:</label><br>
            <textarea id="content" name="content" rows="4" cols="50" required></textarea><br><br>

            <label for="image">Image:</label>
            <input type="file" id="image" name="image" accept="image/*"><br><br>

            <button type="submit">Add News</button>
        </form>

        <!-- Shfaq lajmet -->
        <h2>Latest News</h2>
        <?php
        if (count($news) > 0) {
            foreach ($news as $row) {
                echo "<div class='news-item'>";
                echo "<h2>" . htmlspecialchars($row['title']) . "</h2>";
                if (!empty($row['image'])) {
                    echo "<img src='" . htmlspecialchars($row['image']) . "' alt='News Image'>";
                }
                echo "<p>" . nl2br(htmlspecialchars($row['content'])) . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No news available.</p>";
        }
        ?>

    </div>

    <footer>
        <p>&copy; 2024 Gleam Jewelry Store. All Rights Reserved.</p>
    </footer>
</body>
</html>