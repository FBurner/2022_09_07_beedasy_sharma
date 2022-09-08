<?php

use App\Contract\Router;

function routes(Router $router): void
{
    $router->match('GET', '/', ['App\Controller\PostController', 'index']);
}
