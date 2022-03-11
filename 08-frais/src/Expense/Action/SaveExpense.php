<?php

namespace App\Expense\Action;

use App\Expense\Expense;
use App\Expense\ExpenseRepositoryInterface;
use App\Http\RedirectResponse;
use App\Http\Request;
use App\User\Service\Authentication;

class SaveExpense
{
    public function __construct(
        private ExpenseRepositoryInterface $expenseRepository,
        private Authentication $auth
    ) {
    }

    public function __invoke(Request $request)
    {
        // 1. Récupérer ce qui est dans le formulaire sous la forme d'un objet Expense
        $expense = new Expense(
            $request->params['subject'],
            $request->params['amount'] * 100,
            $this->auth->getUser()
        );

        // 2. Le sauvegarder en base de données (via ExpenseRepositoryInterface)
        $this->expenseRepository->save($expense);

        // 3. Rediriger vers la liste des expense "/"
        return new RedirectResponse("/");
    }
}
