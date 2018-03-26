<?php

namespace App\Facades\Helper\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Helper
 * @package App\Facades\Helper\Facades
 */
class Helper extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'helper';
    }
}