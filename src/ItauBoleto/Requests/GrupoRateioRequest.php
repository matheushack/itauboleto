<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 18/04/18
 * Time: 15:59
 */

namespace MatheusHack\ItauBoleto\Requests;


/**
 * Class GrupoRateioRequest
 * @package MatheusHack\ItauBoleto\Requests
 */
class GrupoRateioRequest
{
    /**
     * @var
     */
    public $agencia_grupo_rateio;

    /**
     * @var
     */
    public $conta_grupo_rateio;

    /**
     * @var
     */
    public $digito_verificador_conta_grupo_rateio;

    /**
     * @var
     */
    public $tipo_rateio;

    /**
     * @var
     */
    public $valor_percentual_rateio;
}