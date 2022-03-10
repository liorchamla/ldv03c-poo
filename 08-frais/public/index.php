<?php

use App\Http\Request;
use App\Kernel;

require __DIR__ . "/../vendor/autoload.php";

$router = require __DIR__ . "/../config/routes.php";
$container = require __DIR__ . "/../config/services.php";

$request = new Request($_SERVER['PATH_INFO'] ?? "/", $_SERVER['REQUEST_METHOD'], $_REQUEST);

$kernel = new Kernel($router, $container);
$response = $kernel->run($request);

$response->send();
