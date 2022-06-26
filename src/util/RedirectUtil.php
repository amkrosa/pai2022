<?php

class RedirectUtil
{
    public static function toLandingPage() {
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: $url/");
    }

    public static function toLogin() {
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: $url/login");
    }

    public static function toAbc() {
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: $url/abc");
    }
}