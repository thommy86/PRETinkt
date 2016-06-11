<?php

namespace Webshop\Helpers;

class ValutaHelper {
    public static function CalculatePrice($price, $btw) {
        return ValutaHelper::RoundValue($price + ($price * ($btw / 100)));
    }
    
    public static function CalculatePriceQuantity($price, $btw, $quantity) {
        return ValutaHelper::RoundValue(($price + ($price * ($btw / 100))) * $quantity);
    }
    
    public static function RoundValue($value) {
        return number_format(round($value, 2), 2);
    }
}