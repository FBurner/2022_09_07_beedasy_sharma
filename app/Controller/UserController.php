<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\Repository\PostRepository;
use Psr\Container\ContainerInterface;

class UserController
{
    private PostRepository $postService;

    public function __construct(PostRepository $postService, ContainerInterface $container)
    {
        parent::__construct($container);

        $this->postService = $postService;
    }
    
    public function login()
    {

    }

    public function logout()
    {

    }
}