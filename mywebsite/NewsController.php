<?php
// NewsController.php

class NewsController {
    private $db;
    private $conn;

    public function __construct() {
        // Krijo një instancë të klasës Database
        $this->db = new Database();
        $this->conn = $this->db->getConnection();
    }

    // Metoda për të marrë lajmet nga databaza
    public function getNews() {
        $sql = "SELECT * FROM news ORDER BY created_at DESC";
        $result = $this->conn->query($sql);

        $news = [];
        while ($row = $result->fetch_assoc()) {
            $news[] = $row;
        }
        return $news;
    }

    // Metoda për të shtuar një lajm
    public function addNews($title, $content, $image) {
        $sql = "INSERT INTO news (title, content, image) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $title, $content, $image);
        $stmt->execute();
    }
}
?>