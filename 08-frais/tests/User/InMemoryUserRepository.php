<?php

namespace Tests\User;

use App\User\User;
use App\User\UserRepositoryInterface;

class InMemoryUserRepository implements UserRepositoryInterface
{
    public array $users = [];

    public function save(User $user)
    {
        $this->users[] = $user;
    }

    public function findOneByEmail(string $email): ?User
    {
        foreach ($this->users as $user) {
            if ($user->email === $email) {
                return $user;
            }
        }

        return null;
    }
}
