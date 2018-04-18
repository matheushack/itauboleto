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

class BoletoRequest
{
    public $tipo_ambiente = TipoAmbiente::TESTE;

    public $tipo_registro = TipoRegistro::REGISTRO;

    public $tipo_cobranca = TipoCobranca::BOLETOS;

    public $tipo_produto;

    public $subproduto;

    public $beneficiario;

    public $debito;

    public $identificador_titulo_empresa;

    public $uso_banco;

    public $titulo_aceite;

    public $pagador;

    public $sacador_avalista;

    public $tipo_carteira_titulo;

    public $moeda;

    public $nosso_numero;

    public $digito_verificador_nosso_numero;

    public $codigo_barras;

    public $data_vencimento;

    public $valor_cobrado;

    public $seu_numero;

    public $especie;

    public $data_emissao;

    public $data_limite_pagamento;

    public $tipo_pagamento = TipoPagamento::COM_VENCIMENTO_DETERMINADO;

    public $indicador_pagamento_parcial = false;

    public $quantidade_pagamento_parcial;

    public $quantidade_parcelas;

    public $instrucao_cobranca_1;

    public $quantidade_dias_1;

    public $data_instrucao_1;

    public $instrucao_cobranca_2;

    public $quantidade_dias_2;

    public $data_instrucao_2;

    public $instrucao_cobranca_3;

    public $quantidade_dias_3;

    public $data_instrucao_3;

    public $valor_abatimento;

    public $juros;

    public $multa;

    public $grupo_desconto;

    public $recebimento_divergente;

    public $grupo_rateio;
}