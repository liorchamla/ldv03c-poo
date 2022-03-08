<?php

namespace Panier;

class Panier
{
    public function __construct(private Storage\StorageInterface $storage)
    {
    }

    public function ajouterProduit(Produit $p)
    {
        $this->storage->ajouterProduit($p);
    }

    public function obtenirTotal()
    {
        // Je prend le tableau des produits dans mon storage
        $produits = $this->storage->obtenirProduits();

        return array_reduce($produits, function ($acc, $p) {
            return $acc + $p->prix;
        }, 0);
    }
}
