<?php

use App\Expense\Expense;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes notes de frais</title>
</head>

<body>
    <h1>Mes notes de frais !</h1>
    <table>
        <thead>
            <tr>
                <th>Numéro</th>
                <th>Raison</th>
                <th>Montant</th>
                <th>Date</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($expenses as $expense) : ?>
                <tr>
                    <td><?= $expense->id ?></td>
                    <td><?= $expense->subject ?></td>
                    <td><?= $expense->amount / 100 ?> €</td>
                    <td><?= $expense->createdAt->format('d/m/Y') ?></td>
                    <td>
                        <?php if ($expense->status === Expense::STATUS_ACCEPTED) : ?>
                            Acceptée
                        <?php elseif ($expense->status === Expense::STATUS_DENIED) : ?>
                            Refusée
                        <?php else : ?>
                            En attente
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>