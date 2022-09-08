<?php

namespace App\Service;

class BaseRepository
{
    protected Db $db;

    public function __construct(Db $db)
    {
        $this->db = $db;
    }
}
