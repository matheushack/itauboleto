<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 18/04/18
 * Time: 11:32
 */

namespace MatheusHack\ItauBoleto\Requests;


class MoedaRequest
{
    public $codigo_moeda_cnab = '09';

    public $quantidade_moeda;
}