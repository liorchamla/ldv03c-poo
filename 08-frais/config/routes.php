<?php

use App\Expense\Action\ExpenseForm;
use App\Expense\Action\ListExpenses;
use App\Expense\Action\SaveExpense;
use App\Routing\Router;
use App\User\Action\Export;
use App\User\Action\Login;
use App\User\Action\LoginForm;
use App\User\Action\Logout;
use App\User\Action\Register;
use App\User\Action\RegisterForm;

$router = new Router;

$router
    // Authentification et inscription
    ->get("/register", RegisterForm::class)
    ->post("/register/save", Register::class)
    ->get('/login', LoginForm::class)
    ->post('/login', Login::class)
    ->get("/logout", Logout::class)

    // Gestion des notes de frais
    ->get("/expense/create", ExpenseForm::class)
    ->post("/expense/save", SaveExpense::class)
    ->get("/", ListExpenses::class);

return $router;
