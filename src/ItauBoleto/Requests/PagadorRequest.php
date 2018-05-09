<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 18/04/18
 * Time: 11:30
 */

namespace MatheusHack\ItauBoleto\Requests;


/**
 * Class PagadorRequest
 * @package MatheusHack\ItauBoleto\Requests
 */
class PagadorRequest
{
    /**
     * @var
     */
    public $cpf_cnpj_pagador;

    /**
     * @var
     */
    public $nome_pagador;

    /**
     * @var
     */
    public $logradouro_pagador;

    /**
     * @var
     */
    public $bairro_pagador;

    /**
     * @var
     */
    public $cidade_pagador;

    /**
     * @var
     */
    public $uf_pagador;

    /**
     * @var
     */
    public $cep_pagador;

    /**
     * @var
     */
    public $grupo_email_pagador;
}