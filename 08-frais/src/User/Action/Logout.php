<?php

namespace App\User\Action;

use App\Http\RedirectResponse;
use App\User\Service\Authentication;

class Logout
{
    public function __construct(private Authentication $auth)
    {
    }

    public function __invoke()
    {
        // Mettre null dans l'information "user" de la session
        $this->auth->setUser(null);

        // Rediriger vers la page /login
        return new RedirectResponse("/login");
    }
}
