<?php
require_once "./src/Repositories/TaskRepository.php";

$taskRepository = new TaskRepository();

// Get the logged-in user's ID from the session
$loggedInUserID = $_SESSION['user'];

// Assuming $loggedInUserID holds the ID of the logged-in user
$lastTaskIDForUser = $taskRepository->getLastTaskIDForUser();

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
            <button id="taskDisplayed" type="button" class="list-group-item list-group-item-action mb-2 custom-class d-inline-flex" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $lastTaskID ?>">

                <span class="" data-bs-toggle="tooltip" data-bs-placement="bottom" title=" Task's Title"><?= $task->getTaskTitle() ?></span>
                <span class="  mx-3" data-bs-toggle="tooltip" data-bs-placement="bottom" title=" Task's Deadline"><?= $task->getTaskDeadline() ?></span>
                <span class="badge rounded-pill 
    <?php
            $priority = $task->getTaskPriority();
            if ($priority === 'Normal') {
                echo 'bg-info';
            } elseif ($priority === 'Important') {
                echo 'bg-warning';
            } elseif ($priority === 'Urgent') {
                echo 'bg-danger';
            }
    ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Task's Priority">
                    <?= $priority ?>
                </span>

            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal<?= $lastTaskID ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete your task</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h4><?= $task->getTaskTitle() ?></h4>
                            <p>Description: <?= $task->getTaskDescription() ?></p>
                            <p>Deadline: <?= $task->getTaskDeadline() ?></p>
                            <p>Priority: <?= $task->getTaskPriority() ?></p>
                            <p>Category: <?= $task->getTaskCategory() ?></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <form id="deleteFormTask" action="" method="post">
                                <input type="hidden" name="taskTitle" id="taskIDInput" value="<?= $task->getTaskTitle() ?>">
                                <input type="hidden" name="taskDeadline" id="taskDeadlineInput" value="<?= $task->getTaskDeadline() ?>">
                                <input type="hidden" name="taskPriority" id="taskPriorityInput" value="<?= $task->getTaskPriority() ?>">
                                <button type="submit" id="buttonDeleteTask" class="btn bg-danger">Confirme</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>