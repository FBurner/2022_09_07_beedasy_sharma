<?php

use App\Contract\Router;
use App\Controller\PostController;

function routes(Router $router): void
{
    $router->match('GET', '/', [PostController::class, 'index']);
}
