<?php

namespace Services;

use Exceptions\DbException;
use PDO;
use PDOException;

class Db
{
    private PDO $pdo;

    private static $instance;

    public function query(string $sql, $params = [], string $className = 'stdClass'): ?array
    {
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($params);

        if (false === $result) {
            return null;
        }

        return $sth->fetchAll(PDO::FETCH_CLASS, $className);
    }

    public function getLastInsertId(): int
    {
        return (int)$this->pdo->lastInsertId();
    }

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * @throws DbException
     */
    private function __construct()
    {
        try {
            $dsn = "pgsql:host=postgres;port=5432;dbname=postgres;";
            $this->pdo = new PDO($dsn, 'root', 'password');
        } catch (PDOException $e) {
            throw new DbException('Ошибка при подключении к базе данных: ' . $e->getMessage());
        }
    }
}