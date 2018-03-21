<?php

namespace App\Facades\Kafka\Producer\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Producer
 * @package App\Facades\Kafka\Producer\Facades
 */
class Producer extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'producer';
    }
}