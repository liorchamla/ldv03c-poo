<?php

namespace App\Http;

class Session implements SessionInterface
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function set(string $name, mixed $value)
    {
        $_SESSION[$name] = $value;
    }

    public function get(string $name): mixed
    {
        return $_SESSION[$name] ?? null;
    }
}
