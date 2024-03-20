<?php

require_once __DIR__ . "/../Classes/Task.php";
require_once __DIR__ . "/../Repositories/UserRepository.php";

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
    $password = $_POST['password'];


    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $newUser = new User(
        $userID = null,
        $name,
        $surname,
        $email,
        $hashedPassword
    );

    $userRepository = new UserRepository();

    $userRepository->update($newUser);

    header('Location: ./../index.php');
}
