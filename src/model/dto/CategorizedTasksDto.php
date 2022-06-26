<?php

require_once "TaskDto.php";
require_once "src/model/Task.php";

class CategorizedTasksDto implements JsonSerializable
{
    private array $A = array();
    private array $B = array();
    private array $C = array();

    public function __construct(array $A, array $B, array $C)
    {
        foreach ($A as $task){
            $this->A[] = TaskDto::from($task);
        }
        foreach ($B as $task){
            $this->B[] = TaskDto::from($task);
        }
        foreach ($C as $task){
            $this->C[] = TaskDto::from($task);
        }
    }

    public static function from(array $categorizedArray): CategorizedTasksDto
    {
        return new CategorizedTasksDto($categorizedArray['A'], $categorizedArray['B'], $categorizedArray['C']);
    }

    /**
     * @return mixed
     */
    public function getA()
    {
        return $this->A;
    }

    /**
     * @return mixed
     */
    public function getB()
    {
        return $this->B;
    }

    /**
     * @return mixed
     */
    public function getC()
    {
        return $this->C;
    }

    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }
}