<?php

require_once "Repository.php";
require_once "src/model/Notification.php";

class NotificationRepository extends Repository
{
    public function __construct()
    {
        parent::__construct('Notification', 'UserNotification');
    }
}