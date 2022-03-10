<?php

namespace App\DI;

use Exception;

class Container
{
    private array $factories = [];

    public function get(string $className)
    {
        if (!array_key_exists($className, $this->factories)) {
            throw new Exception("Le service $className n'existe pas dans le container");
        }

        $factory = $this->factories[$className];
        $instance = $factory($this);

        return $instance;
    }

    public function set(string $className, callable $factory)
    {
        $this->factories[$className] = $factory;
    }
}
