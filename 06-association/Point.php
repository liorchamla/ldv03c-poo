<?php

final class Point
{
    private array $coordinates = [];

    public function __construct(int $x, int $y)
    {
        $this->coordinates['x'] = $x;
        $this->coordinates['y'] = $y;
    }

    public function getCoordinates()
    {
        return $this->coordinates;
    }
}
