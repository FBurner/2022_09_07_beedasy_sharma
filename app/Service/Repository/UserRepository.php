<?php

namespace App\Service\Repository;

use App\Model\User;
use App\Service\BaseRepository;

class UserRepository extends BaseRepository
{
    private ?User $authenticatedUser = null;

    public function getAuthenticatedUser(): ?User
    {
        return $this->authenticatedUser;
    }

    public function authenticate(User $user): bool
    {
return false;
    }
}
