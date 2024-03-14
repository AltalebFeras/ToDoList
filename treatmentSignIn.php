<?php
session_start();
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
    !empty($_POST['userName']) &&
    !empty($_POST['password'])
) {
    $userName = htmlspecialchars($_POST['userName']);
    $password = $_POST['password'];

    // Prepare SQL statement to fetch user data
    $sql = "SELECT * FROM user WHERE userName = ?";
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("s", $userName);

    // Execute the prepared statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Verify password
        if (password_verify($password, $row['password'])) {
            // Password is correct, start session and redirect to treatment script
            $_SESSION['user'] = $userName;
            $_SESSION['connected'] = true;
            header('location:../index.php');
            exit;
        } else {
            // Password is incorrect
            header('location:../index.php?error=password_incorrect');
            
            exit;
        }
    } else {
        // User not found
        header('location:../index.php?error=user_not_found');
        exit;
    }

    // Close statement
    $stmt->close();

} else {
    // Redirect if fields are empty
    header('location:../index.php?error=empty_fields');
    exit;
}
