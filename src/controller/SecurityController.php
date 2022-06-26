<?php

require_once 'src/model/User.php';
require_once 'src/repository/UserRepository.php';
require_once 'src/repository/NotificationRepository.php';
require_once 'src/repository/RoleRepository.php';
require_once 'AppController.php';
require_once 'src/util/SessionUtil.php';
require_once 'src/service/UserService.php';


class SecurityController extends AppController
{
    public function __construct(
        private UserService $userService = new UserService(new UserRepository(), new NotificationRepository(), new RoleRepository())
    )
    {
        parent::__construct();
    }

    public function login()
    {
        if (!$this->isPost()) {
            return $this->render('login');
        }

        $login = $_POST['login'];
        $password = $_POST['password'];

        if (false == $user = $this->userService->verify($login, $password)) {
            return $this->render('login', ['messages' => ['Wrong password or user with this login does not exist.']]);
        }

        SessionUtil::startSession($user);
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: $url/abc");
    }
}