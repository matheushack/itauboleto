<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 18/04/18
 * Time: 11:33
 */

namespace MatheusHack\ItauBoleto\Requests;


use MatheusHack\ItauBoleto\Constants\TipoJuros;

class JurosRequest
{
    public $data_juros;

    public $tipo_juros = TipoJuros::ISENTO;

    public $valor_juros;

    public $percentual_juros;
}