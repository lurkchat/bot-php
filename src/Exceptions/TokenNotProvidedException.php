<?php

namespace Lurkchat\Exceptions;

use Exception;
use Throwable;

class TokenNotProvidedException extends Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        if (!$message) {
            $message = "Missing bot token check config or provide it manually";
        }
        parent::__construct($message, $code, $previous);
    }
}
