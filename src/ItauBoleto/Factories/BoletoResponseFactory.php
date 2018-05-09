<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 18/04/18
 * Time: 15:00
 */

namespace MatheusHack\ItauBoleto\Factories;


use Illuminate\Support\Collection;
use MatheusHack\ItauBoleto\Constants\Status;
use MatheusHack\ItauBoleto\Helpers\Boleto;
use MatheusHack\ItauBoleto\Requests\DadosComplementaresRequest;
use MatheusHack\ItauBoleto\Response\BoletoResponse;
use MatheusHack\ItauBoleto\Response\BoletosResponse;

/**
 * Class BoletoResponseFactory
 * @package MatheusHack\ItauBoleto\Factories
 */
class BoletoResponseFactory
{
    /**
     * @var
     */
    private $boletos;

    /**
     * @var DadosComplementaresRequest
     */
    private $dadosComplementares;

    /**
     * BoletoResponseFactory constructor.
     * @param $response
     * @param DadosComplementaresRequest $dadosComplementares
     */
    function __construct($response, DadosComplementaresRequest $dadosComplementares)
    {
        $this->boletos = $response;
        $this->dadosComplementares = $dadosComplementares;
    }

    /**
     * @return BoletosResponse
     */
    public function make()
    {
        $boletosResponse = new BoletosResponse();
        $boletos = new Collection();

        foreach($this->boletos as $boleto) {
            if(in_array($boleto->status, [Status::ERRO_VALIDACAO, Status::ERRO]))
                $boletos[] = $this->makeBoletoErro($boleto);
            else
                $boletos[] = $this->makeBoletoSucesso($boleto);
        }

        $boletosResponse->setBoletos($boletos);
        return $boletosResponse;

    }

    /**
     * @param $boleto
     * @return BoletoResponse
     */
    private function makeBoletoErro($boleto)
    {
        $boletoResponse = new BoletoResponse();
        $boletoResponse->setBeneficiario(Boleto::removeNullValue(data_get($boleto, 'beneficiario', null)))
            ->setPagador(Boleto::removeNullValue(data_get($boleto, 'pagador', null)))
            ->setSacadorAvalista(Boleto::removeNullValue(data_get($boleto, 'sacador_avalista', null)))
            ->setMoeda(Boleto::removeNullValue(data_get($boleto, 'moeda', null)))
            ->setVencimento(data_get($boleto, 'data_vencimento', null))
            ->setTipoCarteira(data_get($boleto, 'tipo_carteira_titulo', null))
            ->setNossoNumero(data_get($boleto, 'nosso_numero', null))
            ->setSeuNumero(data_get($boleto, 'seu_numero', null))
            ->setEspecie(data_get($boleto, 'especie', null))
            ->setCodigoBarras(data_get($boleto, 'codigo_barras', null))
            ->setLinhaDigitavel(data_get($boleto, 'numero_linha_digitavel', null))
            ->setLocalPagamento(data_get($boleto, 'tipo_pagamento', null))
            ->setDataProcessamento(data_get($boleto, 'data_processamento', null))
            ->setDataEmissao(data_get($boleto, 'data_emissao', null))
            ->setUsoBanco(data_get($boleto, 'uso_banco', null))
            ->setValor(data_get($boleto, 'valor_cobrado', null))
            ->setStatus(data_get($boleto, 'status', Status::ERRO))
            ->setErros(data_get($boleto, 'erros', null));

        return $boletoResponse;
    }

    /**
     * @param $boleto
     * @return BoletoResponse
     */
    private function makeBoletoSucesso($boleto)
    {
        $boletoResponse = new BoletoResponse();
        $boletoResponse->setBeneficiario(Boleto::removeNullValue(data_get($boleto, 'beneficiario', null)))
            ->setPagador(Boleto::removeNullValue(data_get($boleto, 'pagador', null)))
            ->setSacadorAvalista(Boleto::removeNullValue(data_get($boleto, 'sacador_avalista', null)))
            ->setMoeda(Boleto::removeNullValue(data_get($boleto, 'moeda', null)))
            ->setVencimento(data_get($boleto, 'vencimento_titulo', null))
            ->setTipoCarteira(data_get($boleto, 'tipo_carteira_titulo', null))
            ->setNossoNumero(data_get($boleto, 'nosso_numero', null))
            ->setSeuNumero(data_get($boleto, 'seu_numero', null))
            ->setEspecie(data_get($boleto, 'especie_documento', null))
            ->setCodigoBarras(data_get($boleto, 'codigo_barras', null))
            ->setLinhaDigitavel(data_get($boleto, 'numero_linha_digitavel', null))
            ->setLocalPagamento(data_get($boleto, 'local_pagamento', null))
            ->setDataProcessamento(data_get($boleto, 'data_processamento', null))
            ->setDataEmissao(data_get($boleto, 'data_emissao', null))
            ->setUsoBanco(data_get($boleto, 'uso_banco', null))
            ->setValor(data_get($boleto, 'valor_titulo', null))
            ->setDesconto(data_get($boleto, 'valor_desconto', null))
            ->setOutraDeducao(data_get($boleto, 'valor_outra_deducao', null))
            ->setJuroMulta(data_get($boleto, 'valor_juro_multa', null))
            ->setOutroAcrescimo(data_get($boleto, 'valor_outro_acrescimo', null))
            ->setTotalCobrado(data_get($boleto, 'valor_total_cobrado', null))
            ->setTextoInformacaoClienteBeneficiario($this->dadosComplementares->getInstrucoes())
            ->setDemonstrativo($this->dadosComplementares->getDemonstrativo())
            ->setStatus(Status::REGISTRADO);

        return $boletoResponse;
    }
}