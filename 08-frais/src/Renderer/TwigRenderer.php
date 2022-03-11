<?php

namespace App\Renderer;

use App\User\Service\Authentication;
use Twig\Environment;

class TwigRenderer implements RendererInterface
{
    public function __construct(private Environment $twig)
    {
    }

    public function render(string $file, array $data = []): string
    {
        // Je vais appeler Twig (Environment) et je retournerai son résultat
        return $this->twig->render("$file.twig", $data);
    }
}
