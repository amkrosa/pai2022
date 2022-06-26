<?php

class SessionUtil
{
    public static function startSession(User $user)
    {
        session_start();
        $_SESSION['user_id'] = $user->getId();
        $_SESSION['notification_id'] = $user->getNotification();
        $_SESSION['user_login'] = $user->getLogin();
    }

    public static function checkSession()
    {
        session_start();
        session_regenerate_id();
        if(!isset($_SESSION['user_id']))
        {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: $url/login");
        }
    }

    public static function destroySession()
    {
        session_start();
        unset($_SESSION['user_id']);
        unset($_SESSION['notification_id']);
        unset($_SESSION['login']);
        session_destroy();
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: $url/");
    }

}