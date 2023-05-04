<?php

/**
 * Controller DataBase
 */

declare(strict_types=1);

namespace App;

require_once('./backend/Exception/ConfigurationException.php');
require_once('./backend/Exception/StorageException.php');

use App\Excpetion\ConfigurationException;
use App\Excpetion\StorageException;
use PDO;
use PDOException;
use PDOStatement;

class DataBaseController
{
    private PDO $connectionDB;

    public function __construct(array $config)
    {
        if ($this->isDatabaseConfigurationNotCorrect($config)) {
            throw new ConfigurationException('Your database confioguration to DNS are not correct!');
        };

        $dns = "mysql:dbname={$config['database']};host={$config['host']}";

        $this->connectToDataBase($dns, $config);
    }

    private function connectToDataBase(string $dns, array $config)
    {
        try {
            $this->connectionDB = new PDO($dns, $config['database_user'], $config['database_password'], [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
        } catch (PDOException $e) {
            throw new StorageException('We have problem with DNS connection!');
        }
    }

    private function isDatabaseConfigurationNotCorrect(array $config): bool
    {
        $isDbNameEmpty = empty($config['database']);
        $isDbHostEmpty = empty($config['host']);
        $isDbUserNameEmpty = empty($config['database_user']);
        $isDbPasswordEmpty = empty($config['database_password']);

        return $isDbNameEmpty || $isDbHostEmpty || $isDbUserNameEmpty || $isDbPasswordEmpty;
    }

    public function createTaskToList(array $task): void
    {
        try {
            $title = $this->connectionDB->quote($task['title']);
            $description = $this->connectionDB->quote($task['description']);
            $date = $this->connectionDB->quote($task['date']);

            $query = "
                INSERT INTO tasks (title, description, created) 
                VALUES ($title, $description, $date)
            ";

            $this->connectionDB->exec($query);
        } catch (PDOException  $e) {
            echo "Error with DB: " . $e->getMessage();
            throw new StorageException('Error with adding task to DB');
        }
    }

    public function getAllTasks(): array|PDOStatement
    {
        try {
            $query = "
                SELECT * FROM tasks
            ";
            $result = $this->connectionDB->query($query);
            return $result;
        } catch (PDOException $e) {
            echo "Error with DB: " . $e->getMessage();
            throw new StorageException('Error with adding task to DB');
        }

        return [];
    }
}
