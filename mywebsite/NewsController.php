<?php
// NewsController.php

class NewsController
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // Funksioni për të marrë lajmet
    public function getNews()
    {
        $sql = "SELECT * FROM news ORDER BY created_at DESC";
        return $this->db->fetchAll($sql);
    }

    // Funksioni për të shtuar një lajm të ri
    public function addNews($title, $content, $image)
    {
        $sql = "INSERT INTO news (title, content, image) VALUES (?, ?, ?)";
        $this->db->query($sql, [$title, $content, $image]);
    }

    // Funksioni për të marrë një lajm për editim
    public function getNewsById($id)
    {
        $sql = "SELECT * FROM news WHERE id = ?";
        return $this->db->fetch($sql, [$id]);
    }

    // Funksioni për të edituar lajmin
    public function updateNews($id, $title, $content, $image)
    {
        $sql = "UPDATE news SET title = ?, content = ?, image = ? WHERE id = ?";
        $this->db->query($sql, [$title, $content, $image, $id]);
    }
}
?>