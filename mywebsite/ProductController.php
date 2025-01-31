<?php
// ProductController.php

class ProductController {
    private $db;
    private $conn;

    public function __construct() {
        // Krijo një instancë të klasës Database
        $this->db = new Database();
        $this->conn = $this->db->getConnection();
    }

    // Metoda për të marrë produktet nga databaza
    public function getProducts() {
        $sql = "SELECT * FROM products ORDER BY created_at DESC";
        $result = $this->conn->query($sql);

        $products = [];
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
        return $products;
    }

    // Metoda për të shtuar një produkt
    public function addProduct($name, $description, $price, $image) {
        $sql = "INSERT INTO products (name, description, price, image) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssss", $name, $description, $price, $image);
        $stmt->execute();
    }
}
?>