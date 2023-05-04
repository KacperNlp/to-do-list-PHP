<?php

/**
 * Tasks List
 */

namespace App;

use App\DataBaseHandler;
use PDOStatement;

class TasksList
{
    private DataBaseHandler $database;
    public array $tasks;

    public function __construct(array $db_config)
    {
        $this->database = new DataBaseHandler($db_config);
    }

    public function getTasks(): array|PDOStatement
    {
        return $this->database->getTasks();
    }

    public function isTasksListNotEmpty(array|PDOStatement $tasks)
    {
        return $tasks->rowCount() > 0;
    }

    public function removeTask(string|int $taskId)
    {
        $this->database->deleteTask($taskId);
    }
}
