<?php
/**
 * Created by PhpStorm.
 * User: yurykozyrev
 * Date: 21.06.18
 * Time: 13:47
 */

namespace Kozz\Best2Pay;


trait ObjectAccessTrait
{
    public function __get($name)
    {
        return $this[$name];
    }
    public function __set($name, $val)
    {
        return $this[$name] = $val;
    }
}
