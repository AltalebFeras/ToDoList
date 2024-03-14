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

    // Establish database connection
    $db = new Database();
    $conn = $db->getDB(); // Corrected method name

    // Prepare SQL statement to fetch user data
    $request = "SELECT * FROM todo_user WHERE email = ?";
    $stmt = $conn->prepare($request);

    // Bind parameters
    $stmt->bindValue(1, $email); // Use bindValue() instead of bind_param()

    // Execute the prepared statement
   // Execute the prepared statement
$stmt->execute();

// Fetch the result
$row = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if user exists
if ($row) {
    // Verify password
    if (password_verify($password, $row['password'])) {
        // Password is correct, start session and redirect to treatment script
        $_SESSION['user'] = $email;
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

} else {
    // Redirect if fields are empty
    header('location:../index.php?error=empty_fields');
    exit;
}
?>
