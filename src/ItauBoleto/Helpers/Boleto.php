<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 03/05/18
 * Time: 10:37
 */

namespace MatheusHack\ItauBoleto\Helpers;


class Boleto
{
    public static function mod10($num)
    {
        $numtotal10 = 0;
        $fator = 2;

        for ($i = strlen($num); $i > 0; $i--) {
            $numeros[$i] = substr($num, $i-1, 1);
            $temp = $numeros[$i] * $fator;
            $temp0=0;

            foreach (preg_split('//', $temp, -1, PREG_SPLIT_NO_EMPTY) as $k => $v) {
                $temp0+=$v;
            }

            $parcial10[$i] = $temp0;
            $numtotal10 += $parcial10[$i];

            if ($fator == 2) {
                $fator = 1;
            } else {
                $fator = 2;
            }
        }

        $resto = $numtotal10 % 10;
        $digito = 10 - $resto;

        if ($resto == 0) {
            $digito = 0;
        }

        return $digito;
    }

    public static function formatMoney($value, $amount = 1)
    {
        $money = str_replace(',', '', $value);
        $money = str_replace('.', '', $money);
        return str_pad($money, $amount, '0', STR_PAD_LEFT);
    }

    public static function formatString($value, $amount = 1)
    {
        return (string) str_pad($value, $amount, '0', STR_PAD_LEFT);
    }

    public static function removeNullValue($object)
    {
        return (object) array_filter((array) $object, function($var){
            return !is_null($var);
        });
    }
}