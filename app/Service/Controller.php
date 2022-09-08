<?php

namespace App\Service;

use App\Model\User as AuthenticatedUser;
use App\Service\Repository\UserRepository;
use Psr\Container\ContainerInterface;
use Twig\Environment as Twig;

class Controller
{
    protected Twig $twig;

    protected ?AuthenticatedUser $user;

    public function __construct(ContainerInterface $container)
    {
        $this->setTemplatingEngine($container->get(Twig::class));
        $this->setAuthenticatedUser($container->get(UserRepository::class)->getAuthenticatedUser());
    }

    public function setTemplatingEngine(Twig $twig): void
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
