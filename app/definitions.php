<?php

declare(strict_types=1);

use App\Controller\PostController;
use App\Service\Db;
use App\Service\Repository\PostRepository;
use Psr\Container\ContainerInterface;
use Twig\Environment;
use Twig\Loader\FilesystemLoader as Twig;

return [
    'Db' => function (ContainerInterface $c) {
        return new Db($c->get('db')['host'], $c->get('db')['dbname'], $c->get('db')['username'], $c->get('db')['password']);
    },
    'Twig' => function (ContainerInterface $c) {
        $loader = new FilesystemLoader(__DIR__ . '/../templates');

        return new Environment($loader);
    },
    PostRepository::class => function (ContainerInterface $c) {
        return new PostRepository($c->get('Db'));
    },
    PostController::class => function (ContainerInterface $c) {
        $controller = new PostController($c->get(PostRepository::class));

        $controller->setTemplatingEngine($c->get('Twig'));

        return $controller;
    }
];
