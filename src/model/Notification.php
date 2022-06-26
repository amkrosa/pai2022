<?php

require_once "Entity.php";

#[Table("Notification")]
class Notification extends Entity
{
    #[Column("id")]
    private $id;
    #[Column("email")]
    private string $email;

    /**
     * @param string $email
     * @param bool $consent
     */
    public function __construct(array $arrayConstructor)
    {
        parent::__construct($this, $arrayConstructor);
    }

    public static function create(string $email, string $id = null): Notification
    {
        return new Notification(array(
            "id" => $id,
            "email" => $email
        ));
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return bool
     */
    public function isConsent(): bool
    {
        return $this->consent;
    }
}