<?php
require_once "Entity.php";

#[Table("TaskCategory")]
class Category extends Entity
{
    #[Column("id")]
    private $id;
    #[Column("name")]
    private $name;

    public function __construct(array $arrayConstructor)
    {
        parent::__construct($this, $arrayConstructor);
    }

    public static function create($name, $id = null): Category
    {
        return new Category(array(
            "id" => $id,
            "name" => $name
        ));
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
    public function getName()
    {
        return $this->name;
    }
}