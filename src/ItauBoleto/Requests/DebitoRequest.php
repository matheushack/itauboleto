<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 18/04/18
 * Time: 15:51
 */

namespace MatheusHack\ItauBoleto\Requests;


class DebitoRequest
{
    public $agencia_debito;

    public $conta_debito;

    public $digito_verificador_conta_debito;
}