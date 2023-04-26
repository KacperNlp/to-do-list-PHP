<?php

/**
 * Component MainContent
 */

if ($urlHandler->isAddAction()) :
    include_once('./templates/pages/AddTaskPage.php');
else :
    include_once('./templates/pages/TasksListPage.php');
endif;
