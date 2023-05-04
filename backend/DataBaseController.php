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
use Error;
use PDO;
use Throwable;

class DataBaseController
{
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
            $connection = new PDO($dns, $config['database_user'], $config['database_password']);
        } catch (Throwable $e) {
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
}
