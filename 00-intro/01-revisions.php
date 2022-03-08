<?php

class Employe implements Presentable
{
    public function __construct(public string $prenom, public string $nom, private int $age)
    {
    }

    public function setAge(int $nouvelAge)
    {
        if ($nouvelAge < 18 || $nouvelAge > 75) {
            throw new Exception("L'age de l'employé doit être un entier entre 18 et 75 ans");
        }

        $this->age = $nouvelAge;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function getPresentationString(): string
    {
        return "Je suis $this->prenom $this->nom et j'ai $this->age ans";
    }
}

class Cadre extends Employe
{
    public string $voiture;
}

class Patron extends Cadre
{
}

class Etudiant implements Presentable
{
    public function getPresentationString(): string
    {
        return "Je suis un jeune étudiant";
    }
}

$employe1 = new Employe("Lior", "Chamla", 35);
$employe2 = new Employe("Magali", "Pernin", 35);

$cadre = new Cadre("Joseph", "Durand", 27);

$patron = new Patron("Anne", "Dumont", 35);

$etudiant = new Etudiant();

presenterEmploye($employe2);
presenterEmploye($cadre);
presenterEmploye($patron);
presenterEmploye($etudiant);


interface Presentable
{
    // possible
    public function getPresentationString(): string;
}


function presenterEmploye(Presentable $e)
{
    var_dump($e->getPresentationString());
}
