<?php

namespace App\Routing;

use Exception;

class Router
{
    private array $routes = [];

    public function addRoute(string $url, string $className)
    {
        $this->routes[$url] = $className;

        return $this;
    }

    public function match(string $url)
    {
        if (array_key_exists($url, $this->routes)) {
            return $this->routes[$url];
        }

        throw new Exception("Aucune route n'a été configurée pour l'URL $url");
    }
}
