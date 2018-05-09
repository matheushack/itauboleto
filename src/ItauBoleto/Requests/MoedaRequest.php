<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 18/04/18
 * Time: 11:32
 */

namespace MatheusHack\ItauBoleto\Requests;


/**
 * Class MoedaRequest
 * @package MatheusHack\ItauBoleto\Requests
 */
class MoedaRequest
{
    /**
     * @var string
     */
    public $codigo_moeda_cnab = '09';

    /**
     * @var
     */
    public $quantidade_moeda;
}