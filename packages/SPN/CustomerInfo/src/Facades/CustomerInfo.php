<?php

namespace SPN\CustomerInfo\Facades;

use Illuminate\Support\Facades\Facade;

class CustomerInfo extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'customerinfo';
    }
}
