<?php

require_once "Repository.php";
require_once "src/model/User.php";
require_once "src/model/Notification.php";
require_once "src/model/Role.php";

class UserRepository extends Repository
{
    public function __construct()
    {
        parent::__construct('User', 'User');
    }
}