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

class Validation {
  /* isBlank('abcd')
    * validate data presence
    * uses trim() so empty spaces don't count
    * uses === to avoid false positives
    * better than empty() which considers "0" to be empty
  */
  public static function isBlank($value) {
    return !isset($value) || trim($value) === '';
  }

  /* hasPresence('abcd')
    * validate data presence
    * reverse of isBlank()
  */
  public static function hasPresence($value) {
    return !is_blank($value);
  }

  /* hasLengthGreaterThan('abcd', 3)
    * validate string length
    * spaces count towards length
    * use trim() if spaces should not count
  */
  public static function hasLengthGreaterThan($value, $min) {
    $length = strlen($value);
    return $length > $min;
  }

  /* hasLengthLessThan('abcd', 5)
    * validate string length
    * spaces count towards length
    * use trim() if spaces should not count
  */
  public static function hasLengthLessThan($value, $max) {
    $length = strlen($value);
    return $length < $max;
  }

  /* hasLengthExactly('abcd', 4)
    * validate string length
    * spaces count towards length
    * use trim() if spaces should not count
  */
  public static function hasLengthExactly($value, $exact) {
    $length = strlen($value);
    return $length == $exact;
  }

  /* hasLength('abcd', ['min' => 3, 'max' => 5])
    * validate string length
    * combines functions_greaterThan, _lessThan, _exactly
    * spaces count towards length
    * use trim() if spaces should not count
  */
  public static function hasLength($value, $options) {
    if(isset($options['min']) && !self::hasLengthGreaterThan($value, $options['min'] - 1)) {
      return false;
    } elseif(isset($options['max']) && !self::hasLengthLessThan($value, $options['max'] + 1)) {
      return false;
    } elseif(isset($options['exact']) && !self::hasLengthExactly($value, $options['exact'])) {
      return false;
    } else {
      return true;
    }
  }

  /* has_inclusion_of( 5, [1,3,5,7,9] )
    * validate inclusion in a set
  */
  public static function hasInclusionOf($value, $set) {
  	return in_array($value, $set);
  }

  /* hasExclusionOf( 5, [1,3,5,7,9] )
    * validate exclusion from a set
  */
  public static function hasExclusionOf($value, $set) {
    return !in_array($value, $set);
  }

  /* hasString('nobody@nowhere.com', '.com')
    * validate inclusion of character(s)
    * strpos returns string start position or false
    * uses !== to prevent position 0 from being considered false
    * strpos is faster than preg_match()
  */
  public static function hasString($value, $required_string) {
    return strpos($value, $required_string) !== false;
  }

  /* has_valid_email_format('nobody@nowhere.com')
    * validate correct format for email addresses
    * format: [chars]@[chars].[2+ letters]
    * preg_match is helpful, uses a regular expression
        returns 1 for a match, 0 for no match
        http://php.net/manual/en/function.preg-match.php
  */
  public static function hasValidEmailFormat($value) {
    $email_regex = '/\A[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\Z/i';
    return preg_match($email_regex, $value) === 1;
  }

  /* validataEmail('abc@abc.com')
    * validate email using the filter_var functions
  */
  public static function validateEmail($value) {
    return filter_var($value, FILTER_VALIDATE_EMAIL);
  }

  /* hasUppercase('abC')
  */
  public static function hasUppercase($value) {
    return !preg_match('/[A-Z]/', $value);
  }

  /* hasNumber('abc1')
  */
  public static function hasNumber($value) {
    return !preg_match('/[0-9]/', $value);
  }
}