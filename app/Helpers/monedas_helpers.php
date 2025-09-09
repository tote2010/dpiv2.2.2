<?php

if (!function_exists('formato_moneda')) {
    function formato_moneda($monto, $simbolo = '$')
    {
        return $simbolo . number_format($monto, 2, ',', '.');
    }
}


if (!function_exists('dolar_a_pesos')) {
    function dolar_a_pesos($precio, $valor_dolar)
    {
        return round($valor_dolar * $precio);
    }
}