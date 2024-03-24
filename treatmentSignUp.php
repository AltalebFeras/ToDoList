<?php

 require_once __DIR__ . "/src/Classes/User.php";
require_once __DIR__ . "/src/Repositories/UserRepository.php";

 
session_start();

// Check if form is submitted
if (empty($_POST) || !isset($_POST['name']) || !isset($_POST['surname']) || !isset($_POST['email']) || !isset($_POST['password']) || !isset($_POST['passwordVerify'])) {
     $_SESSION['error_message'] = "Invalid form submission.";
    header('Location: ./signUp.php');
    exit;
}

// Sanitize form inputs
$name = htmlspecialchars($_POST['name']);
$surname = htmlspecialchars($_POST['surname']);
$email = htmlspecialchars($_POST['email']);
$password = $_POST['password'];
$passwordVerify = $_POST['passwordVerify'];

// Validate email format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error_message'] = "Invalid email format. Please enter a valid email.";
    header('Location: ./../index.php');  
    exit; 
}

// Verify password confirmation
if ($password !== $passwordVerify) {
    $_SESSION['error_message'] = "Passwords do not match. Please try again.";
    header('Location: ./../index.php'); 
    exit;  
}

// Check if email already exists
$userRepository = new UserRepository();
$existingUser = $userRepository->findByEmail($email);
if ($existingUser) {
    $_SESSION['error_message'] = "Email already exists.";
    header('Location: ./index.php');
    exit;  
}

 
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Create new user instance
$newUser = new User(
    null, 
    $name,
    $surname,
    $email,
    $hashedPassword
);

// Save user to the database
$userRepository->create($newUser);

// Set success message and redirect to sign-in page
$_SESSION['success_message'] = "Your inscription has been validated!";
header('Location: ./signIn.php');
exit;
