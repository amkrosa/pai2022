<?php

require_once 'src/model/Task.php';

class TaskDto implements JsonSerializable
{
    public function __construct(
        private $id,
        private $value,
        private $categoryName,
        private $dateAdded,
        private $dateEnded
    ){}

    public static function from(Task $task): TaskDto
    {
        return new TaskDto($task->getId(), $task->getValue(), $task->getCategory()->getName(),
            $task->getDateAdded(), $task->getDateEnded());
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return mixed
     */
    public function getCategoryName()
    {
        return $this->categoryName;
    }

    /**
     * @return mixed
     */
    public function getDateAdded()
    {
        return $this->dateAdded;
    }

    /**
     * @return mixed
     */
    public function getDateEnded()
    {
        return $this->dateEnded;
    }

    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }
}