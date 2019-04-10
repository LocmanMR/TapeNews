<?php

//1. Общие настройки
ini_set('display_errors',1);
error_reporting(E_ALL);

session_start();

ob_start();

//2. Подключение файловой системы
define('ROOT', dirname(__FILE__));
require_once(ROOT.'/components/Autoload.php');

//3. Вызов Router
$router = new Router();
$router->run();