<?php

declare(strict_types=1);

namespace App;

use App\Excpetion\AppExcpetion;
use App\Excpetion\ConfigurationException;
use App\Excpetion\StorageException;
use App\NewTaskCreate;
use Throwable;

require_once('./backend/UrlHandler.php');
require_once('./backend/NewTaskCreate.php');
require_once('./backend/Exception/AppException.php');
require_once('./backend/TasksList.php');
require_once('./backend/DataBaseHandler.php');

$db_config = require_once('./config/config.php');

// error_reporting(0);
// ini_set('display_errors', 0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App to do list!</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.min.css">
</head>

<body>
    <?php try {
        $tasksList = new TasksList($db_config);
        $newTaskCreate = new NewTaskCreate($_POST, $db_config);
        $urlHandler = new UrlHandler();
    ?>
        <div class="page">
            <header>
                <?php require_once('./templates/components/Navigation.php'); ?>
            </header>
            <main>
                <?php require_once('./templates/components/MainContent.php'); ?>
            </main>
        </div>
        <?php require_once('./templates/components/Footer.php'); ?>
        <script src="dist/bundle.js"></script>
    <?php } catch (ConfigurationException $e) { ?>
        <h1>We have error with Configuration</h1>
        <h3>Error: <?= $e->getMessage(); ?></h3>
    <?php } catch (StorageException $e) { ?>
        <h1>We have error with Storage</h1>
        <h3>Error: <?= $e->getMessage(); ?></h3>
    <?php } catch (AppExcpetion $e) { ?>
        <h1>We have error with App</h1>
        <h3>Error: <?= $e->getMessage(); ?></h3>
    <?php } catch (Throwable $e) {; ?>
        <h1>We have error with App</h1>
        <?= $e->getMessage(); ?>
    <?php
    }; ?>
</body>

</html>