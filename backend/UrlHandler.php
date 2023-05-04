<?php

declare(strict_types=1);

namespace App;

class UrlHandler
{
    static private $ACTION_NAME = 'action';
    static public $ADD_ACTION = 'add';
    static public $DELETE_ACTION = 'delete';
    static public $CREATE_ACTION = 'create';

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
}
