<?php



require_once "./src/Repositories/TaskRepository.php";

$taskRepository = new TaskRepository();
?>
<div>

    <h3 class="my-2 px-5 py-2 p-3 mb-2  text-dark ">My tasks</h3>



    <?php
    // Assuming this code block is part of your PHP file

    // Call the getAllTask() function to retrieve tasks
    $tasks = $taskRepository->getAllTasks();

    // Check if there are tasks to display
    if (!empty($tasks)) {
        // Iterate through each task and display its details
        foreach ($tasks as $task) {
    ?>
            <div class="task">
                <h3><?php echo $task->getTaskTitle(); ?></h3>
                <p>Description: <?php echo $task->getTaskDescription(); ?></p>
                <p>Deadline: <?php echo $task->getTaskDeadline(); ?></p>
                <p>Priority: <?php echo $task->getTaskPriority(); ?></p>
                <p>Category: <?php echo $task->getTaskCategory(); ?></p>
            </div>
    <?php
        }
    } else {
        // If no tasks are found, display a message
        echo "<p>No tasks found.</p>";
    }
    ?>



    <div id="listOfTasks" class="list-group ">
        <button id="tasksField" type="button" class="list-group-item list-group-item-action" data-bs-toggle="modal" data-bs-target="#exampleModal"> <span class="badge rounded-pill bg-danger">
                <?php
                $loggedInUserID = $_SESSION['user'];
                $tasks = $taskRepository->getAllTask();
                foreach ($tasks as $task) {
                    if ($task->getUserTaskID() == $loggedInUserID) {
                        echo   $task->getTaskTitle();
                    }
                }


                ?>
            </span>
            <?php
            $loggedInUserID = $_SESSION['user'];
            $users = $userRepository->getAll();
            foreach ($users as $user) {
                if ($user->getUserID() == $loggedInUserID) {
                    echo   $user->getSurname();
                }
            }
            ?>
            <span class="badge rounded-pill bg-danger"><?php
                                                        $loggedInUserID = $_SESSION['user'];
                                                        $users = $userRepository->getAll();
                                                        foreach ($users as $user) {
                                                            if ($user->getUserID() == $loggedInUserID) {
                                                                echo   $user->getSurname();
                                                            }
                                                        }
                                                        ?></span>
        </button>



        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit your task</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div id="taskDescription" class="modal-body">
                        <?php
                        $loggedInUserID = $_SESSION['user'];
                        $users = $userRepository->getAll();
                        foreach ($users as $user) {
                            if ($user->getUserID() == $loggedInUserID) {
                                echo   $user->getSurname();
                            }
                        }
                        ?> </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary">Confirme</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>