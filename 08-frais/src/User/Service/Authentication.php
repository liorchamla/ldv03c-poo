<?php

namespace App\User\Service;

use App\Http\SessionInterface;
use App\User\User;

class Authentication
{
    public function __construct(private SessionInterface $session)
    {
    }

    public function getUser(): ?User
    {
        // Accéder à la session pour choper le user
        return $this->session->get('user');
    }

    public function setUser(?User $user)
    {
        $this->session->set('user', $user);
    }
}
