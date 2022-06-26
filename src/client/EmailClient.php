<?php

require_once "src/config/Config.php";
require_once "Client.php";

class EmailClient extends Client
{
    private const LOGIN_URL = "/login";
    private const SEND_URL = "/email/send";
    private const TEMPLATE = 'REGISTRATION';

    public function __construct()
    {
        parent::__construct(Config::getInstance()->getEmailMicroserviceUrl());
    }

    public function send($email, $login)
    {
        $bearerToken = $this->authorize();

        $body = array(
            "subject" => "Welcome to mindhabit",
            "toEmail" => $email,
            "template" => self::TEMPLATE,
            "attributes" => array(
                "username" => $login
            )
        );
        $this->post(self::SEND_URL, $body, false, $bearerToken);
    }

    private function authorize()
    {
        $result = $this->post(self::LOGIN_URL,
            array("username" => Config::getInstance()->getEmailMicroserviceLogin(),
                  "password" => Config::getInstance()->getEmailMicroservicePassword()));
        return $result['token_type'] . ' ' . $result['access_token'];
    }
}