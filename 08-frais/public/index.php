<?php

use App\Routing\Router;
use App\User\Register;
use App\User\RegisterForm;

require __DIR__ . "/../vendor/autoload.php";

$router = new Router;

$router
    ->addRoute("/register", RegisterForm::class)
    ->addRoute("/register/save", Register::class);

$pathInfo = $_SERVER['PATH_INFO'] ?? "/";

try {
    $className = $router->match($pathInfo);
    $controller = new $className();
    echo $controller();
} catch (Exception $e) {
    echo "L'URL que vous avez tapé n'existe pas";
    http_response_code(404);
}
