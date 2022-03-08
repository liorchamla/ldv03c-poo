<?php

namespace App;


class OrderController
{
    private array $comportements = [];

    public function register(callable $comportement, string $event)
    {
        if (empty($this->comportements[$event])) {
            $this->comportements[$event] = [];
        }

        $this->comportements[$event][] = $comportement;
    }

    private function dispatch(string $event, $data)
    {
        $comportementAAppelers = $this->comportements[$event];

        foreach ($comportementAAppelers as $comportement) {
            $comportement($data);
        }
    }

    public function storeOrder(Order $order)
    {
        $this->dispatch("order_before_save", $order);

        // Mettre la commande dans la base de données
        var_dump("Enregistrement de la commande dans la bdd", $order);

        $this->dispatch("order_after_save", $order);
    }
}
