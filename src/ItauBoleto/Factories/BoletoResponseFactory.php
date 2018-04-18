<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 18/04/18
 * Time: 15:00
 */

namespace MatheusHack\ItauBoleto\Factories;


use Illuminate\Support\Collection;
use MatheusHack\ItauBoleto\Response\BoletoResponse;
use MatheusHack\ItauBoleto\Response\BoletosResponse;

class BoletoResponseFactory
{
    private $boletos;

    function __construct($response)
    {
        $this->boletos = $response;
        $boletos = new BoletosResponse();
        $boletos->setBoletos($this->makeBoletos());

        return new Collection($boletos);
    }

    public function makeBoletos()
    {
        $boletos = new Collection();

        dd($this->boletos);

        foreach($this->boletos as $boleto) {
            $boletoResponse = new BoletoResponse();
//            $boletoResponse->setBeneficiario($this->makeBeneficiario());
//            dd($boleto);
            $boletos[] = $boletoResponse;
        }

        dd($boletos);

        return $boletos;

    }
}