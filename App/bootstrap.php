<?php
spl_autoload_register(function ($className) {
    if (file_exists(FCPATH . "system/core/{$className}.php")) {
        require_once FCPATH . "system/core/{$className}.php";
    }else{
        die("Unable to locate system/core folder");
    }
});
require_once APP_PATH . 'config/config.php';
/*
include_once "../app/helpers/string_helpers.php";
include_once "../app/helpers/html_helpers.php";
include_once "../app/helpers/url_helpers.php";
foreach(glob("../helpers/*.php") as $help){
    include_once $help;
}

foreach (glob("../libraries/*.php") as $lib) {
    include_once $lib;
}*/

?>