<?php
session_start();
require_once __DIR__ . '/../Classes/User.php';
require_once __DIR__ . '/../Repositories/UserRepository.php';


if (!empty($_POST) && isset($_POST['userID'])) {
    $userID = htmlspecialchars($_POST['userID']);

    $userRepository = new UserRepository();

    $userRepository->delete($userID);
    echo "User deleted successfully.";
} else {
    echo "Invalid request.";
}
