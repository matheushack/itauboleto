<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 18/04/18
 * Time: 11:29
 */

namespace MatheusHack\ItauBoleto\Requests;


class BeneficiarioRequest
{
    public $cpf_cnpj_beneficiario;

    public $agencia_beneficiario;

    public $conta_beneficiario;

    public $digito_verificador_conta_beneficiario;
}