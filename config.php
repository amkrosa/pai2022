<?php

define("SHOW_ERRORS", array_key_exists('CONFIG_SHOW_ERRORS', $_SERVER) ? $_SERVER['CONFIG_SHOW_ERRORS'] : null);
define("USERNAME", array_key_exists('DB_USERNAME', $_SERVER) ? $_SERVER['DB_USERNAME'] : 'wdpai');
define("PASSWORD", array_key_exists('DB_PASSWORD', $_SERVER) ? $_SERVER['DB_PASSWORD'] : 'wdpai2');
define("HOST", array_key_exists('DB_HOST', $_SERVER) ? $_SERVER['DB_HOST'] : 'localhost');
define("DATABASE", array_key_exists('DB_DATABASE', $_SERVER) ? $_SERVER['DB_DATABASE'] : 'wdpai');
define("EMAIL_MICROSERVICE_URL", array_key_exists('EMAIL_URL', $_SERVER) ? $_SERVER['EMAIL_URL'] : '');
define("EMAIL_MICROSERVICE_LOGIN", array_key_exists('EMAIL_LOGIN', $_SERVER) ? $_SERVER['EMAIL_LOGIN'] : '');
define("EMAIL_MICROSERVICE_PASSWORD", array_key_exists('EMAIL_PASSWORD', $_SERVER) ? $_SERVER['EMAIL_PASSWORD'] : '');
