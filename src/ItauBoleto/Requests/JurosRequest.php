<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 18/04/18
 * Time: 11:33
 */

namespace MatheusHack\ItauBoleto\Requests;


use MatheusHack\ItauBoleto\Constants\TipoJuros;

/**
 * Class JurosRequest
 * @package MatheusHack\ItauBoleto\Requests
 */
class JurosRequest
{
    /**
     * @var
     */
    public $data_juros;

    /**
     * @var int
     */
    public $tipo_juros = TipoJuros::ISENTO;

    /**
     * @var
     */
    public $valor_juros;

    /**
     * @var
     */
    public $percentual_juros;
}