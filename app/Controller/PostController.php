<?php

namespace App\Controller;

use App\Service\Controller;
use App\Service\Repository\PostRepository;
use Psr\Container\ContainerInterface;

class PostController extends Controller
{
    private PostRepository $postService;

    public function __construct(PostRepository $postService, ContainerInterface $container)
    {
        parent::__construct($container);

        $this->postService = $postService;
    }

    public function index(): void
    {
        $posts = $this->postService->all();

        $this->render('post-index.html.twig', ['posts' => $posts]);
    }
}
