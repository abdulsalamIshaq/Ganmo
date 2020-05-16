<?php

//namespace App\controllers;
//use App\system;

class About extends Controller{
    public function index($id){
        echo "Hello world";
        Session::flash('name', 'Abdulsalam');
        echo $_SESSION['name'];

    }
}
