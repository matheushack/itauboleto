<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 19/04/18
 * Time: 11:14
 */

namespace MatheusHack\ItauBoleto\Validates;


use MatheusHack\ItauBoleto\Exceptions\ValidationException;

class BoletoValidate
{
    public function config($config = [])
    {
        if(empty($config))
            throw new ValidationException('Necessário passar os dados de configuração para geração do boleto');

        if(!data_get($config, 'clientId'))
            throw new ValidationException('A configuração clientId é obrigatória');

        if(!data_get($config, 'clientSecret'))
            throw new ValidationException('A configuração clientSecret é obrigatória');

        if(!data_get($config, 'itauKey'))
            throw new ValidationException('A configuração itauKey é obrigatória');

        if(!data_get($config, 'cnpj'))
            throw new ValidationException('A configuração CNPJ é obrigatória');
    }
}