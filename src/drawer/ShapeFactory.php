<?php
require_once("shape/Rectangle.php");
require_once("shape/Circle.php");
require_once("shape/Shape.php");

class ShapeFactory {
    private static $maxNum = 0b1111111;
    private static $minNum = 0;

    private static $shapeMask = 0b1;
    private static $colorMask = 0b110;
    private static $heightMask = 0b11000;
    private static $widthMash = 0b1100000;

    private static $shapeMapping = [
        0b0 => Rectangle::class,
        0b1 => Circle::class
    ];
    private static $colorMapping = [
        0b0 => "red",
        0b1 => "black",
        0b10 => "yellow",
        0b11 => "blue"
    ];

    public function getShape($num) {
        if ($num > self::$maxNum || $num < self::$minNum) {
            throw new UnexpectedValueException();
        }

        $type = $this->getShapeType($num);
        $color = $this->getColor($num);
        switch ($type) {
            case Circle::class:
                $radius = $this->getRadius($num);
                return new Circle($radius, $color);
            case Rectangle::class:
                $height = $this->getHeight($num);
                $width = $this->getWidth($num);
                return new Rectangle($height, $width, $color);
            default:
                throw new UnexpectedValueException();
        }
    }

    private function getShapeType($num) {
        $value = $num & self::$shapeMask;
        return self::$shapeMapping[$value];
    }

    private function getColor($num) {
        $value = ($num & self::$colorMask) >> 1;
        return self::$colorMapping[$value];
    }

    private function getHeight($num) {
        $value = ($num & self::$heightMask) >> 3;
        return $value * 50;
    }

    private function getWidth($num) {
        $value = ($num & self::$widthMash) >> 5;
        return $value * 50;
    }

    private function getRadius($num) {
        $value = ($num & self::$heightMask) >> 3;
        return $value * 50;
    }
}