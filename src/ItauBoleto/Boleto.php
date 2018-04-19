<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 18/04/18
 * Time: 10:21
 */

namespace MatheusHack\ItauBoleto;

use MatheusHack\ItauBoleto\Helpers\Fractal;
use MatheusHack\ItauBoleto\Services\ServiceBoleto;
use MatheusHack\ItauBoleto\Validates\BoletoValidate;
use MatheusHack\ItauBoleto\Exceptions\BoletoException;
use MatheusHack\ItauBoleto\Transformers\BoletoTransformer;

class Boleto
{
    private $serviceBoleto;

    function __construct($config = [])
    {
        $validate = new BoletoValidate();
        $validate->config($config);

        $this->serviceBoleto = new ServiceBoleto($config);
    }

    public function registrar(array $boletos)
    {
        if(empty($boletos))
            throw new BoletoException('Requisição inválida');

        $boletos = $this->serviceBoleto->registrar($boletos);

        if($boletos->count() > 0)
            return Fractal::collection($boletos, new BoletoTransformer)->toJson();

        throw new BoletoException('Nenhuma boleto registrado');
    }
}