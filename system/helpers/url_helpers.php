<?php

function redirect($url) {
    return header("location:" . url($url));
}

function url($url) {
    if($url[0] !== '/'){
        $url = "/{$url}";
    }
    return BASE_URL . $url;
}

?>