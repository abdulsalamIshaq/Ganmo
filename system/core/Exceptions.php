<?php
include BASEPATH . 'core/Functions.php';
class Exceptions extends Exception
{
    public $message;
    public function __construct($message)
    {
        $this->message = $message;
        $e = load_class('Controller');

        $e->view('\errors\html\error_exception', [
            'exception' => $this,
            'message' => $message
        ]);
        error_log($this->message . ' ' . $this );


        // /exit(1); 
    }
}