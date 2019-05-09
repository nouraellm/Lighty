<?php
// Global Constants
define('DS', DIRECTORY_SEPARATOR);
define('PATH', __DIR__ . DS);

// Register Composer
require __DIR__.'/../vendor/autoload.php';

// Required files
require_once PATH.'../app/Errors.php';
require_once PATH.'../app/Core.php';
require_once PATH.'../app/Controller.php';
require_once PATH.'../app/Model.php';
require_once PATH.'../app/View.php';
require_once PATH.'../app/Database.php';
require_once PATH.'../conf/Config.php';
require_once PATH.'../conf/Functions.php';

use \App\Core as Core;

// Check app environment
switch (ENVIRONMENT)
{
	case 'development':
		ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
	break;
	case 'production':
        ini_set('display_errors', 0);
        ini_set('display_startup_errors', 0);
        error_reporting(0);
	break;
	default:
		header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
		echo 'The application environment is not set correctly.';
		exit(1); // exit
}

// Core init
$core = new Core();
