<?php

class Register extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Registreren',
            'voornaam' => '',
            'tussenvoegsel' => '',
            'achternaam' => '',
            'geboortedatum' => '',
            'paspoortgegevens' => '',
            'gebruikersnaam' => '',
            'wachtwoord' => '',
            'voornaamError' => '',
            'achternaamError' => '',
            'geboortedatumError' => '',
            'gebruikersnaamError' => '',
            'wachtwoordError' => ''
        ];

        $this->view('register/register', $data);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data = [
                'voornaam' => trim($_POST['voornaam']),
                'tussenvoegsel' => trim($_POST['tussenvoegsel']),
                'achternaam' => trim($_POST['achternaam']),
                'geboortedatum' => trim($_POST['geboortedatum']),
                'paspoortgegevens' => trim($_POST['paspoortgegevens']),
                'gebruikersnaam' => trim($_POST['gebruikersnaam']),
                'wachtwoord' => trim($_POST['wachtwoord']),
                'voornaamError' => '',
                'achternaamError' => '',
                'geboortedatumError' => '',
                'gebruikersnaamError' => '',
                'wachtwoordError' => ''
            ];

            if (empty($data['voornaam'])) {
                $data['voornaamError'] = 'Vul uw voornaam in';
            }
            if (empty($data['achternaam'])) {
                $data['achternaamError'] = 'Vul uw achternaam in';
            }
            if (empty($data['geboortedatum'])) {
                $data['geboortedatumError'] = 'Vul uw geboortedatum in';
            }
            if (empty($data['gebruikersnaam'])) {
                $data['gebruikersnaamError'] = 'Vul uw gebruikersnaam in';
            }
            if (empty($data['wachtwoord'])) {
                $data['wachtwoordError'] = 'Vul uw wachtwoord in';
            }

            if (empty($data['voornaamError']) && empty($data['achternaamError']) && empty($data['geboortedatumError']) && empty($data['gebruikersnaamError']) && empty($data['wachtwoordError'])) {
                $data['wachtwoord'] = password_hash($data['wachtwoord'], PASSWORD_DEFAULT);

                if ($this->model('User')->register($data)) {
                    header('Location: ' . URLROOT . '/register/registersucces');
                    exit();
                } else {
                    die('Er is iets misgegaan.');
                }
            } else {
                $this->view('register/register', $data);
            }
        } else {
            $data = [
                'voornaam' => '',
                'tussenvoegsel' => '',
                'achternaam' => '',
                'geboortedatum' => '',
                'paspoortgegevens' => '',
                'gebruikersnaam' => '',
                'wachtwoord' => '',
                'voornaamError' => '',
                'achternaamError' => '',
                'geboortedatumError' => '',
                'gebruikersnaamError' => '',
                'wachtwoordError' => ''
            ];

            $this->view('register/register', $data);
        }
    }

    public function registersucces()
    {
        $this->view('register/registersucces');
    }
}