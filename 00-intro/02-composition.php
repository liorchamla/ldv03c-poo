<?php
class Voiture
{
    public string $marque;
    public int $kms;
    public Moteur $moteur;

    public function presentation()
    {

        $this->moteur->getCourroie()->tourner();

        return "Je suis une $this->marque avec $this->kms kms et je suis de type {$this->moteur->getType()}";
    }
}

class Courroie
{
    public function tourner()
    {
        var_dump("Je tourne");
    }
}

class Moteur
{
    private string $type;
    private int $chevaux;
    private Courroie $courroie;

    public function tourner()
    {
        $this->courroie->tourner();
    }

    public function getCourroie()
    {
        return $this->courroie;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getChevaux(): int
    {
        return $this->chevaux;
    }
}
