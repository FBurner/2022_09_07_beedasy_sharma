<?php

declare(strict_types=1);

use App\Service\Application;

require_once __DIR__.'/vendor/autoload.php';

$container = new DI\Container();

$router = require_once __DIR__ . '/routes.php';

$app = new Application($container, $router);

$app->run();