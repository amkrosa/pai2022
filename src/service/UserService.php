<?php

require_once "src/repository/UserRepository.php";
require_once "src/repository/NotificationRepository.php";
require_once "src/repository/RoleRepository.php";
require_once "src/model/Notification.php";
require_once "src/model/User.php";
require_once "src/util/UUID.php";

class UserService
{
    public function __construct(private UserRepository $userRepository, private NotificationRepository $notificationRepository,
    private RoleRepository $roleRepository){
    }

    public function register($login, $password, $notificationEmail): User|null
    {
        if ($this->exists($login)) return null;

        $notification = Notification::create($notificationEmail);
        $notificationId = $this->notificationRepository->save($notification);
        $id = UUID::v4();
        $user = User::create($login, password_hash($password, PASSWORD_DEFAULT), $this->roleRepository->getUserId(), $notificationId, $id);
        $this->userRepository->save($user);
        return $user;
    }

    public function verify($login, $password): User|bool
    {
        if (false == $user = $this->exists($login)) return false;
        if (!password_verify($password, $user->getPassword())) return false;
        return $user;
    }

    public function exists($login): User|bool
    {
        if (null == $user = $this->userRepository->findBy('login', $login)) {
            return false;
        }
        return $user;
    }
}