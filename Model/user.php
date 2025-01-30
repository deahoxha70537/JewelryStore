<?php
require_once "databaseConnection.php";

class User {

    private $id;        
    private $name;       
    private $surname;    
    private $email;      
    private $username;  
    private $password;  


    function __construct($id, $name, $surname, $email, $username, $password) {
        $this->id = $id;              
        $this->name = $name;           
        $this->surname = $surname;    
        $this->email = $email;        
        $this->username = $username;  
        $this->password = $password;   
    }

 
    function getId() {
        return $this->id;
    }

  
    function getName() {
        return $this->name;
    }

   
    function getSurname() {
        return $this->surname;
    }

  
    function getEmail() {
        return $this->email;
    }

   
    function getUsername() {
        return $this->username;
    }

 
    function getPassword() {
        return $this->password;
    }

    public function __construct() {
        $this->db = new Database();
    }

    // Register

    public function register($username, $email, $password, $confirm_password) {
        if ($password !== $confirm_password) {
            return "Passwords do not match!";
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->db->conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            return "Username or email already exists!";
        }
        $stmt->close();

        $stmt = $this->db->conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $hashedPassword); // string string string - sss

        if ($stmt->execute()) {
            return "Registration successful!";
        } else {
            return "Error: " . $stmt->error;
        }
}

}
?>