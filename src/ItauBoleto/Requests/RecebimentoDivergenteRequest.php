<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 18/04/18
 * Time: 11:34
 */

namespace MatheusHack\ItauBoleto\Requests;


use MatheusHack\ItauBoleto\Constants\TipoAutorizacaoRecebimento;

class RecebimentoDivergenteRequest
{
    public $tipo_autorizacao_recebimento = TipoAutorizacaoRecebimento::TITULO_NAO_ACEITA_PAGAMENTOS_VALORES_DIVERGENTES;

    public $tipo_valor_percentual_recebimento;

    public $valor_minimo_recebimento;

    public $percentual_minimo_recebimento;

    public $valor_maximo_recebimento;

    public $percentual_maximo_recebimento;
}