<?php

/**
 * Component Navigation
 */

use App\UrlHandler;
?>

<nav class="navigation">
    <ul class="navigation-list">
        <li class="navigation-list-element">
            <a href="/" class="navigation-link<?php if (empty($_GET)) : ?> active<?php endif; ?>">Tasks List</a>
        </li>
        <li class="navigation-list-element">
            <a href="/?action=<?= UrlHandler::$ADD_ACTION; ?>" class="navigation-link<?php if (UrlHandler::isActive()) : ?> active<?php endif; ?>">Add task</a>
        </li>
    </ul>
</nav>