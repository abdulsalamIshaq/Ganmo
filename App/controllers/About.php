<?php

//znamespace App\controllers;
//use App\system;

class About extends Controller{
    public function __construct()
    {
        parent::__construct();
        //$this->b = $this->model('Post');
    }
    public function index($name, $id){
        //echo $name;
        //echo $id;
        //echo "Hello world";
        //Session::flash('name', 'Abdulsalam');
        //echo $_SESSION['name'];
        //token();
        $this->helper(['string', 'url']);
        echo token();
        $this->view('home');

        echo url('/');
    }
    public function name() {
        $this->helper(['string', 'url']);
        $this->library('Session');
        echo token();
        Session::flash('name', 'Abdulsalam');
        echo $_SESSION['name'];

        echo "Hello world";
    }
}
