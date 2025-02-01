<?php
include_once 'Database.php';       // Klasë për lidhjen me databazën
include_once 'ContactForm.php';    // Klasë për menaxhimin e formës së kontaktit

// Instanco klasën për formularin e kontaktit
$contactForm = new ContactForm();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Merr të dhënat nga forma
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Ruaj të dhënat në databazë
    $contactForm->saveFormData($name, $email, $subject, $message);

    echo "<p>Mesazhi u dërgua me sukses!</p>";
}
?>

<!-- Formi i Kontaktit -->
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

