<?php
class ContactForm
{
    private $db;

    public function __construct()
    {
        $this->db = new Database(); 
    }

    public function saveFormData($name, $email, $subject, $message)
    {
        $sql = "INSERT INTO contact_form (name, email, subject, message) VALUES (?, ?, ?, ?)";
        $this->db->query($sql, [$name, $email, $subject, $message]);
    }
}
?>