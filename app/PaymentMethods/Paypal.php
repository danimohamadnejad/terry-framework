<?php
namespace App\PaymentMethods;
use App\PaymentMethods\PaymentMethod;

class Paypal extends PaymentMethod{
    protected $key = 'paypal';
}