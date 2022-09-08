<?php

declare(strict_types=1);

namespace App\Service;

use PDO;

class Db
{
    private
    public function __construct(string $host, string $username, string $password)
    {
        $pdo = new PDO('mysql:host=localhost;dbname=myDatabase;charset=utf8mb4', "username", "password", [
            PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
        ]);
    }
}
