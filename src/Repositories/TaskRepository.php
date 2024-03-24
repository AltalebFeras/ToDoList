<?php

require_once __DIR__ . "/../Classes/Database.php";
require_once __DIR__ . "/../Classes/Task.php";

class TaskRepository extends Database
{
    public function create($newTask)
    {
        // Inserting the task
        $request = 'INSERT INTO todo_task (taskTitle, taskDescription, taskDeadline, taskPriority, taskCategory , userTaskID) VALUES (?, ?, ?, ?, ?, ?)';
        $query = $this->getDb()->prepare($request);
        // print_r($newTask);
        // die();
        $query->execute([
            $newTask->getTaskTitle(),
            $newTask->getTaskDescription(),
            $newTask->getTaskDeadline(),
            $newTask->getTaskPriority(),
            $newTask->getTaskCategory(),
            $newTask->getUserTaskID()
        ]);
    }
    public function getAllTasksForUser($userID)
    {
        $pdo = $this->getDb();

        // Query to fetch tasks for the given user
        $query = "SELECT * FROM todo_task WHERE userTaskID = :userID";

        $statement = $pdo->prepare($query);
        $statement->bindParam(':userID', $userID, PDO::PARAM_INT);
        $statement->execute();

        $tasks = [];

        foreach ($statement as $task) {
            $newTask = new Task(
                $task['taskTitle'],
                $task['taskDescription'],
                $task['taskDeadline'],
                $task['taskPriority'],
                $task['taskCategory'],
                $task['taskID']
            );

            $tasks[] = $newTask;
        }

        return $tasks;
    }



    public function getLastTaskIDForUser()
    {
        $pdo = $this->getDb();

        // Get the logged-in user's ID from the session
        $loggedInUserID = $_SESSION['user'];

        // Query to get the maximum task ID for the given user
        $query = "SELECT MAX(taskID) AS last_id FROM todo_task WHERE userTaskID = :userID";

        $statement = $pdo->prepare($query);
        $statement->bindParam(':userID', $loggedInUserID, PDO::PARAM_INT);
        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result['last_id'];
    }


    

   public function update($task)
{
    $request = 'UPDATE todo_task SET taskID = :taskID, taskTitle = :taskTitle, taskDescription = :taskDescription,
     taskDeadline = :taskDeadline, taskPriority = :taskPriority , taskCategory = :taskCategory  
    WHERE taskID = :taskID';

    $query = $this->getDb()->prepare($request);

    $query->execute([
        'taskID' => $task->getTaskID(),
        'taskTitle' => $task->getTaskTitle(),
        'taskDescription' => $task->getTaskDescription(),
        'taskDeadline' => $task->getTaskDeadline(),
        'taskPriority' => $task->getTaskPriority(),
        'taskCategory' => $task->getTaskCategory(),
    ]);
}

public function delete($taskTitle, $taskDeadline, $taskPriority)
{
    $request = 'DELETE FROM todo_task WHERE taskTitle = :taskTitle AND taskDeadline = :taskDeadline AND taskPriority = :taskPriority';

    $query = $this->getDb()->prepare($request);

    $query->execute([
        'taskTitle' => $taskTitle,
        'taskDeadline' => $taskDeadline,
        'taskPriority' => $taskPriority
    ]);

    // Check if any rows were affected by the delete operation
    if ($query->rowCount() > 0) {
        return true; // Task deleted successfully
    } else {
        return false; // Task not found or not deleted
    }
}

}
