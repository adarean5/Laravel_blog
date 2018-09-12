<?php
/**
 * Created by PhpStorm.
 * User: Jernej
 * Date: 27. 08. 2018
 * Time: 14:44
 */

namespace App\Billing;


class Stripe
{
    protected $key;

    public function __construct($key)
    {
        $this->key = $key;
    }
}
