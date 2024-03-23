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
    public function getAllTasks()
    {
        $data = $this->getDB()->query('SELECT * FROM todo_task');

        $tasks = [];

        foreach ($data as $task) {
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

    
    public function getLastTaskID()
    {
        $pdo = $this->getDb();
        
        // Query to get the maximum task ID
        $query = "SELECT MAX(taskID) AS last_id FROM todo_task";

        $statement = $pdo->prepare($query);
        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result['last_id'];
    }

        public function update($task)
        {
            $request = 'UPDATE todo_task SET taskID = :taskID, getTaskTitle = :getTaskTitle, taskDescription = :taskDescription, taskDeadline = :taskDeadline, taskPriority , = :taskPriority ,taskCategory = :taskCategory  WHERE userID = :userID';

            $query = $this->getDb()->prepare($request);

            $query->execute([
                'taskID' => $task->getTaskID(),
                'getTaskTitle' => $task->getTaskTitle(),
                'taskDescription' => $task->getTaskDescription(),
                'taskDeadline' => $task->getTaskDeadline(),
                'taskPriority ,' => $task->getTaskPriority(),
                'taskCategory' => $task->getTaskCategory(),

            ]);
        }

        public function displayTask()
        {
            $data = $this->getDb()->query('SELECT * FROM todo_task' );

            $tasks = [];

            foreach ($data as $task) {
                $newTask = new Task (
                    $task['getTaskTitle'],
                    $task['taskDescription'],
                    $task['taskDeadline'],
                    $task['taskPriority'],
                    $task['taskCategory'],
                    $task['taskID'],
                );

                $tasks[] = $newTask;

            }

            return $tasks;
             
        }
        

        public function delete($taskID)
        {
            $request = 'DELETE FROM todo_task WHERE taskID = :taskID';

            $query = $this->getDb()->prepare($request);

            $query->execute([
                'taskID' => $taskID
            ]);
        }
    }
