<?php

declare(strict_types=1);

use App\Controller\PostController;
use App\Service\Db;
use App\Service\Repository\PostRepository;
use App\Service\Repository\UserRepository;
use Psr\Container\ContainerInterface;
use Twig\Environment as Twig;
use Twig\Loader\FilesystemLoader;

return [
    Db::class => function (ContainerInterface $c) {
        return new Db($c->get('db')['host'], $c->get('db')['dbname'], $c->get('db')['username'], $c->get('db')['password']);
    },
    Twig::class => function (ContainerInterface $c) {
        $loader = new FilesystemLoader(__DIR__ . '/../templates');

        return new Twig($loader);
    },
    UserRepository::class => function (ContainerInterface $c) {
        return new PostRepository($c->get(Db::class));
    },
    PostRepository::class => function (ContainerInterface $c) {
        return new PostRepository($c->get(Db::class));
    },
    PostController::class => function (ContainerInterface $c) {
        $controller = new PostController($c->get(PostRepository::class), $c);

        $controller->setTemplatingEngine($c->get(Twig::class));

        return $controller;
    }
];
