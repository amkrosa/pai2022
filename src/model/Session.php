<?php

#[Table("Session")]
class Session extends Entity
{
    #[Column("id")]
    private $id;
    #[Column("user_id")]
    private $userId;
    #[Column("notification_id")]
    private $notificationId;
    #[Column("login")]
    private $login;
    #[Column("created")]
    private $created;

    public function __construct(array $arrayConstructor)
    {
        parent::__construct($this, $arrayConstructor);
    }

    public static function create($userId, $notificationId, $login, $created, $id = null): Session
    {
        return new Session(array(
            "id" => $id,
            "notification_id" => $notificationId,
            "login" => $login,
            "created" => $created,
            "user_id" => $userId
        ));
    }

    public static function update(Session $session, $created): Session
    {
        return Session::create($session->getUserId(), $session->getNotificationId(), $session->getLogin(), $created, $session->getId());
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @return mixed
     */
    public function getNotificationId()
    {
        return $this->notificationId;
    }
}