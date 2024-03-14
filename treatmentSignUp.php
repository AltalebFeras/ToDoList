<?php

require_once __DIR__ . "/src/Classes/User.php";
require_once __DIR__ . "/src/Repositories/UserRepository.php";

if (
    !empty($_POST) &&
    isset($_POST['name']) &&
    isset($_POST['surname']) &&
    isset($_POST['email']) &&
    isset($_POST['password']) 
) {
    $name = htmlspecialchars($_POST['name']);
    $surname = htmlspecialchars($_POST['surname']);
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password']; // No need for htmlspecialchars here

    // Hash the password using bcrypt
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $newUser = new User(
        $name,
        $surname,
        $email,
        $hashedPassword // Store the hashed password instead of the plain text
    );

    $userRepository = new UserRepository();

    $userRepository->create($newUser);

    header('Location: ./../index.php');
}
