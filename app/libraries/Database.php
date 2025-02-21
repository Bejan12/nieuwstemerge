<?php

class Database
{
    private $dbHost = DB_HOST;
    private $dbName = DB_NAME;
    private $dbUser = DB_USER;
    private $dbPass = DB_PASS;

    private $dbHandler;
    private $statement;

    public function __construct()
    {
        $conn = 'mysql:host=' . $this->dbHost . ';port=3308;dbname=' . $this->dbName;

        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,
        );

        try {
            $this->dbHandler = new PDO($conn, $this->dbUser, $this->dbPass, $options);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
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
        $result = $this->statement->fetch(PDO::FETCH_OBJ);
        $this->statement->closeCursor();
        return $result;
    }

    // Haalt het laatst ingevoegde ID op
    public function lastInsertId()
    {
        return $this->dbHandler->lastInsertId();
    }
}

