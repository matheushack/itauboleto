<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 19/04/18
 * Time: 11:20
 */

namespace MatheusHack\ItauBoleto\Exceptions;

use Throwable;

class ValidationException extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        if(empty($message))
            $message = 'Faltam informações de configuração';

        parent::__construct($message, $code, $previous);
    }
}
