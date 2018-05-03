<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 18/04/18
 * Time: 11:33
 */

namespace MatheusHack\ItauBoleto\Requests;


use MatheusHack\ItauBoleto\Constants\TipoMulta;

class MultaRequest
{
    public $data_multa;

    public $tipo_multa = TipoMulta::ISENTO;

    public $valor_multa;

    public $percentual_multa;
}