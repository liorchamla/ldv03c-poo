<?php

namespace App\User\Service;

class PasswordHash
{
    public function __construct(private string $mode = PASSWORD_DEFAULT)
    {
    }

    public function hash(string $password): string
    {
        return password_hash($password, $this->mode);
    }

    public function verify(string $password, string $hash): bool
    {
        return password_verify($password, $hash);
    }
}
