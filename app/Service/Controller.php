<?php

namespace App\Service;

use Twig\Environment;

class Controller
{
    protected Environment $twig;

    public function setTemplatingEngine(Environment $twig): void
    {
        $this->twig = $twig;
    }

    public function render(string $template, array $context = []): void
    {
       echo $this->twig->render($template, $context);
    }
}
