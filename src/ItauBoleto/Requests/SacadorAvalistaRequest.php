<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 18/04/18
 * Time: 15:54
 */

namespace MatheusHack\ItauBoleto\Requests;


class SacadorAvalistaRequest
{
    public $cpf_cnpj_sacador_avalista;

    public $nome_sacador_avalista;

    public $logradouro_sacador_avalista;

    public $bairro_sacador_avalista;

    public $cidade_sacador_avalista;

    public $uf_sacador_avalista;

    public $cep_sacador_avalista;
}