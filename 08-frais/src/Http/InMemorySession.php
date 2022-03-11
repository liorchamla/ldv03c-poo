<?php

namespace App\Http;

class InMemorySession implements SessionInterface
{
    private array $data = [];

    public function set(string $name, mixed $value)
    {
        $this->data[$name] = $value;
    }

    public function get(string $name): mixed
    {
        return $this->data[$name] ?? null;
    }
}
