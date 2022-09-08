<?php

use App\Contract\Router;
use App\Controller\PostController;
use App\Controller\UserController;

function routes(Router $router): void
{
    $router->match('GET', '/', [PostController::class, 'index']);
    $router->match('GET', '/login', [UserController::class, 'login']);
    $router->match('POST', '/login', [UserController::class, 'actionLogin']);
    $router->match('GET', '/logout', [UserController::class, 'logout']);
}
