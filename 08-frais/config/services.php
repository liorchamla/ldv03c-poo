<?php

use App\DI\Container;
use App\Expense\ExpenseRepository;
use App\Expense\ExpenseRepositoryInterface;
use App\Http\Session;
use App\Http\SessionInterface;
use App\Renderer\Renderer;
use App\Renderer\RendererInterface;
use App\Renderer\TwigRenderer;
use App\User\Service\Authentication;
use App\User\UserRepository;
use App\User\UserRepositoryInterface;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$container = new Container;

$container->set(PDO::class, function () {
    $path = __DIR__ . "/../data.db";
    $pdo = new PDO("sqlite:$path");
    return $pdo;
});

$container->alias(UserRepositoryInterface::class, UserRepository::class);
$container->alias(SessionInterface::class, Session::class);

$container->alias(RendererInterface::class, TwigRenderer::class);

$container->alias(ExpenseRepositoryInterface::class, ExpenseRepository::class);

$container->set(Renderer::class, function () {
    return new Renderer(__DIR__ . '/../templates');
});

$container->set(Environment::class, function (Container $c) {
    $loader = new FilesystemLoader([__DIR__ . '/../templates']);
    $twig = new Environment($loader);

    $twig->addGlobal('auth', $c->get(Authentication::class));
    $twig->addGlobal('session', $c->get(SessionInterface::class));

    return $twig;
});


return $container;
