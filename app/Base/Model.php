<?php

namespace App\Base;

class Model
{
    public function __construct()
    {
        $this->connect();
    }

    public function connect(): \PDO
    {
        try {
            $dbHost = env('DB_HOST');
            if (empty($dbHost)) {
                throw new \Exception('Please provide Database Host');
            }
            $dbPort = env('DB_PORT');
            if (empty($dbPort)) {
                throw new \Exception('Please provide Database Host');
            }
            $dbUser = env('DB_USER');
            if (empty($dbUser)) {
                throw new \Exception('Please provide Database Host');
            }
            $dbPassword = env('DB_PASSWORD');
            // if (empty($dbPassword)) {
            //     throw new \Exception('Please provide Database Host');                
            // }
            $dbName = env('DB_NAME');
            if (empty($dbName)) {
                throw new \Exception('Please provide Database Host');
            }
            return new \PDO("mysql:host={$dbHost};dbname={$dbName};port={$dbPort}", $dbUser, $dbPassword);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function execute(string $sqlQuery, array $bindParams = []): \PDOStatement
    {
        $pdo = $this->connect();
        $stmt = $pdo->prepare($sqlQuery);
        $stmt->execute($bindParams);
        return $stmt;
    }

    public function fetchAll(string $sqlQuery, array $bindParams = []): array
    {
        $stmt = $this->execute($sqlQuery, $bindParams);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function fetchObj(string $sqlQuery, array $bindParams = []): mixed
    {
        $stmt = $this->execute($sqlQuery, $bindParams);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}
