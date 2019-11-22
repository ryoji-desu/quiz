<?php

ini_set('display_errors', 1);
//database
define('DSN', 'mysql:dbname=quiz;host=127.0.0.1;charset=utf8mb4');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');

//local
define('APP',  '/exercise/quiz_yutasan/public_html');

require_once(__DIR__ . '/../lib/functions.php');
require_once(__DIR__ . '/autoload.php');

session_start();
