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
    }

    public function make()
    {
        $boletosResponse = new BoletosResponse();
        $boletos = new Collection();

        foreach($this->boletos as $boleto) {
            $boletoResponse = new BoletoResponse();
            $boletos[] = $boletoResponse;
        }

        $boletosResponse->setBoletos($boletos);
        return $boletosResponse;

    }
}