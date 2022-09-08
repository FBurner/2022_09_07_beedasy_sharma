<?php

namespace App\Service;

use App\Model\User as AuthenticatedUser;
use Twig\Environment;

class Controller
{
    protected Environment $twig;

    protected ?AuthenticatedUser $user;

    public function __construct()
    {
        
    }

    public function setTemplatingEngine(Environment $twig): void
    {
        $this->twig = $twig;
    }

    public function setAuthenticatedUser(?AuthenticatedUser $user): void
    {
        $this->user = $user;

        $this->twig->addGlobal('authenticatedUser', $this->user);
    }

    public function render(string $template, array $context = []): void
    {
       echo $this->twig->render($template, $context);
    }
}
