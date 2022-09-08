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
                    new Constraints\Length(['min' => 10]),
                    new Constraints\NotBlank(),
                ],
                'password' =>
                    [
                        new Constraints\Length(['min' => 10]),
                        new Constraints\NotBlank(),
                    ]
            ])
        );
var_dump($violations->get(0));exit;
        return $violations->count() > 0;
    }
}
