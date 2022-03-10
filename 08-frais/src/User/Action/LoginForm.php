<?php

namespace App\User\Action;

use App\AbstractController;
use App\Http\Response;

class LoginForm extends AbstractController
{
    public function __invoke()
    {
        $html = $this->render('user/login-form');

        $response = new Response($html);

        return $response;
    }
}
