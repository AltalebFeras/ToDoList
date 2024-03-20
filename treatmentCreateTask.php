<?php
session_start();

require_once __DIR__ . "/src/Classes/Task.php";
require_once __DIR__ . "/src/Repositories/TaskRepository.php";
var_dump($_SESSION);

if (
    !empty($_POST) &&
    isset($_POST['taskTitle']) &&
    isset($_POST['taskDescription']) &&
    isset($_POST['taskDeadline']) &&
    isset($_POST['taskPriority']) &&
    isset($_POST['taskCategory'])
) {
    $taskTitle = htmlspecialchars($_POST['taskTitle']);
    $taskDescription = htmlspecialchars($_POST['taskDescription']);
    $taskDeadline = htmlspecialchars($_POST['taskDeadline']);
    $taskPriority = htmlspecialchars($_POST['taskPriority']);
    $taskCategory = htmlspecialchars($_POST['taskCategory']);


    $newTask = new Task(
        $taskTitle,
        $taskDescription,
        $taskDeadline,
        $taskPriority,
        $taskCategory ,
        $userTaskID,
        // $priorityID,
    );

    $taskRepository = new TaskRepository();

    $taskRepository->create($newTask);

    header('Location: ./../index.php');
    // header('Content-type: application/json');
}
