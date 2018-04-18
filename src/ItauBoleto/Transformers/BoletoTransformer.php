<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 18/04/18
 * Time: 14:39
 */

namespace MatheusHack\ItauBoleto\Transformers;

use League\Fractal;
use MatheusHack\ItauBoleto\Response\BoletoResponse;

class BoletoTransformer extends Fractal\TransformerAbstract
{
    public function transform(BoletoResponse $boleto)
    {
        return [
            'id' => 1
        ];
    }
}