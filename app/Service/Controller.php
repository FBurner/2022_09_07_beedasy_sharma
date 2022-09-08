<?php

namespace App\Service;

use App\Model\User as AuthenticatedUser;
use Twig\Environment;

class Controller
{
    protected Environment $twig;

    public function setTemplatingEngine(Environment $twig, ?AuthenticatedUser $user): void
    {
        $this->twig = $twig;

        $this->twig->addGlobal('authenticatedUser', $user);
    }

    public function render(string $template, array $context = []): void
    {
       echo $this->twig->render($template, $context);
    }
}
