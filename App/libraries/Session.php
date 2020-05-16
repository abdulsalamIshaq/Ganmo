<?php
class Session {

    protected $session;
    public function __construct() {
        $this->session  = new Session();
    }
    public static function flash($key, $value){

        return $_SESSION[$key] = $value;
    }
}