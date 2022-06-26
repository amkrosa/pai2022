<?php

require 'Router.php';
require 'config.php';

if (!SHOW_ERRORS) {
    error_reporting(0);
}

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::post('login', 'SecurityController');
Router::get('modal', 'DefaultController');
Router::get('abc', 'AbcController');
Router::get('done', 'AbcController');
Router::get('tasks', 'AbcController');
Router::get('register', 'RegisterController');
Router::get('create', 'AbcController');
Router::post('task', 'AbcController');
Router::post('logout', 'SecurityController');



Router::run($path);