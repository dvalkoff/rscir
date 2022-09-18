<?php
require_once("Shape.php");

class Circle extends Shape
{
    private $radius;

    /**
     * @param $radius
     */
    public function __construct($radius, $color)
    {
        parent::__construct($color);
        $this->radius = $radius;
    }

    public function draw()
    {
        echo '<svg width="' . $this->getRadius() * 2 . '" height="' . $this->getRadius() * 2 . '">
            <circle cx="' . $this->getRadius() . '" cy="' . $this->getRadius() . '" r="' . $this->getRadius() . '"style="fill: ' . $this->getColor() .'"/>
        </svg>';
    }

    public function getRadius()
    {
        return $this->radius;
    }
}