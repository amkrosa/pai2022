<?php

require_once 'AppController.php';
require_once 'src/service/TaskService.php';
require_once 'src/repository/TaskRepository.php';
require_once 'src/repository/CategoryRepository.php';
require_once 'src/model/dto/TaskDto.php';
require_once 'src/model/dto/CategorizedTasksDto.php';
require_once 'src/util/SessionUtil.php';

class AbcController extends AppController
{
    public function __construct(
        private TaskService $taskService = new TaskService(new TaskRepository(), new CategoryRepository())
    ){
        parent::__construct();
    }

    public function abc()
    {
        SessionUtil::checkSession();
        $userId = $_SESSION['user_id'];
        $result = $this->taskService->getUnfinishedTasks($userId);
        if ($result == null) http_response_code(404);
        http_response_code(200);
        $this->render('abc', ['tasks' => $result]);
    }

    public function done($id)
    {
        SessionUtil::checkSession();
        $this->taskService->setAsDone($id);
        http_response_code(200);
    }

    public function tasks($date)
    {
        SessionUtil::checkSession();
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
        //TODO get from session
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
            //TODO map categories to dtos
            echo json_encode(CategorizedTasksDto::from($result));
        }
    }

    public function create()
    {
        SessionUtil::checkSession();
        if (!$this->isPost()) {
            return $this->render('create');
        }

        $category = $_POST['login'];
        $value = $_POST['password'];


    }
}