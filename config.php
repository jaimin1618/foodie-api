<?php

/**
 * Database credentials here
 */

/* Local server */
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "foodie-app");

/* for production server.
define("DB_HOST", "sql6.freemysqlhosting.net");
define("DB_USER", "sql6474911");
define("DB_PASS", "ifeIxvAbiC");
define("DB_NAME", "sql6474911");
*/

define("ROLES", [
  'SUPER_ADMIN' => 0,
  'ADMIN' => 1,
  'CUSTOMER' => 2 
]);