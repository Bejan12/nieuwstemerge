<?php

class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function register($data)
    {
        $this->db->query('INSERT INTO Persoon (Voornaam, Tussenvoegsel, Achternaam, Geboortedatum, Paspoortgegevens, Isactief, Opmerking, Datumaangemaakt, Datumgewijzigd) VALUES (:voornaam, :tussenvoegsel, :achternaam, :geboortedatum, :paspoortgegevens, true, "", NOW(), NOW())');
        $this->db->bind(':voornaam', $data['voornaam']);
        $this->db->bind(':tussenvoegsel', $data['tussenvoegsel']);
        $this->db->bind(':achternaam', $data['achternaam']);
        $this->db->bind(':geboortedatum', $data['geboortedatum']);
        $this->db->bind(':paspoortgegevens', $data['paspoortgegevens']);

        if ($this->db->execute()) {
            $persoonId = $this->db->lastInsertId();
            $this->db->query('INSERT INTO Gebruiker (PersoonId, Gebruikersnaam, Wachtwoord, Isactief, Datumaangemaakt, Datumgewijzigd) VALUES (:persoonId, :gebruikersnaam, :wachtwoord, true, NOW(), NOW())');
            $this->db->bind(':persoonId', $persoonId);
            $this->db->bind(':gebruikersnaam', $data['gebruikersnaam']);
            $this->db->bind(':wachtwoord', $data['wachtwoord']);

            if ($this->db->execute()) {
                return true;
            }
        }

        return false;
    }
}