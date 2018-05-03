<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 18/04/18
 * Time: 11:33
 */

namespace MatheusHack\ItauBoleto\Requests;


use MatheusHack\ItauBoleto\Constants\TipoDesconto;

class GrupoDescontoRequest
{
    public $data_desconto;

    public $tipo_desconto = TipoDesconto::SEM_DESCONTO;

    public $valor_desconto;

    public $percentual_desconto;
}