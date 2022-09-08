<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\User;
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
        $this->render('login.html.twig');
    }

    public function actionLogin()
    {
        $user = new User();

        $user->setEmail($_POST['email'] ?? null);
        $user->setPassword($_POST['password'] ?? null);

        if ($this->userRepository->authenticate($user)) {
            $this->redirect('login');
        } else {
            $this->render('login.html.twig', ['error' => 'Something is wrong !']);
        }
    }

    public function logout()
    {

    }
}