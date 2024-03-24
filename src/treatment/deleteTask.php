<?php
session_start();
require_once __DIR__ . '/../Classes/Task.php';
require_once __DIR__ . '/../Repositories/TaskRepository.php';

if (
    !empty($_POST) &&
    isset($_POST['taskTitle']) &&
    isset($_POST['taskDeadline']) &&
    isset($_POST['taskPriority'])
) {
    $taskTitle = htmlspecialchars($_POST['taskTitle']);
    $taskDeadline = htmlspecialchars($_POST['taskDeadline']);
    $taskPriority = htmlspecialchars($_POST['taskPriority']);

    $taskRepository = new TaskRepository();

    $taskRepository->delete($taskTitle, $taskDeadline, $taskPriority);
}
?>
