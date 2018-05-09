<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 18/04/18
 * Time: 15:54
 */

namespace MatheusHack\ItauBoleto\Requests;


/**
 * Class SacadorAvalistaRequest
 * @package MatheusHack\ItauBoleto\Requests
 */
class SacadorAvalistaRequest
{
    /**
     * @var
     */
    public $cpf_cnpj_sacador_avalista;

    /**
     * @var
     */
    public $nome_sacador_avalista;

    /**
     * @var
     */
    public $logradouro_sacador_avalista;

    /**
     * @var
     */
    public $bairro_sacador_avalista;

    /**
     * @var
     */
    public $cidade_sacador_avalista;

    /**
     * @var
     */
    public $uf_sacador_avalista;

    /**
     * @var
     */
    public $cep_sacador_avalista;
}