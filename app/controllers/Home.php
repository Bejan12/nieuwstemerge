<?php

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Homepage'
        ];

        $this->view('home/index', $data);
    }
}