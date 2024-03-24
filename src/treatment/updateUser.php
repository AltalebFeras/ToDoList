<?php
session_start();
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

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error_message'] = "Invalid email format. Please enter a valid email.";
        header('Location: ./../index.php'); // Redirect back to the index page
        exit;
    }

    $userRepository = new UserRepository();
    $existingUser = $userRepository->findByEmail($email);
    if ($existingUser) {
        $_SESSION['error_message3'] = "Email already exists.";
        header('Location: ./index.php');
        exit;
    }
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $newUser = new User(
        $userID = $_SESSION['user'],
        $name,
        $surname,
        $email,
        $hashedPassword
    );

    $userRepository = new UserRepository();

    $userRepository->update($newUser);

    header('Location: ./../index.php');
}
