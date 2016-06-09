<?php

namespace Webshop\Helpers;

class ValutaHelper {
    public static function CalculatePrice($btw, $price) {
        return ValutaHelper::RoundValue($price + ($price * $btw));
    }
    
    public static function CalculatePriceQuantity($btw, $price, $quantity) {
        return ValutaHelper::RoundValue(($price + ($price * $btw)) * $quantity);
    }
    
    public static function RoundValue($value) {
        return number_format(round($value, 2), 2);
    }
}