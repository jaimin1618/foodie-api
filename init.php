<?php

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/routes.php';
require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$dotenv->required(['DB_HOST', 'DB_NAME', 'DB_USER', 'DB_PASS']);

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
    'host' => $_ENV['DB_HOST'],
    'user' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASS'],
    'name' => $_ENV['DB_NAME']
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
