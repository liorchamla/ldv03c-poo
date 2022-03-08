<?php

namespace Panier;

trait NomPrixTrait
{
    public function __construct(public string $nom, public int $prix)
    {
    }

    public function getPrix()
    {
        return $this->prix;
    }
}
