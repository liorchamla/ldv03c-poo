<?php

use App\DI\Container;
use App\User\Action\Export;
use App\User\Action\Login;
use App\User\Action\LoginForm;
use App\User\Action\Register;
use App\User\Action\RegisterForm;
use App\User\Service\PasswordHash;
use App\User\UserRepository;
use App\User\UserRepositoryInterface;

$container = new Container;

$container->set(RegisterForm::class, fn () => new RegisterForm);
$container->set(Register::class, fn (Container $c) => new Register(
    $c->get(PasswordHash::class),
    $c->get(UserRepositoryInterface::class)
));
$container->set(Export::class, fn () => new Export);

$container->set(PDO::class, function () {
    $path = __DIR__ . "/../data.db";
    $pdo = new PDO("sqlite:$path");
    return $pdo;
});

$container->set(UserRepository::class, function (Container $c) {
    $pdo = $c->get(PDO::class);
    return new UserRepository($pdo);
});

$container->set(PasswordHash::class, function () {
    return new PasswordHash;
});

$container->set(UserRepositoryInterface::class, function (Container $c) {
    return $c->get(UserRepository::class);
});

$container->set(Login::class, function (Container $c) {
    return new Login(
        $c->get(PasswordHash::class),
        $c->get(UserRepositoryInterface::class)
    );
});

$container->set(LoginForm::class, function () {
    return new LoginForm;
});

return $container;
