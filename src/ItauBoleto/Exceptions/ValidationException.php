<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 19/04/18
 * Time: 11:20
 */

namespace MatheusHack\ItauBoleto\Exceptions;

use Throwable;

/**
 * Class ValidationException
 * @package MatheusHack\ItauBoleto\Exceptions
 */
class ValidationException extends \Exception
{
    /**
     * ValidationException constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        if(empty($message))
            $message = 'Faltam informações de configuração';

        parent::__construct($message, $code, $previous);
    }
}
