<?php

$userId = $_GET['id']; 


include_once '../Repository/userRepository.php';

$userRepository = new UserRepository();


$userRepository->deleteUser($userId);


header("location:dashboard.php");

?>