<?php

//namespace App\controllers;
//use App\system;

class About extends Controller{
    public function __construct()
    {
        parent::__construct();

    }
    public function index($name, $id){
        echo $name;
        echo $id;
        //echo "Hello world";
        //Session::flash('name', 'Abdulsalam');
        //echo $_SESSION['name'];

    }
}
