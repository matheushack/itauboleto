<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 18/04/18
 * Time: 14:44
 */

namespace MatheusHack\ItauBoleto\Response;


class BoletoResponse
{
    private $beneficiario;

    private $pagador;

    private $sacadorAvalista;

    private $moeda;

    private $vencimento;

    private $tipoCarteira;

    private $nossoNumero;

    private $seuNumero;

    private $especie;

    private $codigoBarras;

    private $linhaDigitavel;

    private $localPagamento;

    private $dataProcessamento;

    private $dataEmissao;

    private $usoBanco;

    private $valor;

    private $desconto;

    private $outraDeducao;

    private $juroMulta;

    private $outroAcrescimo;

    private $totalCobrado;

    private $textoInformacaoClienteBeneficiario;

    private $status;

    private $erros;

    /**
     * @return mixed
     */
    public function getBeneficiario()
    {
        return $this->beneficiario;
    }

    /**
     * @param mixed $beneficiario
     * @return BoletoResponse
     */
    public function setBeneficiario($beneficiario)
    {
        $this->beneficiario = $beneficiario;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPagador()
    {
        return $this->pagador;
    }

    /**
     * @param mixed $pagador
     * @return BoletoResponse
     */
    public function setPagador($pagador)
    {
        $this->pagador = $pagador;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSacadorAvalista()
    {
        return $this->sacadorAvalista;
    }

    /**
     * @param mixed $sacadorAvalista
     * @return BoletoResponse
     */
    public function setSacadorAvalista($sacadorAvalista)
    {
        $this->sacadorAvalista = $sacadorAvalista;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMoeda()
    {
        return $this->moeda;
    }

    /**
     * @param mixed $moeda
     * @return BoletoResponse
     */
    public function setMoeda($moeda)
    {
        $this->moeda = $moeda;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVencimento()
    {
        return $this->vencimento;
    }

    /**
     * @param mixed $vencimento
     * @return BoletoResponse
     */
    public function setVencimento($vencimento)
    {
        $this->vencimento = $vencimento;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTipoCarteira()
    {
        return $this->tipoCarteira;
    }

    /**
     * @param mixed $tipoCarteira
     * @return BoletoResponse
     */
    public function setTipoCarteira($tipoCarteira)
    {
        $this->tipoCarteira = $tipoCarteira;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNossoNumero()
    {
        return $this->nossoNumero;
    }

    /**
     * @param mixed $nossoNumero
     * @return BoletoResponse
     */
    public function setNossoNumero($nossoNumero)
    {
        $this->nossoNumero = $nossoNumero;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSeuNumero()
    {
        return $this->seuNumero;
    }

    /**
     * @param mixed $seuNumero
     * @return BoletoResponse
     */
    public function setSeuNumero($seuNumero)
    {
        $this->seuNumero = $seuNumero;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEspecie()
    {
        return $this->especie;
    }

    /**
     * @param mixed $especie
     * @return BoletoResponse
     */
    public function setEspecie($especie)
    {
        $this->especie = $especie;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodigoBarras()
    {
        return $this->codigoBarras;
    }

    /**
     * @param mixed $codigoBarras
     * @return BoletoResponse
     */
    public function setCodigoBarras($codigoBarras)
    {
        $this->codigoBarras = $codigoBarras;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLinhaDigitavel()
    {
        return $this->linhaDigitavel;
    }

    /**
     * @param mixed $linhaDigitavel
     * @return BoletoResponse
     */
    public function setLinhaDigitavel($linhaDigitavel)
    {
        $this->linhaDigitavel = $linhaDigitavel;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLocalPagamento()
    {
        return $this->localPagamento;
    }

    /**
     * @param mixed $localPagamento
     * @return BoletoResponse
     */
    public function setLocalPagamento($localPagamento)
    {
        $this->localPagamento = $localPagamento;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDataProcessamento()
    {
        return $this->dataProcessamento;
    }

    /**
     * @param mixed $dataProcessamento
     * @return BoletoResponse
     */
    public function setDataProcessamento($dataProcessamento)
    {
        $this->dataProcessamento = $dataProcessamento;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDataEmissao()
    {
        return $this->dataEmissao;
    }

    /**
     * @param mixed $dataEmissao
     * @return BoletoResponse
     */
    public function setDataEmissao($dataEmissao)
    {
        $this->dataEmissao = $dataEmissao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsoBanco()
    {
        return $this->usoBanco;
    }

    /**
     * @param mixed $usoBanco
     * @return BoletoResponse
     */
    public function setUsoBanco($usoBanco)
    {
        $this->usoBanco = $usoBanco;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param mixed $valor
     * @return BoletoResponse
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDesconto()
    {
        return $this->desconto;
    }

    /**
     * @param mixed $desconto
     * @return BoletoResponse
     */
    public function setDesconto($desconto)
    {
        $this->desconto = $desconto;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOutraDeducao()
    {
        return $this->outraDeducao;
    }

    /**
     * @param mixed $outraDeducao
     * @return BoletoResponse
     */
    public function setOutraDeducao($outraDeducao)
    {
        $this->outraDeducao = $outraDeducao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getJuroMulta()
    {
        return $this->juroMulta;
    }

    /**
     * @param mixed $juroMulta
     * @return BoletoResponse
     */
    public function setJuroMulta($juroMulta)
    {
        $this->juroMulta = $juroMulta;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOutroAcrescimo()
    {
        return $this->outroAcrescimo;
    }

    /**
     * @param mixed $outroAcrescimo
     * @return BoletoResponse
     */
    public function setOutroAcrescimo($outroAcrescimo)
    {
        $this->outroAcrescimo = $outroAcrescimo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTotalCobrado()
    {
        return $this->totalCobrado;
    }

    /**
     * @param mixed $totalCobrado
     * @return BoletoResponse
     */
    public function setTotalCobrado($totalCobrado)
    {
        $this->totalCobrado = $totalCobrado;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTextoInformacaoClienteBeneficiario()
    {
        return $this->textoInformacaoClienteBeneficiario;
    }

    /**
     * @param mixed $textoInformacaoClienteBeneficiario
     * @return BoletoResponse
     */
    public function setTextoInformacaoClienteBeneficiario($textoInformacaoClienteBeneficiario)
    {
        $this->textoInformacaoClienteBeneficiario = $textoInformacaoClienteBeneficiario;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     * @return BoletoResponse
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getErros()
    {
        return $this->erros;
    }

    /**
     * @param mixed $erros
     * @return BoletoResponse
     */
    public function setErros($erros)
    {
        $this->erros = $erros;
        return $this;
    }
}