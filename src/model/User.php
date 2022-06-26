<?php

require_once "src/attribute/Table.php";
require_once "src/attribute/Column.php";
require_once "Entity.php";

#[Table("User", DatabaseView::User)]
class User extends Entity
{
    #[Column("id")]
    private $id;
    #[Column("login")]
    private $login;
    #[Column("password")]
    private $password;
    #[Column("role_id", "Role")]
    private Role|string|null $role;
    #[Column("notification_id", "Notification")]
    private Notification|string|null $notification;

    public function __construct(array $arrayConstructor)
    {
        parent::__construct($this, $arrayConstructor);
    }

    public static function create(
        string $login,
        string $password,
        Role|string $role,
        Notification|string $notification,
               $id = null
    )
    {
        return new self(array(
            "id" => $id,
            "password" => $password,
            "login" => $login,
            "role_id" => $role,
            "notification_id" => $notification
        ));
    }

    public static function createWithId(string $id, User $user) {
        return User::create($user->getLogin(), $user->getPassword(), $user->getRole(), $user->getNotification(), $id);
    }

    /**
     * @return mixed|null
     */
    public function getId(): mixed
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getRole(): Role|string
    {
        return $this->role;
    }

    /**
     * @return string
     */
    public function getNotification(): Notification|string|null
    {
        return $this->notification;
    }

}