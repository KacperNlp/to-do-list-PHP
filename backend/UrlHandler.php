<?php

declare(strict_types=1);

namespace App;

class UrlHandler
{
    static private $ACTION_NAME = 'action';
    static public $ADD_ACTION = 'add';
    static public $DELETE_ACTION = 'delete';
    static public $EDIT_ACTION = 'edit';
    static public $CREATE_ACTION = 'create';

    static public function isActive(): bool
    {
        if (empty($_GET) || !array_key_exists(self::$ACTION_NAME, $_GET)) {
            return false;
        }

        if ($_GET[self::$ACTION_NAME] === self::$ADD_ACTION) {
            return true;
        }

        return false;
    }

    private $currentAction;

    public function __construct()
    {
        $this->setCurrentAction(self::$ACTION_NAME);
    }

    private function setCurrentAction(string $property): void
    {
        $this->currentAction = $_GET[$property] ?? null;
    }

    public function getCurrentAction()
    {
        return $this->currentAction;
    }

    public function isAddAction()
    {
        return $this->currentAction === self::$ADD_ACTION;
    }

    public function isCreateAction()
    {
        return $this->currentAction === self::$CREATE_ACTION;
    }

    public function isDelete()
    {
        return $this->currentAction === self::$DELETE_ACTION;
    }

    public function getIdOfTaskToDelete(): string|int
    {
        $taskId = $_GET['id'];
        return $taskId;
    }
}
