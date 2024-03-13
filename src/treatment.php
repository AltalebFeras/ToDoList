<?php
require_once 'config.php';


// Establishing connection to the database
$servername = "localhost"; // Assuming localhost
$dbusername = "todolist"; // Replace with your database username
$dbpassword = "1234"; // Replace with your database password
$dbname = "todolist"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (
    isset($_POST['userName']) &&
    isset($_POST['password']) &&
    isset($_POST['passwordVerify']) &&
    !empty($_POST['userName']) &&
    !empty($_POST['password']) &&
    !empty($_POST['passwordVerify'])
) {
    $userName = htmlspecialchars($_POST['userName']);

    if ($_POST['password'] === $_POST['passwordVerify']) {
        if (strlen($_POST['password']) >= 8) {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }
    }

    // Prepare SQL statement to insert user data into the user table
    $sql = "INSERT INTO user (userName, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("ss", $userName, $password);

    // Execute the prepared statement
    $stmt->execute();

    // Close statement
    $stmt->close();

    // Close database connection
    $conn->close();

    header('location:../signIn.php?succes=signUp');
    die;
} else {
    header('location:../index.php?erreur=' . ERREUR_CHAMP_VIDE);
    die;
}
