<?php

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/db_connect.php';
require_once __DIR__ . '/routes.php';

/**
 * App class/Model loading
 */
// automatic class load
function auto_class_load(string $class_name) {
  if (preg_match('/\A\w+\Z/', $class_name)) {
    require_once('classes/' . $class_name . '.class.php');
  }
}
spl_autoload_register('auto_class_load');

/**
 * App database connection
 */
$db = db_connect();
confirm_connection($db);
DB::set_database($db); // this will is database for each classes

/**
 * App router
 */
$router = new Router($routes);

$url = $_SERVER['REQUEST_URI'];
if ($url == '/') {
  require_once dirname(__DIR__) . "/public/api/index.php";
} else {
  require_once dirname(__DIR__) . "/public/api/{$router->route($url)}";
}