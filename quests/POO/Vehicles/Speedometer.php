<?php

class Speedometer
{
    const kmToMile = 0.621;
    const mileToKm = 1.609;

    public static function convertKmToMiles(float $distance): float
    {
        return $distance * self::kmToMile;
    }

    public static function convertMilestoKm(float $distance): float
    {
        return $distance * self::mileToKm;
    }
}
