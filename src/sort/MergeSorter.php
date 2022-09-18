<?php

class MergeSorter
{
    public static function mergeSort($array)
    {
        if (count($array) == 1) {
            return $array;
        }

        $mid = count($array) / 2;
        $leftArray = array_slice($array, 0, $mid);
        $rightArray = array_slice($array, $mid);

        $leftArray = self::mergeSort($leftArray);
        $rightArray = self::mergeSort($rightArray);

        return self::merge($leftArray, $rightArray);
    }

    private static function merge($left, $right)
    {
        $result = [];

        while (count($left) > 0 && count($right) > 0) {
            if ($left[0] > $right[0]) {
                $result[] = $right[0];
                $right = array_slice($right, 1);
            } else {
                $result[] = $left[0];
                $left = array_slice($left, 1);
            }
        }

        while (count($left) > 0) {
            $result[] = $left[0];
            $left = array_slice($left, 1);
        }

        while (count($right) > 0) {
            $result[] = $right[0];
            $right = array_slice($right, 1);
        }

        return $result;
    }
}