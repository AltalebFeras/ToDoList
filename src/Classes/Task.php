<?php

class Task
{
    private $taskID;
    private $taskTitle;
    private $taskDescription;
    private $taskDeadline;
    private $taskPriority;
    private $taskCategory;

    public function __construct($taskID, $taskTitle, $taskDescription, $taskDeadline, $taskPriority, $taskCategory)
    {
        $this->taskID = $taskID;
        $this->taskTitle = $taskTitle;
        $this->taskDescription = $taskDescription;
        $this->taskDeadline = $taskDeadline;
        $this->taskPriority = $taskPriority;
        $this->taskCategory = $taskCategory;
    }

    public function getTaskID()
    {
        return $this->taskID;
    }

    public function getTaskTitle()
    {
        return $this->taskTitle;
    }

    public function setTaskTitle($taskTitle)
    {
        $this->taskTitle = $taskTitle;
    }

    public function getTaskDescription()
    {
        return $this->taskDescription;
    }

    public function setTaskDescription($taskDescription)
    {
        $this->taskDescription = $taskDescription;
    }


    public function getTaskDeadline()
    {
        return $this->taskDeadline;
    }

    public function setTaskDeadline($taskDeadline)
    {
        $this->taskDeadline = $taskDeadline;
    }
    public function getTaskPriority()
    {
        return $this->taskPriority;
    }

    public function setTaskPriority($taskPriority)
    {
        $this->taskPriority = $taskPriority;
    }
    public function getTaskCategory()
    {
        return $this->taskCategory;
    }

    public function setTaskCategory($taskCategory)
    {
        $this->taskCategory = $taskCategory;
    }

    public function toAssociativeArray()
    {
        return [
            "taskID" => $this->taskID,
            "taskTitle" => $this->taskTitle,
            "taskDescription" => $this->taskDescription,
            "taskDeadline" => $this->taskDeadline,
            "taskPriority" => $this->taskPriority,
            "taskCategory" => $this->taskCategory
        ];
    }
}
