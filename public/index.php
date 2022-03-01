<?php

/**
 * making sure see errors if there are errors in our code
 */
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_URI'] === '/') {
  echo "<h1>index.php</h1>";
}

require_once __DIR__ . '/../init.php';
