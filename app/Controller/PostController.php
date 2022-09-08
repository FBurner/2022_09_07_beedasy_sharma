<?php

namespace App\Controller;

use App\Service\Controller;
use App\Service\Repository\PostRepository;

class PostController extends Controller
{
    private PostRepository $postService;

    public function __construct(PostRepository $postService)
    {
        $this->postService = $postService;
    }

    public function index(): void
    {
        $posts = $this->postService->all();

        $this->render('base.html.twig', ['posts' => $posts]);
    }
}
