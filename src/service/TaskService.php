<?php

require_once 'src/repository/TaskRepository.php';

class TaskService
{
    public function __construct(private TaskRepository $taskRepository, private CategoryRepository $categoryRepository){}

    public function getUnfinishedTasks(string $id) {
        $result = $this->taskRepository->findNotFinishedByUser($id);
        return $this->categorizeTasks($result);
    }

    public function getTasksForDate(string $id, $date) {
        $result = $this->taskRepository->findAllForDate($id, $date);
        return $this->categorizeTasks($result);
    }

    public function setAsDone(string $id) {
        $this->taskRepository->updateSingle('date_ended', date('Y-m-d'));
    }

    public function create(string $category, string $userId, string $value, $selectedDate): TaskDto|null {
        if ($selectedDate < date("Y-m-d")) return null;
        $task = Task::create($value, $this->categoryRepository->choose($category), date("Y-m-d"), null);
        $id = $this->taskRepository->saveForUser($task, $userId);
        $dto = new TaskDto($id, $value, $category, $selectedDate, null);
        return $dto;
    }

    public function changeCategory(string $id, string $category) {
        $task = $this->taskRepository->findById($id);
        $categoryId = $this->categoryRepository->choose($category);
        $updatedTask = Task::create($task->getValue(), $categoryId, $task->getDateAdded, $task->getDateEnded, $task->getId());
        //TODO verification and frontend
        $this->taskRepository->save($updatedTask, true);
    }

    private function categorizeTasks($tasks) {
        if (count($tasks) == 0) return null;
        $categorizedResult = array();
        $categorizedResult['A'] = $this->filterTasksByCategory($tasks, 'A');
        $categorizedResult['B'] = $this->filterTasksByCategory($tasks, 'B');
        $categorizedResult['C'] = $this->filterTasksByCategory($tasks, 'C');
        return $categorizedResult;
    }

    private function filterTasksByCategory($tasks, string $category) {
        return array_filter($tasks, function (Task $item) use ($category) {
            return str_contains($item->getCategory()->getName(), $category);
        });
    }
}