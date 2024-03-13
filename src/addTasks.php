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
    isset($_POST['taskTitle']) &&
    isset($_POST['Descriptions']) &&
    isset($_POST['taskDeadline']) &&
    isset($_POST['taskPriority']) &&
    !empty($_POST['taskTitle']) &&
    !empty($_POST['Descriptions']) &&
    !empty($_POST['taskDeadline']) &&
    !empty($_POST['taskPriority'])
) {
    $taskTitle = htmlspecialchars($_POST['taskTitle']);
    $Descriptions = htmlspecialchars($_POST['Descriptions']);
    $taskDeadline = htmlspecialchars($_POST['taskDeadline']);
    $taskPriority = htmlspecialchars($_POST['taskPriority']);
    // Prepare SQL statement to insert user data into the task table
    $sql = "INSERT INTO task (taskTitle, Descriptions, taskDeadline, taskPriority) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("ssss", $taskTitle, $Descriptions, $taskDeadline, $taskPriority);

    // Execute the prepared statement
    $stmt->execute();

    // Close statement
    $stmt->close();

    // Close database connection
    $conn->close();

    header('location:../index.php');
    die;
} else {
    header('location:../index.php?erreur=empty_fields');
    die;
}
