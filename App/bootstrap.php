<?php
//namespace App;

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

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class _error extends Exception
{
    public function errorMessage()
    {
        //error message
        //$errorMsg = 'Error on line ' . $this->getLine() . ' in ' . $this->getFile()
            //. ': <b>' . $this->getMessage() . '</b> is not a valid E-Mail address';
        $errorMsg = "<div style='border:4px solid #fb0202;padding-left:20px;margin:0 0 10px 0;'>
                        <h4>An uncaught Exception was encountered</h4>
                        <p>Type: ". $this->getMessage() ."</p>
                        <p>Message:  " . $this->getMessage() . "</p>
                        <p>Filename: " . $this->getFile() ." </p>
                        <p>Line number: " . $this->getLine() . "</p>
                    </div>";

        return die($errorMsg);
    }
}
require_once 'config/config.php';
/*
include_once "../app/helpers/string_helpers.php";
include_once "../app/helpers/html_helpers.php";
include_once "../app/helpers/url_helpers.php";*/

foreach(glob("../app/helpers/*.php") as $help){
    include_once $help;
}

foreach (glob("../app/libraries/*.php") as $lib) {
    include_once $lib;
}

spl_autoload_register(function ($className) {
    require_once "system/{$className}.php";
});
?>