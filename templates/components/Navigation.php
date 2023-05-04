<?php

/**
 * Component Navigation
 */

use App\UrlHandler;;

?>

<nav>
    <ul>
        <li><a href="/">Tasks List</a></li>
        <li><a href="/?action=<?= UrlHandler::$ADD_ACTION; ?>">Add task</a></li>
    </ul>
</nav>