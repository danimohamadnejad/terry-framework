<?php
namespace App\PaymentMethods;
abstract class PaymentMethod{
    protected $key = '';
    public function get_key(){
        return $this->key;
    }
}