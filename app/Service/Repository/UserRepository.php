<?php

namespace App\Service\Repository;

use App\Service\BaseRepository;

class UserRepository extends BaseRepository
{
    private \User $authenticatedUser;
}
