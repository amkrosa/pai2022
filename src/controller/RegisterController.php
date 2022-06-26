<?php

require_once "AppController.php";
require_once 'src/repository/UserRepository.php';
require_once 'src/repository/NotificationRepository.php';
require_once 'src/repository/RoleRepository.php';
require_once 'src/util/SessionUtil.php';
require_once 'src/service/UserService.php';

class RegisterController extends AppController
{
    public function __construct(private UserService $userService = new UserService(new UserRepository(), new NotificationRepository(), new RoleRepository())){
        parent::__construct();
    }

    public function register()
    {
        if (!$this->isPost()) {
            return $this->render('register');
        }
        $login = $_POST['login'];
        $password = $_POST['password'];
        $notificationEmail = $_POST['notification_email'];
        $user = $this->userService->register($login, $password, $notificationEmail);
        if (!$user) {
            return $this->render('register', ['messages' => ['User already exists.']]);
        }
        SessionUtil::startSession($user);
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: $url/abc");
    }
}