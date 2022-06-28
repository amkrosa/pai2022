<?php

require_once "src/model/Entity.php";
require_once "Database.php";
require_once "src/util/UUID.php";

abstract class Repository {
    protected Database $database;
    protected string $tableName;
    protected string $entityClass;

    public function __construct(string $entityName, string $tableName)
    {
        $this->database = new Database();
        $this->entityClass = $entityName;
        $this->tableName = 'public.'.'"'.$tableName.'"';
    }

    public function save(Entity $entity, bool $update = false): string|null
    {
        $id = UUID::v4();
        $statement = $this->database->connect()->prepare($update ? $this->updateSql($entity) : $this->insertSql($entity));
        $values = $entity->getColumns();
        $values['id'] = $id;
        $statement->execute(array_values($values));
        return $update ? null : $id;
    }

    public function updateSingle(string $columnName, mixed $value)
    {
        $statement = $this->database->connect()->prepare("UPDATE ".$this->tableName." SET ".$columnName."="."'".$value."'");
        $statement->execute();
    }

    public function findById($id)
    {
        return $this->findBy('id', $id);
    }

    public function findBy($column, $value)
    {
        $statement = $this->database->connect()->prepare($this->selectWhereSql($column.' = :value'));
        $statement->bindParam(':value', $value);
        $statement->execute();
        $entity = $statement->fetchAll(PDO::FETCH_ASSOC);
        if ($entity == false) return null;
        return new $this->entityClass($entity[0]);
    }

    public function findAll(): array
    {
        $statement = $this->database->connect();
        if (Entity::getTableView($this->entityClass) != null) {
            $view = Entity::getTableView($this->entityClass);
            $sql = $this->selectView($view->value);
        } else {
            $sql = $this->selectSql();
        }
        $statement = $statement->prepare($sql);
        $statement->execute();
        $entities = $statement->fetchAll(PDO::FETCH_ASSOC);

        return Entity::getTableView($this->entityClass) != null ? $this->evaluateReferences($entities) : $this->createPlainEntities($entities);
    }

    private function evaluateReferences($entities): array
    {
        $result = [];
        foreach ($entities as $entity)
        {
            $doneReferences = array();
            $entityArray = $entity;
            $mainEntityId = $entityArray['id'];
            unset($entityArray['id']);
            $references = Entity::getColumnsReferences($this->entityClass);
            foreach ($references as $value) {
                $referenceId = $entity[$value['this']];
                $referencedFields = Entity::getColumnsNames($value['references'], true);
                //get fields present in both arrays
                $intersect = array_intersect_key($entity, $referencedFields);
                //removes fields that are part of referenced object (joined object)
                $entityArray = array_diff_key($entityArray, $referencedFields);
                unset($entityArray[$entity[$value['this']]]);
                $intersect['id'] = $referenceId;
                $doneReferences[$value['this']] = new $value['references']($intersect);
            }
            foreach ($doneReferences as $referenceKey => $referenceValue) {
                $entityArray[$referenceKey] = $referenceValue;
            }
            $entityArray['id'] = $mainEntityId;
            $result[] = new $this->entityClass($entityArray);
        }
        return $result;
    }

    private function createPlainEntities($entities): array
    {
        $result = [];
        foreach ($entities as $entity)
        {
            $result[] = new $this->entityClass($entity);
        }
        return $result;
    }

    private function insertSql(Entity $entity): string
    {
        $str = 'INSERT INTO ' . $this->tableName . ' (';
        foreach ($entity->getColumns() as $key => $value)
        {
            $str .= $key . ', ';
        }
        $str = substr($str, 0, -2) . ') VALUES (';
        foreach ($entity->getColumns() as $key => $value)
        {
            $str .= '?, ';
        }
        $str = substr($str, 0, -2) . ')';
        return $str;
    }

    private function updateSql(Entity $entity): string
    {
        $str = 'UPDATE ' . $this->tableName . ' SET ';
        foreach ($entity->getColumns() as $key => $value)
        {
            if ($key == "id")   continue;
            $str .= $key . ' = ' . $value;
        }
        $str = substr($str, 0, -2) . ' WHERE id = ' . $entity->getColumns()['id'];
        return $str;
    }

    private function selectSql(): string
    {
        return 'SELECT * FROM ' . $this->tableName;
    }

    private function selectJoinSql(array $references): string
    {
        $str = "SELECT * FROM";
        return $str;
    }

    private function selectView(string $name): string
    {
        return 'SELECT * FROM public."'.$name.'"';
    }

    private function selectWhereSql(string $where): string
    {
        return $this->selectSql() . ' WHERE ' . $where;
    }
}