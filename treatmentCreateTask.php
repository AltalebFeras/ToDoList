<?php

require_once __DIR__ . "/src/Classes/Task.php";
require_once __DIR__ . "/src/Repositories/TaskRepository.php";

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
        $taskCategory 
    );

    $taskRepository = new TaskRepository();

    $taskRepository->create($newTask);

    header('Location: ./../index.php');
}
