<?php

/**
 * Page AddTask
 */

use App\UrlHandler;; ?>

<div class="add-task-page">
    <div class="card">
        <h3>Add new task</h3>
        <form action="/?action=<?= UrlHandler::$CREATE_ACTION; ?>" method="post">
            <label>
                <span>Task title:</span>
                <input type="text" name="title">
            </label>
            <label>
                <span>Task description:</span>
                <textarea name="description" cols="30" rows="10"></textarea>
            </label>
            <input type="submit" value="Add task!">
        </form>
    </div>
</div>