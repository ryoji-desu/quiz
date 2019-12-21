<?php

ini_set('display_errors', 1);
//database
define('DSN', 'mysql:dbname=quiz;host=mydbinstance.canqmhsqotzx.ap-northeast-1.rds.amazonaws.com;charset=utf8mb4');
define('DB_USERNAME', 'ryoji_root');
define('DB_PASSWORD', 'ryoji_password');

//local
define('APP',  '/quiz/public_html');

require_once(__DIR__ . '/../lib/functions.php');
require_once(__DIR__ . '/autoload.php');

session_start();
