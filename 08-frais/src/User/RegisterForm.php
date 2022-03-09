<?php

namespace App\User;

class RegisterForm
{
    public function __invoke()
    {
        ob_start();
        include __DIR__ . "/../../templates/user/register-form.html.php";
        $html = ob_get_clean();

        return $html;
    }
}
