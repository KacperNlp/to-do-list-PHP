<?php

/**
 * Page TasksList
 */;

$allTasks = $tasksList->getTasks();
$isTasksListEmpty = $tasksList->isTasksListNotEmpty($allTasks);
var_dump($allTasks);

if ($isTasksListEmpty) :
?>
    <h1>TasksList!</h1>
    <ul>
        <?php foreach ($allTasks as $task) : ?>
            <li>
                <p><?= $task['title']; ?></p>
                <p><?= $task['description']; ?></p>
                <p><?= $task['created']; ?></p>
                <a href="/?delete=<?= $task['id']; ?>">Delete!</a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else : ?>
    <h1>You don't have any tasks :/</h1>
<?php endif; ?>