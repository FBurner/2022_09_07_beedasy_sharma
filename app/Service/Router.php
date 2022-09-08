<?php

declare(strict_types=1);

namespace App\Service;

use App\Contract\Router as RouterContract;
use Bramus\Router\Router as BaseRouter;
use Psr\Container\ContainerInterface;

class Router extends BaseRouter implements RouterContract
{
    private ContainerInterface $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function match($methods, $pattern, $fn)
    {
        parent::match($methods, $pattern, [$this->container->get($fn[0]), $fn[1]]);
    }
}
