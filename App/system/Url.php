<?php

//namespace App\system;

/**
 * An open source application developement framework for php
 * 
 * This project is released under MIT license
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 * 
 * @package
 * @author Abdulsalam Ishaq
 * @copyright
 * @license https://opensource.org/licenses/MIT	MIT License  
 * @link 
 * @since Version 1.0.0
 * 
 */

/**
 * Database Utility Class
 *
 * @category	Url
 * @author		Abdulsalam
 * @link		
 */

class Url {
    /**
     * load deault controller from config file
     */
    protected $defaultController = DEFAULT_CONTROLLER;
    /**
     * set default method to index()
     */
    protected $defaultMethod = 'index';
    /**
     * set paramerter to an empty array
     */
    protected $parameter = [];

    /**
     * __construct
     */
    public function __construct() {
        /**
         * set url() method to url variable;
         */
        $url = $this->url();
        /**
         * if 
         */
        try{
            if(isset($url[0])){
                if(file_exists("../app/controllers/" . ucwords($url[0]) . ".php")){
                    /**
                     * set defaultController to index array 0 of $url
                     */
                    $this->defaultController = ucwords($url[0]);
                    /**
                     * remove Home as defaultController and set $url[0] to DefaultController 
                     */
                    unset($url[0]);
                
                }else{
                    throw new _error("Controller Name {$url[0]} does not exists");
                }
            }
        } catch (_error $e) {
            //display custom message
            echo $e->errorMessage();
        }
        
        /**
         * include defaultController or if $url[0] is set unset defaultController(Home) and  include the file
         */
        require_once '../app/controllers/' . $this->defaultController . '.php';

        /**
         * instantiate controller class
         * note:
         * Class Name must be == controller Name
         */
        $this->defaultController = new $this->defaultController;
        /**
         * if $url[1] (second paramete in the array) is set  
         */
        if(isset($url[1])){
            /**
             * check if method exists in controller
             */  
            try{
                if (method_exists($this->defaultController, $url[1])) {
                /**
                 * if method exists set defaultmethod to the secont parameter in the array
                 */
                $this->defaultMethod = $url[1];
                /**
                 * remove index as method and set $url[1] as method 
                 */
                unset($url[1]);
                }else{
                    throw new _error("Method Name <b>{$url[1]}</b> does not exists");
                }
            } catch (_error $e) {
                //display custom message
                echo $e->errorMessage();
            }
        }
        

        /**
         * return all values from $url to $this->parameter if $url is set 
         * else return empty array
         */
        $this->parameter = $url ? array_values($url) : []; 
        
        //print_r($this->parameter);
        /**
         * this function set a rule, the rules are
         * the first element in the array must be Controller name
         * the second must be a method
         * the last elemnt must be a parameter of the method
         */
        call_user_func_array([$this->defaultController, $this->defaultMethod], $this->parameter);
        
    }
    /**
     * Get the url set in our htaccess file
     */
    public function url() {
        /**
         * is url is get successfully 
         */
        if(isset($_GET['url'])){
            /**
             * strip / from the end of the $url 
             */
            $url = rtrim($_GET['url'], '/');
            /**
             * validate url
             */
            $url = filter_var($url, FILTER_SANITIZE_URL);
            /**
             * split string with / or replace whitespace with / ane return it as an array
             */
            $url = explode('/', $url);
            //print_r($url); exit;
            //return $url
            return $url;
        }
    }
}
?>