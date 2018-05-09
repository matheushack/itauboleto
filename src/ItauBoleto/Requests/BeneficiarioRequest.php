<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 18/04/18
 * Time: 11:29
 */

namespace MatheusHack\ItauBoleto\Requests;


/**
 * Class BeneficiarioRequest
 * @package MatheusHack\ItauBoleto\Requests
 */
class BeneficiarioRequest
{
    /**
     * @var
     */
    public $cpf_cnpj_beneficiario;

    /**
     * @var
     */
    public $agencia_beneficiario;

    /**
     * @var
     */
    public $conta_beneficiario;

    /**
     * @var
     */
    public $digito_verificador_conta_beneficiario;
}