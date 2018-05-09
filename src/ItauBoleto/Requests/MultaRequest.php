<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 18/04/18
 * Time: 11:33
 */

namespace MatheusHack\ItauBoleto\Requests;


use MatheusHack\ItauBoleto\Constants\TipoMulta;

/**
 * Class MultaRequest
 * @package MatheusHack\ItauBoleto\Requests
 */
class MultaRequest
{
    /**
     * @var
     */
    public $data_multa;

    /**
     * @var int
     */
    public $tipo_multa = TipoMulta::ISENTO;

    /**
     * @var
     */
    public $valor_multa;

    /**
     * @var
     */
    public $percentual_multa;
}