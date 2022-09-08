<?php

declare(strict_types=1);

use App\Service\Router;

$router = new Router();

$router->get('/', function () use($container) {
    echo 'lol';
});

return $router;