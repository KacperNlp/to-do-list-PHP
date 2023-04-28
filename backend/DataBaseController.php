<?php

/**
 * Controller DataBase
 */

declare(strict_types=1);

namespace App;

use Error;
use PDO;
use Throwable;

class DataBaseController
{
    public function __construct(array $config)
    {
        $dns = "mysql:dbname={$config['database']};host={$config['host']}";

        $this->connectToDataBase($dns, $config);
    }

    private function connectToDataBase(string $dns, array $config)
    {
        try {
            $connection = new PDO($dns, $config['database_user'], $config['database_password']);
        } catch (Error $e) {
            var_dump('Error!');
        } catch (Throwable $e) {
            var_dump('Throwable, this could be Exceprion!');
        }
    }
}
