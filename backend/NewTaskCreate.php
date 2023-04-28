<?php

declare(strict_types=1);

namespace App;

require_once('./backend/DataBaseController.php');

class NewTaskCreate
{
    private $currentTask = [];
    private $postData = [];

    public function __construct(array $postData, array $db_config)
    {
        $db = new DataBaseController($db_config);
        $this->postData = $postData;
    }

    public function setData()
    {
        if (!empty($_POST)) {
            $this->setDataTitle();
            $this->setDataDescription();
            $this->setDataDate();
        }
    }

    private function setDataTitle()
    {
        $this->currentTask['title'] = $this->postData['title'] ?? null;
    }

    private function setDataDescription()
    {
        $this->currentTask['description'] = $this->postData['description'] ?? null;
    }

    private function setDataDate()
    {
        $createdDate = date('d.m.y');
        $this->currentTask['date'] = $createdDate;
    }

    public function getDataTitle()
    {
        return $this->currentTask['title'];
    }

    public function getDataDescription()
    {
        return $this->currentTask['description'];
    }

    public function getDataDate()
    {
        return $this->currentTask['date'];
    }

    public function TaskIsCreated()
    {
        $isTitleEmpty = !empty($this->currentTask['title']);
        $isDescriptionEmpty = !empty($this->currentTask['description']);
        $isDateEmpty = !empty($this->currentTask['date']);
        return $isTitleEmpty && $isDescriptionEmpty && $isDateEmpty;
    }
}
