<?php

require_once "src/config/Config.php";

class Database {
    private string $username;
    private string $password;
    private string $host;
    private string $database;

    public function __construct()
    {
        $this->username = Config::getInstance()->getUsername();
        $this->password = Config::getInstance()->getPassword();
        $this->host = Config::getInstance()->getHost();
        $this->database = Config::getInstance()->getDatabase();
    }

    public function connect():PDO
    {
        try {
            $conn = new PDO(
                "pgsql:host=$this->host;port=5432;dbname=$this->database",
                $this->username,
                $this->password,
                ["sslmode"  => "prefer"]
            );

            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }
        catch(PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}