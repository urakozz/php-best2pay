<?php
/**
 * Created by PhpStorm.
 * User: yurykozyrev
 * Date: 21.06.18
 * Time: 10:07
 */

namespace Kozz\Best2Pay\Laravel;

/**
 * Class Best2PayConfig
 * @package Kozz\Best2Pay\Laravel
 * @property $sector string
 * @property $currency string
 * @property $password string
 * @property $isTest boolean
 */
class Best2PayConfig extends \ArrayObject
{
    public function __construct($input = array(), $flags = 0, $iterator_class = "ArrayIterator")
    {
        parent::__construct($input, $flags, $iterator_class);
        if (!isset($this->sector)) {
            throw new \InvalidArgumentException("options.sector should be present in config");
        }
        if (!isset($this->currency)) {
            throw new \InvalidArgumentException("options.currency should be present in config");
        }
        if (!isset($this->password)) {
            throw new \InvalidArgumentException("options.password should be present in config");
        }
        if (!isset($this["isTest"])) {
            $this->isTest = false;
        }
    }
}
