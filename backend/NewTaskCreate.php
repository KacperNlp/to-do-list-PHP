<?php

declare(strict_types=1);

namespace App;

class NewTaskCreate
{
    private $currentTask = [];

    public function __construct()
    {
        $this->setData();
    }

    private function setData()
    {
        if (!empty($_POST)) {
            $this->setDataTitle();
            $this->setDataDescription();
            $this->setDataDate();
        }
    }

    private function setDataTitle()
    {
        $this->currentTask['title'] = $_POST['title'] ?? null;
    }

    private function setDataDescription()
    {
        $this->currentTask['description'] = $_POST['description'] ?? null;
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
