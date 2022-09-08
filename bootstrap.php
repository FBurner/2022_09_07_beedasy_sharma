<?php

declare(strict_types=1);

use App\Service\Application;
use App\Service\Router;
session_start();
require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/app/routes.php';

$containerBuilder = new DI\ContainerBuilder();

$containerBuilder->addDefinitions(require_once __DIR__.'/app/config.php');

$containerBuilder->addDefinitions(require_once __DIR__.'/app/definitions.php');

$container = $containerBuilder->build();

$router = new Router($container);

routes($router);

$app = new Application($container, $router);

$app->run();
