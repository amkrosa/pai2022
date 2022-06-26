<?php

require_once "src/repository/DatabaseView.php";
require_once "Entity.php";

#[Table("Task", DatabaseView::Task)]
class Task extends Entity
{
    #[Column("id")]
    private string $id;
    #[Column("value")]
    private string $value;
    #[Column("category_id", "Category")]
    private Category|string $category;
    #[Column("date_added")]
    private $dateAdded;
    #[Column("date_ended")]
    private $dateEnded;

    public function __construct(array $arrayConstructor)
    {
        parent::__construct($this, $arrayConstructor);
    }

    public static function create(string $value, Category|string $category, $dateAdded, $dateEnded, string $id = null): Task
    {
        return new Task(array(
            "id" => $id,
            "value" => $value,
            "category_id" => $category,
            "date_added" => $dateAdded,
            "date_ended" => $dateEnded
            ));
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getCategory(): Category|string
    {
        return $this->category;
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
}