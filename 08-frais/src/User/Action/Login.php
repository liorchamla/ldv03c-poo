<?php

namespace App\User\Action;

use App\Http\RedirectResponse;
use App\Http\Request;
use App\Http\Response;
use App\User\Service\PasswordHash;
use App\User\UserRepositoryInterface;

class Login
{
    public function __construct(private PasswordHash $passwordHash, private UserRepositoryInterface $userRepository)
    {
    }

    public function __invoke(Request $request)
    {
        $user = $this->userRepository->findOneByEmail($request->params['email']);

        // 1. Vérifier que ce mail existe
        if (!$user) {
            return new RedirectResponse("/login");
        }

        // 2. Vérifier que le mot de passe est le bon
        $isValid = $this->passwordHash->verify($request->params['password'], $user->password);

        if (!$isValid) {
            return new RedirectResponse("/login");
        }

        // 3. Mettre en place la session
        $_SESSION['user'] = $user;

        return new RedirectResponse("/");
    }
}
