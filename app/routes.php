<?php

use App\Contracts\Router;

function routes(Router $router): void
{
    $router->match('GET', '/', ['App\Controller\PostController', 'index']);
}
