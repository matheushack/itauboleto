<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 18/04/18
 * Time: 17:04
 */

namespace MatheusHack\ItauBoleto\Constants;


/**
 * Class TipoDesconto
 * @package MatheusHack\ItauBoleto\Constants
 */
class TipoDesconto
{
    /**
     *
     */
    const SEM_DESCONTO = 0;

    /**
     *
     */
    const DESCONTO_VALOR_FIXO_PAGAMENTO_ATE_DATA_INFORMADA = 1;

    /**
     *
     */
    const DESCONTO_PERCENTUAL_VALOR_TITULO_PAGAMENTO_ATE_DATA_INFORMADA = 2;

    /**
     *
     */
    const DESCONTO_QUANTIDADE_DIAS_CORRIDOS_ANTECIPACAO_PAGAMENTO_REFERENTE_VENCIMENTO = 3;

    /**
     *
     */
    const DESCONTO_QUANTIDADE_DIAS_UTEIS_ANTECIPACAO_PAGAMENTO_REFERENTE_VENCIMENTO = 4;

    /**
     *
     */
    const DESCONTO_PERCENTUAL_QUANTIDADE_DIAS_CORRIDOS_ANTECIPACAO_PAGAMENTO_REFERENTE_VENCIMENTO = 5;

    /**
     *
     */
    const DESCONTO_PERCENTUAL_QUANTIDADE_DIAS_UTEIS_ANTECIPACAO_PAGAMENTO_REFERENTE_VENCIMENTO = 6;
}