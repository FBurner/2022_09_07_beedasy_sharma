<?php

declare(strict_types=1);

use App\Service\Db;
use Psr\Container\ContainerInterface;

return [
    'Db' => function(ContainerInterface $c) {
        return new Db();
    },
    'Twig' => function(ContainerInterface $c) {
        $loader = new Twig_Loader_Filesy(__DIR__.'/../templates');
    }
];
