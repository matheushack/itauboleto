<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 18/04/18
 * Time: 11:12
 */

namespace MatheusHack\ItauBoleto\Requests;


use MatheusHack\ItauBoleto\Constants\Especie;
use MatheusHack\ItauBoleto\Constants\TipoAmbiente;
use MatheusHack\ItauBoleto\Constants\TipoCobranca;
use MatheusHack\ItauBoleto\Constants\TipoPagamento;
use MatheusHack\ItauBoleto\Constants\TipoRegistro;

/**
 * Class BoletoRequest
 * @package MatheusHack\ItauBoleto\Requests
 */
class BoletoRequest
{
    /**
     * @var int
     */
    public $tipo_ambiente = TipoAmbiente::PRODUCAO;

    /**
     * @var int
     */
    public $tipo_registro = TipoRegistro::REGISTRO;

    /**
     * @var int
     */
    public $tipo_cobranca = TipoCobranca::BOLETOS;

    /**
     * @var string
     */
    public $tipo_produto = '00006';

    /**
     * @var string
     */
    public $subproduto = '00008';

    /**
     * @var
     */
    public $beneficiario;

    /**
     * @var
     */
    public $debito;

    /**
     * @var
     */
    public $identificador_titulo_empresa;

    /**
     * @var
     */
    public $uso_banco;

    /**
     * @var string
     */
    public $titulo_aceite = 'S';

    /**
     * @var
     */
    public $pagador;

    /**
     * @var
     */
    public $sacador_avalista;

    /**
     * @var
     */
    public $tipo_carteira_titulo;

    /**
     * @var
     */
    public $moeda;

    /**
     * @var
     */
    public $nosso_numero;

    /**
     * @var
     */
    public $digito_verificador_nosso_numero;

    /**
     * @var
     */
    public $codigo_barras;

    /**
     * @var
     */
    public $data_vencimento;

    /**
     * @var
     */
    public $valor_cobrado;

    /**
     * @var
     */
    public $seu_numero;

    /**
     * @var
     */
    public $especie;

    /**
     * @var
     */
    public $data_emissao;

    /**
     * @var
     */
    public $data_limite_pagamento;

    /**
     * @var int
     */
    public $tipo_pagamento = TipoPagamento::COM_VENCIMENTO_DETERMINADO;

    /**
     * @var bool
     */
    public $indicador_pagamento_parcial = false;

    /**
     * @var
     */
    public $quantidade_pagamento_parcial;

    /**
     * @var
     */
    public $quantidade_parcelas;

    /**
     * @var
     */
    public $instrucao_cobranca_1;

    /**
     * @var
     */
    public $quantidade_dias_1;

    /**
     * @var
     */
    public $data_instrucao_1;

    /**
     * @var
     */
    public $instrucao_cobranca_2;

    /**
     * @var
     */
    public $quantidade_dias_2;

    /**
     * @var
     */
    public $data_instrucao_2;

    /**
     * @var
     */
    public $instrucao_cobranca_3;

    /**
     * @var
     */
    public $quantidade_dias_3;

    /**
     * @var
     */
    public $data_instrucao_3;

    /**
     * @var
     */
    public $valor_abatimento;

    /**
     * @var
     */
    public $juros;

    /**
     * @var
     */
    public $multa;

    /**
     * @var
     */
    public $grupo_desconto;

    /**
     * @var
     */
    public $recebimento_divergente;

    /**
     * @var
     */
    public $grupo_rateio;
}