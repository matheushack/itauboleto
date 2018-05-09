<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 09/05/18
 * Time: 12:53
 */

namespace MatheusHack\ItauBoleto\Requests;


/**
 * Class DadosComplementaresRequest
 * @package MatheusHack\ItauBoleto\Requests
 */
class DadosComplementaresRequest
{

    /**
     * @var array
     */
    private $instrucoes = [];

    /**
     * @var
     */
    private $demonstrativo;

    /**
     * @return array
     */
    public function getInstrucoes()
    {
        return $this->instrucoes;
    }

    /**
     * @param array $instrucoes
     * @return DadosComplementaresRequest
     */
    public function setInstrucoes($instrucoes)
    {
        $this->instrucoes = $instrucoes;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDemonstrativo()
    {
        return $this->demonstrativo;
    }

    /**
     * @param mixed $demonstrativo
     * @return DadosComplementaresRequest
     */
    public function setDemonstrativo($demonstrativo)
    {
        $this->demonstrativo = $demonstrativo;
        return $this;
    }


}