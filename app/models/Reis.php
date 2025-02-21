<?php

class Reis
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getReizen()
    {
        $this->db->query("SELECT * FROM Reis WHERE IsActief = TRUE");
        return $this->db->resultSet();
    }

    public function zoekReizenOpBestemming($bestemming)
    {
        $this->db->query("SELECT * FROM Reis 
                          WHERE BestemmingId IN (
                              SELECT Id FROM Bestemming 
                              WHERE Land LIKE :bestemming OR Luchthaven LIKE :bestemming2
                          ) 
                          AND IsActief = TRUE");

        // Bind beide parameters
        $this->db->bind(':bestemming', '%' . $bestemming . '%', PDO::PARAM_STR);
        $this->db->bind(':bestemming2', '%' . $bestemming . '%', PDO::PARAM_STR);

        return $this->db->resultSet();
    }

    public function zoekReizenOpVertrekdatum($vertrekdatum)
    {
        $this->db->query("SELECT * FROM Reis WHERE Vertrekdatum = :vertrekdatum AND IsActief = TRUE");
        $this->db->bind(':vertrekdatum', $vertrekdatum, PDO::PARAM_STR);
        return $this->db->resultSet();
    }

    public function getBestemmingen()
    {
        $this->db->query("SELECT * FROM Bestemming WHERE IsActief = TRUE");
        return $this->db->resultSet();
    }

    public function getVertrekdatums()
    {
        $this->db->query("SELECT DISTINCT Vertrekdatum FROM Reis WHERE IsActief = TRUE ORDER BY Vertrekdatum");
        return $this->db->resultSet();
    }
}