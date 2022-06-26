<?php

define("USERNAME", array_key_exists('DB_USERNAME', $_SERVER) ? $_SERVER['DB_USERNAME'] : 'wdpai');
define("PASSWORD", array_key_exists('DB_PASSWORD', $_SERVER) ? $_SERVER['DB_PASSWORD'] : 'wdpai2');
define("HOST", array_key_exists('DB_HOST', $_SERVER) ? $_SERVER['DB_HOST'] : 'localhost');
define("DATABASE", array_key_exists('DB_DATABASE', $_SERVER) ? $_SERVER['DB_DATABASE'] : 'wdpai');