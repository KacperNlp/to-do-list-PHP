<?php

/**
 * Component MainContent
 */

if ($urlHandler->isAddAction()) :
    include_once('./templates/pages/AddTaskPage.php');
elseif ($urlHandler->isCreateAction()) :
    include_once('./templates/pages/TaskCreated.php');
else :
    include_once('./templates/pages/TasksListPage.php');
endif;
