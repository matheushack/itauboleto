<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 18/04/18
 * Time: 14:09
 */

namespace MatheusHack\ItauBoleto\Services;

use Illuminate\Support\Collection;
use MatheusHack\ItauBoleto\ItauClient;
use MatheusHack\ItauBoleto\Exceptions\BoletoException;
use MatheusHack\ItauBoleto\Factories\BoletoRequestFactory;
use MatheusHack\ItauBoleto\Factories\BoletoResponseFactory;

class ServiceBoleto
{
    private $itauClient;

    function __construct(array $config)
    {
        $this->itauClient = new ItauClient($config);
    }

    public function registrar(array $boletos)
    {
        $boletosCollection = new Collection();
        $boletRequestFactory = new BoletoRequestFactory();

        foreach($boletos as $boleto)
            $boletosCollection[] = $boletRequestFactory->make($boleto);

        $response = $this->itauClient->execute($boletosCollection);

        if(!empty($response)) {
            $boletoResponseFactory = new BoletoResponseFactory($response);
            $boletoResponse = $boletoResponseFactory->make();

            return $boletoResponse->getBoletos();
        }

        throw new BoletoException('Não foi possível registrar os boletos');
    }
}