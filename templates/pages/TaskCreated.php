<?php

/**
 * Page TaskCreated
 */
$newTaskCreate->setData();

if ($newTaskCreate->TaskIsCreated()) :
?>
    <h1>Well done, you already created your ticket!</h1>
    <div class="new-ticket">
        <h2><?= $newTaskCreate->getDataTitle(); ?></h2>
        <p><?= $newTaskCreate->getDataDescription(); ?></p>
        <p>Created at: <?= $newTaskCreate->getDataDate(); ?></p>
    </div>
<?php else : ?>
    <h1>Sorry we have problem!</h1>
<?php endif; ?>