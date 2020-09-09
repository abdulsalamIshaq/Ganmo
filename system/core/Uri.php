<?php

if(file_exists(BASEPATH . "core/Exceptions.php")) { 
require_once BASEPATH . "core/Exceptions.php";
} else {
  die('No direct script access allowed');
}

class URI {

    protected $defaultController = DEFAULT_CONTROLLER;

    protected $defaultMethod = 'index';

    protected $parameter = [];

    public function __construct() {

        $url = $this->url();

        if(isset($url[0])){
            if(file_exists(APP_PATH."/controllers/" . ucwords($url[0]) . ".php")){

                $this->defaultController = ucwords($url[0]);

                unset($url[0]);
            
            }else{
               // throw new _error("Controller Name {$url[0]} does not exists");
                //header('HTTP/1.1 404 Not Found');
                //throw new Exceptions('404 - The Controller was `'.$url[0].'` not found');
                show_404('error_404');
                error_log('404 - The Controller `' . $url[0] . '` cannot be located');
                exit(1);
                //require the 404 controller and initiate it
                //Display its view
            }
        }
        
        require_once APP_PATH.'controllers/' . $this->defaultController . '.php';

        $this->defaultController = new $this->defaultController;

        if(isset($url[1])) {

            if (method_exists($this->defaultController, $url[1])) {
                $this->defaultMethod = $url[1];
                unset($url[1]);
            }else{
                show_error('Not Found', 'The controller/method pair you requested was not found.', 'error_genral');
                exit(1);
                //die('404 - The Method - ' . $url[1] . ' - does not exists');
            }
        }
        
        $this->parameter = $url ? array_values($url) : []; 
        
        call_user_func_array(array($this->defaultController, $this->defaultMethod), $this->parameter);
        
    }

    public function url() {
        if(isset($_GET['url'])) {

            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            //print_r($url); exit;
            //return $url
            return $url;
        }
    }
}
?>