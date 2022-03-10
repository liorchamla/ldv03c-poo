<?php

namespace App;

use App\DI\Container;
use App\Http\Request;
use App\Http\Response;
use App\Routing\Router;
use App\User\PasswordHash;
use App\User\UserRepository;
use Exception;

class Kernel
{
    public function __construct(private Router $router, private Container $container)
    {
    }

    public function run(Request $request)
    {
        try {
            $className = $this->router->match($request);
            $controller = $this->container->get($className);
            return $controller($request);
        } catch (Exception $e) {
            return new Response($e->getMessage(), 404);
        }
    }
}
