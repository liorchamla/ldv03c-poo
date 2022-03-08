<?php

class Employe implements Presentable
{
    public string $prenom;

    public function getPresentationString()
    {
        return "Salut, je suis $this->prenom";
    }
}

class Voiture implements Presentable
{
    public string $marque;

    public function getPresentationString()
    {
        return "Vrooom !";
    }
}

interface Presentable
{
    public function getPresentationString();
}


class Presentateur
{
    public function presenter(Presentable $obj)
    {
        echo $obj->getPresentationString();
    }
}

$employe = new Employe;
$employe->prenom = "Lior";

$voiture = new Voiture;

$presenter = new Presentateur();
$presenter->presenter($employe);
$presenter->presenter($voiture);
