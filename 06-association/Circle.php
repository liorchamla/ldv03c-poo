<?php

class Circle
{
    private Color $color;

    public function setColor(Color $color)
    {
        $this->color = $color;
    }

    public function getColor()
    {
        return $this->color;
    }
}
