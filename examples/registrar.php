<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 18/04/18
 * Time: 11:07
 */

require '../vendor/autoload.php';

use MatheusHack\ItauBoleto\Boleto;

$boletos[] = [
  'tipo_ambiente' => 2
];

$boleto = new Boleto();
try {
    $boletosRegistrados = $boleto->registrar($boletos);
    dd($boletosRegistrados);
}catch(\Exception $e){
    dd($e->getMessage());
}