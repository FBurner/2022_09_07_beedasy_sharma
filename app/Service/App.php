<?php

use Psr\Container\ContainerInterface;

class App
{
    private ContainerInterface $container;

    public function __construct(DI\Container $container)
    {
        $this->container = $container;
    }
}