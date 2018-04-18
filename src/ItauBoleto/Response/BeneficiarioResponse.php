<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 18/04/18
 * Time: 14:51
 */

namespace MatheusHack\ItauBoleto\Response;


class BeneficiarioResponse
{
    private $codigoBanco;

    private $digitoVerificadorBanco;

    private $agencia;

    private $conta;

    private $digitoVerificadorConta;

    private $documentoIdentificacao;

    private $razaoSocial;

    private $logradouro;

    private $bairro;

    private $complemento;

    private $cidade;

    private $uf;

    private $cep;

    /**
     * @return mixed
     */
    public function getCodigoBanco()
    {
        return $this->codigoBanco;
    }

    /**
     * @param mixed $codigoBanco
     * @return BeneficiarioResponse
     */
    public function setCodigoBanco($codigoBanco)
    {
        $this->codigoBanco = $codigoBanco;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDigitoVerificadorBanco()
    {
        return $this->digitoVerificadorBanco;
    }

    /**
     * @param mixed $digitoVerificadorBanco
     * @return BeneficiarioResponse
     */
    public function setDigitoVerificadorBanco($digitoVerificadorBanco)
    {
        $this->digitoVerificadorBanco = $digitoVerificadorBanco;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAgencia()
    {
        return $this->agencia;
    }

    /**
     * @param mixed $agencia
     * @return BeneficiarioResponse
     */
    public function setAgencia($agencia)
    {
        $this->agencia = $agencia;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getConta()
    {
        return $this->conta;
    }

    /**
     * @param mixed $conta
     * @return BeneficiarioResponse
     */
    public function setConta($conta)
    {
        $this->conta = $conta;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDigitoVerificadorConta()
    {
        return $this->digitoVerificadorConta;
    }

    /**
     * @param mixed $digitoVerificadorConta
     * @return BeneficiarioResponse
     */
    public function setDigitoVerificadorConta($digitoVerificadorConta)
    {
        $this->digitoVerificadorConta = $digitoVerificadorConta;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDocumentoIdentificacao()
    {
        return $this->documentoIdentificacao;
    }

    /**
     * @param mixed $documentoIdentificacao
     * @return BeneficiarioResponse
     */
    public function setDocumentoIdentificacao($documentoIdentificacao)
    {
        $this->documentoIdentificacao = $documentoIdentificacao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRazaoSocial()
    {
        return $this->razaoSocial;
    }

    /**
     * @param mixed $razaoSocial
     * @return BeneficiarioResponse
     */
    public function setRazaoSocial($razaoSocial)
    {
        $this->razaoSocial = $razaoSocial;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLogradouro()
    {
        return $this->logradouro;
    }

    /**
     * @param mixed $logradouro
     * @return BeneficiarioResponse
     */
    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * @param mixed $bairro
     * @return BeneficiarioResponse
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getComplemento()
    {
        return $this->complemento;
    }

    /**
     * @param mixed $complemento
     * @return BeneficiarioResponse
     */
    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * @param mixed $cidade
     * @return BeneficiarioResponse
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUf()
    {
        return $this->uf;
    }

    /**
     * @param mixed $uf
     * @return BeneficiarioResponse
     */
    public function setUf($uf)
    {
        $this->uf = $uf;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * @param mixed $cep
     * @return BeneficiarioResponse
     */
    public function setCep($cep)
    {
        $this->cep = $cep;
        return $this;
    }


}