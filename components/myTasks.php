<?php
require_once "./src/Repositories/TaskRepository.php";

$taskRepository = new TaskRepository();

// Get the logged-in user's ID from the session
$loggedInUserID = $_SESSION['user'];

// Assuming $loggedInUserID holds the ID of the logged-in user
$lastTaskIDForUser = $taskRepository->getLastTaskIDForUser($loggedInUserID);

// Fetch tasks belonging to the logged-in user
$tasks = $taskRepository->getAllTasksForUser($loggedInUserID);

// Initialize lastTaskID to 0 if no tasks are found
$lastTaskID = $lastTaskIDForUser ? $lastTaskIDForUser : 0;
?>

<div>
    <h3 class="my-2 px-5 py-2 p-3 mb-2  text-dark">My tasks</h3>

    <div id="listOfTasks" class="list-group">
        <?php foreach ($tasks as $task) {
            $lastTaskID++; // Increment lastTaskID for each new task
        ?>
            <button type="button" class="list-group-item list-group-item-action" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $lastTaskID ?>">
                <span class="badge rounded-pill bg-danger"><?= $task->getTaskPriority() ?></span>
                <?= $task->getTaskTitle() ?>
                <span class="badge rounded-pill bg-danger"><?= $task->getTaskDeadline() ?></span>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal<?= $lastTaskID ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit your task</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h4><?= $task->getTaskTitle() ?></h4>
                            <p>Description: <?= $task->getTaskDescription() ?></p>
                            <p>Deadline: <?= $task->getTaskDeadline() ?></p>
                            <p>Priority: <?= $task->getTaskPriority() ?></p>
                            <p>Category: <?= $task->getTaskCategory() ?></p>
                        </div>

                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>