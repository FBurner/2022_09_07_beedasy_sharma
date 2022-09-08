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
            sprintf('mysql:host=%s;dbname=myDatabase;charset=utf8mb4', $host),
            $username,
            $password, [
                PDO::ATTR_EMULATE_PREPARES => false, // turn off emulation mode for "real" prepared statements
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
            ]
        );
    }
}
