<?php
/**
 * Created by PhpStorm.
 * User: yurykozyrev
 * Date: 21.06.18
 * Time: 11:40
 */

namespace Kozz\Best2Pay\Laravel\Facades;

use Illuminate\Support\Facades\Facade;
use Kozz\Best2Pay\Best2Pay;

/**
 * Class Best2PayFacade
 * @package Kozz\Best2Pay\Laravel\Facades
 */
class Best2PayFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Best2Pay::class;
    }
}

