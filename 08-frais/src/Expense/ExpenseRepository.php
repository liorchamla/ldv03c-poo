<?php

namespace App\Expense;

use App\User\User;
use DateTime;
use PDO;

class ExpenseRepository implements ExpenseRepositoryInterface
{
    public function __construct(private PDO $pdo)
    {
    }

    public function findByAuthor(User $user): array
    {
        $query = $this->pdo->prepare('SELECT * FROM expenses WHERE author_id = :id');

        $query->execute([
            'id' => $user->id
        ]);

        $data = $query->fetchAll(PDO::FETCH_ASSOC);

        $expenses = [];

        foreach ($data as $row) {
            $expenses[] = new Expense(
                $row['subject'],
                $row['amount'],
                $user,
                new DateTime($row['created_at']),
                $row['status'],
                $row['id']
            );
        }

        return $expenses;
    }

    public function save(Expense $e)
    {
        $query = $this->pdo->prepare('
            INSERT INTO expenses
            (subject, amount, created_at, status, author_id)
            VALUES
            (:subject, :amount, :created_at, :status, :author_id)
        ');

        $query->execute([
            'subject' => $e->subject,
            'amount' => $e->amount,
            'created_at' => $e->createdAt->format("Y-m-d H:i:s"),
            'status' => $e->status,
            'author_id' => $e->author->id
        ]);
    }
}
