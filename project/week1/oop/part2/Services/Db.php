<?php

namespace Services;

class Db
{
    private \PDO $pdo;

    public function query(string $sql, $params = [])
    {
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($params);

        if (false === $result) {
            return null;
        }

        return $sth->fetchAll();
    }

    public function __construct()
    {

        try {
            $dsn = "pgsql:host=postgres;port=5432;dbname=postgres;";
            $this->pdo = new \PDO($dsn, 'root', 'password');
        
            if ($this->pdo) {
                // echo "Connected to the database successfully!";
            }
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }
}