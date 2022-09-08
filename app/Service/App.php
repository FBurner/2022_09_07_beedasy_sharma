<?php



namespace App\Service;

use Bramus\Router\Router;
use Psr\Container\ContainerInterface;

class App
{
    private ContainerInterface $container;

    private Router $router;

    public function __construct(DI\Container $container, Router $router)
    {
        $this->container = $container;

        $this->router = $router;
    }

    public function run(): void
    {

    }
}