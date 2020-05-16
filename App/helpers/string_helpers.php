<?php

//namespace App\helpers;

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
 * Print/echo a string or variable
 *
 * @param	string
 * @return	string
 */
function __($string) {
    return $string;
}

/**
 * die and dump
 *
 * @deprecated	3.0.0	Use str_repeat() instead
 * @param	string
 * @param	null
 * @return	string
 */
function dd($string, $default = 'NULL'){
    $str = isset($string) ? var_dump($string) : $default; exit;
    return $str;
}

/**
 * repeat astring
 *
 * @deprecated	3.0.0	Use str_repeat() instead
 * @param	string
 * @param	int
 * @return	string
 */
function repeat($data, $num = 1){
    return ($num > 0) ? str_repeat($data, $num) : '';
}
/**
 * generate random token
 *
 * @return	string
 */
function token() {
    return bin2hex(openssl_random_pseudo_bytes(32));
}
