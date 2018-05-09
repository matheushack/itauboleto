<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 18/04/18
 * Time: 15:07
 */

namespace MatheusHack\ItauBoleto\Response;


/**
 * Class BoletosResponse
 * @package MatheusHack\ItauBoleto\Response
 */
class BoletosResponse
{
    /**
     * @var array
     */
    public $boletos = [];

    /**
     * @return array
     */
    public function getBoletos()
    {
        return $this->boletos;
    }

    /**
     * @param array $boletos
     * @return BoletosResponse
     */
    public function setBoletos($boletos)
    {
        $this->boletos = $boletos;
        return $this;
    }


}