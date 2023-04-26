<?php

/**
 * Page AddTask
 */; ?>

<div class="form-container">
    <h3>Add new task</h3>
    <form action="/?action=create" method="post">
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