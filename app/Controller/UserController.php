<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\Controller;
use App\Service\Repository\UserRepository;
use Psr\Container\ContainerInterface;

class UserController extends Controller
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository, ContainerInterface $container)
    {
        parent::__construct($container);

        $this->userRepository = $userRepository;
    }

    public function login()
    {
        $this->render('login.html.twig', []);
    }

    public function logout()
    {

    }
}