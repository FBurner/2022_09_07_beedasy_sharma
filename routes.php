<?php

declare(strict_types=1);

use App\Service\Router;

$router = new Router();

$router->setNamespace('\App\Controller');

$router->get('/', 'PostController@index');

return $router;
