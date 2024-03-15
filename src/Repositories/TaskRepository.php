    <?php

    require_once __DIR__ . "/../Classes/Database.php";
    require_once __DIR__ . "/../Classes/Task.php";

    class TaskRepository extends Database
    {
        public function getAll()
        {
            $data = $this->getDb()->query('SELECT * FROM Task');

            $tasks = [];

            foreach ($data as $task) {
                $newTask = new Task(
                    $task['taskTitle'],
                    $task['taskDescription'],
                    $task['taskDeadline'],
                    $task['taskPriority'],
                    $task['taskCategory']
                );

                $tasks[] = $newTask;
            }

            return $tasks;
        }

        public function create($newTask)
        {
            // Inserting the task
            $request = 'INSERT INTO todo_task (taskTitle, taskDescription, taskDeadline, taskPriority, taskCategory) VALUES (?, ?, ?, ?, ?)';
            $query = $this->getDb()->prepare($request);
        
            $query->execute([
                $newTask->getTaskTitle(),
                $newTask->getTaskDescription(),
                $newTask->getTaskDeadline(),
                $newTask->getTaskPriority(),
                $newTask->getTaskCategory(),
                 // Assuming you have a method to get the userID of the user who created the task
            ]);
        
            // Inserting the category if it doesn't exist
            $requestCategory = 'INSERT INTO todo_category (taskCategory) SELECT ? WHERE NOT EXISTS (SELECT 1 FROM todo_category WHERE taskCategory = ?)';
            $queryCategory = $this->getDb()->prepare($requestCategory);
            $queryCategory->execute([$newTask->getTaskCategory(), $newTask->getTaskCategory()]);
        
            // Inserting the priority if it doesn't exist
            $requestPriority = 'INSERT INTO todo_priority (taskPriority) SELECT ? WHERE NOT EXISTS (SELECT 1 FROM todo_priority WHERE taskPriority = ?)';
            $queryPriority = $this->getDb()->prepare($requestPriority);
            $queryPriority->execute([$newTask->getTaskPriority(), $newTask->getTaskPriority()]);
        }
        
    }
