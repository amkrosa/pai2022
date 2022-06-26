<?php

class Config
{
    private static $instances = [];

    private $showErrors;
    private $username;
    private $password;
    private $host;
    private $database;
    private $emailMicroserviceUrl;
    private $emailMicroserviceLogin;
    private $emailMicroservicePassword;

    public function __construct()
    {
        $this->showErrors = array_key_exists('CONFIG_SHOW_ERRORS', $_SERVER) ? $_SERVER['CONFIG_SHOW_ERRORS'] == "true" : null;
        $this->username = array_key_exists('DB_USERNAME', $_SERVER) ? $_SERVER['DB_USERNAME'] : 'wdpai';
        $this->password = array_key_exists('DB_PASSWORD', $_SERVER) ? $_SERVER['DB_PASSWORD'] : 'wdpai2';
        $this->host = array_key_exists('DB_HOST', $_SERVER) ? $_SERVER['DB_HOST'] : 'localhost';
        $this->database = array_key_exists('DB_DATABASE', $_SERVER) ? $_SERVER['DB_DATABASE'] : 'wdpai';
        $this->emailMicroserviceUrl = array_key_exists('EMAIL_URL', $_SERVER) ? $_SERVER['EMAIL_URL'] : '';
        $this->emailMicroserviceLogin = array_key_exists('EMAIL_LOGIN', $_SERVER) ? $_SERVER['EMAIL_LOGIN'] : '';
        $this->emailMicroservicePassword = array_key_exists('EMAIL_PASSWORD', $_SERVER) ? $_SERVER['EMAIL_PASSWORD'] : '';
    }


    protected function __clone() { }

    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    public static function getInstance(): Config
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }

    /**
     * @return mixed|null
     */
    public function getShowErrors(): mixed
    {
        return $this->showErrors;
    }

    /**
     * @return mixed|string
     */
    public function getUsername(): mixed
    {
        return $this->username;
    }

    /**
     * @return mixed|string
     */
    public function getPassword(): mixed
    {
        return $this->password;
    }

    /**
     * @return mixed|string
     */
    public function getHost(): mixed
    {
        return $this->host;
    }

    /**
     * @return mixed|string
     */
    public function getDatabase(): mixed
    {
        return $this->database;
    }

    /**
     * @return mixed|string
     */
    public function getEmailMicroserviceUrl(): mixed
    {
        return $this->emailMicroserviceUrl;
    }

    /**
     * @return mixed|string
     */
    public function getEmailMicroserviceLogin(): mixed
    {
        return $this->emailMicroserviceLogin;
    }

    /**
     * @return mixed|string
     */
    public function getEmailMicroservicePassword(): mixed
    {
        return $this->emailMicroservicePassword;
    }
}