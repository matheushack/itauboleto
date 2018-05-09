<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 18/04/18
 * Time: 15:51
 */

namespace MatheusHack\ItauBoleto\Requests;


/**
 * Class DebitoRequest
 * @package MatheusHack\ItauBoleto\Requests
 */
class DebitoRequest
{
    /**
     * @var
     */
    public $agencia_debito;

    /**
     * @var
     */
    public $conta_debito;

    /**
     * @var
     */
    public $digito_verificador_conta_debito;
}