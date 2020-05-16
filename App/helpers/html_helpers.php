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
 * Heading
 *
 * Generates an HTML heading tag.
 *
 * @param	string	content
 * @param	int	heading number
 * @param	array html attributes
 * @return	string
 */
function h($string, $h = 1, $attributes = '') {
    return "<h{$h} ".attr($attributes).">{$string}</h{$h}>";
}

/**
 * Paragraph
 *
 * Generates an HTML Paragraph tag.
 *
 * @param	string	content
 * @param	array html attributes
 * @return	string
 */
function p($string, $attributes = '') {
    return "<p " . attr($attributes) . ">{$string}</p>";
}

/**
 * Bold
 *
 * Generates an HTML b tag.
 *
 * @param	string	content
 * @param	array html attributes
 * @return	string
 */
function b($elem, $attributes = '') {
    return "<b " . attr($attributes) . ">{$elem}</b>";
}

/**
 * Strong/Bold
 *
 * Generates an HTML strong tag.
 *
 * @param	string	content
 * @param	array html attributes
 * @return	string
 */
function strong($elem, $attributes = '') {
    return "<strong " . attr($attributes) . ">{$elem}</strong>";
}

/**
 * Italics
 *
 * Generates an HTML Italic tag.
 *
 * @param	string	content
 * @param	array html attributes
 * @return	string
 */
function i($elem, $attributes = '') {
    return "<i " . attr($attributes) . ">{$elem}</i>";
}

/**
 * Emphasise
 *
 * Generates an HTML Emphasise tag.
 *
 * @param	string	content
 * @param	array html attributes
 * @return	string
 */
function em($elem, $attributes = '') {
    return "<em " . attr($attributes) . ">{$elem}</em>";
}

/**
 * Strike Through
 *
 * Generates an HTML Strike tag.
 *
 * @param	string	content
 * @param	array html attributes
 * @return	string
 */
function s($elem, $attributes = '') {
    return "<s " . attr($attributes) . ">{$elem}</s>";
}

/**
 * Small
 *
 * Generates an HTML Small tag.
 *
 * @param	string	content
 * @param	array html attributes
 * @return	string
 */
function small($elem, $attributes = '') {
    return "<small " . attr($attributes) . ">{$elem}</small>";
}

/**
 * Delete
 *
 * Generates an HTML Delete tag.
 *
 * @param	string	content
 * @param	array html attributes
 * @return	string
 */
function del($elem, $attributes = '') {
    return "<del " . attr($attributes) . ">{$elem}</del>";
}

/**
 * Insert
 *
 * Generates an HTML Insert tag.
 *
 * @param	string	content
 * @param	array html attributes
 * @return	string
 */
function ins($elem, $attributes = '') {
    return "<ins " . attr($attributes) . ">{$elem}</ins>";
}

/**
 * Subsctipr
 *
 * Generates an HTML Subscript tag.
 *
 * @param	string	content
 * @param	array html attributes
 * @return	string
 */
function sub($elem, $attributes = '') {
    return "<sub " . attr($attributes) . ">{$elem}</sub>";
}

/**
 * Superscript
 *
 * Generates an HTML Superscript tag.
 *
 * @param	string	content
 * @param	array html attributes
 * @return	string
 */
function sup($elem, $attributes = '') {
    return "<sup " . attr($attributes) . ">{$elem}</sup>";
}

/**
 * Generates HTML BR tags based on number supplied
 *
 * @deprecated	3.0.0	Use str_repeat() instead
 * @param	int	$count	Number of times to repeat the tag
 * @return	string
 */
function br($count = 1) {
    return str_repeat('<br />', $count);
}

/**
 * Generates non-breaking space entities based on number supplied
 *
 * @deprecated	3.0.0	Use str_repeat() instead
 * @param	int
 * @return	string
 */
function nbsp($num = 1) {
    return str_repeat('&nbsp;', $num);
}

function attr($attributes) {
    if(is_string($attributes)){
        return " {$attributes}";
    }elseif (is_array($attributes)) {
        $atts = '';
        $attributes = (array) $attributes;
        foreach ($attributes as $key => $val) {
            $atts .= "{$key} = '{$val}' ";
        }
        return rtrim($atts, ',');
    }
}