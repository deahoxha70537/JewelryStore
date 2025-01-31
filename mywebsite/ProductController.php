<?php
class ProductController
{
    private $db;

    public function __construct()
    {
        // Krijo instancën e klasës Database
        $this->db = new Database();
    }

    // Funksioni për të marrë produktet
    public function getProducts()
    {
        $sql = "SELECT * FROM products ORDER BY created_at DESC";
        return $this->db->fetchAll($sql);
    }

    // Funksioni për të shtuar një produkt
    public function addProduct($name, $description, $price)
    {
        $sql = "INSERT INTO products (name, description, price) VALUES (?, ?, ?)";
        $this->db->query($sql, [$name, $description, $price]);
    }

    // Funksioni për të marrë një produkt nga ID për editim
    public function getProductById($id)
    {
        $sql = "SELECT * FROM products WHERE id = ?";
        return $this->db->fetch($sql, [$id]);
    }

    // Funksioni për të edituar produktin
    public function updateProduct($id, $name, $description, $price)
    {
        $sql = "UPDATE products SET name = ?, description = ?, price = ? WHERE id = ?";
        $this->db->query($sql, [$name, $description, $price, $id]);
    }
}

?>