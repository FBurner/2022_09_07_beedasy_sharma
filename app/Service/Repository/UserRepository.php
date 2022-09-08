<?php

namespace App\Service\Repository;

use App\Model\User;
use App\Service\BaseRepository;

class UserRepository extends BaseRepository
{
    private User $authenticatedUser;

    public function getAuthenticatedUser(): ?User
    {
        return $this->authenticatedUser;
    }
}
