<?php

abstract class Shape
{
    private $color;

    public function __construct($color)
    {
        $this->color = $color;
    }


    public abstract function draw();

    public function getColor()
    {
        return $this->color;
    }


}