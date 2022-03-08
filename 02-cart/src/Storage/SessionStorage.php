<?php

namespace Panier\Storage;

class SessionStorage implements StorageInterface
{
    public function __construct()
    {
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = [];
        }
    }

    public function ajouterProduit(\Panier\Produit $p)
    {
        array_push($_SESSION['panier'], $p);
    }

    public function obtenirProduits()
    {
        return $_SESSION['panier'];
    }
}
