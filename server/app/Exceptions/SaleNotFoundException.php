<?php

namespace App\Exceptions;

use Exception;

class SaleNotFoundException extends Exception
{
    public function __construct($message = 'Sale not found', $code = 404, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}