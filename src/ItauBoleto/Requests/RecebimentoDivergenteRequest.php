<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 18/04/18
 * Time: 11:34
 */

namespace MatheusHack\ItauBoleto\Requests;


use MatheusHack\ItauBoleto\Constants\TipoAutorizacaoRecebimento;

/**
 * Class RecebimentoDivergenteRequest
 * @package MatheusHack\ItauBoleto\Requests
 */
class RecebimentoDivergenteRequest
{
    /**
     * @var int
     */
    public $tipo_autorizacao_recebimento = TipoAutorizacaoRecebimento::TITULO_NAO_ACEITA_PAGAMENTOS_VALORES_DIVERGENTES;

    /**
     * @var
     */
    public $tipo_valor_percentual_recebimento;

    /**
     * @var
     */
    public $valor_minimo_recebimento;

    /**
     * @var
     */
    public $percentual_minimo_recebimento;

    /**
     * @var
     */
    public $valor_maximo_recebimento;

    /**
     * @var
     */
    public $percentual_maximo_recebimento;
}