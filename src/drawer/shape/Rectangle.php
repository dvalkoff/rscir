<?php
require_once("Shape.php");

class Rectangle extends Shape
{
    private $height;
    private $width;

    public function __construct($height, $width, $color)
    {
        parent::__construct($color);
        $this->height = $height;
        $this->width = $width;
    }

    public function draw()
    {
        echo '<svg width="' . $this->getWidth() . '" height="' . $this->getHeight() . '">
            <rect width="' . $this->getWidth() . '" height="' . $this->getHeight() . '" style="fill:' . $this->getColor() . '"/>
        </svg>';
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function getWidth()
    {
        return $this->width;
    }


}