<?php

namespace Park;

class Ferry extends Vehicule
{
    private array $parkings = [];

    public function addParking(Parking $parking)
    {
        $this->parkings[] = $parking;
    }
}
