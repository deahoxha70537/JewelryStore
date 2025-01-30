<?php
require_once "user.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    $user = new User();
    $message = $user->register($username, $email, $password, $confirm_password);

    echo "<script>alert('$message'); window.location.href='registerform.html';</script>";
}
?>
