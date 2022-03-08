<?php

namespace Panier\Storage;

class FileStorage implements StorageInterface
{
    public function __construct(private string $path)
    {
        if (file_exists($path)) {
            unlink($path);
        }
    }

    public function ajouterProduit(\Panier\Produit $p)
    {
        $file = fopen($this->path, "a");

        fputcsv($file, [$p->nom, $p->prix]);

        fclose($file);
    }

    public function obtenirProduits()
    {
        $file = fopen($this->path, "r");

        $produits = [];

        while ($ligne = fgetcsv($file)) {
            $produits[] = new \Panier\Produit($ligne[0], $ligne[1]);
        }

        fclose($file);

        return $produits;
    }
}
