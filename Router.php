<?php

require_once 'src/controller/DefaultController.php';
require_once 'src/controller/SecurityController.php';
require_once 'src/controller/AbcController.php';
require_once 'src/controller/RegisterController.php';

foreach (scandir('src/controller/') as $filename) {
    $path = dirname(__FILE__) . '/' . $filename;
    if (is_file($path)) {
        require $path;
    }
}

class Router {

    public static $routes;

    public static function get($url, $view) {
        self::$routes[$url] = $view;
    }

    public static function post($url, $view) {
        self::$routes[$url] = $view;
    }

    public static function run ($url) {
        $urlParts = explode("/", $url);
        $action = explode("/", $url)[0];
        if (!array_key_exists($action, self::$routes)) {
            http_response_code(404);
            die("Wrong url!");
        }

        $controller = self::$routes[$action];

        $object = new $controller;
        $action = $action ?: 'index';

        $param = $urlParts[1] ?? '';
        $object->$action($param);
    }
}