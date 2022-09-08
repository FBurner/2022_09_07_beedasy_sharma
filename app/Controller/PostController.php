<?php

namespace App\Controller;

use App\Service\Controller;
use App\Service\PostService;

class PostController extends Controller
{
    private PostService $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index(): void
    {
        echo 'lol';
    }
}
