<?php

/**
 * Database handler
 */

namespace App;

require_once('DataBaseController.php');

use App\DataBaseController;
use PDOStatement;

class DataBaseHandler
{
    private DataBaseController $db;

    public function __construct($db_config)
    {
        $this->db = new DataBaseController($db_config);
    }

    public function createTask(array $task): void
    {
        $this->db->createTaskToList($task);
    }

    public function getTasks(): array|PDOStatement
    {
        $tasks = $this->db->getAllTasks();
        return $tasks;
    }
}
