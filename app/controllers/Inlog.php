<?php

class Inlog extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Inloggen'
        ];

        $this->view('register/inlog', $data);
    }
}