<?php

require_once 'src/model/User.php';
require_once 'src/repository/UserRepository.php';
require_once 'src/repository/NotificationRepository.php';
require_once 'src/repository/RoleRepository.php';
require_once 'AppController.php';
require_once 'src/service/UserService.php';
require_once 'src/service/SessionService.php';
require_once 'src/repository/SessionRepository.php';
require_once 'src/util/RedirectUtil.php';


class SecurityController extends AppController
{
    public function __construct(
        private UserService $userService = new UserService(new UserRepository(), new NotificationRepository(), new RoleRepository()),
        private SessionService $sessionService = new SessionService(new SessionRepository())
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

        $this->sessionService->start($user);
    }

    public function logout()
    {
        if (!$this->isPost()) {
            RedirectUtil::toLandingPage();
        }

        $this->sessionService->destroy();
        RedirectUtil::toLandingPage();
    }
}