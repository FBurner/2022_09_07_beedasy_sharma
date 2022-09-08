<?php

declare(strict_types=1);

use App\Controller\PostController;
use App\Service\Db;
use App\Service\PostService;
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
    },
    'PostService' => function(ContainerInterface $c) {
        return new PostService($c->get('Db'));
    },
    'PostController' => function(ContainerInterface $c) {
        return new PostController($c->get('PostService'));
    }
];
