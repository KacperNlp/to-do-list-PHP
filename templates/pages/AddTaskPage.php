<?php

/**
 * Page AddTask
 */

use App\UrlHandler;; ?>

<div class="add-task-page">
    <div class="card">
        <h1 class="headline-main">Add new task</h1>
        <form action="/?action=<?= UrlHandler::$CREATE_ACTION; ?>" method="post" class="form-add-task">
            <label class="form-add-task-label">
                <span class="form-add-task-label-text">Task title:</span>
                <input type="text" name="title" class="form-add-task-input">
            </label>
            <label class="form-add-task-label">
                <span class="form-add-task-label-text">Task description:</span>
                <textarea name="description" cols="30" rows="10" class="form-add-task-textarea"></textarea>
            </label>
            <div>
                <input type="submit" value="Add task!" class="button">
            </div>
        </form>
    </div>
</div>