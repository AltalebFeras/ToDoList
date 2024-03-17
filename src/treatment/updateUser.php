<?php

require_once __DIR__ . "/src/Classes/User.php";
require_once __DIR__ . "/src/Repositories/UserRepository.php";

if (
    !empty($_POST) &&
    isset($_POST['useID']) &&
    isset($_POST['name']) &&
    isset($_POST['surname']) &&
    isset($_POST['email']) &&
    isset($_POST['password']) &&
    isset($_POST['passwordVerify'])
) {
    $userID = htmlspecialchars($_POST['$userID']);
    $name = htmlspecialchars($_POST['name']);
    $surname = htmlspecialchars($_POST['surname']);
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password']; 
    $passwordVerify = $_POST['passwordVerify']; 

     // Verify password confirmation
     if ($password !== $passwordVerify) {
        echo "Passwords do not match. Please try again."; // Or display an error message in your HTML
        exit; // Stop further execution if passwords don't match
    }
   
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $newUser = new User(
        null,
        $name,
        $surname,
        $email,
        $hashedPassword 
    );

    $userRepository = new UserRepository();

    $userRepository->update($newUser);

    header('Location: ./../index.php');
}
