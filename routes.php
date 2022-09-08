<?php

declare(strict_types=1);

use App\Service\Router;

$router = new Router();

$router->get('/', 'PostController');

return $router;
