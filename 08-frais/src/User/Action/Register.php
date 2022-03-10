<?php

namespace App\User\Action;

use App\Http\RedirectResponse;
use App\Http\Request;
use App\Http\Response;
use App\User\Service\PasswordHash;
use App\User\User;
use App\User\UserRepositoryInterface;
use PDO;

class Register
{
    public function __construct(private PasswordHash $passwordHash, private UserRepositoryInterface $userRepository)
    {
    }

    public function __invoke(Request $request)
    {
        $user = new User(
            $request->params['firstName'],
            $request->params['lastName'],
            $request->params['email'],
            $request->params['password']
        );

        $user->password = $this->passwordHash->hash($user->password);

        $this->userRepository->save($user);

        return new RedirectResponse("/login");
    }
}
