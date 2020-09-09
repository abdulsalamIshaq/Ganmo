<?php

function element($item, $array, $default = 'NULL') {
    return array_key_exists($item, $array) ? $array[$item] : $default;
}

function random_array($array){
    return is_array($array) ? $array[array_rand($array)] : $array;
}