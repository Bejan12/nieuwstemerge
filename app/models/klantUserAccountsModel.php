<?php

class UserAccountsModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getUsers()
    {
        $this->db->query('SELECT Gebruikersnaam, Wachtwoord FROM Gebruiker');
        return $this->db->resultSet();
    }
}