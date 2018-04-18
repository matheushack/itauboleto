<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 18/04/18
 * Time: 11:16
 */

namespace MatheusHack\ItauBoleto\Exceptions;

use Throwable;

class BoletoException extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        if(empty($message))
            $message = 'Houve problema na comunicação';

        parent::__construct($message, $code, $previous);
    }
}