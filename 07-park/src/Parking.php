<?php

namespace Park;

class Parking
{
    private \SplObjectStorage $parkables;

    public function __toString()
    {
        return $this->getAll();
    }

    public function getAll()
    {
        $str = "\nPARKING : " . $this->count() . " VEHICULES\n";

        foreach ($this->parkables as $parkable) {
            $str .= $parkable->getName() . "\n";
        }

        return $str;
    }

    public function __construct()
    {
        $this->parkables = new \SplObjectStorage;
    }

    public function addPark(Parkable $parkable)
    {
        $this->parkables->attach($parkable);
    }

    public function removePark(Parkable $parkable)
    {
        $this->parkables->detach($parkable);
    }

    public function count()
    {
        return $this->parkables->count();
    }
}
