<?php

require_once "Repository.php";
require_once "src/model/Entity.php";

class SessionRepository extends Repository
{
    public function __construct()
    {
        parent::__construct('Session', 'Session');
    }

    public function save(Entity|Session $entity, bool $update = false): string|null
    {
        $id = UUID::v4();
        $statement = $this->database->connect()->prepare($this->replaceSql($entity));
        $values = $entity->getColumns();
        $values['id'] = $id;
        $statement->execute(array_values($values));
        return $id;
    }

    public function delete($userId) {
        $statement = $this->database->connect()->prepare($this->deleteSql($userId));
        $statement->execute();
    }

    private function replaceSql(Session $session) {
        return "INSERT INTO ".$this->tableName." (id, user_id, notification_id, login, created) VALUES (?, ?, ?, ?, ?)
            ON CONFLICT (user_id)
            DO UPDATE SET created = ".$session->getCreated().";";
    }

    private function deleteSql($userId) {
        return "DELETE FROM ".$this->tableName." WHERE user_id='".$userId."'";
    }
}