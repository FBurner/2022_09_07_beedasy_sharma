<?php

declare(strict_types=1);

namespace App\Service;

use App\Contracts\Router as RouterContract;
use Bramus\Router\Router as BaseRouter;

class Router extends BaseRouter implements RouterContract
{
    public function match($methods, $pattern, $fn)
    {
        $controller = new $fn[0]();

        parent::match($methods, $pattern, [$controller, $fn[1]]);
    }
}
