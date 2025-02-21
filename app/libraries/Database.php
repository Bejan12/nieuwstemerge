<?php
// app/libraries/Database.php

class Database
{
    private $dbHost = 'localhost';  // Hostnaam
    private $dbName = 'patients';   // Naam van de database (uit je dump)
    private $dbUser = 'root';       // Gebruikersnaam (uit je dump)
    private $dbPass = '';           // Wachtwoord (uit je dump, leeg in dit geval)

    private $dbHandler;
    private $statement;

    public function __construct()
    {
        // De connectie string voor PDO, met database naam 'patients'
        $conn = 'mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName . ';charset=utf8mb4'; 
        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            // Proberen verbinding te maken met de database
            $this->dbHandler = new PDO($conn, $this->dbUser, $this->dbPass, $options);
        } catch (PDOException $e) {
            // Foutmelding als de verbinding niet lukt
            die('Database Error: ' . $e->getMessage());
        }
    }

    // Bereidt een SQL-query voor
    public function query($sql)
    {
        $this->statement = $this->dbHandler->prepare($sql);
    }

    // Bindt een parameter aan een waarde
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            $type = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
        }
        $this->statement->bindValue($param, $value, $type);
    }

    // Voert de query uit
    public function execute()
    {
        return $this->statement->execute();
    }

    // Haalt alle resultaten op
    public function resultSet()
    {
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }

    // Haalt één enkel resultaat op
    public function single()
    {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_OBJ);
    }

    // Haalt het laatst ingevoegde ID op
    public function lastInsertId()
    {
        return $this->dbHandler->lastInsertId();
    }
}
?>
