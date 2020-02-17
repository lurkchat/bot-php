<?php

namespace Lurkchat\Exceptions;

use Exception;
use Throwable;

class InvalidRequestMethodException extends Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        if (!$message) {
            $message = "Specify post or get method";
        }
        parent::__construct($message, $code, $previous);
    }
}
