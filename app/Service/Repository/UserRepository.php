<?php

namespace App\Service\Repository;

use App\Model\User;
use App\Service\BaseRepository;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints as Assert;

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
            new Assert\Collection([
                'email' => [
                    new Constraints\Email(),
                    new Constraints\NotBlank(),
                ],
                'password' =>
                    [
                        new Constraints\Length(['min' => 8]),
                        new Constraints\NotBlank(),
                    ]
            ])
        );

        if ($violations->count() > 0) {
            return false;
        }
    }
}
