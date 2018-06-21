<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 18/04/18
 * Time: 10:21
 */

namespace MatheusHack\ItauBoleto;

use MatheusHack\ItauBoleto\Constants\Retorno;
use MatheusHack\ItauBoleto\Helpers\Fractal;
use MatheusHack\ItauBoleto\Requests\DadosComplementaresRequest;
use MatheusHack\ItauBoleto\Services\ServiceBoleto;
use MatheusHack\ItauBoleto\Validates\BoletoValidate;
use MatheusHack\ItauBoleto\Exceptions\BoletoException;
use MatheusHack\ItauBoleto\Transformers\BoletoTransformer;

/**
 * Class Itau
 * @package MatheusHack\ItauBoleto
 */
class Itau
{
    /**
     * @var ServiceBoleto
     */
    private $serviceBoleto;

    /**
     * @var array
     */
    private $config;

    /**
     * Itau constructor.
     * @param array $config
     * @throws Exceptions\ValidationException
     */
    function __construct($config = [])
    {
        $validate = new BoletoValidate();
        $validate->config($config);

        $this->config = $config;
        $this->serviceBoleto = new ServiceBoleto($config);
    }

    /**
     * @param array $dados
     * @param DadosComplementaresRequest|null $dadosComplementares
     * @return array|string
     * @throws BoletoException
     */
    public function registrar(array $dados, DadosComplementaresRequest $dadosComplementares = null)
    {
        if(empty($dados))
            throw new BoletoException('Requisição inválida');

        if(!array_key_exists(0, $dados))
            $boletos[] = $dados;

        if(empty($dadosComplementares))
            $dadosComplementares = new DadosComplementaresRequest();

        $boletos = $this->serviceBoleto->registrar($boletos, $dadosComplementares);

        if($boletos->count() > 0) {
            if(data_get($this->config, 'return', Retorno::TO_OBJECT) == 'json')
                return Fractal::collection($boletos, new BoletoTransformer($this->config))->toJson();

            if(data_get($this->config, 'return', Retorno::TO_OBJECT) == 'array')
                return Fractal::collection($boletos, new BoletoTransformer($this->config))->toArray();

            return array_map(function($input){
                $from_json =  json_decode($input, true);
                return $from_json ? $from_json : $input;
            }, Fractal::collection($boletos, new BoletoTransformer($this->config))->toArray());
        }

        throw new BoletoException('Nenhuma boleto registrado');
    }
}