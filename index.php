<?php
mb_internal_encoding("UTF-8");

define('ENVIRONMENT', 'development');

switch (ENVIRONMENT) {
    case 'development':
        error_reporting(-1);
        ini_set('display_errors', 1);
        break;

    case 'testing':
    case 'production':
        ini_set('display_errors', 0);
        if (version_compare(PHP_VERSION, '5.3', '>=')) {
            error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
        } else {
            error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_USER_NOTICE);
        }
        break;

    default:
        header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
        echo 'The application environment is not set correctly.';
        exit(1); // EXIT_ERROR
}

$app_path = 'app';
$system_path = 'system';

define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

// Path to the front controller (this file) directory
define('FCPATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);

// Path to the system directory
define('BASEPATH', FCPATH . $system_path . DIRECTORY_SEPARATOR);

// Name of the "system" directory
define('SYSDIR', basename(BASEPATH));

define('APP_PATH', FCPATH . $app_path . DIRECTORY_SEPARATOR);
//echo APP_PATH;
if (!is_dir($app_path)) {
    header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
    echo 'Your App folder path does not appear to be set correctly. Please open the following file and correct this: ' . SELF;
    exit(2);
}
if (!is_dir($system_path)) {
    header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
    echo 'Your system folder path does not appear to be set correctly. Please open the following file and correct this: ' . SELF;
    exit(2);
}

require_once APP_PATH."bootstrap.php";
//require_once "../app/bootstrap.php";

$init = new URI;
//print_r($init);
?>