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

class Controller {
    public function __construct() {
        
    }
    /**
     * Render View
     *
     * @param	string
     * @param	array
     * @return	string
     */
    public static function view($view, $data = []) {
        extract($data);
        if(file_exists("../app/views/" . $view . ".php")){
            /**
             * if views exists include view
             */
            //str_re

            include_once "../app/views/" . $view . ".php";
            return;
        }else{
            /**
             * if view does not exists return error view not found
             */
            throw new Exception("The requested view is not found {$view}");
        }
    }
    /**
     * Render Model
     *
     * @param	string
     * @param	null
     * @return	string
     */
    public static function model($model) {
        /**
         * include models
         */
        include_once "../app/models/" . $model. ".php";
        /**
         * return new model name
         * note:
         * Model Name must be == ClassName
         */
        //$var = strtolower($model).'s';
        $init =  new $model();
        /*if($model !== $init){
            die('<p style="font-size:30px;"><b style="color:red;">Warning:</b> Model name must be the class name</p>');
        }*/
        return $init;
    }
/*
    public static function helper($helper)
    {
        /**
         * include models
         */
        //include_once "../app/helpers/{$helper}_helpers.php";
        //if (file_exists("../app/helpers/{$helper}_helpers.php")) {
            /**
             * check if views exists include view
             */
            //str_re
        //    include_once "../app/helpers/{$helper}_helpers.php";
        //} else {
            /**
             * if view does not exists return error view not found
             */
          //  die("Helpers not found <b>{$view}</b>");
       // }
    //}
}

?>