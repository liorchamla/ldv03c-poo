<?php

namespace Park;

class Vehicule
{
    private static $speed;

    public function __construct(public string $name)
    {
    }

    public function getName()
    {
        return $this->name;
    }

    public static function setSpeed(float $speed)
    {
        self::$speed = $speed;
    }
}
