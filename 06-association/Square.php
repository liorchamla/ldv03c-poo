<?php

class Square
{
    public function __construct(private Point $A, private Point $B, private Point $C, private Point $D)
    {
    }

    public function area()
    {
        // On cherche la longueur du côté AB :
        $longueur = $this->A->getCoordinates()['x'] + $this->B->getCoordinates()['x'];
        return $longueur * $longueur;
    }
}
