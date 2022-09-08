<?php

declare(strict_types=1);

namespace App\Service\Repository;

use App\Service\BaseRepository;

class PostRepository extends BaseRepository
{
    public function all(): array
    {

        return $this->db->query('SELECT * FROM posts');
    }
}
