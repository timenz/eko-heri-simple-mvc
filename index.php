<?php

ini_set('display_errors', 1);
require_once __DIR__.'/aplikasi/config.php';

$controller = isset($_GET['c']) ? $_GET['c'] : 'first';
$method = isset($_GET['m']) ? $_GET['m'] : 'index';

require 'aplikasi/controller/'.$controller.'.php';

$obj_controller = new $controller;

call_user_func_array(array($obj_controller, $method), array());