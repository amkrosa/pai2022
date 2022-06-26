<?php

require_once "src/model/Session.php";
require_once "src/repository/SessionRepository.php";
require_once "src/util/RedirectUtil.php";
require_once "src/util/TimeUtil.php";

class SessionService
{
    public function __construct(private SessionRepository $sessionRepository)
    {
    }

    public function start(User $user) {
        session_start();
        $_SESSION['user_id'] = $user->getId();
        $_SESSION['notification_id'] = $user->getNotification();
        $_SESSION['user_login'] = $user->getLogin();
        $date = new DateTime();
        $now = $date->getTimestamp();
        $session = Session::create($user->getId(), $user->getNotification(), $user->getLogin(), $now);
        $this->sessionRepository->save($session);
        RedirectUtil::toAbc();
    }

    public function check() {
        session_start();
        session_regenerate_id();
        if (!isset($_SESSION['user_id'])) RedirectUtil::toLogin();

        $date = new DateTime();
        $now = $date->getTimestamp();
        $oldSession = $this->sessionRepository->findBy("user_id", $_SESSION['user_id']);
        //TODO change session time to 15 minutes
        $createdPlusFifteen = $oldSession->getCreated() + TimeUtil::minutesToSeconds(1);

        if ($createdPlusFifteen < $now) {
            $this->destroy();
            RedirectUtil::toLogin();
        }

        $session = Session::update($oldSession, $now);
        $this->sessionRepository->save($session);
    }

    public function destroy() {
        session_start();
        if (!isset($_SESSION['user_id'])) RedirectUtil::toLandingPage();
        $this->sessionRepository->delete($_SESSION['user_id']);
        unset($_SESSION['user_id']);
        unset($_SESSION['notification_id']);
        unset($_SESSION['login']);
        session_destroy();
        RedirectUtil::toLandingPage();
    }
}