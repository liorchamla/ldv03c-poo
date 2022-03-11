<?php

namespace App\User\Action;

use App\AbstractController;
use App\Http\Response;
use App\Http\SessionInterface;
use App\Renderer\RendererInterface;

class RegisterForm
{

    public function __construct(private RendererInterface $renderer)
    {
    }

    public function __invoke()
    {
        $html = $this->renderer->render("user/register-form");

        $response = new Response($html);

        return $response;
    }
}
