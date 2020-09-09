<?php
ini_set('error_log', APP_PATH . 'logs/php-error.txt');
date_default_timezone_set('Africa/Lagos');

// DB Params
$config = [
    'default_controller' => 'welcome'
];
define('DB_HOST', 'localhost');
define('DB_USER', '_USERNAME_');
define('DB_PASS', '_PASSWORD_');
define('DB_NAME', '_DBNAME_');

//Controller Settings
//$config['default_controller'] = 'welcome';
define('DEFAULT_CONTROLLER', 'Welcome');

// App Root 
define('APPROOT', dirname(dirname(__FILE__)));
// URL Root
define('BASE_URL', 'http://localhost/Ganmo');
//To display error traceback or not
define('DISPLAY_DEBUG_BACKTRACE', true);