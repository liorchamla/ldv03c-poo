<?php

namespace Panier\Storage;

interface StorageInterface
{
    public function obtenirProduits();

    public function ajouterProduit(\Panier\Produit $p);
}
