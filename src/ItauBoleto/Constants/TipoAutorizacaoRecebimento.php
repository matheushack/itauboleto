<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 18/04/18
 * Time: 17:07
 */

namespace MatheusHack\ItauBoleto\Constants;


class TipoAutorizacaoRecebimento
{
    const TITULO_ACEITA_QUALQUER_VALOR_DIVERGENTE = 1;

    const TITULO_CONTEM_FAIXA_VALORES_ACEITOS_RECEBIMENTO_DIVERGENTES = 2;

    const TITULO_NAO_ACEITA_PAGAMENTOS_VALORES_DIVERGENTES = 3;

    const TITULO_ACEITA_PAGAMENTOS_SUPERIORES_MINIMO = 4;
}