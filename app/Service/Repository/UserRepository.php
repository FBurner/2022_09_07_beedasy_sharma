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

        return $this->authenticateAgainstDb($user);
    }

    private function authenticateAgainstDb(User $user): bool
    {
        $dbUser = $this->db->query('SELECT * FROM users WHERE email LIKE ?', $user->getEmail());
var_dump($dbUser);die;
        if (empty($dbUser) || hash('sha256', $user->getPassword()) != $dbUser[0]['password']) {
            return false;
        }

        return true;
    }
}
