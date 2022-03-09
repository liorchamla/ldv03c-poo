<?php

namespace Park;

interface Parkable
{
    public function park(string $address, string $place);
    public function pay(float $price);
    public function getName();
}
