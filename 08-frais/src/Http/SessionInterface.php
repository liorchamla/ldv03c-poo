<?php

namespace App\Http;

interface SessionInterface
{
    public function set(string $name, mixed $value);
    public function get(string $name): mixed;
}
