<?php

require_once 'AppController.php';
require_once 'src/service/TaskService.php';
require_once 'src/repository/TaskRepository.php';
require_once 'src/repository/CategoryRepository.php';
require_once 'src/model/dto/TaskDto.php';
require_once 'src/model/dto/CategorizedTasksDto.php';
require_once 'src/util/SessionUtil.php';
require_once 'src/service/SessionService.php';
require_once 'src/repository/SessionRepository.php';
require_once 'src/client/EmailClient.php';

class AbcController extends AppController
{
    public function __construct(
        private TaskService $taskService = new TaskService(new TaskRepository(), new CategoryRepository()),
        private SessionService $sessionService = new SessionService(new SessionRepository())
    ){
        parent::__construct();
    }

    public function abc()
    {
        $this->sessionService->check();
        $userId = $_SESSION['user_id'];
        $result = $this->taskService->getUnfinishedTasks($userId);
        if ($result == null) http_response_code(404);
        http_response_code(200);
        $this->render('abc', ['tasks' => $result]);
    }

    public function done($id)
    {
        $this->sessionService->check();
        $this->taskService->setAsDone($id);
        http_response_code(200);
    }

    public function tasks($date)
    {
        $this->sessionService->check();
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
        if ($contentType === "application/json") {
            $userId = $_SESSION['user_id'];
            $result = $this->taskService->getTasksForDate($userId, $date);
            header('Content-type: application/json');
            if ($result == null) {
                http_response_code(200);
                echo '{}';
                return;
            }
            http_response_code(200);
            echo json_encode(CategorizedTasksDto::from($result));
        }
    }

    public function task() {
        $this->sessionService->check();
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            $value = $decoded["value"];
            $date = $decoded["date"];
            $category = $decoded["category"];
            $userId = $_SESSION['user_id'];

            $task = $this->taskService->create($category, $userId, $value, $date);

            header('Content-type: application/json');
            if ($task == null) {
                http_response_code(400);
                echo '{"error": true}';
                return;
            }
            echo json_encode($task);
        }
    }

    public function create()
    {
        $this->sessionService->check();
        return $this->render('create');
    }
}