<?php

require_once "config.php";
require_once "Client.php";

class EmailClient extends Client
{
    private const LOGIN_URL = "/login";
    private const SEND_URL = "/email/send";
    private const TEMPLATE = 'REGISTRATION';

    public function __construct()
    {
        parent::__construct(EMAIL_MICROSERVICE_URL);
    }

    public function send($email, $login) {
        $bearerToken = $this->authorize();

        $body = array (
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
        $result = $this->post(self::LOGIN_URL, array("username" => EMAIL_MICROSERVICE_LOGIN, "password" => EMAIL_MICROSERVICE_PASSWORD));
        return $result['token_type'].' '.$result['access_token'];
    }
}