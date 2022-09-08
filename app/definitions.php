<?php

declare(strict_types=1);

use App\Service\Db;
use Psr\Container\ContainerInterface;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

return [
    'Db' => function(ContainerInterface $c) {
        return new Db();
    },
    'Twig' => function(ContainerInterface $c) {
        $loader = new FilesystemLoader(__DIR__.'/../templates');
        return new Environment($loader);
    }
];
