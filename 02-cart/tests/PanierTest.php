<?php

use Panier\Panier;
use Panier\Produit;
use Panier\Storage\SessionStorage;
use PHPUnit\Framework\TestCase;

class PanierTest extends TestCase
{
    protected function setUp(): void
    {
        $_SESSION = [];
    }

    public function testQuOnPeutAjouterUnProduitDansLePanier()
    {
        // Représenter une situation
        $produit = new Produit("Orange", 200);

        $storage = new SessionStorage;
        $panier = new Panier($storage);

        // Faire une action qui m'intéresse
        $panier->ajouterProduit($produit);

        // Vérifier que ça a fonctionné
        $produits = $storage->obtenirProduits();

        $this->assertEquals(1, count($produits));
    }

    public function testQueLePanierRenvoiUnTotalCoherent()
    {
        // Setup | Given
        $p1 = new Produit("Orange", 200);
        $p2 = new Produit("Pomme", 300);
        $p3 = new Produit("Bananne", 400);

        $storage = new SessionStorage();
        $panier = new Panier($storage);

        $panier->ajouterProduit($p1);
        $panier->ajouterProduit($p2);
        $panier->ajouterProduit($p3);

        // Act | When
        $total = $panier->obtenirTotal();

        // Assert | Then
        $this->assertEquals(900, $total);
    }
}
