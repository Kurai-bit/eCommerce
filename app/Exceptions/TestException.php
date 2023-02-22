<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class TestException extends Exception
{
    protected $additionalInfo;

    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        $this->additionalInfo = 'Just a test';

        parent::__construct($message, $code, $previous);
    }
}
