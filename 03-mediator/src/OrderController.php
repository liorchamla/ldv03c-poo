<?php

namespace App;

use App\EventDispatcher\Dispatcher;

class OrderController
{
    public function __construct(private Dispatcher $dispatcher)
    {
    }

    public function storeOrder(Order $order)
    {
        $this->dispatcher->dispatch("order_before_save", $order);

        // Mettre la commande dans la base de données
        var_dump("Enregistrement de la commande dans la bdd", $order);

        $this->dispatcher->dispatch("order_saved", $order);
    }
}
