<?php

namespace App\Expense\Action;

use App\Expense\ExpenseRepositoryInterface;
use App\Http\RedirectResponse;
use App\Http\Response;
use App\Renderer\Renderer;
use App\Renderer\RendererInterface;
use App\User\Service\Authentication;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class ListExpenses
{
    public function __construct(
        private ExpenseRepositoryInterface $expenseRepository,
        private Authentication $auth,
        private RendererInterface $renderer
    ) {
    }

    public function __invoke()
    {
        // 1. Récupérer l'utilisateur connecté (Authentication)
        $user = $this->auth->getUser();

        if (!$user) {
            return new RedirectResponse("/login");
        }

        // 2. Aller chercher les expenses de l'utilisateur connecté (ExpenseRepositoryInterface)
        $expenses = $this->expenseRepository->findByAuthor($user);

        // 3. Afficher le HTML avec les expenses dedans (Renderer)
        $html = $this->renderer->render("expense/list", [
            'expenses' => $expenses
        ]);

        return new Response($html);
    }
}
