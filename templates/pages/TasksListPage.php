<?php

/**
 * Page TasksList
 */

use App\UrlHandler;;

$allTasks = $tasksList->getTasks();
$isTasksListEmpty = $tasksList->isTasksListNotEmpty($allTasks);

if ($urlHandler->isDelete()) {
    $idOfTaskToDelete = $urlHandler->getIdOfTaskToDelete();
    $tasksList->removeTask($idOfTaskToDelete);
}

if ($isTasksListEmpty) :
?>
    <h1 class="headline-main">TasksList!</h1>
    <ul>
        <?php foreach ($allTasks as $task) : ?>
            <li>
                <p><?= $task['title']; ?></p>
                <p><?= $task['description']; ?></p>
                <p><?= $task['created']; ?></p>
                <a href="/?action=<?= UrlHandler::$DELETE_ACTION; ?>&id=<?= $task['id']; ?>">Delete!</a>
                <a href="/?action=<?= UrlHandler::$DELETE_ACTION; ?>&id=<?= $task['id']; ?>">Edit!</a>
                <a href="/?action=<?= UrlHandler::$DELETE_ACTION; ?>&id=<?= $task['id']; ?>">More!</a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else : ?>
    <h1 class="headline-main">You don't have any tasks :/</h1>
<?php endif; ?>