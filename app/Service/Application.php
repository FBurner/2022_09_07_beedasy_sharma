<?php

declare(strict_types=1);

namespace App\Service;

use Bramus\Router\Router;
use DI\Container;
use Psr\Container\ContainerInterface;

class Application
{
    private ContainerInterface $container;

    private Router $router;

    public function __construct(Container $container, Router $router)
    {
        $this->container = $container;

        $this->router = $router;
    }

    public function run(): void
    {
    echo 'lol';
    }
}
