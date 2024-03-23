<?php
session_start();
require_once __DIR__ . "/src/Classes/User.php";
require_once __DIR__ . "/src/Repositories/UserRepository.php";
require_once __DIR__ . "/src/Classes/Database.php";

if (
    isset($_POST['email']) &&
    isset($_POST['password']) &&
    !empty($_POST['email']) &&
    !empty($_POST['password'])
) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $db = new Database();
    $conn = $db->getDB(); 

    $request = "SELECT * FROM todo_user WHERE email = ?";
    $stmt = $conn->prepare($request);

    $stmt->bindValue(1, $email);

    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if user exists
    if ($row) {
        // Verify password
        if (password_verify($password, $row['password'])) {
            // Password is correct, start session and redirect to treatment script
            $_SESSION['user'] = $row['userID'];
            $_SESSION['connected'] = true;
            header('location:../index.php');
            exit;
        } else {
            $_SESSION['error_message1'] = "Invalid email or password. Please try again.";
            header('Location: ./../signIn.php');
            exit; // Stop further execution if password is incorrect
        }
    } else {
        $_SESSION['error_message1'] = "User not found. Please try again.";
        header('Location: ./../signIn.php'); 
        exit; // Stop further execution if user doesn't exist
    }
} else {
    $_SESSION['error_message1'] = "Please fill in all fields.";
    header('Location: ./../signIn.php'); 
    exit; // Stop further execution if fields are empty
}