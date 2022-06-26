<?php

require_once "src/repository/DatabaseView.php";

foreach (scandir(dirname(__FILE__)) as $filename) {
    $path = dirname(__FILE__) . '/' . $filename;
    if (is_file($path) && !str_contains($path, 'Entity.php')) {
        require $path;
    }
}


abstract class Entity
{
    private $entity;
    private string $table;
    private array $columns;

    public function __construct($entity, array $arrayConstructor)
    {
        $this->entity = $entity;
        $this->table = $this::getTableName($entity);
        $this->columns = $this::getColumnsNames($entity);
        $this->setProperties($arrayConstructor);
    }

    public static function getTableName($entity): string
    {
        $reflectionEntity = new ReflectionClass($entity);
        $tableAttribute = $reflectionEntity->getAttributes(Table::class)[0];
        return $tableAttribute->getArguments()[0];
    }

    public static function getColumnsNames($entity, bool $asValues = false): array
    {
        $entityColumns = array();
        $reflectionEntity = new ReflectionClass($entity);
        $reflectionProperties = $reflectionEntity->getProperties();
        foreach ($reflectionProperties as $reflectionProperty) {
            $columnAttribute = $reflectionProperty->getAttributes(Column::class)[0];
            $entityColumns[$columnAttribute->getArguments()[0]] = null;
        }
        return $entityColumns;
    }

    /**
     * @throws ReflectionException
     */
    public static function getColumnsReferences($entity): array
    {
        //TODO refactor code repetition
        $entityColumns = array();
        $reflectionEntity = new ReflectionClass($entity);
        $reflectionProperties = $reflectionEntity->getProperties();
        foreach ($reflectionProperties as $reflectionProperty) {
            $columnAttribute = $reflectionProperty->getAttributes(Column::class)[0];
            if (array_key_exists(1, $columnAttribute->getArguments())) {
                $entityColumns[$columnAttribute->getArguments()[0]] = array("this" => $columnAttribute->getArguments()[0],
                    "references" => $columnAttribute->getArguments()[1]);
            }
        }
        return $entityColumns;
    }

    public static function getTableView($entity): DatabaseView|null
    {
        $reflectionEntity = new ReflectionClass($entity);
        $tableAttribute = $reflectionEntity->getAttributes(Table::class)[0];
        return count($tableAttribute->getArguments()) == 2 ? $tableAttribute->getArguments()[1] : null;
    }

    protected function setColumn($name, $value): void
    {
        $this->columns[$name] = $value;
    }

    protected function setProperties($dbArray): void
    {
        $reflectionEntity = new ReflectionClass($this->entity);
        $properties = $reflectionEntity->getProperties();
        foreach ($properties as $property) {
            $attribute = $property->getAttributes(Column::class)[0];
            $name = $attribute->getArguments()[0];
            $property->setValue($this->entity, $dbArray[$name]);
            $this->setColumn($name, $dbArray[$name]);
        }
    }

    public function getColumns(): array
    {
        $cpy = $this->columns;
        return $cpy;
    }

    public function getTable(): string
    {
        return $this->table;
    }
}