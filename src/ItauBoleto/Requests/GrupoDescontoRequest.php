<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 18/04/18
 * Time: 11:33
 */

namespace MatheusHack\ItauBoleto\Requests;


use MatheusHack\ItauBoleto\Constants\TipoDesconto;

/**
 * Class GrupoDescontoRequest
 * @package MatheusHack\ItauBoleto\Requests
 */
class GrupoDescontoRequest
{
    /**
     * @var
     */
    public $data_desconto;

    /**
     * @var int
     */
    public $tipo_desconto = TipoDesconto::SEM_DESCONTO;

    /**
     * @var
     */
    public $valor_desconto;

    /**
     * @var
     */
    public $percentual_desconto;
}