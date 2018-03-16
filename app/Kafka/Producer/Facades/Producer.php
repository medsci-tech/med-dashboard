<?php

namespace App\Kafka\Producer\Facades;

use Illuminate\Support\Facades\Facade;

class Producer extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'producer';
    }
}