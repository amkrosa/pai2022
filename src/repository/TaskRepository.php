<?php
require_once 'Repository.php';
require_once 'src/model/User.php';

class TaskRepository extends Repository
{
    public function __construct()
    {
        parent::__construct('Task', 'Task');
    }

    public function findAllForDate(string $userId, $date): array
    {
        $statement = $this->database->connect()->prepare("SELECT * FROM TaskByUserWithDate_Function('".$userId."', '".$date."')");
        return $this->findByFunction($statement);
    }

    public function findNotFinishedByUser(string $userId): array
    {
        $statement = $this->database->connect()->prepare("SELECT * FROM TaskByUserNotFinished_Function('".$userId."')");
        return $this->findByFunction($statement);
    }

    public function saveForUser(Task $task, string $userId): string|null
    {
        $taskId = $this->save($task);
        $statement = $this->database->connect()->prepare('INSERT INTO public."UserTask" (user_id, task_id) VALUES (?,?)');
        $statement->execute(array($userId, $taskId));
        return $taskId;
    }

    /**
     * @param bool|PDOStatement $statement
     * @return array
     */
    private function findByFunction(bool|PDOStatement $statement): array
    {
        $statement->execute();
        $entities = $statement->fetchAll(PDO::FETCH_ASSOC);
        $result = array();
        foreach ($entities as $entity) {
            $category = Category::create($entity['category_name'], $entity['category_id']);
            $result[] = Task::create($entity['value'], $category, $entity['date_added'], $entity['date_ended'], $entity['id']);
        }
        return $result;
    }
}