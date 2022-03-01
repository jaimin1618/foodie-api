<?php

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/routes.php';

/* App class/Model loading */
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
$db = [
    'host' => DB_HOST,
    'user' => DB_USER,
    'password' => DB_PASS,
    'name' => DB_NAME
];

DB::set_database(
    (new DBConnect($db))::$conn
); // this will set database for each classes


/**
 * App router
 */
$router = new Router($routes);

$url = $_SERVER['REQUEST_URI'];

if ($url == '/') {
    require_once __DIR__ . "/public/index.php";
} else {
    require_once __DIR__ . "/public/{$router->route($url)}";
}