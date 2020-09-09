<?php
defined('BASEPATH') or exit('No direct script access allowed');
function load_class($class, $params = null, $dir = 'system')
{
    $path = FCPATH . $dir . DIRECTORY_SEPARATOR . 'core/' . $class . '.php';
    if (file_exists($path)) {
        if (class_exists($class)) {
            require_once($path);
            $init = new $class($params);
            return $init;
        }
    }
}
function show_404($page = '', $log_error = TRUE)
{
    header('HTTP/1.1 404');

    $heading = '404 Page Not Found';
    $message = 'The page you requested was not found.';

    if ($log_error) {
        error_log($heading . '. ' . $message);
    }
    /*
    $controller = load_class('Controller');
    $controller->view($page, [
        'heading' => $heading,
        'message' => $message
    ]);*/
    ob_start();
    require_once(APP_PATH .$page. '.php');
    $buffer = ob_get_contents();

    return $buffer;
    //exit;
}

function show_error($heading, $message, $page = '', $code = 500, $log_error = TRUE) {

    if ($log_error) {
        error_log($heading . '. ' . $message);
    }

    ob_start();
    $file = APP_PATH . 'views/errors/html/' . $page . '.php';
    if(file_exists($file)){
        header('HTTP/1.1 ' . $code);
        include($file);
    }else{
        header('HTTP/1.1 500');
        throw new Exceptions('404 not found ' . $page);
        exit(1);
    }
    $buffer = ob_get_contents();

    return $buffer;
}



