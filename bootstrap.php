<?php

declare(strict_types=1);

use App\Service\Application;

require_once __DIR__.'/vendor/autoload.php';

$container = new DI\ContainerBuilder();

$container->addDefinitions(require_once __DIR__.'/app/config.php');

$router = require_once __DIR__ . '/routes.php';

$app = new Application($container->build(), $router);

$app->run();