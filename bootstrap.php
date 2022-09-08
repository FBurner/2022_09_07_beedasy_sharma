<?php

declare(strict_types=1);

use App\Service\App;

require_once __DIR__.'vendor/autoload.php';

$container = new DI\Container();

$router = require_once __DIR__ . 'routes.php';

$app = new App($container, $router);

$app->run();