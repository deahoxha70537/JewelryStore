<?php
// Aktivizo shfaqjen e gabimeve
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Përfshije lidhjen me databazën dhe klasat që ne kemi krijuar
require_once 'Database.php';
require_once 'NewsController.php';
require_once 'ProductController.php';

// Krijo instanca për NewsController dhe ProductController
$newsController = new NewsController();
$productController = new ProductController();

// Trajto formularin për shtimin e lajmeve
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['news_submit'])) {
        // Merr të dhënat për lajmet
        $title = $_POST['title'];
        $content = $_POST['content'];

        // Menaxho imazhin për lajmin
        $image = null;
        if ($_FILES['image']['name']) {
            $image = 'uploads/' . basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], $image);
        }

        // Shto lajmin në databazë
        $newsController->addNews($title, $content, $image);
    }

    if (isset($_POST['product_submit'])) {
        // Merr të dhënat për produktin
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];

        // Menaxho imazhin për produktin
        $image = null;
        if ($_FILES['product_image']['name']) {
            $image = 'uploads/' . basename($_FILES['product_image']['name']);
            move_uploaded_file($_FILES['product_image']['tmp_name'], $image);
        }

        // Shto produktin në databazë
        $productController->addProduct($name, $description, $price, $image);
    }
}

// Merr lajmet dhe produktet nga databaza
$news = $newsController->getNews();
$products = $productController->getProducts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GLEAM - News & Products</title>
    <link rel="stylesheet" href="Product.css">
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
                <li><a href="Product.php">Product</a></li>
                <li><a href="News.php">News</a></li>
                <li><a href="Contact us.html">Contact us</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1>Welcome to Gleam</h1>

        <!-- News Form (to add news) -->
        <h2>Add News</h2>
        <form action="index.php" method="POST" enctype="multipart/form-data">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required><br><br>

            <label for="content">Content:</label><br>
            <textarea id="content" name="content" rows="4" cols="50" required></textarea><br><br>

            <label for="image">Image:</label>
            <input type="file" id="image" name="image" accept="image/*"><br><br>

            <button type="submit" name="news_submit">Add News</button>
        </form>

        <!-- Display News Articles -->
        <h2>Latest News</h2>
        <?php
        if (count($news) > 0) {
            foreach ($news as $newsItem) {
                echo "<div class='news-item'>";
                echo "<h2>" . htmlspecialchars($newsItem['title']) . "</h2>";
                if (!empty($newsItem['image'])) {
                    echo "<img src='" . htmlspecialchars($newsItem['image']) . "' alt='News Image'>";
                }
                echo "<p>" . nl2br(htmlspecialchars($newsItem['content'])) . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No news available.</p>";
        }
        ?>

        <!-- Product Form (to add product) -->
        <h2>Add Product</h2>
        <form action="index.php" method="POST" enctype="multipart/form-data">
            <label for="name">Product Name:</label>
            <input type="text" id="name" name="name" required><br><br>

            <label for="description">Description:</label><br>
            <textarea id="description" name="description" rows="4" cols="50" required></textarea><br><br>

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" required><br><br>

            <label for="product_image">Image:</label>
            <input type="file" id="product_image" name="product_image" accept="image/*"><br><br>

            <button type="submit" name="product_submit">Add Product</button>
        </form>

        <!-- Display Products -->
        <h2>Latest Products</h2>
        <?php
        if (count($products) > 0) {
            foreach ($products as $product) {
                echo "<div class='product-item'>";
                echo "<h2>" . htmlspecialchars($product['name']) . "</h2>";
                echo "<p>" . nl2br(htmlspecialchars($product['description'])) . "</p>";
                echo "<p><strong>Price:</strong> $" . htmlspecialchars($product['price']) . "</p>";
                if (!empty($product['image'])) {
                    echo "<img src='" . htmlspecialchars($product['image']) . "' alt='Product Image'>";
                }
                echo "</div>";
            }
        } else {
            echo "<p>No products available.</p>";
        }
        ?>
    </div>

    <footer>
        <p>&copy; 2024 Gleam Jewelry Store. All Rights Reserved.</p>
    </footer>
</body>
</html>