<?php

require __DIR__ . "/../vendor/autoload.php";

use Panier\Panier;
use Panier\Produit;
use Panier\Storage\FileStorage;
use Panier\Storage\SessionStorage;

// 1. Création de quelques produits
$orange = new Produit("Orange", 200);
$pomme = new Produit("Pomme", 200);
$banane = new Produit("Banane", 600);

// 2. Création du storage et du panier
$storage = new SessionStorage;
$fileStorage = new FileStorage(__DIR__ . '/data.csv');
$panier = new Panier($storage);

// 3. Ajout de produits dans le panier
$panier->ajouterProduit($orange);
$panier->ajouterProduit($pomme);
$panier->ajouterProduit($banane);

// 4. Vérification du total
echo $panier->obtenirTotal();
