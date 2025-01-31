<?php
// Database.php

class Database {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "projekti_final");
        
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Metoda për të marrë lidhjen me databazën
    public function getConnection() {
        return $this->conn;
    }
}
?>