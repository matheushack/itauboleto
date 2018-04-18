<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 18/04/18
 * Time: 11:23
 */

namespace MatheusHack\ItauBoleto\Factories;


use MatheusHack\ItauBoleto\Requests\JurosRequest;
use MatheusHack\ItauBoleto\Requests\MoedaRequest;
use MatheusHack\ItauBoleto\Requests\MultaRequest;
use MatheusHack\ItauBoleto\Requests\BoletoRequest;
use MatheusHack\ItauBoleto\Requests\DebitoRequest;
use MatheusHack\ItauBoleto\Requests\PagadorRequest;
use MatheusHack\ItauBoleto\Requests\GrupoRateioRequest;
use MatheusHack\ItauBoleto\Requests\BeneficiarioRequest;
use MatheusHack\ItauBoleto\Requests\GrupoDescontoRequest;
use MatheusHack\ItauBoleto\Requests\SacadorAvalistaRequest;
use MatheusHack\ItauBoleto\Requests\GrupoEmailPagadorRequest;
use MatheusHack\ItauBoleto\Requests\RecebimentoDivergenteRequest;

class BoletoRequestFactory
{
    private $boleto;

    public function make(array $boleto)
    {
        $boletoRequest = new BoletoRequest();

        $boletoRequest->tipo_ambiente = data_get($boleto, 'tipo_ambiente', null);
        $boletoRequest->tipo_registro = data_get($boleto, 'tipo_registro', null);
        $boletoRequest->tipo_cobranca = data_get($boleto, 'tipo_cobranca', null);
        $boletoRequest->tipo_produto = data_get($boleto, 'tipo_produto', null);
        $boletoRequest->subproduto = data_get($boleto, 'subproduto', null);
        $boletoRequest->identificador_titulo_empresa = data_get($boleto, 'identificador_titulo_empresa', null);
        $boletoRequest->uso_banco = data_get($boleto, 'uso_banco', null);
        $boletoRequest->titulo_aceite = data_get($boleto, 'titulo_aceite', null);
        $boletoRequest->tipo_carteira_titulo = data_get($boleto, 'tipo_carteira_titulo', null);
        $boletoRequest->nosso_numero = data_get($boleto, 'nosso_numero', null);
        $boletoRequest->digito_verificador_nosso_numero = data_get($boleto, 'digito_verificador_nosso_numero', null);
        $boletoRequest->codigo_barras = data_get($boleto, 'codigo_barras', null);
        $boletoRequest->data_vencimento = data_get($boleto, 'data_vencimento', null);
        $boletoRequest->valor_cobrado = data_get($boleto, 'valor_cobrado', null);
        $boletoRequest->seu_numero = data_get($boleto, 'seu_numero', null);
        $boletoRequest->especie = data_get($boleto, 'especie', null);
        $boletoRequest->data_emissao = data_get($boleto, 'data_emissao', null);
        $boletoRequest->data_limite_pagamento = data_get($boleto, 'data_limite_pagamento', null);
        $boletoRequest->tipo_pagamento = data_get($boleto, 'tipo_pagamento', null);
        $boletoRequest->indicador_pagamento_parcial = data_get($boleto, 'indicador_pagamento_parcial', null);
        $boletoRequest->quantidade_pagamento_parcial = data_get($boleto, 'quantidade_pagamento_parcial', null);
        $boletoRequest->quantidade_parcelas = data_get($boleto, 'quantidade_parcelas', null);
        $boletoRequest->instrucao_cobranca_1 = data_get($boleto, 'instrucao_cobranca_1', null);
        $boletoRequest->quantidade_dias_1 = data_get($boleto, 'quantidade_dias_1', null);
        $boletoRequest->data_instrucao_1 = data_get($boleto, 'data_instrucao_1', null);
        $boletoRequest->instrucao_cobranca_2 = data_get($boleto, 'instrucao_cobranca_2', null);
        $boletoRequest->quantidade_dias_2 = data_get($boleto, 'quantidade_dias_2', null);
        $boletoRequest->data_instrucao_2 = data_get($boleto, 'data_instrucao_2', null);
        $boletoRequest->instrucao_cobranca_3 = data_get($boleto, 'instrucao_cobranca_3', null);
        $boletoRequest->quantidade_dias_3 = data_get($boleto, 'quantidade_dias_3', null);
        $boletoRequest->data_instrucao_3 = data_get($boleto, 'data_instrucao_3', null);
        $boletoRequest->valor_abatimento = data_get($boleto, 'valor_abatimento', null);

        if(data_get($boleto, 'beneficiario'))
            $boletoRequest->beneficiario =  $this->setBeneficiario($boleto['beneficiario']);

        if(data_get($boleto, 'debito'))
            $boletoRequest->debito =  $this->setDebito($boleto['debito']);

        if(data_get($boleto, 'pagador'))
            $boletoRequest->pagador = $this->setPagador($boleto['pagador']);

        if(data_get($boleto, 'sacador_avalista'))
            $boletoRequest->sacador_avalista = $this->setSacadorAvalista($boleto['sacador_avalista']);

        if(data_get($boleto, 'moeda'))
            $boletoRequest->moeda = $this->setMoeda($boleto['moeda']);

        if(data_get($boleto, 'juros'))
            $boletoRequest->juros = $this->setJuros($boleto['juros']);

        if(data_get($boleto, 'multa'))
            $boletoRequest->multa = $this->setMulta($boleto['multa']);

        if(data_get($boleto, 'grupo_desconto'))
            $boletoRequest->grupo_desconto = $this->setGrupoDesconto($boleto['grupo_desconto']);

        if(data_get($boleto, 'recebimento_divergente'))
            $boletoRequest->recebimento_divergente = $this->setRecebimentoDivergente($boleto['recebimento_divergente']);

        if(data_get($boleto, 'grupo_rateio'))
            $boletoRequest->grupo_rateio = $this->setGrupoRateio($boleto['grupo_rateio']);

        return $boletoRequest;
    }

    private function setBeneficiario($data = [])
    {
        $beneficiario = new BeneficiarioRequest();
        $beneficiario->cpf_cnpj_beneficiario = data_get($data, 'documento_identificacao', null);
        $beneficiario->agencia_beneficiario = data_get($data, 'agencia', null);
        $beneficiario->conta_beneficiario = data_get($data, 'conta', null);
        $beneficiario->digito_verificador_conta_beneficiario = data_get($data, 'digito_conta', null);

        return $beneficiario;
    }

    private function setDebito($data = [])
    {
        $debito = new DebitoRequest();
        $debito->agencia_debito = data_get($data, 'agencia', null);
        $debito->conta_debito = data_get($data, 'conta', null);
        $debito->digito_verificador_conta_debito = data_get($data, 'digito_conta', null);

        return $debito;
    }

    private function setPagador($data = [])
    {
        $pagador = new PagadorRequest();
        $pagador->cpf_cnpj_pagador = data_get($data, 'documento_identificacao', null);
        $pagador->nome_pagador = data_get($data, 'nome', null);
        $pagador->logradouro_pagador = data_get($data, 'logradouro', null);
        $pagador->bairro_pagador = data_get($data, 'bairro', null);
        $pagador->cidade_pagador = data_get($data, 'cidade', null);
        $pagador->uf_pagador = data_get($data, 'uf', null);
        $pagador->cep_pagador = data_get($data, 'cep', null);

        if(data_get($data, 'emails'))
            $pagador->grupo_email_pagador = $this->setGrupoEmailPagador($data['emails']);

        return $pagador;
    }

    private function setGrupoEmailPagador($data = [])
    {
        $emails = [];

        foreach ($data as $email){
            $grupoEmailPagador = new GrupoEmailPagadorRequest();
            $grupoEmailPagador->email_pagador = $email;
            $emails[] = $grupoEmailPagador;
        }

        return $emails;

    }

    private function setSacadorAvalista($data = [])
    {
        $sacadorAvalista = new SacadorAvalistaRequest();
        $sacadorAvalista->cpf_cnpj_sacador_avalista = data_get($data, 'documento_identificacao', null);
        $sacadorAvalista->nome_sacador_avalista = data_get($data, 'nome', null);
        $sacadorAvalista->logradouro_sacador_avalista = data_get($data, 'logradouro', null);
        $sacadorAvalista->bairro_sacador_avalista = data_get($data, 'bairro', null);
        $sacadorAvalista->cidade_sacador_avalista = data_get($data, 'cidade', null);
        $sacadorAvalista->uf_sacador_avalista = data_get($data, 'uf', null);
        $sacadorAvalista->cep_sacador_avalista = data_get($data, 'cep', null);

        return $sacadorAvalista;
    }

    private function setMoeda($data = [])
    {
        $moeda = new MoedaRequest();
        $moeda->codigo_moeda_cnab = data_get($data, 'codigo', null);
        $moeda->quantidade_moeda = data_get($data, 'quantidade', null);

        return $moeda;
    }

    private function setJuros($data = [])
    {
        $juros = new JurosRequest();
        $juros->data_juros = data_get($data, 'data', null);
        $juros->tipo_juros = data_get($data, 'tipo', null);
        $juros->valor_juros = data_get($data, 'valor', null);
        $juros->percentual_juros = data_get($data, 'percentual', null);

        return $juros;
    }

    private function setMulta($data = [])
    {
        $multa = new MultaRequest();
        $multa->data_multa = data_get($data, 'data', null);
        $multa->tipo_multa = data_get($data, 'tipo', null);
        $multa->valor_multa = data_get($data, 'valor', null);
        $multa->percentual_multa = data_get($data, 'percentual', null);

        return $multa;
    }

    private function setGrupoDesconto($data = [])
    {
        $grupoDesconto = new GrupoDescontoRequest();
        $grupoDesconto->data_desconto = data_get($data, 'data', null);
        $grupoDesconto->tipo_desconto = data_get($data, 'tipo', null);
        $grupoDesconto->valor_desconto = data_get($data, 'valor', null);
        $grupoDesconto->percentual_desconto = data_get($data, 'percentual', null);

        return $grupoDesconto;
    }

    private function setRecebimentoDivergente($data = [])
    {
        $recebimentoDivergente = new RecebimentoDivergenteRequest();
        $recebimentoDivergente->tipo_autorizacao_recebimento = data_get($data, 'tipo_autorizacao', null);
        $recebimentoDivergente->tipo_valor_percentual_recebimento = data_get($data, 'tipo_valor_percentual', null);
        $recebimentoDivergente->valor_minimo_recebimento = data_get($data, 'valor_minimo', null);
        $recebimentoDivergente->percentual_minimo_recebimento = data_get($data, 'percentual_minimo', null);
        $recebimentoDivergente->valor_maximo_recebimento = data_get($data, 'valor_maximo', null);
        $recebimentoDivergente->percentual_maximo_recebimento = data_get($data, 'percentual_maximo', null);

        return $recebimentoDivergente;
    }

    private function setGrupoRateio($data = [])
    {
        $grupoRateio = new GrupoRateioRequest();
        $grupoRateio->agencia_grupo_rateio = data_get($data, 'agencia', null);
        $grupoRateio->conta_grupo_rateio = data_get($data, 'conta', null);
        $grupoRateio->digito_verificador_conta_grupo_rateio = data_get($data, 'digito_conta', null);
        $grupoRateio->tipo_rateio = data_get($data, 'tipo', null);
        $grupoRateio->valor_percentual_rateio = data_get($data, 'valor_percentual', null);

        return $grupoRateio;
    }
}