<?php
include_once 'Database.php';       
include_once 'ContactForm.php'; 

$contactForm = new ContactForm();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $contactForm->saveFormData($name, $email, $subject, $message);

    echo "<p>Mesazhi u dërgua me sukses!</p>";
}
?>


<form method="POST" action="Contact.php">
    <label for="name">Emri:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="subject">Subjekti:</label>
    <input type="text" id="subject" name="subject" required><br><br>

    <label for="message">Mesazhi:</label><br>
    <textarea id="message" name="message" rows="4" cols="50" required></textarea><br><br>

    <button type="submit">Dërgo</button>
</form>

