<?php

namespace App\User;

interface UserRepositoryInterface
{
    public function findOneByEmail(string $email): ?User;
    public function save(User $user);
}
