<?php

namespace App\Routing;

use App\Http\Request;
use Exception;

class Router
{
    private array $routes = [];

    public function addRoute(Route $route)
    {
        $this->routes[] = $route;

        return $this;
    }

    public function match(Request $request)
    {
        foreach ($this->routes as $route) {
            if ($route->match($request)) {
                return $route->className;
            }
        }

        throw new Exception("Aucune route n'a été configurée pour l'URL $request->pathInfo");
    }

    public function post(string $url, string $className)
    {
        $this->routes[] = new Route($url, $className, "POST");

        return $this;
    }

    public function get(string $url, string $className)
    {
        $this->routes[] = new Route($url, $className);

        return $this;
    }
}
