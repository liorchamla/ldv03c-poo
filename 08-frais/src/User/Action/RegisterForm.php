<?php

namespace App\User\Action;

use App\AbstractController;
use App\Http\Response;

class RegisterForm extends AbstractController
{
    public function __invoke()
    {
        $html = $this->render("user/register-form");

        $response = new Response($html);

        return $response;
    }
}
