<?php

namespace App\Expense;

use App\User\User;

interface ExpenseRepositoryInterface
{
    public function save(Expense $e);
    public function findByAuthor(User $user): array;
}
