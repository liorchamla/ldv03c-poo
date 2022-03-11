<?php

namespace App\User\Action;

use App\Http\RedirectResponse;
use App\Http\Response;
use App\Http\SessionInterface;
use App\Renderer\Renderer;
use App\Renderer\RendererInterface;
use App\User\Service\Authentication;

class LoginForm
{
    public function __construct(private RendererInterface $renderer, private Authentication $auth)
    {
    }

    public function __invoke()
    {
        if ($this->auth->getUser()) {
            return new RedirectResponse("/");
        }

        $html = $this->renderer->render('user/login-form');

        $response = new Response($html);

        return $response;
    }
}
