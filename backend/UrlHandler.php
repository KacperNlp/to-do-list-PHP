<?php

declare(strict_types=1);

namespace App;

class UrlHandler
{
    static private $ACTION_NAME = 'action';
    static private $ADD_ACTION = 'add';

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
}
