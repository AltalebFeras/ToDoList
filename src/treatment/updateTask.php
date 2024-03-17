<?php

require_once __DIR__ . "/../Classes/Task.php";
require_once __DIR__ . "/../Repositories/TaskRepository.php";

if (
    !empty($_POST) &&
    isset($_POST['taskID']) &&
    isset($_POST['taskTitle']) &&
    isset($_POST['taskDescription']) &&
    isset($_POST['taskDeadline']) &&
    isset($_POST['taskPriority']) &&
    isset($_POST['taskCategory'])
) {
    $taskID = htmlspecialchars($_POST['$taskID']);
    $taskTitle = htmlspecialchars($_POST['taskTitle']);
    $taskDescription = htmlspecialchars($_POST['taskDescription']);
    $taskDeadline = htmlspecialchars($_POST['taskDeadline']);
    $taskPriority = htmlspecialchars($_POST['taskPriority']);
    $taskCategory = htmlspecialchars($_POST['taskCategory']);


    $newTask = new Task(
        $taskID,
        $taskTitle,
        $taskDescription,
        $taskDeadline,
        $taskPriority,
        $taskCategory 
    );

    $taskRepository = new TaskRepository();

    $taskRepository->update($newTask);

    header('Location: ./../index.php');
}
