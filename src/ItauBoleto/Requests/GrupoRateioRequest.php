<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 18/04/18
 * Time: 15:59
 */

namespace MatheusHack\ItauBoleto\Requests;


class GrupoRateioRequest
{
    public $agencia_grupo_rateio;

    public $conta_grupo_rateio;

    public $digito_verificador_conta_grupo_rateio;

    public $tipo_rateio;

    public $valor_percentual_rateio;
}