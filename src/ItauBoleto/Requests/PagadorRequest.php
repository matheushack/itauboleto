<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 18/04/18
 * Time: 11:30
 */

namespace MatheusHack\ItauBoleto\Requests;


class PagadorRequest
{
    public $cpf_cnpj_pagador;

    public $nome_pagador;

    public $logradouro_pagador;

    public $bairro_pagador;

    public $cidade_pagador;

    public $uf_pagador;

    public $cep_pagador;

    public $grupo_email_pagador;
}