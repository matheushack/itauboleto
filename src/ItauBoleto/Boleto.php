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
use MatheusHack\ItauBoleto\Exceptions\BoletoException;
use MatheusHack\ItauBoleto\Transformers\BoletoTransformer;
use MatheusHack\ItauBoleto\Factories\BoletoResponseFactory;



class Boleto
{
    private $serviceBoleto;

    function __construct()
    {
        $this->serviceBoleto = new ServiceBoleto();
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