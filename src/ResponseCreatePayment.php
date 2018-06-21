<?php
/**
 * Created by PhpStorm.
 * User: yurykozyrev
 * Date: 21.06.18
 * Time: 10:44
 */

namespace Kozz\Best2Pay;

/**
 * Class ResponseCreatePayment
 * @package Kozz\Best2Pay
 * @property $id string
 */
class ResponseCreatePayment extends \ArrayObject
{
    /**
     * @var string
     */
    protected $originalResponseString;

    /**
     * @param $string
     * @return $this
     */
    public function setOriginalResponseString($string)
    {
        $this->originalResponseString = $string;
        return $this;
    }

    /**
     * @return string
     */
    public function getOriginalResponseString()
    {
        return $this->originalResponseString;
    }
}
