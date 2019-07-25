<?php

namespace App\Exceptions;

use Exception;

class ApiNotConnectedException extends Exception
{
     /**
     * Report or log an exception.
     *
     * @return void
     */
    public function report()
    {
        \Log::debug('Api Not Connected');
    }
}
