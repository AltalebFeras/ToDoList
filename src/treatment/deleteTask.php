<?php
session_start();
require_once __DIR__ . '/../Classes/Task.php';
require_once __DIR__ . '/../Repositories/TaskRepository.php';

if (
    !empty($_POST) &&
    isset($_POST['taskID'])
) {
    $taskID = htmlspecialchars($_POST['taskID']);

    $taskRepository = new TaskRepository();

    $taskRepository->delete($taskID);
}
