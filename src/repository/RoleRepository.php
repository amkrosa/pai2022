<?php
require_once "Repository.php";
require_once "src/model/Role.php";

class RoleRepository extends Repository
{
    private $adminId;
    private $userId;

    public function __construct()
    {
        parent::__construct('Role', 'UserRole');
        $roles = $this->findAll();
        if (count($roles) == 0) {
            $admin = Role::create('admin');
            $user = Role::create('user');
            $this->adminId = $this->save($admin);
            $this->userId = $this->save($user);
        } else {
            if ($roles[0]->getName() == 'admin') {
                $this->adminId = $roles[0]->getId();
                $this->userId = $roles[1]->getId();
            } else {
                $this->adminId = $roles[1]->getId();
                $this->userId = $roles[0]->getId();
            }
        }
    }

    public function getAdminId(): string
    {
        return $this->adminId;
    }

    public function getUserId(): string
    {
        return $this->userId;
    }
}