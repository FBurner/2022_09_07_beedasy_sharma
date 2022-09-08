<?php

namespace App\Service\Repository;

use App\Model\User;
use App\Service\BaseRepository;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Validation;

class UserRepository extends BaseRepository
{
    private ?User $authenticatedUser = null;

    public function getAuthenticatedUser(): ?User
    {
        return $this->authenticatedUser;
    }

    public function authenticate(User $user): bool
    {
        $validator = Validation::createValidator();
        $violations = $validator->validate(
            [
                'email' => $user->getEmail(),
                'password' => $user->getPassword()
            ],
            [
                'email' => [
                    new Constraints\Length(['min' => 10]),
                    new Constraints\NotBlank(),
                ],
                'password' =>
                    [
                        new Constraints\Length(['min' => 10]),
                        new Constraints\NotBlank(),
                    ]
            ]
        );

        return $violations->count() > 0;
    }
}
