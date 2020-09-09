<?php
defined('BASEPATH') or exit('No direct script access allowed');

//if(file_exists(BASEPATH . "Functions.php")) { 
    //require_once BASEPATH . "Functions.php";
    require_once BASEPATH . "core/Exceptions.php"; 
//} else {
  //  die('No direct script access allowed');
//}

class Controller {

    public $helper_error_message = 'The Helper function you requested was not found';
    public $library_error_message = 'The Library Class you requested was not found';
    //public $load;

    public function __construct() {
        //$this->load = $this;
    }

    public function view($view, $data = []) {
        if ( $data ) {
            
            extract($data);
        }
        if(file_exists(APP_PATH . "views/" . $view . ".php")){
            include_once APP_PATH . "views/" . $view . ".php";
            return;
        }else{
            show_404('errors/html/error_404');
            exit(2);
        }
    }

    public function model($model) {
        include_once APP_PATH . "models/" . $model. ".php";
        if(class_exists($model)){
            $init =  new $model();
            return $init;
        }else {
            header('HTTP/1.1 500 Not Found.');
            throw new Exceptions('Model Class name must be same as filename');
            exit(2);
        }
    }

    public function helper($helper)
    {
        if(is_array($helper)) {
            foreach ($helper as $help) {
                
                if (file_exists(BASEPATH . "helpers/{$help}_helpers.php")) {
                        include_once BASEPATH . "helpers/{$help}_helpers.php";
                } else {
                    //die("Helpers not found <b>{$helper}</b>");
                    //header('HTTP/1.1 404 Not Found.');
                    throw new Exceptions($this->helper_error_message);
                    //echo "Helper '{$Helper}' not found";
                }
            
            }

        }elseif(is_string($helper)){
            if (file_exists(BASEPATH . "helpers/{$helper}_helpers.php")) {
                include_once BASEPATH . "helpers/{$helper}_helpers.php";
            }else{
                header('HTTP/1.1 404 Not Found.');
                throw new Exceptions($this->helper_error_message);
                
                //echo "Helper '{$helper}' not found";
                exit(2);
            }
        }
    }

    public function library($library)
    {
        if (is_array($library)) {
            foreach ($library as $lib) {

                if (file_exists(BASEPATH . "libraries/{$lib}.php")) {
                    include_once BASEPATH . "libraries/{$lib}.php";
                } else {
                    //die("Helpers not found <b>{$helper}</b>");
                    //header('HTTP/1.1 404 Not Found.');
                    throw new Exceptions($this->library_error_message);
                    //echo "Helper '{$Helper}' not found";
                }
            }
        } elseif (is_string($library)) {
            if (file_exists(BASEPATH . "libraries/{$library}.php")) {
                include_once BASEPATH . "libraries/{$library}.php";
            } else {
                header('HTTP/1.1 404 Not Found.');
                throw new Exceptions($this->library_error_message);

                //echo "Helper '{$helper}' not found";
                exit(2);
            }
        } 
    }
}

?>