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
            $request = 'INSERT INTO todo_task (taskTitle, taskDescription, taskDeadline, taskPriority,taskCategory) VALUES (?, ?, ?, ?, ?)';
            $query = $this->getDb()->prepare($request);

            $query->execute([
                $newTask->getTaskTitle(),
                $newTask->getTaskDescription(),
                $newTask->getTaskDeadline(),
                $newTask->getTaskPriority(),
                $newTask->getTaskCategory()
            ]);
        }
    }
