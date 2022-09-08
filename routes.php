<?php

declare(strict_types=1);

use App\Controller\PostController;
use App\Service\Router;

$router = new Router();

$router->match('GET', '/', [PostController::class, 'index']);

return $router;
