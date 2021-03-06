<?php

require_once "AppController.php";
require_once 'src/repository/UserRepository.php';
require_once 'src/repository/NotificationRepository.php';
require_once 'src/repository/RoleRepository.php';
require_once 'src/service/UserService.php';
require_once 'src/util/RedirectUtil.php';
require_once 'src/service/SessionService.php';
require_once 'src/repository/SessionRepository.php';

class RegisterController extends AppController
{
    public function __construct(
        private UserService $userService = new UserService(new UserRepository(), new NotificationRepository(), new RoleRepository()),
        private EmailClient $emailClient = new EmailClient(),
        private SessionService $sessionService = new SessionService(new SessionRepository())
    ){
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
        if (!is_a($user, User::class)) {
            return $this->render('register', ['messages' => $user]);
        }
        $this->emailClient->send($notificationEmail, $user->getLogin());
        $this->sessionService->start($user);
        RedirectUtil::toAbc();
    }
}