<?php

require_once 'Database.php';

class TaskManager
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function sortByDeadline($order = 'ASC')
    {
        $query = "SELECT * FROM todo_task ORDER BY taskDeadline $order";
        return $this->executeQuery($query);
    }

    public function sortByTitle($order = 'ASC')
    {
        $query = "SELECT * FROM todo_task ORDER BY taskTitle $order";
        return $this->executeQuery($query);
    }

    public function sortByPriority($order = 'ASC')
    {
        $query = "SELECT * FROM todo_task ORDER BY FIELD(taskPriority, 'Urgent', 'Important', 'Normal') $order";
        return $this->executeQuery($query);
    }

    private function executeQuery($query)
    {
        $stmt = $this->db->getDB()->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

// Example usage:
$taskManager = new TaskManager();

// Sort by taskDeadline ascending
$tasksByDeadlineAsc = $taskManager->sortByDeadline('ASC');

// Sort by taskDeadline descending
$tasksByDeadlineDesc = $taskManager->sortByDeadline('DESC');

// Sort by taskTitle ascending
$tasksByTitleAsc = $taskManager->sortByTitle('ASC');

// Sort by taskTitle descending
$tasksByTitleDesc = $taskManager->sortByTitle('DESC');

// Sort by taskPriority ascending
$tasksByPriorityAsc = $taskManager->sortByPriority('ASC');

// Sort by taskPriority descending
$tasksByPriorityDesc = $taskManager->sortByPriority('DESC');

// Now you can use the sorted tasks as needed
