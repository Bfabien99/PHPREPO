<?php
namespace App;

class NumberHelper{

    public static function price(float $number, string $sigle = "€"): string
    {
        return number_format($number, 0, '', ' '). ' ' .$sigle;
    }
};
?>