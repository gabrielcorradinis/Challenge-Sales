<?php

namespace App\Exceptions;

use Exception;

class SellerNotFoundException extends Exception
{
    public function __construct($message = 'Seller not found', $code = 404, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
