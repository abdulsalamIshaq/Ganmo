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
 * Element
 *
 * Lets you determine whether an array index is set and whether it has a value.
 * If the element is empty it returns NULL (or whatever you specify as the default value.)
 *
 * @param	string
 * @param	array
 * @param	mixed
 * @return	mixed	depends on what the array contains
 */
function element($item, $array, $default = 'NULL') {
    return array_key_exists($item, $array) ? $array[$item] : $default;
}

/**
 * Random Element - Takes an array as input and returns a random element
 *
 * @param	array
 * @return	mixed	depends on what the array contains
 */
function random_array($array){
    return is_array($array) ? $array[array_rand($array)] : $array;
}