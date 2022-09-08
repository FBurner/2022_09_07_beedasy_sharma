<?php

declare(strict_types=1);

namespace App\Service;

use PDO;

class Db
{
    private PDO $pdo;

    public function __construct(string $host, string $dbname, string $username, string $password)
    {
        $this->pdo = new PDO(
            sprintf('mysql:host=%s;dbname=%s;charset=utf8mb4', $host, $dbname),
            $username,
            $password, [
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]
        );
    }
}
