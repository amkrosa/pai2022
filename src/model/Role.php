<?php

#[Table("UserRole")]
class Role extends Entity
{
    #[Column("id")]
    private $id;
    #[Column("name")]
    private $name;

    public function __construct(array $arrayConstructor)
    {
        parent::__construct($this, $arrayConstructor);
    }

    public static function create(string $name, string $id = null): Role
    {
        return new Role(array(
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