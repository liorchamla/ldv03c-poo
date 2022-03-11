<?php

namespace App\DI;

use Exception;
use ReflectionClass;

class Container
{
    private array $factories = [];
    private array $instances = [];

    public function set(string $className, callable $factory)
    {
        $this->factories[$className] = $factory;
    }

    public function alias(string $interfaceName, string $className)
    {
        $this->set($interfaceName, fn () => $this->get($className));
    }

    public function get(string $className)
    {
        if (array_key_exists($className, $this->instances)) {
            return $this->instances[$className];
        }

        $instance = $this->instanciate($className);

        $this->instances[$className] = $instance;

        return $instance;
    }

    private function instanciate(string $className)
    {
        if (array_key_exists($className, $this->factories)) {
            $factory = $this->factories[$className];
            $instance = $factory($this);

            return $instance;
        }
        // $className = "App\User\Action\Login"
        $reflexion = new ReflectionClass($className);

        $constructor = $reflexion->getConstructor();

        if (!$constructor) {
            $instance = new $className();
            return $instance;
        }

        $params = $constructor->getParameters();

        if (count($params) === 0) {
            $instance = new $className();
            return $instance;
        }

        $values = [];

        foreach ($params as $param) {
            if ($param->getType()->isBuiltin() && !$param->getDefaultValue()) {
                throw new Exception("Je ne peux pas construire $className car je ne sais pas quoi faire pour le paramètre {$param->getName()}");
            }

            if ($param->getType()->isBuiltin()) {
                $values[] = $param->getDefaultValue();
                continue;
            }

            $type = (string) $param->getType();

            $instance = $this->get($type);

            $values[] = $instance;
        }

        return $reflexion->newInstanceArgs($values);
    }
}
