<?php

/*
 * Define the base url of the project
 */
define('URL', 'http://localhost:8080/');

/*
 * Database Configuration
 */
define('ENABLED', False);
define('HOST',      'localhost');
define('USERNAME',  'root');
define('PASSWORD',  'root');
define('DATABASE',  'lit');

/*
 * Define Environment, Allowed environments variables : development / production
 */
define('ENVIRONMENT', 'development');

/*
 * ARGON2I Custom Configuration
 */
define('MEMORY_COST',     '2048');
define('TIME_COST',         '11');
define('PARALLELISM_FACTOR', '7');

