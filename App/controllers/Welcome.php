<?php

//Page Controller

class Welcome extends Controller
{

    public function index()
    {
        $data = [
            'title' => 'Welcome to Ganmo Framework',
        ];
        
        $this->view('Welcome', $data);
    }
}
