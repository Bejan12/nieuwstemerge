<?php

class Accounts extends BaseController
{
    private $accountsModel;

    public function __construct()
    {
        $this->accountsModel = $this->model('UserAccountsModel');
    }

    public function users()
    {
        $users = $this->accountsModel->getUsers();

        $data = [
            'title' => 'Accounts overzicht',
            'users' => $users
        ];

        $this->view('accounts/users', $data);
    }

    public function index()
    {
        $this->users();
    }
}   