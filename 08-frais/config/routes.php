<?php

use App\Routing\Router;
use App\User\Action\Export;
use App\User\Action\Login;
use App\User\Action\LoginForm;
use App\User\Action\Register;
use App\User\Action\RegisterForm;

$router = new Router;

$router
    ->get("/register", RegisterForm::class)
    ->post("/register/save", Register::class)
    ->get('/login', LoginForm::class)
    ->post('/login', Login::class)
    ->get("/export", Export::class);

return $router;
