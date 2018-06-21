<?php
/**
 * Created by PhpStorm.
 * User: yurykozyrev
 * Date: 21.06.18
 * Time: 10:28
 */

namespace Kozz\Best2Pay;

/**
 * Class RequestCreatePayment
 * @package Kozz\Best2Pay
 * @property $amount number
 * @property $reference string
 * @property $recurring_period number
 * @property $start_date string
 * @property $description string
 * @property $url string
 * @property $failurl string
 */
class RequestCreatePayment extends \ArrayObject
{
    use ObjectAccessTrait;
}
