<?php

return [
    'sector' => env('BEST2PAY_SECTOR', null),
    'password' => env('BEST2PAY_PASSWORD', "test"),
    'currency' => env('BEST2PAY_CURRENCY', "643"),
    'isTest' => env('BEST2PAY_TESTMODE', false),
];
