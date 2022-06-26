<?php

class Client
{
    private string $baseUrl;

    protected function __construct($baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    protected function post($url, $body, $hasReturnBody = true, $bearerToken = null)
    {
        $headers = $bearerToken == null ? array('Content-Type:application/json') :
            array('Content-Type: application/json', "Authorization: ".$bearerToken);
        $ch = curl_init($this->baseUrl.$url);
        # Setup request to send json via POST.
        $payload = json_encode($body);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        # Return response instead of printing.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        # Send request.
        $json = curl_exec($ch);
        curl_close($ch);
        if ($hasReturnBody) {
            $result = json_decode($json, true);
            return $result;
        }
        return null;
    }
}