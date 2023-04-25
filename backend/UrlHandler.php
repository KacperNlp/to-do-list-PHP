<?php

declare(strict_types=1);

namespace App\Backend;

class UrlHandler
{
    static public $ADD_ACTION = 'add';

    private $currentAction;

    public function __construct()
    {
        $this->setUrLProperty(UrlHandler::$ADD_ACTION);
    }

    private function setUrLProperty($property): void
    {
        if (!empty($_GET[$property])) $this->currentAction = $_GET[$property];
    }

    public function getCurrentAction()
    {
        if (!empty($this->currentAction)) return $this->currentAction;
        else return null;
    }
}
