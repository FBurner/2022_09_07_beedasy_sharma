<?php

declare(strict_types=1);

namespace App\Service;

class PostService
{
    private Db $db;

    public function __construct(Db $db)
    {
        $this->db = $db;
    }

    public function all(): array
    {
        return [];
    }
}
