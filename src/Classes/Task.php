<?php

class Task
{
    protected $taskID;
    protected $taskTitle;
    protected $taskDescription;
    protected $taskDeadline;
    protected $taskPriority;
    protected $taskCategory;
    protected $userTaskID;

    public function __construct($taskTitle, $taskDescription, $taskDeadline, $taskPriority, $taskCategory, $userTaskID)
    {
        $this->taskTitle = $taskTitle;
        $this->taskDescription = $taskDescription;
        $this->taskDeadline = $taskDeadline;
        $this->taskPriority = $taskPriority;
        $this->taskCategory = $taskCategory;
        $this->userTaskID= $_SESSION['user'];
    }

    // Getters
    public function getTaskTitle()
    {
        return $this->taskTitle;
    }

    public function getTaskDescription()
    {
        return $this->taskDescription;
    }

    public function getTaskDeadline()
    {
        return $this->taskDeadline;
    }

    public function getTaskPriority()
    {
        return $this->taskPriority;
    }

    public function getTaskCategory()
    {
        return $this->taskCategory;
    }
    public function getUserTaskID()
    {
        return $this->userTaskID;
    }

    public function setUserTaskID($userTaskID)
    {
        $this->userTaskID = $userTaskID;

    }




    public function toAssociativeArray()
    {
        return [
            // "taskID" => $this->taskID,
            "taskTitle" => $this->taskTitle,
            "taskDescription" => $this->taskDescription,
            "taskDeadline" => $this->taskDeadline,
            "taskPriority" => $this->taskPriority,
            "taskCategory" => $this->taskCategory
        ];
    }
}
