<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 18/04/18
 * Time: 14:54
 */

namespace MatheusHack\ItauBoleto\Response;


/**
 * Class PagadorResponse
 * @package MatheusHack\ItauBoleto\Response
 */
class PagadorResponse
{
    /**
     * @var
     */
    private $documentoIdentificacao;

    /**
     * @var
     */
    private $razaoSocial;

    /**
     * @var
     */
    private $logradouro;

    /**
     * @var
     */
    private $bairro;

    /**
     * @var
     */
    private $complemento;

    /**
     * @var
     */
    private $cidade;

    /**
     * @var
     */
    private $uf;

    /**
     * @var
     */
    private $cep;

    /**
     * @return mixed
     */
    public function getDocumentoIdentificacao()
    {
        return $this->documentoIdentificacao;
    }

    /**
     * @param mixed $documentoIdentificacao
     * @return PagadorResponse
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
     * @return PagadorResponse
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
     * @return PagadorResponse
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
     * @return PagadorResponse
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
     * @return PagadorResponse
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
     * @return PagadorResponse
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
     * @return PagadorResponse
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
     * @return PagadorResponse
     */
    public function setCep($cep)
    {
        $this->cep = $cep;
        return $this;
    }
}