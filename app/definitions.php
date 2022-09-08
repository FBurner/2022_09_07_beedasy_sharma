<?php

declare(strict_types=1);

use App\Controller\PostController;
use App\Controller\UserController;
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
        $twig = new Twig($loader);
        $twig->addExtension(new \Twig\Extension\StringLoaderExtension());

        return $twig;
    },
    UserRepository::class => function (ContainerInterface $c) {
        return new UserRepository($c->get(Db::class));
    },
    PostRepository::class => function (ContainerInterface $c) {
        return new PostRepository($c->get(Db::class));
    },
    PostController::class => function (ContainerInterface $c) {
        return new PostController($c->get(PostRepository::class), $c);
    },
    UserController::class => function (ContainerInterface $c) {
        return new UserController($c->get(UserRepository::class), $c);
    }
];
